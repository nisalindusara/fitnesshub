<?php

$router->get('/member/member-profile/personal-details', [MemberScreenController::class, 'showMemberPersonalDetailsScreen']);
$router->get('/member/member-profile/order-history', [MemberScreenController::class, 'showMemberOrderHistoryScreen']);
$router->get('/member/member-profile/order-history/view', [MemberScreenController::class, 'showMemberOrderDetailsScreen']);
$router->get('/member/member-profile/payment-history', [MemberScreenController::class, 'showMemberPaymentHistoryScreen']);
$router->get('/member/member-profile/notification-settings', [MemberScreenController::class, 'showMemberNotificationSettingsScreen']);
$router->get('/member/member-profile/privace-data', [MemberScreenController::class, 'showMemberPrivacyDataScreen']);
