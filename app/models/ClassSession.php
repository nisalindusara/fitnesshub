<?php

require_once __DIR__ . '/../../core/Model.php';

class ClassSession extends Model
{
    /**
     * Find a class session by its primary ID.
     *
     * @param int $sessionId
     * @return array|null
     */
    public function findById(int $sessionId): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM class_sessions WHERE id = :id");
        $stmt->execute([':id' => $sessionId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Get upcoming class sessions conducted by a specific instructor.
     *
     * @param int $instructorId
     * @param int $limit
     * @return array
     */
    public function getUpcomingByInstructor(int $instructorId, int $limit = 5): array
    {
        $stmt = $this->db->prepare("
            SELECT * 
            FROM class_sessions 
            WHERE instructor_id = :instructor_id 
              AND start_time >= NOW()
            ORDER BY start_time ASC 
            LIMIT :limit
        ");
        $stmt->bindValue(':instructor_id', $instructorId, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}