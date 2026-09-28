<?php

// Staff overview (receptionist, e-commerce admin, super admin, manager)
$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen'], [
    'view_daily_overview',
    'view_ecommerce_overview',
    'view_system_overview',
    'view_manager_summary',
]);

// Instructor overview and client roster
$router->get('/portal/instructor', [InstructorDashboardController::class, 'showInstructorOverviewScreen'], 'view_own_clients');
$router->get('/portal/clients', [MyClientsController::class, 'showMyClientsScreen'], 'view_own_clients');
$router->get('/portal/clients/export', [MyClientsController::class, 'exportClients'], 'view_own_clients');
$router->post('/portal/clients/add', [MyClientsController::class, 'addClient'], 'view_own_clients');

// JSON
$router->get('/api/clients/member-search', [MyClientsController::class, 'searchMembers'], 'view_own_clients');
