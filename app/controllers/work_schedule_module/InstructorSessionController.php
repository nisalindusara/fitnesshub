<?php

/** Admin: the Instructor Sessions calendar where staff schedules are built. */
class InstructorSessionController extends Controller
{
    /** Week view — ?week=2026-09-21 (any date in the week; defaults to this week). */
    public function index(): void
    {
        $week = (new WorkScheduleService())->week($_GET['week'] ?? null);

        $this->render('work_schedule_module/admin/instructor_sessions', 'staff-layout', $week + [
            'pageTitle'   => 'Instructor Sessions',
            'types'       => WorkScheduleService::TYPES,
            'frequencies' => WorkScheduleService::FREQUENCIES,
        ]);
    }

    /** JSON: create (no id) or update a session from the overlay. */
    public function save(): void
    {
        $this->json(function () {
            $service = new WorkScheduleService();
            $id = (int) ($_POST['id'] ?? 0);
            $adminId = (int) $_SESSION['user_id'];

            $date = $id > 0
                ? $service->update($id, $_POST, (string) ($_POST['scope'] ?? 'one'), $adminId)
                : $service->create($_POST, $adminId);

            return ['week' => $date];
        });
    }

    /** JSON: delete one session, or it and the rest of its series. */
    public function delete(): void
    {
        $this->json(function () {
            (new WorkScheduleService())->delete((int) ($_POST['id'] ?? 0), (string) ($_POST['scope'] ?? 'one'));
            return ['ok' => true];
        });
    }

    private function json(callable $action): void
    {
        header('Content-Type: application/json');

        try {
            echo json_encode($action());
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
