<?php

require_once __DIR__ . '/PickupHandler.php';
require_once __DIR__ . '/StandardDeliveryHandler.php';

class ShippingHandlerFactory
{
    private static array $handlers = [
        'pickup'            => PickupHandler::class,
        'standard_delivery' => StandardDeliveryHandler::class,
    ];

    public static function make(string $key): ShippingHandlerInterface
    {
        $class = self::$handlers[$key] ?? null;

        if ($class === null) {
            throw new InvalidArgumentException("Unknown shipping method key: {$key}");
        }

        return new $class();
    }
}
