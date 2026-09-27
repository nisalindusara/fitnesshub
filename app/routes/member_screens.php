<?php

$router->get('/member', [MemberController::class, 'showMemberDashboardScreen'], '@member');

$router->get('/member/member-profile', [MemberController::class, 'showMemberProfileScreen'], '@member');
$router->get('/member/member-profile/personal-details', [MemberScreenController::class, 'showMemberPersonalDetailsScreen'], '@member');
$router->get('/member/member-profile/order-history', [MemberScreenController::class, 'showMemberOrderHistoryScreen'], '@member');
$router->get('/member/member-profile/order-history/view', [MemberScreenController::class, 'showMemberOrderDetailsScreen'], '@member');
$router->get('/member/member-profile/payment-history', [MemberScreenController::class, 'showMemberPaymentHistoryScreen'], '@member');
$router->get('/member/member-profile/notification-settings', [MemberScreenController::class, 'showMemberNotificationSettingsScreen'], '@member');
$router->get('/member/member-profile/privacy-data', [MemberScreenController::class, 'showMemberPrivacyDataScreen'], '@member');

$router->get('/member/membership', [MemberController::class, 'showMembershipScreen'], '@member');
$router->get('/member/membership/workout-schedule', [MemberController::class, 'showWorkoutScheduleScreen'], '@member');
$router->post('/member/membership/workout-schedule/done', [MemberController::class, 'setWorkoutExerciseDone'], '@member');
$router->get('/member/membership/meal-plan', [MemberController::class, 'showMealPlanScreen'], '@member');
$router->post('/member/membership/meal-plan/done', [MemberController::class, 'setMealDone'], '@member');

$router->get('/member/classes', [ClassDemoController::class, 'showMemberClassScreen'], '@member');

$router->get('/member/membership/pt-sessions', [ClassDemoController::class, 'showMemberPtSessionScreen'], '@member');
