<?php

/**
 * The member's side of meal plans: the meals for any week of a month, and
 * picking what they ate on each date.
 *
 * The meal plan itself is weekly (Monday's meals, Tuesday's meals, …); what the
 * member picked is tracked per calendar date in `meal_logs`.
 *
 * Rules enforced here:
 *  - A member only sees and picks meals from their own meal plan.
 *  - Each meal (e.g. Wednesday's lunch) has a few options; the member picks at most one per date.
 *  - Meals can be picked for today and any earlier date; future dates are read-only.
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class MemberMealService
{
    // The five meals of every day, in the order members and instructors see them
    public const MEAL_TYPES = [
        'breakfast'    => 'Breakfast',
        'lunch'        => 'Lunch',
        'dinner'       => 'Dinner',
        'pre_workout'  => 'Pre-workout',
        'post_workout' => 'Post-workout',
    ];

    private MealPlanItem $items;
    private MealLog $logs;

    public function __construct(?MealPlanItem $items = null, ?MealLog $logs = null)
    {
        $this->items = $items ?? new MealPlanItem();
        $this->logs = $logs ?? new MealLog();
    }

    /**
     * Everything the meal plan screen needs for one week of a month.
     * $week is 1-based among the Mon–Sun weeks that touch the month; null picks the
     * week containing today when viewing the current month, otherwise week 1.
     */
    public function calendar(int $memberId, int $year, int $month, ?int $week): array
    {
        $today = new DateTimeImmutable('today');
        $weeks = $this->weeksOfMonth($year, $month);

        if ($week === null || !isset($weeks[$week - 1])) {
            $week = 1;
            foreach ($weeks as $i => $monday) {
                if ($today >= $monday && $today <= $monday->modify('+6 days')) {
                    $week = $i + 1;
                }
            }
        }

        $monday = $weeks[$week - 1];
        $items = $this->items->allForMember($memberId);
        $done = $this->logs->completedIdsBetween($memberId, $monday->format('Y-m-d'), $monday->modify('+6 days')->format('Y-m-d'));

        $days = [];
        foreach (WorkoutPlanService::DAYS as $dow => $_) {
            $date = $monday->modify('+' . ($dow - 1) . ' days');
            $days[$dow] = [
                'date'     => $date,
                'editable' => $date <= $today,
                'inMonth'  => (int) $date->format('n') === $month,
                'meals'    => [],
            ];
        }

        foreach ($items as $item) {
            $dow = (int) $item['day_of_week'];
            if (!isset($days[$dow])) {
                continue;
            }
            $doneOnDate = array_flip($done[$days[$dow]['date']->format('Y-m-d')] ?? []);
            $days[$dow]['meals'][$item['meal_type']][] = $item + ['done' => isset($doneOnDate[(int) $item['id']])];
        }

        // Open on today if it's in this week, otherwise on the first day of the week that belongs to the month
        $selected = null;
        foreach ($days as $dow => $day) {
            if ($day['date'] == $today) {
                $selected = $dow;
            }
        }
        $selected ??= (int) array_key_first(array_filter($days, fn($d) => $d['inMonth']));

        $firstYear = $this->items->firstYearForMember($memberId) ?? (int) $today->format('Y');

        return [
            'hasPlan'  => count($items) > 0,
            'year'     => $year,
            'month'    => $month,
            'week'     => $week,
            'weeks'    => $weeks,
            'years'    => range(min($firstYear, $year, (int) $today->format('Y')), max($year, (int) $today->format('Y'))),
            'selected' => $selected,
            'days'     => $days,
        ];
    }

    /**
     * Picks (or un-picks) a meal option for a date. Picking an option replaces any
     * other option already picked for that meal on that date, so each meal has at most one.
     */
    public function setDone(int $memberId, int $mealItemId, string $date, bool $done): void
    {
        $item = $this->items->findForMember($memberId, $mealItemId);
        if (!$item) {
            throw new InvalidArgumentException('That meal is not part of your meal plan.');
        }

        $day = DateTimeImmutable::createFromFormat('!Y-m-d', $date);
        if (!$day || $day->format('Y-m-d') !== $date) {
            throw new InvalidArgumentException('That date is not valid.');
        }
        if ($day > new DateTimeImmutable('today')) {
            throw new InvalidArgumentException("You can't pick meals for days that haven't happened yet.");
        }
        if ((int) $item['day_of_week'] !== (int) $day->format('N')) {
            throw new InvalidArgumentException('That meal is not planned for that day.');
        }

        if ($done) {
            $this->logs->clearMeal($memberId, (int) $item['day_of_week'], $item['meal_type'], $date);
            $this->logs->markDone($memberId, $mealItemId, $date);
        } else {
            $this->logs->unmarkDone($memberId, $mealItemId, $date);
        }
    }

    /** Mondays of every Mon–Sun week that has at least one day in the month (4 to 6 weeks). */
    private function weeksOfMonth(int $year, int $month): array
    {
        $first = new DateTimeImmutable(sprintf('%04d-%02d-01', $year, $month));
        $last = $first->modify('last day of this month');
        $monday = $first->modify('-' . ((int) $first->format('N') - 1) . ' days');

        $weeks = [];
        for (; $monday <= $last; $monday = $monday->modify('+7 days')) {
            $weeks[] = $monday;
        }
        return $weeks;
    }
}
