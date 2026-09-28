<?php

/**
 * Staff: personal training bookings and instructor assignment.
 * Not connected to the database yet — shows sample data.
 */
class PersonalTrainingController extends Controller
{
    public function showPersonalTrainingScreen(): void
    {
        $bookings = [
            ['Kasun Perera', 'Instructor One', 'Mon, Sep 28', '10:30 – 11:15 AM', 'confirmed'],
            ['Nimali Fernando', 'Maya Thompson', 'Mon, Sep 28', '2:00 – 2:45 PM', 'confirmed'],
            ['Dinesh Silva', 'Unassigned', 'Tue, Sep 29', '7:00 – 7:45 AM', 'needs instructor'],
            ['Ruwan Bandara', 'Jordan Lee', 'Wed, Sep 30', '6:00 – 6:45 PM', 'confirmed'],
            ['Ishara Wickramasinghe', 'Priya Nair', 'Thu, Oct 1', '5:30 – 6:15 PM', 'cancelled'],
        ];

        $tones = ['confirmed' => 'success', 'needs instructor' => 'warning', 'cancelled' => 'danger'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Personal Training',
            'subtitle'  => 'One-on-one sessions booked this week.',
            'actions'   => [
                ['label' => 'Instructor sessions', 'href' => '/portal/instructor-sessions', 'permission' => 'manage_schedule'],
            ],
            'stats' => [
                ['label' => 'Sessions this week', 'value' => 42, 'meta' => '31 completed'],
                ['label' => 'Need an instructor', 'value' => 3, 'meta' => 'Assign before the session', 'alert' => true],
                ['label' => 'Active PT clients', 'value' => 58, 'meta' => '+4 this month'],
                ['label' => 'Cancellations', 'value' => 2, 'meta' => 'This week'],
            ],
            'table' => [
                'columns' => ['Member', 'Instructor', 'Date', 'Time', 'Status'],
                'rows'    => array_map(fn($b) => [
                    ['text' => $b[0]],
                    $b[1],
                    $b[2],
                    $b[3],
                    ['tag' => ucfirst($b[4]), 'tone' => $tones[$b[4]]],
                ], $bookings),
            ],
        ]);
    }
}
