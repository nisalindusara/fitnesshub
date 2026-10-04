<?php

class AnalyticsController extends Controller
{
    public function showUserAnalyticsScreen(): void
    {
        $this->render('analytics_module/user_analytics', 'member-layout');
    }

    public function showMemberAnalyticsScreen(): void
    {
        $this->render('analytics_module/member_analytics', 'member-layout');
    }

    public function MemberPerformanceScreen(): void
    {
        $this->render('analytics_module/member_performance', 'staff-layout');
    }

    // Reports hub. Not connected to the database yet — shows sample data.
    public function showReportsScreen(): void
    {
        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Reports',
            'subtitle'  => 'Pick a report to open.',
            'stats' => [
                ['label' => 'Revenue this month', 'value' => 'Rs. 1.24M', 'meta' => '+8% vs last month'],
                ['label' => 'New members', 'value' => 23, 'meta' => 'This month'],
                ['label' => 'Class fill rate', 'value' => '81%', 'meta' => 'Last 30 days'],
                ['label' => 'At-risk members', 'value' => 6, 'meta' => 'Attendance dropping', 'alert' => true],
            ],
            'table' => [
                'title'   => 'Reports',
                'columns' => ['Report', 'Covers', 'Updated'],
                'rows'    => [
                    [['text' => 'Member performance', 'sub' => 'Attendance and workout completion for one member'], 'Members', 'Live'],
                    [['text' => 'At-risk members', 'sub' => 'Members whose attendance or adherence is dropping'], 'Retention', 'Daily'],
                ],
                'links' => ['/portal/reports/member-performance', '/portal/reports/at-risk'],
            ],
        ]);
    }

    // Members likely to cancel. Not connected to the database yet — shows sample data.
    public function showAtRiskMembersScreen(): void
    {
        $members = [
            ['Ruwan Bandara', '2 visits in 30 days (was 12)', '10%', 'Sep 09', 'high'],
            ['Ishara Wickramasinghe', 'Membership expired Aug 31', '—', 'Aug 29', 'high'],
            ['Kasun Perera', '5 visits in 30 days (was 11)', '35%', 'Sep 22', 'medium'],
            ['Dinesh Silva', 'Renewal due Sep 30', '48%', 'Sep 25', 'medium'],
            ['Tharaka Jayasinghe', 'Skipped 3 PT sessions', '55%', 'Sep 19', 'low'],
        ];

        $tones = ['high' => 'danger', 'medium' => 'warning', 'low' => 'neutral'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'At-Risk Members',
            'subtitle'  => 'Members whose attendance or plan adherence is dropping.',
            'actions'   => [
                ['label' => 'All reports', 'href' => '/portal/reports', 'permission' => 'view_reports'],
                ['label' => 'Send a reminder', 'href' => '/portal/notifications', 'primary' => true, 'permission' => 'manage_notifications'],
            ],
            'stats' => [
                ['label' => 'High risk', 'value' => 2, 'meta' => 'Contact this week', 'alert' => true],
                ['label' => 'Medium risk', 'value' => 2, 'meta' => 'Watch closely'],
                ['label' => 'Won back last month', 'value' => 4, 'meta' => 'After a reminder'],
            ],
            'table' => [
                'columns' => ['Member', 'Why', 'Adherence', 'Last visit', 'Risk'],
                'rows'    => array_map(fn($m) => [
                    ['text' => $m[0]],
                    $m[1],
                    $m[2],
                    $m[3],
                    ['tag' => ucfirst($m[4]), 'tone' => $tones[$m[4]]],
                ], $members),
                'links' => array_fill(0, count($members), '/portal/reports/member-performance'),
            ],
        ]);
    }
}
