<?php

// Public marketing pages
$router->get('/', [LandingController::class, 'showLandingHomeScreen']);
$router->get('/about', [LandingController::class, 'about']);
$router->get('/classes', [LandingController::class, 'class']);
$router->post('/classes/book', [LandingController::class, 'bookClass']);
$router->get('/contact', [LandingController::class, 'contact']);
$router->post('/contact', [LandingController::class, 'submitContactForm']);
$router->get('/privacy-policy', [LandingController::class, 'privacyPolicy']);
$router->get('/terms-and-conditions', [LandingController::class, 'termsOfConditions']);
