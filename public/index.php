<?php

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$router = new Router();

$router->get('/', [LandingController::class, "index"]);
$router->get('/personal-details', [AuthController::class, "personalDetails"]);
$router->post('/register-submit', [AuthController::class, "storeUser"]);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);