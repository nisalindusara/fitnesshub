<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../models/ecommerce_module/Order.php';
require_once __DIR__ . '/../../models/ecommerce_module/ShippingMethod.php';
require_once __DIR__ . '/../../services/ecommerce_module/ShippingHandlerFactory.php';
require_once __DIR__ . '/../../models/ecommerce_module/ProductVariant.php';
require_once __DIR__ . '/../../models/payment_module/Payment.php';
require_once __DIR__ . '/../../services/ecommerce_module/OrderService.php';
require_once __DIR__ . '/../../services/ecommerce_module/OrderStatusService.php';
require_once __DIR__ . '/../../services/payment_module/PaymentVerificationService.php';
require_once __DIR__ . '/../../services/ecommerce_module/ShippingHandlerFactory.php';

class OrderController extends Controller
{

    // Permission that allows advancing and cancelling orders.
    private const PERM_UPDATE_STATUS = 'manage_orders';

    public function index(): void
    {
        $orderModel = new Order();

        $data['orders'] = $orderModel->getOrderListing();

        $this->render('ecommerce_module/index', 'staff-layout', $data);
    }

    public function show(): void
    {
        $orderId = (int) ($_GET['id'] ?? 0);

        if ($orderId <= 0) {
            http_response_code(404);
            echo '404 - Order not found';
            return;
        }

        $orderModel = new Order();
        $order = $orderModel->findByIdWithDetails($orderId);

        if ($order === false) {
            http_response_code(404);
            echo '404 - Order not found';
            return;
        }

        $statusService = new OrderStatusService();

        // Set by advance() after a successful change, so the fill animation
        // plays once on the next page load and never again on refresh.
        $animateProgress = ($_SESSION['order_status_animate'] ?? null) === $orderId;
        unset($_SESSION['order_status_animate']);

        $data['order'] = $order;
        $data['items'] = $orderModel->getItemsByOrderId($orderId);
        $data['statusBlock'] = $statusService->buildStatusBlock(
            $order,
            $orderModel->getStatusHistory($orderId)
        );
        $data['payment'] = (new Payment())->findByOrderId($orderId);
        $data['canUpdateStatus'] = Gate::allows(self::PERM_UPDATE_STATUS);
        $data['animateProgress'] = $animateProgress;

        $this->render('ecommerce_module/show', 'staff-layout', $data);
    }

    public function showAddOrder(): void
    {
        $shippingModel = new ShippingMethod();
        $data['shippingMethods'] = $shippingModel->getAllActive();
        $this->render('ecommerce_module/add-order', 'staff-layout', $data);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        try {
            $customer = OrderService::resolveCustomer($_POST);
        } catch (InvalidArgumentException $e) {
            $this->redirect('/portal/orders/add-order?error=' . urlencode($e->getMessage()));
            return;
        }

        $shippingMethodModel = new ShippingMethod();
        $shippingMethodId = (int) ($_POST['shipping_method_id'] ?? 0);
        $shippingMethodRow = $shippingMethodModel->findActiveById($shippingMethodId);

        if ($shippingMethodRow === false) {
            $this->redirect('/portal/orders/add-order?error=invalid_shipping_method');
            return;
        }

        $handler = ShippingHandlerFactory::make($shippingMethodRow['key']);

        if (!$handler->validate($_POST)) {
            $this->redirect('/portal/orders/add-order?error=missing_shipping_details');
            return;
        }

        $items = json_decode($_POST['items_json'] ?? '[]', true);

        if (!is_array($items) || empty($items)) {
            $this->redirect('/portal/orders/add-order?error=empty_cart');
            return;
        }

        // Recompute subtotal server-side — never trust a posted total
        $variantModel = new ProductVariant();
        $subtotal = 0.00;

        foreach ($items as $item) {
            $variant = $variantModel->findById((int) $item['variant_id']);
            if ($variant === false) {
                $this->redirect('/portal/orders/add-order?error=invalid_product');
                return;
            }
            $subtotal += $variant['price'] * (int) $item['quantity'];
        }

        $shippingCost = $handler->calculateCost(['subtotal' => $subtotal]);
        $totalAmount = $subtotal + $shippingCost;

        $orderData = [
            'member_id'          => $customer['member_id'],
            'guest_name'         => $customer['guest_name'],
            'guest_phone'        => $customer['guest_phone'],
            'placed_by'          => $_SESSION['user_id'],
            'shipping_method_id' => $shippingMethodRow['id'],
            'shipping_cost'      => $shippingCost,
            'subtotal'           => $subtotal,
            'discount_amount'    => 0.00,
            'tax_amount'         => 0.00,
            'total_amount'       => $totalAmount,
            'notes'              => trim($_POST['notes'] ?? '') ?: null,
        ];

        $orderModel = new Order();
        $orderId = $orderModel->create($orderData, $items);

        if ($orderId === false) {
            $this->redirect('/portal/orders/add-order?error=stock_or_creation_failed');
            return;
        }

        // Record the payment
        $paymentMethod = $_POST['payment_method'] ?? 'cash';
        $staffConfirmed = !empty($_POST['payment_confirmed']);
        $verificationStatus = PaymentVerificationService::determineStatus($paymentMethod, $staffConfirmed);

        $paymentModel = new Payment();
        $paymentModel->recordForOrder([
            'amount'              => $totalAmount,
            'method'              => $paymentMethod,
            'verification_status' => $verificationStatus,
            'recorded_by'         => $_SESSION['user_id'],
        ], $orderId);

        // Apply a non-default initial status only if the payment/order-status link allows it
        $requestedStatus = $_POST['status'] ?? 'pending';
        if ($requestedStatus !== 'pending') {
            $statusService = new OrderStatusService();
            if ($statusService->canTransitionTo($orderId, $requestedStatus)) {
                $orderModel->updateStatus($orderId, $requestedStatus);
            }
        }

        $this->redirect('/portal/orders/view?id=' . $orderId . '&success=1');
    }

    /**
     * POST: the "Mark as ..." button on the order page.
     * expected_status is the status the admin was looking at when they pressed it.
     */
    public function advance(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (!Gate::allows(self::PERM_UPDATE_STATUS)) {
            http_response_code(403);
            echo '403 - Forbidden';
            return;
        }

        $orderId = (int) ($_POST['order_id'] ?? 0);
        $expectedStatus = (string) ($_POST['expected_status'] ?? '');
        $back = '/portal/orders/view?id=' . $orderId;

        try {
            (new OrderStatusService())->advance($orderId, (int) $_SESSION['user_id'], $expectedStatus);
        } catch (InvalidArgumentException | RuntimeException $e) {
            $this->redirect($back . '&error=' . urlencode($e->getMessage()));
            return;
        }

        $_SESSION['order_status_animate'] = $orderId;
        $this->redirect($back . '&success=1');
    }

    /** POST: the cancel dialog. The reason is mandatory and checked in the service. */
    public function cancel(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        if (!Gate::allows(self::PERM_UPDATE_STATUS)) {
            http_response_code(403);
            echo '403 - Forbidden';
            return;
        }

        $orderId = (int) ($_POST['order_id'] ?? 0);
        $reason = (string) ($_POST['reason'] ?? '');
        $back = '/portal/orders/view?id=' . $orderId;

        try {
            (new OrderStatusService())->cancel($orderId, (int) $_SESSION['user_id'], $reason);
        } catch (InvalidArgumentException | RuntimeException $e) {
            $this->redirect($back . '&error=' . urlencode($e->getMessage()));
            return;
        }

        $this->redirect($back . '&success=1');
    }
}
