<?php

$router->get('/instructor/overview', [InstructorDashboardController::class, 'showInstructorOverviewScreen']);
$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen']);
$router->get('/dashboard-ecom', [StaffDashboardController::class, 'ecommerceAdmin'], 'manage_inventory');
$router->get('/dashboard-super-admin', [StaffDashboardController::class, 'superAdmin'], 'register_super_admins');
$router->get('/dashboard-manager', [StaffDashboardController::class, 'manager'], 'view_overview');
