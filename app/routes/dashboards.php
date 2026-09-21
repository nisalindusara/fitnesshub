<?php
// dashboards

$router->get('/dashboard-ecom', [StaffDashboardController::class, 'ecommerceAdmin'], 'manage_inventory');
$router->get('/dashboard-super-admin', [StaffDashboardController::class, 'superAdmin'], 'register_super_admins');
$router->get('/dashboard-manager', [StaffDashboardController::class, 'manager'], 'view_overview');
