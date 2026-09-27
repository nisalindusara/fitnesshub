<?php

class MealLog extends Model
{
    public function markDone(int $memberId, int $mealItemId, string $date): void
    {
        // INSERT IGNORE: ticking an already-ticked meal is a no-op, not an error
        $query = "INSERT IGNORE INTO meal_logs (member_id, meal_item_id, log_date)
                  VALUES (:member_id, :meal_item_id, :log_date)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id'    => $memberId,
            ':meal_item_id' => $mealItemId,
            ':log_date'     => $date,
        ]);
    }

    /** Clears whichever option the member picked for one meal (e.g. Wednesday's lunch) on a date. */
    public function clearMeal(int $memberId, int $dayOfWeek, string $mealType, string $date): void
    {
        $query = "DELETE l FROM meal_logs l
                  JOIN meal_plan_items i ON i.id = l.meal_item_id
                  WHERE l.member_id = :member_id AND l.log_date = :log_date
                    AND i.day_of_week = :day_of_week AND i.meal_type = :meal_type";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id'   => $memberId,
            ':log_date'    => $date,
            ':day_of_week' => $dayOfWeek,
            ':meal_type'   => $mealType,
        ]);
    }

    public function unmarkDone(int $memberId, int $mealItemId, string $date): void
    {
        $query = "DELETE FROM meal_logs
                  WHERE member_id = :member_id AND meal_item_id = :meal_item_id AND log_date = :log_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':member_id'    => $memberId,
            ':meal_item_id' => $mealItemId,
            ':log_date'     => $date,
        ]);
    }

    /** Meal-item IDs the member ticked between two dates (inclusive), keyed by date. */
    public function completedIdsBetween(int $memberId, string $from, string $to): array
    {
        $query = "SELECT log_date, meal_item_id FROM meal_logs
                  WHERE member_id = :member_id AND log_date BETWEEN :from_date AND :to_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId, ':from_date' => $from, ':to_date' => $to]);

        $byDate = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $byDate[$row['log_date']][] = (int) $row['meal_item_id'];
        }
        return $byDate;
    }
}
