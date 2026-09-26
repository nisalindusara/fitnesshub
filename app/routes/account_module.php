<?php
// Account & Membership

$router->get('/dashboard', [MemberController::class, 'showMemberDashboardScreen'], '@auth');
$router->get('/membership', [MemberController::class, 'showMembershipScreen'], '@auth');
$router->get('/membership/workout-schedule', [MemberController::class, 'showWorkoutScheduleScreen'], '@auth');
$router->post('/membership/workout-schedule/done', [MemberController::class, 'setWorkoutExerciseDone'], '@auth');
$router->get('/member-profile', [MemberController::class, 'showMemberProfileScreen'], '@auth');

$router->get('/portal/members/search', [MemberController::class, 'search'], 'manage_orders');
