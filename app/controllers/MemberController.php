<?php

require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . '/../models/User.php';

class MemberController extends Controller
{
    public function dashboard(): void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $data['userName'] = $_SESSION['user_name'];

        $this->render('member/dashboard', 'member-layout', $data);
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
