<?php

class InstructorDashboardController extends Controller
{
    public function showInstructorOverviewScreen(): void
    {
        // UI only — placeholder data until sessions, messages and adherence are wired up
        $hour = (int) date('G');
        $data['pageTitle'] = 'Overview';
        $data['greeting'] = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
        $data['firstName'] = $_SESSION['user_name'] ?? '';
        $data['today'] = date('l, M j');

        $data['stats'] = [
            'sessions' => ['value' => 6, 'badge' => 'On Track'],
            'clients' => ['value' => 18, 'trend' => '+2 this week'],
            'messages' => ['value' => 4],
            'alerts' => ['value' => 2],
        ];

        $data['schedule'] = [
            ['time' => '08:00 AM - 09:00 AM', 'note' => null, 'name' => 'Marcus Johnson', 'detail' => 'Strength & Conditioning',
                'member_id' => 1, 'type' => '1-on-1', 'status' => 'completed'],
            ['time' => '11:30 AM - 12:30 PM', 'note' => 'In 45 mins', 'name' => 'HIIT Bootcamp', 'detail' => 'Studio A • 12 Attendees',
                'member_id' => null, 'type' => 'Group', 'status' => 'next'],
            ['time' => '02:00 PM - 03:00 PM', 'note' => null, 'name' => 'Sarah Chen', 'detail' => 'Mobility Assessment',
                'member_id' => 2, 'type' => '1-on-1', 'status' => 'scheduled'],
        ];

        $data['alerts'] = [
            ['member_id' => 3, 'name' => 'David Miller', 'severity' => 'high',
                'message' => 'Missed 3 consecutive check-ins. Last active 8 days ago.'],
            ['member_id' => 4, 'name' => 'Elena Rostova', 'severity' => 'low',
                'message' => 'Nutrition log empty for 4 days. Goal: Macro tracking.'],
        ];

        $data['capacity'] = ['booked' => 22, 'total' => 30];

        $this->render('instructor/instructor-overview', 'staff-layout', $data);
    }
}
