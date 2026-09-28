<?php
// Account & Membership
$router->get('/portal/members/search', [MemberController::class, 'search'], 'search_members');

// Membership Plan Management CRUD
$router->get('/membership-plans', [MembershipPlanController::class, 'index'], 'manage_membership_plans');
$router->get('/membership-plans/create', [MembershipPlanController::class, 'create'], 'manage_membership_plans');
$router->post('/membership-plans/store', [MembershipPlanController::class, 'store'], 'manage_membership_plans');
$router->get('/membership-plans/show', [MembershipPlanController::class, 'show'], 'manage_membership_plans');
$router->get('/membership-plans/edit', [MembershipPlanController::class, 'edit'], 'manage_membership_plans');
$router->post('/membership-plans/update', [MembershipPlanController::class, 'update'], 'manage_membership_plans');
$router->post('/membership-plans/deactivate', [MembershipPlanController::class, 'deactivate'], 'manage_membership_plans');

$router->get('/portal/attendance', [AttendanceController::class, 'showAttendanceMarkingScreen']);
$router->get('/portal/attendance/member-status', [AttendanceController::class, 'memberStatus'], 'manage_attendance');
$router->post('/portal/attendance/check-in', [AttendanceController::class, 'checkIn'], 'manage_attendance');
$router->post('/portal/attendance/check-out', [AttendanceController::class, 'checkOut'], 'manage_attendance');

$router->get('/portal/staff-profile', [StaffProfileController::class, 'showStaffProfileScreen'], [
    'view_daily_overview',
    'view_ecommerce_overview',
    'view_system_overview',
    'view_manager_summary',
    'view_own_clients'
]);
