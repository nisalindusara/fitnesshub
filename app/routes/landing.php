<?php
// Public marketing pages

$router->get('/', [LandingController::class, 'index']);
$router->get('/classes', [LandingController::class, 'class']);
$router->get('/contact', [LandingController::class, 'contact']);
$router->get('/about', [LandingController::class, 'about']);
$router->get('/privacy-policy', [LandingController::class, 'privacyPolicy']);
$router->get('/terms-of-conditions', [LandingController::class, 'termsOfConditions']);
