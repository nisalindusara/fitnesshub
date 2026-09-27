<?php

class WorkoutLog extends Model
{
    public function markDone(int $memberId, int $planExerciseId, string $date): void
    {
        // INSERT IGNORE: ticking an already-ticked exercise is a no-op, not an error
        $query = "INSERT IGNORE INTO workout_logs (member_id, plan_exercise_id, log_date)
                  VALUES (:member_id, :plan_exercise_id, :log_date)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id'        => $memberId,
            ':plan_exercise_id' => $planExerciseId,
            ':log_date'         => $date,
        ]);
    }

    public function unmarkDone(int $memberId, int $planExerciseId, string $date): void
    {
        $query = "DELETE FROM workout_logs
                  WHERE member_id = :member_id AND plan_exercise_id = :plan_exercise_id AND log_date = :log_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id'        => $memberId,
            ':plan_exercise_id' => $planExerciseId,
            ':log_date'         => $date,
        ]);
    }

    /** Plan-exercise IDs the member ticked on the given date. */
    public function completedIdsOn(int $memberId, string $date): array
    {
        $query = "SELECT plan_exercise_id FROM workout_logs
                  WHERE member_id = :member_id AND log_date = :log_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId, ':log_date' => $date]);

        return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
    }

    /** Exercises of one plan the member completed between two dates (inclusive). */
    public function countForPlanBetween(int $memberId, int $planId, string $from, string $to): int
    {
        $query = "SELECT COUNT(*)
                  FROM workout_logs l
                  JOIN workout_plan_exercises e ON e.id = l.plan_exercise_id
                  JOIN workout_plan_days d ON d.id = e.plan_day_id
                  WHERE l.member_id = :member_id
                    AND d.plan_id = :plan_id
                    AND l.log_date BETWEEN :from_date AND :to_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id' => $memberId,
            ':plan_id'   => $planId,
            ':from_date' => $from,
            ':to_date'   => $to,
        ]);

        return (int) $stmt->fetchColumn();
    }

    public function lastLogDate(int $memberId): ?string
    {
        $query = "SELECT MAX(log_date) FROM workout_logs WHERE member_id = :member_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId]);

        $date = $stmt->fetchColumn();
        return $date ?: null;
    }
}
