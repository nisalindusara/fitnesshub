<?php

$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen']);

$router->get('/instructor/overview', [InstructorDashboardController::class, 'showInstructorOverviewScreen'], 'view_own_clients');
$router->get('/my-clients', [MyClientsController::class, 'showMyClientsScreen'], 'view_own_clients');
$router->get('/my-clients/export', [MyClientsController::class, 'exportClients'], 'view_own_clients');
$router->get('/my-clients/members/search', [MyClientsController::class, 'searchMembers'], 'view_own_clients');
$router->post('/my-clients/add', [MyClientsController::class, 'addClient'], 'view_own_clients');
