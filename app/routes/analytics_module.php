<?php

$router->get('/user/analytics', [AnalyticsController::class, 'showUserAnalyticsScreen'], '@member');
$router->get('/member/analytics', [AnalyticsController::class, 'showMemberAnalyticsScreen']);
