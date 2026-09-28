<?php

// Member area. '@member' = logged in and not staff.
$router->get('/member', [MemberController::class, 'showMemberDashboardScreen'], '@member');
$router->get('/member/notifications', [NotificationController::class, 'showMemberNotificationsScreen'], '@member');

// Profile
$router->get('/member/profile', [MemberController::class, 'showMemberProfileScreen'], '@member');
$router->get('/member/profile/personal-details', [MemberScreenController::class, 'showMemberPersonalDetailsScreen'], '@member');
$router->get('/member/profile/orders', [MemberScreenController::class, 'showMemberOrderHistoryScreen'], '@member');
$router->get('/member/profile/orders/view', [MemberScreenController::class, 'showMemberOrderDetailsScreen'], '@member');
$router->get('/member/profile/payments', [MemberScreenController::class, 'showMemberPaymentHistoryScreen'], '@member');
$router->get('/member/profile/notification-settings', [MemberScreenController::class, 'showMemberNotificationSettingsScreen'], '@member');
$router->get('/member/profile/privacy', [MemberScreenController::class, 'showMemberPrivacyDataScreen'], '@member');

// Membership: workout schedule, meal plan, PT sessions
$router->get('/member/membership', [MemberController::class, 'showMembershipScreen'], '@member');
$router->get('/member/membership/workout-schedule', [MemberController::class, 'showWorkoutScheduleScreen'], '@member');
$router->get('/member/membership/meal-plan', [MemberController::class, 'showMealPlanScreen'], '@member');
$router->get('/member/membership/pt-sessions', [ClassDemoController::class, 'showMemberPtSessionScreen'], '@member');

$router->get('/member/classes', [ClassDemoController::class, 'showMemberClassScreen'], '@member');

// JSON: tick off workouts and meals
$router->post('/api/member/workouts/done', [MemberController::class, 'setWorkoutExerciseDone'], '@member');
$router->post('/api/member/meals/done', [MemberController::class, 'setMealDone'], '@member');
