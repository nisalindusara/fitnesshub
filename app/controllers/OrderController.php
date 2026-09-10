<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/ShippingMethod.php';
require_once __DIR__ . '/../services/shipping/ShippingHandlerFactory.php';
require_once __DIR__ . '/../models/ProductVariant.php';
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../services/OrderService.php';
require_once __DIR__ . '/../services/OrderStatusService.php';
require_once __DIR__ . '/../services/PaymentVerificationService.php';
require_once __DIR__ . '/../services/shipping/ShippingHandlerFactory.php';

class OrderController extends Controller
{
    public function index(): void
    {
        $orderModel = new Order();

        $data['orders'] = $orderModel->getOrderListing();

        $this->render('portal/orders/index', 'staff-layout', $data);
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

        $data['order'] = $order;
        $data['items'] = $orderModel->getItemsByOrderId($orderId);

        $this->render('portal/orders/show', 'staff-layout', $data);
    }

    public function showAddOrder(): void
    {
        $shippingModel = new ShippingMethod();
        $data['shippingMethods'] = $shippingModel->getAllActive();
        $this->render('portal/orders/add-order', 'staff-layout', $data);
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        try {
            $customer = OrderService::resolveCustomer($_POST);
        } catch (InvalidArgumentException $e) {
            $this->redirect('/portal/orders/create?error=' . urlencode($e->getMessage()));
            return;
        }

        $shippingMethodModel = new ShippingMethod();
        $shippingMethodId = (int) ($_POST['shipping_method_id'] ?? 0);
        $shippingMethodRow = $shippingMethodModel->findActiveById($shippingMethodId);

        if ($shippingMethodRow === false) {
            $this->redirect('/portal/orders/create?error=invalid_shipping_method');
            return;
        }

        $handler = ShippingHandlerFactory::make($shippingMethodRow['key']);

        if (!$handler->validate($_POST)) {
            $this->redirect('/portal/orders/create?error=missing_shipping_details');
            return;
        }

        $items = json_decode($_POST['items_json'] ?? '[]', true);

        if (!is_array($items) || empty($items)) {
            $this->redirect('/portal/orders/create?error=empty_cart');
            return;
        }

        // Recompute subtotal server-side — never trust a posted total
        $variantModel = new ProductVariant();
        $subtotal = 0.00;

        foreach ($items as $item) {
            $variant = $variantModel->findById((int) $item['variant_id']);
            if ($variant === false) {
                $this->redirect('/portal/orders/create?error=invalid_product');
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
            $this->redirect('/portal/orders/create?error=stock_or_creation_failed');
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
}
