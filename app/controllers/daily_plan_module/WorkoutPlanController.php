<?php

class WorkoutPlanController extends Controller
{
    /**
     * One screen for creating a client's first plan and editing an existing one.
     * Opened by clicking a client in My Clients.
     */
    public function showWorkoutPlanScreen(): void
    {
        $memberId = (int) ($_GET['member'] ?? 0);

        try {
            $editor = (new WorkoutPlanService())->getEditorData((int) $_SESSION['user_id'], $memberId);
        } catch (InvalidArgumentException $e) {
            $this->redirect('/my-clients?error=' . urlencode($e->getMessage()));
        }

        // After a failed save, reopen with what the instructor had typed rather than the stored plan
        $unsaved = $_SESSION['workout_plan_unsaved'][$memberId] ?? null;
        unset($_SESSION['workout_plan_unsaved'][$memberId]);

        $this->render('daily_plan_module/workout-plan', 'staff-layout', $editor + [
            'pageTitle'      => $editor['isEdit'] ? 'Edit workout plan' : 'Create workout plan',
            'activeNavRoute' => '/my-clients',
            'memberId'       => $memberId,
            'unsaved'        => $unsaved,
            'goals'          => WorkoutPlanService::GOALS,
            'durations'      => WorkoutPlanService::DURATIONS,
            'difficulties'   => WorkoutPlanService::DIFFICULTIES,
            'dayNames'       => WorkoutPlanService::DAYS,
            'flash'          => $this->flash(),
        ]);
    }

    /** Save draft / Publish — both submit the whole editor. */
    public function saveWorkoutPlan(): void
    {
        $memberId = (int) ($_POST['member_id'] ?? 0);
        $publish = ($_POST['intent'] ?? '') === 'publish';
        $back = '/my-clients/client?member=' . $memberId;

        try {
            (new WorkoutPlanService())->save(
                (int) $_SESSION['user_id'],
                $memberId,
                $_POST,
                (string) ($_POST['days_json'] ?? ''),
                $publish
            );
        } catch (InvalidArgumentException $e) {
            // Keep what the instructor typed so a validation error doesn't wipe their work
            $_SESSION['workout_plan_unsaved'][$memberId] = $_POST;
            $this->redirect($back . '&error=' . urlencode($e->getMessage()));
        }

        $this->redirect($back . '&saved=' . ($publish ? 'published' : 'draft'));
    }

    public function deleteWorkoutPlan(): void
    {
        $memberId = (int) ($_POST['member_id'] ?? 0);

        try {
            (new WorkoutPlanService())->delete((int) $_SESSION['user_id'], $memberId);
        } catch (InvalidArgumentException $e) {
            $this->redirect('/my-clients/client?member=' . $memberId . '&error=' . urlencode($e->getMessage()));
        }

        $this->redirect('/my-clients?deleted=1');
    }

    /** JSON for "Copy last week". */
    public function previousWorkoutPlan(): void
    {
        header('Content-Type: application/json');

        try {
            $previous = (new WorkoutPlanService())->getPreviousWeek((int) $_SESSION['user_id'], (int) ($_GET['member'] ?? 0));
        } catch (InvalidArgumentException $e) {
            http_response_code(422);
            echo json_encode(['error' => $e->getMessage()]);
            return;
        }

        echo json_encode($previous);
    }

    // ------------------------------------------------------------------

    private function flash(): ?array
    {
        if (isset($_GET['error'])) {
            return ['type' => 'error', 'message' => (string) $_GET['error']];
        }
        return match ($_GET['saved'] ?? null) {
            'draft'     => ['type' => 'success', 'message' => 'Draft saved. Your client still sees the last published plan.'],
            'published' => ['type' => 'success', 'message' => 'Plan published. Your client can see it now.'],
            default     => isset($_GET['added'])
                ? ['type' => 'success', 'message' => 'Client added. Build their first workout plan below.']
                : null,
        };
    }
}
