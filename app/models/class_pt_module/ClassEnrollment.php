<?php

class ClassEnrollment extends Model
{
    public function findClassesWithSessionTodayForUser(int $userId): array
    {
        $query = "SELECT c.id AS class_id, c.name, cs.start_time
              FROM class_enrollments ce
              JOIN class_sessions cs ON cs.class_id = ce.class_id
              JOIN classes c ON c.id = ce.class_id
              WHERE ce.user_id = :user_id
                AND ce.status = 'ACTIVE'
                AND cs.session_date = CURDATE()
                AND cs.status = 'SCHEDULED'";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
