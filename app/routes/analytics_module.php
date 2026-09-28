<?php

// Member analytics (the locked page is the upsell shown to members without a plan)
$router->get('/member/analytics', [AnalyticsController::class, 'showMemberAnalyticsScreen'], '@member');
$router->get('/member/analytics/locked', [AnalyticsController::class, 'showUserAnalyticsScreen'], '@member');

// Staff reports
$router->get('/portal/reports', [AnalyticsController::class, 'showReportsScreen'], 'view_reports');
$router->get('/portal/reports/member-performance', [AnalyticsController::class, 'MemberPerformanceScreen'], 'view_reports');
$router->get('/portal/reports/at-risk', [AnalyticsController::class, 'showAtRiskMembersScreen'], 'view_at_risk_members');
