<?php

$router->get('/portal', [DashboardController::class, 'showDashboardIndexScreen']);

$router->get('/instructor/overview', [InstructorDashboardController::class, 'showInstructorOverviewScreen']);
