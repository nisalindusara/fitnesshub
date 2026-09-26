<?php

class MyClientsController extends Controller
{
    public function showMyClientsScreen(): void
    {
        // UI only — placeholder data until instructor ↔ client assignments are wired up
        $data['pageTitle'] = 'My Clients';

        $data['stats'] = [
            ['label' => 'Active clients', 'value' => '18', 'meta' => '+2 this week'],
            ['label' => 'Sessions today', 'value' => '6', 'meta' => '4 completed, 2 upcoming'],
            ['label' => 'Average adherence', 'value' => '82%', 'meta' => 'Last 30 days'],
            ['label' => 'Needs review', 'value' => '2', 'meta' => 'Missed check-ins', 'alert' => true],
        ];

        $data['totalClients'] = 18;
        $data['filters'] = [
            ['key' => 'all', 'label' => 'All', 'count' => 18],
            ['key' => '1-on-1', 'label' => '1-on-1', 'count' => 11],
            ['key' => 'group', 'label' => 'Group', 'count' => 7],
            ['key' => 'needs_review', 'label' => 'Needs review', 'count' => 2],
        ];

        $data['clients'] = self::placeholderClients();

        $this->render('instructor/my-clients', 'staff-layout', $data);
    }

    /**
     * UI only — shared placeholder list so the client-scoped screens
     * (client page, workout plan) show the same people as this list.
     */
    public static function placeholderClients(): array
    {
        return [
            ['id' => 1, 'name' => 'Marcus Johnson', 'email' => 'marcus.j@email.com', 'type' => '1-on-1',
                'program' => 'Hypertrophy Block A', 'program_meta' => 'Week 3 of 8', 'adherence' => 86,
                'next_session' => 'Today, 08:00 AM', 'next_session_meta' => 'Strength & conditioning', 'status' => 'active', 'has_plan' => true],
            ['id' => 2, 'name' => 'Sarah Chen', 'email' => 's.chen@email.com', 'type' => '1-on-1',
                'program' => 'Mobility Reset', 'program_meta' => 'Week 1 of 4', 'adherence' => 94,
                'next_session' => 'Today, 02:00 PM', 'next_session_meta' => 'Mobility assessment', 'status' => 'active', 'has_plan' => true],
            ['id' => 3, 'name' => 'David Miller', 'email' => 'd.miller@email.com', 'type' => '1-on-1',
                'program' => 'Fat Loss Phase 2', 'program_meta' => 'Week 6 of 12', 'adherence' => 38,
                'next_session' => 'Not scheduled', 'next_session_meta' => 'Last active 8 days ago', 'status' => 'needs_review', 'has_plan' => true],
            ['id' => 4, 'name' => 'Elena Rostova', 'email' => 'elena.r@email.com', 'type' => '1-on-1',
                'program' => 'Macro Tracking', 'program_meta' => 'Week 2 of 6', 'adherence' => 52,
                'next_session' => 'Fri, 10:30 AM', 'next_session_meta' => 'Nutrition check-in', 'status' => 'needs_review', 'has_plan' => true],
            ['id' => 5, 'name' => 'James Okafor', 'email' => 'j.okafor@email.com', 'type' => 'Group',
                'program' => 'HIIT Bootcamp', 'program_meta' => 'Studio A', 'adherence' => 78,
                'next_session' => 'Today, 11:30 AM', 'next_session_meta' => 'Group class', 'status' => 'active', 'has_plan' => true],
            ['id' => 6, 'name' => 'Priya Nair', 'email' => 'priya.n@email.com', 'type' => 'Group',
                'program' => 'Strength Foundations', 'program_meta' => 'Studio B', 'adherence' => 88,
                'next_session' => 'Mon, 06:30 PM', 'next_session_meta' => 'Group class', 'status' => 'active', 'has_plan' => true],
            ['id' => 7, 'name' => 'Tom Becker', 'email' => 't.becker@email.com', 'type' => '1-on-1',
                'program' => 'Return from injury', 'program_meta' => 'Paused 12 Oct', 'adherence' => null,
                'next_session' => 'Paused', 'next_session_meta' => 'Resumes 3 Nov', 'status' => 'paused', 'has_plan' => true],
            ['id' => 8, 'name' => 'Aisha Rahman', 'email' => 'aisha.r@email.com', 'type' => '1-on-1',
                'program' => 'Onboarding', 'program_meta' => 'Plan not set', 'adherence' => null,
                'next_session' => 'Wed, 09:00 AM', 'next_session_meta' => 'Intake session', 'status' => 'new', 'has_plan' => false],
        ];
    }

    public static function findPlaceholderClient(int $id): ?array
    {
        foreach (self::placeholderClients() as $client) {
            if ($client['id'] === $id) {
                return $client;
            }
        }
        return null;
    }
}
