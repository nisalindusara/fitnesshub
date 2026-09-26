<?php

/**
 * The member's side of workout plans: today's workout from their published
 * plan, and ticking exercises off.
 *
 * Rules enforced here:
 *  - Members only ever see their published plan, never a draft.
 *  - Only today's exercises of that plan can be ticked, and only on or after the plan's start date.
 *
 * Business-rule violations throw InvalidArgumentException.
 */
class MemberWorkoutService
{
    private WorkoutPlan $plans;
    private WorkoutLog $logs;

    public function __construct(?WorkoutPlan $plans = null, ?WorkoutLog $logs = null)
    {
        $this->plans = $plans ?? new WorkoutPlan();
        $this->logs = $logs ?? new WorkoutLog();
    }

    /**
     * state: no_plan | not_started | rest | train
     */
    public function today(int $memberId): array
    {
        $today = new DateTimeImmutable('today');
        $plan = $this->plans->findForMember($memberId, 'published');

        if (!$plan) {
            return ['state' => 'no_plan', 'date' => $today];
        }

        $start = new DateTimeImmutable($plan['start_date']);
        if ($start > $today) {
            return ['state' => 'not_started', 'date' => $today, 'plan' => $plan, 'starts' => $start];
        }

        $days = $this->plans->getDaysWithExercises((int) $plan['id']);
        $day = $days[(int) $today->format('N')];

        if (empty($day['exercises'])) {
            return ['state' => 'rest', 'date' => $today, 'plan' => $plan, 'next' => $this->nextWorkout($days, $today)];
        }

        $done = array_flip($this->logs->completedIdsOn($memberId, $today->format('Y-m-d')));
        $exercises = array_map(
            fn($e) => $e + ['done' => isset($done[$e['plan_exercise_id']])],
            $day['exercises']
        );

        return [
            'state'     => 'train',
            'date'      => $today,
            'plan'      => $plan,
            'focus'     => $day['focus'],
            'note'      => $day['note'],
            'exercises' => $exercises,
        ];
    }

    /** Ticks or unticks one of today's exercises; returns the updated progress. */
    public function setDone(int $memberId, int $planExerciseId, bool $done): array
    {
        $today = $this->today($memberId);
        if ($today['state'] !== 'train') {
            throw new InvalidArgumentException('There is no workout to log today.');
        }

        $ids = array_column($today['exercises'], 'plan_exercise_id');
        if (!in_array($planExerciseId, $ids, true)) {
            throw new InvalidArgumentException("That exercise is not part of today's plan.");
        }

        $date = $today['date']->format('Y-m-d');
        if ($done) {
            $this->logs->markDone($memberId, $planExerciseId, $date);
        } else {
            $this->logs->unmarkDone($memberId, $planExerciseId, $date);
        }

        $completed = count(array_intersect($ids, $this->logs->completedIdsOn($memberId, $date)));

        return ['completed' => $completed, 'total' => count($ids)];
    }

    private function nextWorkout(array $days, DateTimeImmutable $today): ?array
    {
        for ($i = 1; $i <= 7; $i++) {
            $date = $today->modify("+{$i} days");
            $day = $days[(int) $date->format('N')];
            if (count($day['exercises']) > 0) {
                return ['date' => $date, 'focus' => $day['focus'], 'days_away' => $i];
            }
        }
        return null;
    }
}
