<?php
// Registration and login

$router->get('/personal-details', [AuthController::class, 'personalDetails']);
$router->post('/register-submit', [AuthController::class, 'storeUser']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);

$router->get('/instructor/overview', [InstructorDashboardController::class, 'showInstructorOverviewScreen']);
$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen']);
