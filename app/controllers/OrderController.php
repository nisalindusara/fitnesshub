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
}
