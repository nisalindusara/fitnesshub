<?php

// Staff profile (every staff role)
$router->get('/portal/profile', [StaffProfileController::class, 'showStaffProfileScreen'], [
    'view_daily_overview',
    'view_ecommerce_overview',
    'view_system_overview',
    'view_manager_summary',
    'view_own_clients'
]);

// Members
$router->get('/portal/members', [MemberDirectoryController::class, 'showMembersScreen'], 'manage_members');

// Membership plans
$router->get('/portal/membership-plans', [MembershipPlanController::class, 'index'], 'manage_membership_plans');
$router->get('/portal/membership-plans/create', [MembershipPlanController::class, 'create'], 'manage_membership_plans');
$router->post('/portal/membership-plans/store', [MembershipPlanController::class, 'store'], 'manage_membership_plans');
$router->get('/portal/membership-plans/show', [MembershipPlanController::class, 'show'], 'manage_membership_plans');
$router->get('/portal/membership-plans/edit', [MembershipPlanController::class, 'edit'], 'manage_membership_plans');
$router->post('/portal/membership-plans/update', [MembershipPlanController::class, 'update'], 'manage_membership_plans');
$router->post('/portal/membership-plans/deactivate', [MembershipPlanController::class, 'deactivate'], 'manage_membership_plans');

// Attendance (front desk check-in / check-out)
$router->get('/portal/attendance', [AttendanceController::class, 'showAttendanceMarkingScreen'], 'manage_attendance');

// JSON
$router->get('/api/members/search', [MemberController::class, 'search'], ['search_members', 'manage_members', 'manage_orders', 'manage_attendance']);
$router->get('/api/attendance/member-status', [AttendanceController::class, 'memberStatus'], 'manage_attendance');
$router->post('/api/attendance/check-in', [AttendanceController::class, 'checkIn'], 'manage_attendance');
$router->post('/api/attendance/check-out', [AttendanceController::class, 'checkOut'], 'manage_attendance');
