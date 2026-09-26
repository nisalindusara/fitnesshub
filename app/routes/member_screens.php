<?php

$router->get('/member', [MemberController::class, 'showMemberDashboardScreen'], '@member');
$router->get('/member/member-profile', [MemberController::class, 'showMemberProfileScreen'], '@member');
$router->get('/member/member-profile/personal-details', [MemberScreenController::class, 'showMemberPersonalDetailsScreen'], '@member');
$router->get('/member/member-profile/order-history', [MemberScreenController::class, 'showMemberOrderHistoryScreen'], '@member');
$router->get('/member/member-profile/order-history/view', [MemberScreenController::class, 'showMemberOrderDetailsScreen'], '@member');
$router->get('/member/member-profile/payment-history', [MemberScreenController::class, 'showMemberPaymentHistoryScreen'], '@member');
$router->get('/member/member-profile/notification-settings', [MemberScreenController::class, 'showMemberNotificationSettingsScreen'], '@member');
$router->get('/member/member-profile/privacy-data', [MemberScreenController::class, 'showMemberPrivacyDataScreen'], '@member');
