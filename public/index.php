<?php

session_start();

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MemberController.php';

$router = new Router();

$router->get('/', [LandingController::class, "index"]);
$router->get('/about', [LandingController::class, "about"]);

$router->get('/personal-details', [AuthController::class, "personalDetails"]);
$router->post('/register-submit', [AuthController::class, "storeUser"]);
$router->get('/login', [AuthController::class, "login"]);
$router->post('/login', [AuthController::class, "authenticate"]);

$router->get('/dashboard', [MemberController::class, "dashboard"]);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);