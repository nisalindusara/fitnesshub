<?php
// Registration and login

$router->get('/personal-details', [AuthController::class, 'showPersonalDetailsScreen']);
$router->post('/register', [AuthController::class, 'registerNewUserAccount']);

$router->get('/login', [AuthController::class, 'showLoginScreen']);
$router->post('/login', [AuthController::class, 'authenticateUserOnLogin']);

$router->post('/logout', [AuthController::class, 'userLogout']);
