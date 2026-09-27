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
