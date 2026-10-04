<?php

/**
 * Notifications: what staff send out, and what a member receives.
 * Not connected to the database yet — shows sample data.
 */
class NotificationController extends Controller
{
    public function showStaffNotificationsScreen(): void
    {
        $sent = [
            ['Gym closed on Poya day', 'All members', 'Sep 26, 2026', 'sent'],
            ['Your membership expires in 7 days', '9 members (automatic)', 'Sep 25, 2026', 'sent'],
            ['New HIIT class on Thursdays', 'Class members', 'Sep 23, 2026', 'sent'],
            ['We miss you — come back this week', 'At-risk members', 'Oct 1, 2026', 'scheduled'],
            ['Store: 10% off supplements', 'All members', '—', 'draft'],
        ];

        $tones = ['sent' => 'success', 'scheduled' => 'warning', 'draft' => 'neutral'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Notifications',
            'subtitle'  => 'Announcements and automatic reminders sent to members.',
            'actions'   => [
                ['label' => 'At-risk members', 'href' => '/portal/reports/at-risk', 'permission' => 'view_at_risk_members'],
            ],
            'stats' => [
                ['label' => 'Sent this month', 'value' => 18, 'meta' => '4,120 deliveries'],
                ['label' => 'Open rate', 'value' => '64%', 'meta' => 'Last 30 days'],
                ['label' => 'Scheduled', 'value' => 1, 'meta' => 'Next: Oct 1'],
            ],
            'table' => [
                'columns' => ['Message', 'Audience', 'Date', 'Status'],
                'rows'    => array_map(fn($n) => [
                    ['text' => $n[0]],
                    $n[1],
                    $n[2],
                    ['tag' => ucfirst($n[3]), 'tone' => $tones[$n[3]]],
                ], $sent),
            ],
        ]);
    }

    public function showMemberNotificationsScreen(): void
    {
        $notifications = [
            ['title' => 'Your workout plan was updated', 'body' => 'Instructor One published Hypertrophy Block A for this week.', 'time' => 'Today, 9:12 AM', 'href' => '/member/membership/workout-schedule', 'unread' => true],
            ['title' => 'New message from your coach', 'body' => 'Keep it under 12 reps and focus on form.', 'time' => 'Yesterday', 'href' => '/member/messages', 'unread' => true],
            ['title' => 'Class reminder: Strength Foundations', 'body' => 'Tomorrow at 9:00 AM in Studio A.', 'time' => 'Sep 26', 'href' => '/member/classes', 'unread' => false],
            ['title' => 'Order shipped', 'body' => 'Your Creatine Monohydrate 300 g is on the way.', 'time' => 'Sep 24', 'href' => '/member/profile/orders', 'unread' => false],
            ['title' => 'Gym closed on Poya day', 'body' => 'We are closed on Sep 29. Regular hours resume on Sep 30.', 'time' => 'Sep 23', 'href' => null, 'unread' => false],
        ];

        $this->render('member/notifications', 'member-layout', [
            'notifications' => $notifications,
        ]);
    }
}
