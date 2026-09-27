<?php

class MemberController extends Controller
{
    public function showMemberDashboardScreen(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $data['userName'] = $_SESSION['user_name'];

        $this->render('member/dashboard', 'member-layout', $data);
    }

    public function showMembershipScreen(): void
    {
        // UI only — placeholder data until membership records are wired up
        $data['membership'] = [
            'plan_name' => '1 Year Membership',
            'expires_on' => 'Oct 24, 2026',
            'is_active' => true,
        ];

        $this->render('member/membership', 'member-layout', $data);
    }

    public function showWorkoutScheduleScreen(): void
    {
        $data['workout'] = (new MemberWorkoutService())->today((int) $_SESSION['user_id']);

        $this->render('member/workout-schedule', 'member-layout', $data);
    }

    /** JSON: tick / untick one of today's exercises. */
    public function setWorkoutExerciseDone(): void
    {
        header('Content-Type: application/json');

        try {
            $progress = (new MemberWorkoutService())->setDone(
                (int) $_SESSION['user_id'],
                (int) ($_POST['plan_exercise_id'] ?? 0),
                ($_POST['done'] ?? '') === '1'
            );
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }

        echo json_encode($progress);
    }

    public function showMealPlanScreen(): void
    {
        // ?year=2026&month=9&week=4 — defaults to the week containing today
        $today = new DateTimeImmutable('today');
        $year = (int) ($_GET['year'] ?? $today->format('Y'));
        $month = (int) ($_GET['month'] ?? $today->format('n'));
        if ($year < 2000 || $year > (int) $today->format('Y') + 1 || $month < 1 || $month > 12) {
            [$year, $month] = [(int) $today->format('Y'), (int) $today->format('n')];
        }
        $week = isset($_GET['week']) ? (int) $_GET['week'] : null;

        $data['mealPlan'] = (new MemberMealService())->calendar((int) $_SESSION['user_id'], $year, $month, $week);
        $data['dayNames'] = WorkoutPlanService::DAYS;
        $data['mealTypes'] = MemberMealService::MEAL_TYPES;

        $this->render('member/meal-plan', 'member-layout', $data);
    }

    /** JSON: pick / unpick a meal option for a date. */
    public function setMealDone(): void
    {
        header('Content-Type: application/json');

        try {
            (new MemberMealService())->setDone(
                (int) $_SESSION['user_id'],
                (int) ($_POST['meal_item_id'] ?? 0),
                (string) ($_POST['date'] ?? ''),
                ($_POST['done'] ?? '') === '1'
            );
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }

        echo json_encode(['ok' => true]);
    }

    public function showMemberProfileScreen(): void
    {
        $this->render('member/member-profile', 'member-layout');
    }

    public function search(): void
    {
        $term = trim($_GET['q'] ?? '');

        if ($term === '') {
            header('Content-Type: application/json');
            echo json_encode([]);
            return;
        }

        $results = (new User())->searchMembersByNameOrPhone($term);

        $shaped = array_map(fn($row) => [
            'member_id'     => (int) $row['id'],
            'first_name'    => $row['first_name'],
            'last_name'     => $row['last_name'],
            'phone_number'  => $row['phone_number'],
            'profile_image' => $row['profile_image'] ? '/' . $row['profile_image'] : null,
        ], $results);

        header('Content-Type: application/json');
        echo json_encode($shaped);
    }
}
