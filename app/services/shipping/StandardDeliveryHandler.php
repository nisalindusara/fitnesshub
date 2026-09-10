<?php

require_once __DIR__ . '/../../contracts/ShippingHandlerInterface.php';

class StandardDeliveryHandler implements ShippingHandlerInterface
{
    public function calculateCost(array $orderContext): float
    {
        return 500.00;
    }

    public function validate(array $orderData): bool
    {
        return !empty($orderData['delivery_address']);
    }
}
