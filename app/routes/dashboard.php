<?php

$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen']);

$router->get('/instructor/overview', [InstructorDashboardController::class, 'showInstructorOverviewScreen']);
$router->get('/my-clients', [MyClientsController::class, 'showMyClientsScreen'], 'view_own_clients');
