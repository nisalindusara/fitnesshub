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

// class sessions
$router->get(
    '/classes/sessions',
    [ClassDemoController::class, 'sessions'],
    'manage_classes'
);


$router->get(
    '/classes/sessions/create',
    [ClassDemoController::class, 'createSession'],
    'manage_classes'
);


$router->get(
    '/classes/sessions/show',
    [ClassDemoController::class, 'showSession'],
    'manage_classes'
);