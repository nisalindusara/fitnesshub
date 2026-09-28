<?php

class MealPlanItem extends Model
{
    /** Every meal in the member's weekly meal plan, in day → meal order. */
    public function allForMember(int $memberId): array
    {
        $query = "SELECT id, day_of_week, meal_type, name, description, calories, protein_g
                  FROM meal_plan_items
                  WHERE member_id = :member_id
                  ORDER BY day_of_week, sort_order, id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** The member's meal plan, only the meals this instructor wrote. */
    public function allForMemberByInstructor(int $memberId, int $instructorId): array
    {
        $query = "SELECT id, day_of_week, meal_type, name, description, calories, protein_g, sort_order
                  FROM meal_plan_items
                  WHERE member_id = :member_id AND instructor_id = :instructor_id
                  ORDER BY day_of_week, sort_order, id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':member_id' => $memberId, ':instructor_id' => $instructorId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countForMember(int $memberId): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM meal_plan_items WHERE member_id = :member_id");
        $stmt->execute([':member_id' => $memberId]);

        return (int) $stmt->fetchColumn();
    }

    /**
     * Replaces the member's whole weekly meal plan. $items rows hold day_of_week,
     * meal_type, name, description, calories, protein_g and sort_order.
     * Runs in a transaction so the member never sees half a plan.
     */
    public function replaceForMember(int $memberId, int $instructorId, array $items): void
    {
        $this->db->beginTransaction();

        try {
            $this->db->prepare("DELETE FROM meal_plan_items WHERE member_id = :member_id")
                ->execute([':member_id' => $memberId]);

            $insert = $this->db->prepare(
                "INSERT INTO meal_plan_items (member_id, instructor_id, day_of_week, meal_type, name, description, calories, protein_g, sort_order)
                 VALUES (:member_id, :instructor_id, :day_of_week, :meal_type, :name, :description, :calories, :protein_g, :sort_order)"
            );

            foreach ($items as $item) {
                $insert->execute([
                    ':member_id'     => $memberId,
                    ':instructor_id' => $instructorId,
                    ':day_of_week'   => $item['day_of_week'],
                    ':meal_type'     => $item['meal_type'],
                    ':name'          => $item['name'],
                    ':description'   => $item['description'],
                    ':calories'      => $item['calories'],
                    ':protein_g'     => $item['protein_g'],
                    ':sort_order'    => $item['sort_order'],
                ]);
            }

            $this->db->commit();
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /** Year the member's meal plan was first set up, or null without a plan. */
    public function firstYearForMember(int $memberId): ?int
    {
        $stmt = $this->db->prepare("SELECT YEAR(MIN(created_at)) FROM meal_plan_items WHERE member_id = :member_id");
        $stmt->execute([':member_id' => $memberId]);

        $year = $stmt->fetchColumn();
        return $year ? (int) $year : null;
    }

    /** One meal, only if it belongs to this member's plan. */
    public function findForMember(int $memberId, int $itemId): ?array
    {
        $query = "SELECT id, day_of_week, meal_type, name
                  FROM meal_plan_items
                  WHERE id = :id AND member_id = :member_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $itemId, ':member_id' => $memberId]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}
