<?php

session_start();

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MemberController.php';
require_once __DIR__ . '/../app/controllers/StoreController.php';

$router = new Router();

$router->get('/', [LandingController::class, "index"]);
$router->get('/contact', [LandingController::class, "contact"]);
$router->get('/about', [LandingController::class, "about"]);
$router->get('/privacy-policy', [LandingController::class, "privacyPolicy"]);
$router->get('/terms-of-conditions', [LandingController::class, "termsOfConditions"]);

$router->get('/store', [StoreController::class, "ecommerceLandingPage"]);
$router->get('/catalog', [StoreController::class, "ecommerceCatalogue"]);
$router->get('/sample-product', [StoreController::class, "sampleProduct"]);
$router->get('/cart', [StoreController::class, "cart"]);
$router->get('/store-checkout', [StoreController::class, "ecommerceCheckout"]);


$router->get('/personal-details', [AuthController::class, "personalDetails"]);
$router->post('/register-submit', [AuthController::class, "storeUser"]);
$router->get('/login', [AuthController::class, "login"]);
$router->post('/login', [AuthController::class, "authenticate"]);

$router->get('/dashboard', [MemberController::class, "dashboard"]);

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
