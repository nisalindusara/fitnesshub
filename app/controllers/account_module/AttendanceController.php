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
        $membership = (new UserMembership())->findCurrentByUserId($memberId);
        $hasActiveMembership = $membership !== false && $membership['status'] === 'ACTIVE';
        $classesToday = (new ClassEnrollment())->findClassesWithSessionTodayForUser($memberId);

        $options = [];
        if ($hasActiveMembership) {
            $options[] = [
                'type'     => 'membership',
                'class_id' => null,
                'label'    => 'Gym session (' . $membership['plan_name'] . ')',
            ];
        }
        foreach ($classesToday as $c) {
            $options[] = [
                'type'     => 'class',
                'class_id' => (int) $c['class_id'],
                'label'    => $c['name'] . ' — ' . date('g:i A', strtotime($c['start_time'])),
            ];
        }

        echo json_encode([
            'member_id'         => (int) $member['id'],
            'member_code'       => sprintf('#MB-%04d', $member['id']),
            'first_name'        => $member['first_name'],
            'last_name'         => $member['last_name'],
            'phone_number'      => $member['phone_number'],
            'profile_image'     => $member['profile_image'] ? '/' . $member['profile_image'] : null,
            'is_checked_in'     => $status['is_checked_in'],
            'checked_in_at'     => $status['checked_in_at'],
            'membership_plan'   => $membership['plan_name'] ?? null,
            'membership_status' => $membership['status'] ?? null,
            'checkin_options'   => $options,
        ]);
    }

    public function checkIn(): void
    {
        header('Content-Type: application/json');
        $memberId = (int) ($_POST['member_id'] ?? 0);
        $classId = isset($_POST['class_id']) && $_POST['class_id'] !== '' ? (int) $_POST['class_id'] : null;

        try {
            (new AttendanceService())->markCheckIn($memberId, $classId);
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
