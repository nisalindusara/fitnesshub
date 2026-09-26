<?php

/** @var Router $router */

$router->get(
    '/classes',
    [ClassDemoController::class, 'index'],
    'manage_classes'
);

$router->get(
    '/classes/create',
    [ClassDemoController::class, 'create'],
    'manage_classes'
);

$router->get(
    '/classes/show',
    [ClassDemoController::class, 'show'],
    'manage_classes'
);