<?php

class Attendance extends Model
{
    /** The member's open session (checked in, not yet out), if any. */
    public function findOpenSessionByUserId(int $userId): array|false
    {
        $query = "SELECT id, check_in_at FROM attendance
                    WHERE user_id = :user_id AND check_out_at IS NULL LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function checkIn(int $userId, ?int $classId): int|false
    {
        $query = "INSERT INTO attendance (user_id, class_id) VALUES (:user_id, :class_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':user_id' => $userId, ':class_id' => $classId])
            ? (int) $this->db->lastInsertId()
            : false;
    }

    public function checkOut(int $attendanceId): bool
    {
        $query = "UPDATE attendance SET check_out_at = CURRENT_TIMESTAMP
                    WHERE id = :id AND check_out_at IS NULL";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $attendanceId]);
    }
}
