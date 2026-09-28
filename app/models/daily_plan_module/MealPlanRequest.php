<?php

class MealPlanRequest extends Model
{
    private const COLUMNS = "r.id, r.member_id, r.instructor_id, r.goal, r.notes, r.status, r.requested_at, r.completed_at,
                             u.first_name, u.last_name, u.email, u.profile_image";

    /** Requests members sent to this instructor, pending first, newest first. */
    public function listForInstructor(int $instructorId): array
    {
        $query = "SELECT " . self::COLUMNS . "
                  FROM meal_plan_requests r
                  JOIN users u ON u.id = r.member_id
                  WHERE r.instructor_id = :instructor_id
                  ORDER BY r.status = 'pending' DESC, r.requested_at DESC, r.id DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':instructor_id' => $instructorId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** One request, only if it was sent to this instructor. */
    public function findForInstructor(int $instructorId, int $requestId): ?array
    {
        $query = "SELECT " . self::COLUMNS . "
                  FROM meal_plan_requests r
                  JOIN users u ON u.id = r.member_id
                  WHERE r.id = :id AND r.instructor_id = :instructor_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $requestId, ':instructor_id' => $instructorId]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function markCompleted(int $requestId): void
    {
        $stmt = $this->db->prepare("UPDATE meal_plan_requests
                                    SET status = 'completed', completed_at = COALESCE(completed_at, NOW())
                                    WHERE id = :id");
        $stmt->execute([':id' => $requestId]);
    }
}
