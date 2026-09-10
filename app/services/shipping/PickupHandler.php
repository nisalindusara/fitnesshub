<?php

require_once __DIR__ . '/../../contracts/ShippingHandlerInterface.php';

class PickupHandler implements ShippingHandlerInterface
{
    public function calculateCost(array $orderContext): float
    {
        return 0.00;
    }

    public function validate(array $orderData): bool
    {
        return true;
    }
}
