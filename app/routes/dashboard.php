<?php

$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen'], [
    'view_daily_overview',
    'view_ecommerce_overview',
    'view_system_overview',
    'view_manager_summary',
]);

$router->get('/instructor', [InstructorDashboardController::class, 'showInstructorOverviewScreen'], 'view_own_clients');
$router->get('/my-clients', [MyClientsController::class, 'showMyClientsScreen'], 'view_own_clients');
$router->get('/my-clients/export', [MyClientsController::class, 'exportClients'], 'view_own_clients');
$router->get('/my-clients/members/search', [MyClientsController::class, 'searchMembers'], 'view_own_clients');
$router->post('/my-clients/add', [MyClientsController::class, 'addClient'], 'view_own_clients');
