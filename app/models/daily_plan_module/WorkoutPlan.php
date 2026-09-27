<?php

/**
 * Workout plans and their days / exercises.
 *
 * A member has at most one 'draft' and one 'published' plan at a time. Older
 * published versions become 'archived' rather than being deleted, so member
 * workout logs (which point at plan exercises) and "copy last week" survive.
 *
 * Multi-table writes each run in a single transaction inside one method here,
 * because all models share one PDO connection and PDO cannot nest transactions.
 */
class WorkoutPlan extends Model
{
    public function findForMember(int $memberId, string $status): array|false
    {
        $query = "SELECT * FROM workout_plans
                  WHERE member_id = :member_id AND status = :status
                  ORDER BY id DESC
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId, ':status' => $status]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * The most recent published or archived plan other than $excludePlanId —
     * the source for "Copy last week".
     */
    public function findPrevious(int $memberId, int $excludePlanId): array|false
    {
        $query = "SELECT * FROM workout_plans
                  WHERE member_id = :member_id
                    AND id <> :exclude_id
                    AND status IN ('published', 'archived')
                  ORDER BY COALESCE(published_at, created_at) DESC, id DESC
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId, ':exclude_id' => $excludePlanId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Days 1 (Mon) … 7 (Sun) with their exercises in order. Days the plan
     * never stored still appear, empty, so callers can always index 1..7.
     */
    public function getDaysWithExercises(int $planId): array
    {
        $query = "SELECT d.day_of_week, d.focus, d.note,
                         e.id AS plan_exercise_id, e.exercise_id, e.sets, e.reps,
                         e.load_text, e.rest_seconds, e.superset_group,
                         x.name AS exercise_name, x.muscle_group
                  FROM workout_plan_days d
                  LEFT JOIN workout_plan_exercises e ON e.plan_day_id = d.id
                  LEFT JOIN exercises x ON x.id = e.exercise_id
                  WHERE d.plan_id = :plan_id
                  ORDER BY d.day_of_week, e.sort_order, e.id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':plan_id' => $planId]);

        $days = [];
        for ($dow = 1; $dow <= 7; $dow++) {
            $days[$dow] = ['focus' => null, 'note' => null, 'exercises' => []];
        }

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $dow = (int) $row['day_of_week'];
            $days[$dow]['focus'] = $row['focus'];
            $days[$dow]['note'] = $row['note'];

            if ($row['plan_exercise_id'] !== null) {
                $days[$dow]['exercises'][] = [
                    'plan_exercise_id' => (int) $row['plan_exercise_id'],
                    'exercise_id'      => (int) $row['exercise_id'],
                    'name'             => $row['exercise_name'],
                    'muscle'           => $row['muscle_group'],
                    'sets'             => (int) $row['sets'],
                    'reps'             => (int) $row['reps'],
                    'load'             => $row['load_text'],
                    'rest'             => (int) $row['rest_seconds'],
                    'superset'         => $row['superset_group'] !== null ? (int) $row['superset_group'] : null,
                ];
            }
        }

        return $days;
    }

    /**
     * Writes the member's draft (creating it if needed) and, when $publish is
     * true, promotes it to published and archives the previous published plan —
     * all in one transaction. Returns the saved plan's ID.
     *
     * $details: name, goal, duration_weeks, start_date, sessions_per_week, difficulty
     * $days:    [day_of_week => ['focus', 'note', 'exercises' => [[exercise_id, sets, reps, load, rest, superset], …]]]
     */
    public function saveForMember(int $memberId, int $instructorId, array $details, array $days, bool $publish): int
    {
        $this->db->beginTransaction();

        try {
            $draft = $this->findForMember($memberId, 'draft');

            $params = [
                ':instructor_id'     => $instructorId,
                ':name'              => $details['name'],
                ':goal'              => $details['goal'],
                ':duration_weeks'    => $details['duration_weeks'],
                ':start_date'        => $details['start_date'],
                ':sessions_per_week' => $details['sessions_per_week'],
                ':difficulty'        => $details['difficulty'],
            ];

            if ($draft) {
                $planId = (int) $draft['id'];

                $stmt = $this->db->prepare(
                    "UPDATE workout_plans
                     SET instructor_id = :instructor_id, name = :name, goal = :goal,
                         duration_weeks = :duration_weeks, start_date = :start_date,
                         sessions_per_week = :sessions_per_week, difficulty = :difficulty
                     WHERE id = :id AND status = 'draft'"
                );
                $stmt->execute($params + [':id' => $planId]);

                // Days cascade to their exercises; drafts never have workout logs
                $this->db->prepare("DELETE FROM workout_plan_days WHERE plan_id = :plan_id")
                    ->execute([':plan_id' => $planId]);
            } else {
                $stmt = $this->db->prepare(
                    "INSERT INTO workout_plans
                        (member_id, instructor_id, name, goal, duration_weeks, start_date, sessions_per_week, difficulty, status)
                     VALUES
                        (:member_id, :instructor_id, :name, :goal, :duration_weeks, :start_date, :sessions_per_week, :difficulty, 'draft')"
                );
                $stmt->execute($params + [':member_id' => $memberId]);
                $planId = (int) $this->db->lastInsertId();
            }

            $insertDay = $this->db->prepare(
                "INSERT INTO workout_plan_days (plan_id, day_of_week, focus, note)
                 VALUES (:plan_id, :day_of_week, :focus, :note)"
            );
            $insertExercise = $this->db->prepare(
                "INSERT INTO workout_plan_exercises
                    (plan_day_id, exercise_id, sort_order, sets, reps, load_text, rest_seconds, superset_group)
                 VALUES
                    (:plan_day_id, :exercise_id, :sort_order, :sets, :reps, :load_text, :rest_seconds, :superset_group)"
            );

            foreach ($days as $dow => $day) {
                $insertDay->execute([
                    ':plan_id'     => $planId,
                    ':day_of_week' => $dow,
                    ':focus'       => $day['focus'],
                    ':note'        => $day['note'],
                ]);
                $dayId = (int) $this->db->lastInsertId();

                foreach ($day['exercises'] as $order => $exercise) {
                    $insertExercise->execute([
                        ':plan_day_id'    => $dayId,
                        ':exercise_id'    => $exercise['exercise_id'],
                        ':sort_order'     => $order + 1,
                        ':sets'           => $exercise['sets'],
                        ':reps'           => $exercise['reps'],
                        ':load_text'      => $exercise['load'],
                        ':rest_seconds'   => $exercise['rest'],
                        ':superset_group' => $exercise['superset'],
                    ]);
                }
            }

            if ($publish) {
                $this->db->prepare(
                    "UPDATE workout_plans SET status = 'archived'
                     WHERE member_id = :member_id AND status = 'published'"
                )->execute([':member_id' => $memberId]);

                $this->db->prepare(
                    "UPDATE workout_plans SET status = 'published', published_at = NOW()
                     WHERE id = :id"
                )->execute([':id' => $planId]);
            }

            $this->db->commit();
            return $planId;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * Removes the member's current plan: the draft is deleted, the published
     * plan is archived (keeps the member's workout history).
     */
    public function removeForMember(int $memberId): void
    {
        $this->db->beginTransaction();

        try {
            $this->db->prepare("DELETE FROM workout_plans WHERE member_id = :member_id AND status = 'draft'")
                ->execute([':member_id' => $memberId]);

            $this->db->prepare("UPDATE workout_plans SET status = 'archived' WHERE member_id = :member_id AND status = 'published'")
                ->execute([':member_id' => $memberId]);

            $this->db->commit();
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
