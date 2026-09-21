<?php

interface ShippingHandlerInterface
{
    public function calculateCost(array $orderContext): float;
    public function validate(array $orderData): bool;
}
