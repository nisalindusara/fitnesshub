<?php

/**
 * Admin: which staff are available to cover shifts this week.
 * Not connected to the database yet — shows sample data.
 */
class StaffAvailabilityController extends Controller
{
    public function showStaffAvailabilityScreen(): void
    {
        $staff = [
            ['Instructor One', 'Instructor', 'Mon – Fri', '6:00 AM – 2:00 PM', 'available'],
            ['Maya Thompson', 'Instructor', 'Mon, Wed, Fri', '9:00 AM – 6:00 PM', 'on leave'],
            ['Jordan Lee', 'Instructor', 'Tue – Sat', '12:00 – 9:00 PM', 'available'],
            ['Priya Nair', 'Instructor', 'Mon – Thu', '7:00 AM – 3:00 PM', 'limited'],
            ['Front desk (receptionist)', 'Receptionist', 'Daily', '5:30 AM – 10:00 PM', 'available'],
        ];

        $tones = ['available' => 'success', 'limited' => 'warning', 'on leave' => 'danger'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Staff Availability',
            'subtitle'  => 'Who can cover sessions this week.',
            'actions'   => [
                ['label' => 'Leave requests', 'href' => '/portal/leave-requests', 'permission' => 'manage_leave_requests'],
                ['label' => 'Instructor sessions', 'href' => '/portal/instructor-sessions', 'primary' => true],
            ],
            'stats' => [
                ['label' => 'Available this week', 'value' => 4, 'meta' => 'Of 5 staff'],
                ['label' => 'On leave', 'value' => 1, 'meta' => 'Maya Thompson', 'alert' => true],
                ['label' => 'Open shifts', 'value' => 3, 'meta' => 'Need cover'],
            ],
            'table' => [
                'columns' => ['Staff member', 'Role', 'Days', 'Hours', 'This week'],
                'rows'    => array_map(fn($s) => [
                    ['text' => $s[0]],
                    $s[1],
                    $s[2],
                    $s[3],
                    ['tag' => ucfirst($s[4]), 'tone' => $tones[$s[4]]],
                ], $staff),
            ],
        ]);
    }
}
