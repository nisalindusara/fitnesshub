<?php
// Registration and login

$router->get('/register', [AuthController::class, 'showPersonalDetailsScreen']);
$router->post('/register', [AuthController::class, 'registerNewUserAccount']);

$router->get('/login', [AuthController::class, 'showLoginScreen']);
$router->post('/login', [AuthController::class, 'authenticateUserOnLogin']);

$router->post('/logout', [AuthController::class, 'userLogout']);

// Reset password: the end of the flow until emails are sent
$router->get('/reset-password', [AuthController::class, 'showResetPasswordScreen']);
