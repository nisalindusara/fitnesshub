<?php

/**
 * Meal plan requests: a member with a membership asks a specific instructor for a
 * meal plan. The instructor answers by building the plan, which becomes the member's
 * weekly meal plan (the one they see under Membership → Meal plan).
 *
 * Rules enforced here:
 *  - An instructor only sees and answers requests sent to them. The member does
 *    not have to be one of their assigned clients.
 *  - Every day has five meals (MemberMealService::MEAL_TYPES); each meal has up to three options.
 *  - Every option needs a name; calories and protein are optional whole numbers.
 *  - Saving replaces the member's whole meal plan and marks the request completed.
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class MealPlanRequestService
{
    public const MAX_OPTIONS = 3;

    private MealPlanRequest $requests;
    private MealPlanItem $items;

    public function __construct(?MealPlanRequest $requests = null, ?MealPlanItem $items = null)
    {
        $this->requests = $requests ?? new MealPlanRequest();
        $this->items = $items ?? new MealPlanItem();
    }

    public function requestsFor(int $instructorId): array
    {
        return $this->requests->listForInstructor($instructorId);
    }

    /**
     * The request and the plan to edit: [day][meal] => up to three options.
     * Only meals this instructor wrote are loaded; another instructor's plan is not shown.
     */
    public function editorData(int $instructorId, int $requestId): array
    {
        $request = $this->request($instructorId, $requestId);
        $memberId = (int) $request['member_id'];

        $plan = $this->emptyPlan();
        foreach ($this->items->allForMemberByInstructor($memberId, $instructorId) as $item) {
            $dow = (int) $item['day_of_week'];
            if (isset($plan[$dow][$item['meal_type']]) && count($plan[$dow][$item['meal_type']]) < self::MAX_OPTIONS) {
                $plan[$dow][$item['meal_type']][] = [
                    'name'        => $item['name'],
                    'description' => (string) $item['description'],
                    'calories'    => $item['calories'] === null ? '' : (string) $item['calories'],
                    'protein'     => $item['protein_g'] === null ? '' : (string) $item['protein_g'],
                ];
            }
        }

        $ownMeals = array_sum(array_map(fn($day) => array_sum(array_map('count', $day)), $plan));

        return [
            'request'          => $request,
            'plan'             => $plan,
            // The member already follows a plan someone else wrote; saving will replace it
            'replacesOtherPlan' => $ownMeals === 0 && $this->items->countForMember($memberId) > 0,
        ];
    }

    /**
     * Validates the submitted plan, replaces the member's meal plan with it and
     * completes the request. $posted is [day][meal][option] => name, description, calories, protein.
     */
    public function save(int $instructorId, int $requestId, array $posted): void
    {
        $request = $this->request($instructorId, $requestId);
        $mealOrder = array_flip(array_keys(MemberMealService::MEAL_TYPES));
        $rows = [];

        foreach (WorkoutPlanService::DAYS as $dow => $day) {
            foreach (MemberMealService::MEAL_TYPES as $meal => $mealLabel) {
                $options = array_values(is_array($posted[$dow][$meal] ?? null) ? $posted[$dow][$meal] : []);
                $where = $day['long'] . ' ' . strtolower($mealLabel);
                $kept = 0;

                foreach ($options as $option) {
                    $name = trim((string) ($option['name'] ?? ''));
                    $description = trim((string) ($option['description'] ?? ''));
                    $calories = trim((string) ($option['calories'] ?? ''));
                    $protein = trim((string) ($option['protein'] ?? ''));

                    if ($name === '' && $description === '' && $calories === '' && $protein === '') {
                        continue; // an unused option slot
                    }
                    if ($name === '') {
                        throw new InvalidArgumentException("Give every option a name ($where).");
                    }
                    if (++$kept > self::MAX_OPTIONS) {
                        throw new InvalidArgumentException("A meal can have at most " . self::MAX_OPTIONS . " options ($where).");
                    }
                    if (mb_strlen($name) > 100) {
                        throw new InvalidArgumentException("Keep option names under 100 characters ($where).");
                    }
                    if (mb_strlen($description) > 255) {
                        throw new InvalidArgumentException("Keep descriptions under 255 characters ($where).");
                    }

                    $rows[] = [
                        'day_of_week' => $dow,
                        'meal_type'   => $meal,
                        'name'        => $name,
                        'description' => $description === '' ? null : $description,
                        'calories'    => $this->number($calories, 3000, 'Calories', $where),
                        'protein_g'   => $this->number($protein, 300, 'Protein', $where),
                        'sort_order'  => $mealOrder[$meal] + 1,
                    ];
                }
            }
        }

        if (!$rows) {
            throw new InvalidArgumentException('Add at least one meal option before saving.');
        }

        $this->items->replaceForMember((int) $request['member_id'], $instructorId, $rows);
        $this->requests->markCompleted($requestId);
    }

    private function request(int $instructorId, int $requestId): array
    {
        $request = $this->requests->findForInstructor($instructorId, $requestId);
        if (!$request) {
            throw new InvalidArgumentException('That meal plan request was not found.');
        }
        return $request;
    }

    private function emptyPlan(): array
    {
        $plan = [];
        foreach (WorkoutPlanService::DAYS as $dow => $_) {
            $plan[$dow] = array_fill_keys(array_keys(MemberMealService::MEAL_TYPES), []);
        }
        return $plan;
    }

    private function number(string $value, int $max, string $label, string $where): ?int
    {
        if ($value === '') {
            return null;
        }
        if (!ctype_digit($value) || (int) $value > $max) {
            throw new InvalidArgumentException("$label must be a whole number from 0 to $max ($where).");
        }
        return (int) $value;
    }
}
