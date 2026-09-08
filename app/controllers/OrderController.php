<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Order.php';

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
}
