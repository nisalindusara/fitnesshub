<?php

/** @var Router $router */

// Instructor: own schedule
$router->get('/portal/schedule', [InstructorScheduleController::class, 'mySchedule'], 'view_own_schedule');

// Admin: build instructor work schedules on the week calendar
$router->get('/portal/instructor-sessions', [InstructorSessionController::class, 'index'], 'manage_schedule');
$router->get('/portal/staff-availability', [StaffAvailabilityController::class, 'showStaffAvailabilityScreen'], 'manage_schedule');

// Manager only (not super admin): leave requests and their processing result
$router->get('/portal/leave-requests', [LeaveRequestController::class, 'index'], 'manage_leave_requests');
$router->get('/portal/leave-requests/review', [LeaveRequestController::class, 'review'], 'manage_leave_requests');
$router->get('/portal/leave-requests/result', [LeaveRequestController::class, 'result'], 'manage_leave_requests');
$router->post('/portal/leave-requests/approve', [LeaveRequestController::class, 'approve'], 'manage_leave_requests');
$router->post('/portal/leave-requests/reject', [LeaveRequestController::class, 'reject'], 'manage_leave_requests');
$router->post('/portal/leave-requests/cancel', [LeaveRequestController::class, 'cancel'], 'manage_leave_requests');

// JSON: the calendar saves and deletes sessions in place
$router->post('/api/instructor-sessions/save', [InstructorSessionController::class, 'save'], 'manage_schedule');
$router->post('/api/instructor-sessions/delete', [InstructorSessionController::class, 'delete'], 'manage_schedule');
