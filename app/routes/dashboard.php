<?php

$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen'], [
    'view_daily_overview',
    'view_ecommerce_overview',
    'view_system_overview',
    'view_manager_summary',
]);

$router->get('/instructor', [InstructorDashboardController::class, 'showInstructorOverviewScreen'], 'view_own_clients');
