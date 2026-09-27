<?php

$router->get('/analytics', [AnalyticsController::class, 'showUserAnalyticsScreen'], '@member');
