<?php

class AttendanceController extends Controller
{
    public function showAttendanceMarkingScreen(): void
    {
        $this->render('account_module/mark-attendance', 'staff-layout');
    }

    public function memberStatus(): void
    {
        header('Content-Type: application/json');
        $memberId = (int) ($_GET['member_id'] ?? 0);

        $member = (new User())->findMemberById($memberId);
        if ($member === false) {
            http_response_code(404);
            echo json_encode(['error' => 'Member not found.']);
            return;
        }

        $status = (new AttendanceService())->getStatus($memberId);

        echo json_encode([
            'member_id'     => (int) $member['id'],
            'first_name'    => $member['first_name'],
            'last_name'      => $member['last_name'],
            'profile_image' => $member['profile_image'] ? '/' . $member['profile_image'] : null,
            'is_checked_in' => $status['is_checked_in'],
            'checked_in_at' => $status['checked_in_at'],
        ]);
    }

    public function checkIn(): void
    {
        header('Content-Type: application/json');
        $memberId = (int) ($_POST['member_id'] ?? 0);

        try {
            (new AttendanceService())->markCheckIn($memberId);
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }

        echo json_encode(['success' => true]);
    }

    public function checkOut(): void
    {
        header('Content-Type: application/json');
        $memberId = (int) ($_POST['member_id'] ?? 0);

        try {
            (new AttendanceService())->markCheckOut($memberId);
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }

        echo json_encode(['success' => true]);
    }
}
