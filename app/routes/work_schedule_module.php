<?php

/** @var Router $router */

$router->get(
    '/my-schedule',
    [InstructorScheduleController::class, 'mySchedule'],
    'view_own_schedule'
);

// Admin: build instructor work schedules on the week calendar
$router->get('/instructor-sessions', [InstructorSessionController::class, 'index'], 'manage_schedule');
$router->post('/instructor-sessions/save', [InstructorSessionController::class, 'save'], 'manage_schedule');
$router->post('/instructor-sessions/delete', [InstructorSessionController::class, 'delete'], 'manage_schedule');

// Manager only (not super admin): leave request tickets and their processing result — not linked in the nav yet
$router->get('/leave-requests/review', [LeaveRequestController::class, 'review'], 'manage_leave_requests');
$router->get('/leave-requests/result', [LeaveRequestController::class, 'result'], 'manage_leave_requests');
$router->post('/leave-requests/approve', [LeaveRequestController::class, 'approve'], 'manage_leave_requests');
$router->post('/leave-requests/reject', [LeaveRequestController::class, 'reject'], 'manage_leave_requests');
$router->post('/leave-requests/cancel', [LeaveRequestController::class, 'cancel'], 'manage_leave_requests');
