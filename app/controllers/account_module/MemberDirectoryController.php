<?php

/**
 * Staff: list of gym members. Not connected to the database yet — shows sample data.
 */
class MemberDirectoryController extends Controller
{
    public function showMembersScreen(): void
    {
        $members = [
            ['Kasun Perera', 'kasun.perera@example.com', 'Monthly', 'Oct 31, 2026', 'active'],
            ['Nimali Fernando', 'nimali.f@example.com', 'Annual', 'Mar 14, 2027', 'active'],
            ['Dinesh Silva', 'dinesh.silva@example.com', 'Monthly', 'Sep 30, 2026', 'expiring'],
            ['Tharaka Jayasinghe', 'tharaka.j@example.com', 'Day pass', 'Sep 28, 2026', 'active'],
            ['Ishara Wickramasinghe', 'ishara.w@example.com', 'Monthly', 'Aug 31, 2026', 'expired'],
            ['Ruwan Bandara', 'ruwan.b@example.com', 'Annual', 'Jan 09, 2027', 'active'],
        ];

        $tones = ['active' => 'success', 'expiring' => 'warning', 'expired' => 'danger'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Members',
            'subtitle'  => 'Everyone with a membership, day pass or class booking.',
            'actions'   => [
                ['label' => 'Membership plans', 'href' => '/portal/membership-plans', 'permission' => 'manage_membership_plans'],
                ['label' => 'Check-in', 'href' => '/portal/attendance', 'primary' => true, 'permission' => 'manage_attendance'],
            ],
            'stats' => [
                ['label' => 'Active members', 'value' => 248, 'meta' => '+12 this month'],
                ['label' => 'Expiring in 7 days', 'value' => 9, 'meta' => 'Send a renewal reminder'],
                ['label' => 'Expired last 30 days', 'value' => 14, 'meta' => '6 renewed', 'alert' => true],
                ['label' => 'Visits today', 'value' => 87, 'meta' => 'Peak at 6 PM'],
            ],
            'table' => [
                'columns' => ['Member', 'Plan', 'Renews / ends', 'Status'],
                'rows'    => array_map(fn($m) => [
                    ['text' => $m[0], 'sub' => $m[1]],
                    $m[2],
                    $m[3],
                    ['tag' => ucfirst($m[4]), 'tone' => $tones[$m[4]]],
                ], $members),
            ],
        ]);
    }
}
