<?php

/**
 * Workout / meal plans across all clients, and how well members stick to them.
 * Not connected to the database yet — shows sample data.
 */
class ActionPlanController extends Controller
{
    public function showAssignedPlansScreen(): void
    {
        $plans = [
            ['user example', 'Hypertrophy Block A', 'Instructor One', 'Sep 21 – Nov 15', 'published'],
            ['user2 example', 'Group Strength Basics', 'Instructor One', 'Sep 28 – Oct 25', 'draft'],
            ['Kasun Perera', 'Fat Loss Phase 1', 'Maya Thompson', 'Sep 07 – Oct 31', 'published'],
            ['Nimali Fernando', 'Marathon Prep', 'Jordan Lee', 'Aug 17 – Oct 11', 'published'],
            ['Dinesh Silva', 'Mobility Reset', 'Priya Nair', 'Jul 06 – Aug 30', 'archived'],
        ];

        $tones = ['published' => 'success', 'draft' => 'warning', 'archived' => 'neutral'];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Assigned Plans',
            'subtitle'  => 'Workout and meal plans given to members.',
            'actions'   => [
                ['label' => 'Adherence', 'href' => '/portal/adherence', 'permission' => 'view_adherence'],
                ['label' => 'My clients', 'href' => '/portal/clients', 'primary' => true, 'permission' => 'view_own_clients'],
            ],
            'stats' => [
                ['label' => 'Active plans', 'value' => 36, 'meta' => '4 published this week'],
                ['label' => 'Drafts', 'value' => 5, 'meta' => 'Not visible to members yet'],
                ['label' => 'Ending in 14 days', 'value' => 7, 'meta' => 'Plan the next block', 'alert' => true],
            ],
            'table' => [
                'columns' => ['Member', 'Plan', 'Instructor', 'Dates', 'Status'],
                'rows'    => array_map(fn($p) => [
                    ['text' => $p[0]],
                    $p[1],
                    $p[2],
                    $p[3],
                    ['tag' => ucfirst($p[4]), 'tone' => $tones[$p[4]]],
                ], $plans),
            ],
        ]);
    }

    public function showAdherenceScreen(): void
    {
        $members = [
            ['user example', 'Hypertrophy Block A', '92%', '88%'],
            ['user2 example', 'Group Strength Basics', '75%', '60%'],
            ['Kasun Perera', 'Fat Loss Phase 1', '48%', '35%'],
            ['Nimali Fernando', 'Marathon Prep', '81%', '70%'],
            ['Ruwan Bandara', 'Strength Foundations', '22%', '10%'],
        ];

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Adherence Tracking',
            'subtitle'  => 'How much of their workouts and meals members completed in the last 30 days.',
            'actions'   => [
                ['label' => 'Assigned plans', 'href' => '/portal/action-plans', 'permission' => 'manage_action_plans'],
            ],
            'stats' => [
                ['label' => 'Average workout adherence', 'value' => '68%', 'meta' => '+5% vs last month'],
                ['label' => 'Average meal adherence', 'value' => '59%', 'meta' => '−2% vs last month'],
                ['label' => 'Below 60%', 'value' => 2, 'meta' => 'Need a plan review', 'alert' => true],
            ],
            'table' => [
                'columns' => ['Member', 'Plan', 'Workouts', 'Meals'],
                'rows'    => array_map(fn($m) => [
                    ['text' => $m[0]],
                    $m[1],
                    $m[2],
                    $m[3],
                ], $members),
            ],
        ]);
    }
}
