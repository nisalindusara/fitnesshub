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
        // UI only — placeholder data until workout plans are wired up
        $data['planDate'] = date('l, M j');
        $data['exercises'] = [
            ['name' => 'Barbell Squats', 'detail' => '3 sets x 12 reps', 'done' => true],
            ['name' => 'Bench Press', 'detail' => '3 sets x 12 reps', 'done' => true],
            ['name' => 'Deadlifts', 'detail' => '3 sets x 12 reps', 'done' => false],
            ['name' => 'Overhead Press', 'detail' => '3 sets x 12 reps', 'done' => false],
            ['name' => 'Pull-ups', 'detail' => '3 sets x 12 reps', 'done' => false],
            ['name' => 'Plank', 'detail' => '3 sets x 60 sec', 'done' => false],
        ];

        $this->render('member/workout-schedule', 'member-layout', $data);
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
