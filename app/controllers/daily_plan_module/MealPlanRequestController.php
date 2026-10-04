<?php

/**
 * Instructor: meal plan requests from members, and the screen to build the plan.
 *   /portal/meal-plan-requests                 requests sent to this instructor
 *   /portal/meal-plan-requests/plan?request=1  build / edit the meal plan for one request
 */
class MealPlanRequestController extends Controller
{
    private const LIST_URL = '/portal/meal-plan-requests';

    public function index(): void
    {
        $requests = (new MealPlanRequestService())->requestsFor((int) $_SESSION['user_id']);
        $pending = count(array_filter($requests, fn($r) => $r['status'] === 'pending'));

        $this->render('staff/preview-screen', 'staff-layout', [
            'pageTitle' => 'Meal Plan Requests',
            'subtitle'  => 'Members who asked you for a meal plan. Open one to build their plan.',
            'isSample'  => false,
            'flash'     => isset($_GET['error']) ? ['type' => 'error', 'message' => (string) $_GET['error']] : null,
            'stats'     => [
                ['label' => 'Waiting for a plan', 'value' => $pending, 'alert' => $pending > 0],
                ['label' => 'Completed', 'value' => count($requests) - $pending],
            ],
            'table' => [
                'columns' => ['Member', 'Goal', 'Notes', 'Requested', 'Status'],
                'rows'    => array_map(fn($r) => [
                    ['text' => $r['first_name'] . ' ' . $r['last_name'], 'sub' => $r['email']],
                    $r['goal'],
                    $r['notes'] ?: '—',
                    date('M j, g:i A', strtotime($r['requested_at'])),
                    $r['status'] === 'pending'
                        ? ['tag' => 'Pending', 'tone' => 'warning']
                        : ['tag' => 'Plan sent', 'tone' => 'success'],
                ], $requests),
                'links' => array_map(fn($r) => '/portal/meal-plan-requests/plan?request=' . (int) $r['id'], $requests),
                'empty' => 'No meal plan requests yet.',
            ],
        ]);
    }

    public function showMealPlanScreen(): void
    {
        $requestId = (int) ($_GET['request'] ?? 0);

        try {
            $editor = (new MealPlanRequestService())->editorData((int) $_SESSION['user_id'], $requestId);
        } catch (InvalidArgumentException $e) {
            $this->redirect(self::LIST_URL . '?error=' . urlencode($e->getMessage()));
        }

        // After a failed save, reopen with what the instructor had typed
        $unsaved = $_SESSION['meal_plan_unsaved'][$requestId] ?? null;
        unset($_SESSION['meal_plan_unsaved'][$requestId]);
        if (is_array($unsaved)) {
            $editor['plan'] = $this->mergeUnsaved($editor['plan'], $unsaved);
        }

        $request = $editor['request'];
        $this->render('daily_plan_module/meal-plan', 'staff-layout', $editor + [
            'pageTitle'  => 'Meal plan for ' . $request['first_name'] . ' ' . $request['last_name'],
            'dayNames'   => WorkoutPlanService::DAYS,
            'mealTypes'  => MemberMealService::MEAL_TYPES,
            'maxOptions' => MealPlanRequestService::MAX_OPTIONS,
            'flash'      => $this->flash(),
        ]);
    }

    public function saveMealPlan(): void
    {
        $requestId = (int) ($_POST['request_id'] ?? 0);
        $plan = is_array($_POST['plan'] ?? null) ? $_POST['plan'] : [];
        $back = '/portal/meal-plan-requests/plan?request=' . $requestId;

        try {
            (new MealPlanRequestService())->save((int) $_SESSION['user_id'], $requestId, $plan);
        } catch (InvalidArgumentException $e) {
            // Keep what the instructor typed so a validation error doesn't wipe their work
            $_SESSION['meal_plan_unsaved'][$requestId] = $plan;
            $this->redirect($back . '&error=' . urlencode($e->getMessage()));
        }

        $this->redirect($back . '&saved=1');
    }

    /** Puts the submitted options back into the [day][meal] grid, keeping its shape. */
    private function mergeUnsaved(array $plan, array $unsaved): array
    {
        foreach ($plan as $dow => $meals) {
            foreach ($meals as $meal => $_) {
                $options = is_array($unsaved[$dow][$meal] ?? null) ? $unsaved[$dow][$meal] : [];
                $plan[$dow][$meal] = array_values(array_filter(array_map(fn($o) => [
                    'name'        => (string) ($o['name'] ?? ''),
                    'description' => (string) ($o['description'] ?? ''),
                    'calories'    => (string) ($o['calories'] ?? ''),
                    'protein'     => (string) ($o['protein'] ?? ''),
                ], $options), fn($o) => implode('', $o) !== ''));
            }
        }
        return $plan;
    }

    private function flash(): ?array
    {
        if (isset($_GET['error'])) {
            return ['type' => 'error', 'message' => (string) $_GET['error']];
        }
        return isset($_GET['saved'])
            ? ['type' => 'success', 'message' => 'Meal plan saved. The member can see it under Membership → Meal plan.']
            : null;
    }
}
