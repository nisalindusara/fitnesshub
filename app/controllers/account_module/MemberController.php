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

        $userModel = new User();
        $results = $userModel->searchMembers($term);

        $shaped = array_map(fn($row) => [
            'member_id' => (int) $row['id'],
            'display_name' => $row['first_name'] . ' ' . $row['last_name'] . ' — ' . $row['phone_number'],
        ], $results);

        header('Content-Type: application/json');
        echo json_encode($shaped);
    }
}
