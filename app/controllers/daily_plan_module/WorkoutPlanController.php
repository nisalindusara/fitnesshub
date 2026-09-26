<?php

class WorkoutPlanController extends Controller
{
    /**
     * One screen for both creating a client's first plan and editing an existing one.
     * Opened by clicking a client in My Clients.
     */
    public function showWorkoutPlanScreen(): void
    {
        // UI only — placeholder data until plans, members and the exercise library are wired up
        $client = MyClientsController::findPlaceholderClient((int) ($_GET['member'] ?? 0));

        if ($client === null) {
            $this->redirect('/my-clients');
        }

        $isEdit = $client['has_plan'];

        $data['pageTitle'] = $isEdit ? 'Edit workout plan' : 'Create workout plan';
        $data['activeNavRoute'] = '/my-clients';
        $data['isEdit'] = $isEdit;

        $data['member'] = [
            'id' => $client['id'],
            'name' => $client['name'],
            'program' => $client['type'] . ' · ' . $client['next_session_meta'],
            'adherence' => $client['adherence'],
            'goal' => 'Muscle gain',
            'last_session' => '24 Oct',
            'flag' => $client['id'] === 1 ? [
                'title' => 'Shoulder flag on file',
                'note' => 'Keep overhead pressing under 12 reps and check form on Friday.',
            ] : null,
        ];

        $data['plan'] = $isEdit ? [
            'name' => $client['program'],
            'goal' => 'Muscle gain',
            'duration' => '8 weeks',
            'start_date' => '2026-10-27',
            'sessions_per_week' => 5,
            'difficulty' => 'Intermediate',
        ] : [
            'name' => '',
            'goal' => 'Muscle gain',
            'duration' => '8 weeks',
            'start_date' => date('Y-m-d', strtotime('next monday')),
            'sessions_per_week' => 3,
            'difficulty' => 'Beginner',
        ];

        $data['goals'] = ['Muscle gain', 'Fat loss', 'Strength', 'Endurance', 'General fitness'];
        $data['durations'] = ['4 weeks', '6 weeks', '8 weeks', '12 weeks'];
        $data['difficulties'] = ['Beginner', 'Intermediate', 'Advanced'];

        $data['days'] = [
            ['key' => 'mon', 'short' => 'Mon', 'long' => 'Monday', 'focus' => 'Upper body', 'minutes' => 55, 'exercises' => [
                ['name' => 'Barbell bench press', 'muscle' => 'Chest', 'sets' => 4, 'reps' => 8, 'load' => '60 kg', 'rest' => '90 s'],
                ['name' => 'Incline dumbbell press', 'muscle' => 'Chest', 'sets' => 3, 'reps' => 10, 'load' => '22 kg', 'rest' => '75 s'],
                ['name' => 'Seated cable row', 'muscle' => 'Back', 'sets' => 4, 'reps' => 12, 'load' => '50 kg', 'rest' => '60 s'],
                ['name' => 'Lat pulldown', 'muscle' => 'Back', 'sets' => 3, 'reps' => 12, 'load' => '45 kg', 'rest' => '60 s'],
                ['name' => 'Seated shoulder press', 'muscle' => 'Shoulders', 'sets' => 3, 'reps' => 10, 'load' => '18 kg', 'rest' => '60 s'],
                ['name' => 'Rope tricep pushdown', 'muscle' => 'Arms', 'sets' => 3, 'reps' => 15, 'load' => '25 kg', 'rest' => '45 s'],
            ]],
            ['key' => 'tue', 'short' => 'Tue', 'long' => 'Tuesday', 'focus' => 'Cardio', 'minutes' => 40, 'exercises' => [
                ['name' => 'Treadmill intervals', 'muscle' => 'Cardio', 'sets' => 8, 'reps' => 1, 'load' => '—', 'rest' => '60 s'],
                ['name' => 'Rowing machine', 'muscle' => 'Cardio', 'sets' => 3, 'reps' => 1, 'load' => '—', 'rest' => '90 s'],
                ['name' => 'Assault bike sprints', 'muscle' => 'Cardio', 'sets' => 6, 'reps' => 1, 'load' => '—', 'rest' => '45 s'],
            ]],
            ['key' => 'wed', 'short' => 'Wed', 'long' => 'Wednesday', 'focus' => 'Lower body', 'minutes' => 60, 'exercises' => [
                ['name' => 'Barbell back squat', 'muscle' => 'Legs', 'sets' => 4, 'reps' => 8, 'load' => '80 kg', 'rest' => '120 s'],
                ['name' => 'Romanian deadlift', 'muscle' => 'Legs', 'sets' => 3, 'reps' => 10, 'load' => '60 kg', 'rest' => '90 s'],
                ['name' => 'Walking lunges', 'muscle' => 'Legs', 'sets' => 3, 'reps' => 12, 'load' => '14 kg', 'rest' => '60 s'],
                ['name' => 'Leg press', 'muscle' => 'Legs', 'sets' => 3, 'reps' => 12, 'load' => '120 kg', 'rest' => '75 s'],
                ['name' => 'Lying leg curl', 'muscle' => 'Legs', 'sets' => 3, 'reps' => 12, 'load' => '35 kg', 'rest' => '60 s'],
                ['name' => 'Standing calf raise', 'muscle' => 'Legs', 'sets' => 4, 'reps' => 15, 'load' => '40 kg', 'rest' => '45 s'],
            ]],
            ['key' => 'thu', 'short' => 'Thu', 'long' => 'Thursday', 'focus' => 'Rest', 'minutes' => 0, 'exercises' => []],
            ['key' => 'fri', 'short' => 'Fri', 'long' => 'Friday', 'focus' => 'Full body', 'minutes' => 65, 'exercises' => [
                ['name' => 'Trap bar deadlift', 'muscle' => 'Legs', 'sets' => 4, 'reps' => 6, 'load' => '90 kg', 'rest' => '120 s'],
                ['name' => 'Dumbbell bench press', 'muscle' => 'Chest', 'sets' => 3, 'reps' => 10, 'load' => '26 kg', 'rest' => '75 s'],
                ['name' => 'Pull-ups', 'muscle' => 'Back', 'sets' => 3, 'reps' => 8, 'load' => 'BW', 'rest' => '90 s'],
                ['name' => 'Goblet squat', 'muscle' => 'Legs', 'sets' => 3, 'reps' => 12, 'load' => '24 kg', 'rest' => '60 s'],
                ['name' => 'Farmer carry', 'muscle' => 'Core', 'sets' => 3, 'reps' => 1, 'load' => '32 kg', 'rest' => '60 s'],
            ]],
            ['key' => 'sat', 'short' => 'Sat', 'long' => 'Saturday', 'focus' => 'Mobility', 'minutes' => 40, 'exercises' => [
                ['name' => 'Hip flow sequence', 'muscle' => 'Mobility', 'sets' => 2, 'reps' => 1, 'load' => '—', 'rest' => '30 s'],
                ['name' => 'Thoracic rotations', 'muscle' => 'Mobility', 'sets' => 2, 'reps' => 10, 'load' => '—', 'rest' => '30 s'],
            ]],
            ['key' => 'sun', 'short' => 'Sun', 'long' => 'Sunday', 'focus' => 'Rest', 'minutes' => 0, 'exercises' => []],
        ];

        if (!$isEdit) {
            $data['days'] = array_map(
                fn($day) => ['focus' => 'Not set', 'minutes' => 0, 'exercises' => []] + $day,
                $data['days']
            );
        }

        $data['library'] = [
            'total' => 148,
            'filters' => ['Chest', 'Back', 'Legs', 'Core'],
            'items' => [
                ['name' => 'Dumbbell fly', 'muscle' => 'Chest', 'meta' => 'Chest, isolation'],
                ['name' => 'Face pull', 'muscle' => 'Shoulders', 'meta' => 'Shoulders, cable'],
                ['name' => 'Hammer curl', 'muscle' => 'Arms', 'meta' => 'Arms, dumbbell'],
                ['name' => 'Plank', 'muscle' => 'Core', 'meta' => 'Core, bodyweight'],
                ['name' => 'Bulgarian split squat', 'muscle' => 'Legs', 'meta' => 'Legs, dumbbell'],
                ['name' => 'Chest-supported row', 'muscle' => 'Back', 'meta' => 'Back, dumbbell'],
            ],
        ];

        $this->render('daily_plan_module/workout-plan', 'staff-layout', $data);
    }
}
