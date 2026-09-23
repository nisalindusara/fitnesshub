<?php
// Account & Membership

$router->get('/dashboard', [MemberController::class, 'showMemberDashboardScreen']);
$router->get('/member-profile', [MemberController::class, 'showMemberProfileScreen']);

$router->get('/portal/members/search', [MemberController::class, 'search'], 'manage_orders');
