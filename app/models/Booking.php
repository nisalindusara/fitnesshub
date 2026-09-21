<?php

require_once __DIR__ . '/../../core/Model.php';

class Booking extends Model
{
    /**
     * Create a new booking for a member.
     *
     * @param int $memberId
     * @param int $sessionId
     * @param string $status
     * @return int|false
     */
    public function create(int $memberId, int $sessionId, string $status = 'confirmed')
    {
        $sql = "INSERT INTO bookings (member_id, session_id, status, created_at)
                VALUES (:member_id, :session_id, :status, NOW())";

        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            ':member_id'  => $memberId,
            ':session_id' => $sessionId,
            ':status'     => $status,
        ]);

        return $success ? (int) $this->db->lastInsertId() : false;
    }

    /**
     * Get total sessions completed or booked by a member.
     *
     * @param int $memberId
     * @return int
     */
    public function getTotalSessions(int $memberId): int
    {
        $sql = "SELECT COUNT(*) FROM bookings WHERE member_id = :member_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':member_id' => $memberId]);
        return (int) $stmt->fetchColumn();
    }

    /**
     * Get the next upcoming session start time for a client.
     *
     * @param int $memberId
     * @return string|null
     */
    public function getNextSessionTime(int $memberId): ?string
    {
        $sql = "
            SELECT cs.start_time 
            FROM bookings b
            JOIN class_sessions cs ON cs.id = b.session_id
            WHERE b.member_id = :member_id 
              AND cs.start_time > NOW()
              AND b.status = 'confirmed'
            ORDER BY cs.start_time ASC 
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':member_id' => $memberId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['start_time'] : null;
    }

    /**
     * Get the most recent completed session time for a client.
     *
     * @param int $memberId
     * @return string|null
     */
    public function getLastSessionTime(int $memberId): ?string
    {
        $sql = "
            SELECT cs.start_time 
            FROM bookings b
            JOIN class_sessions cs ON cs.id = b.session_id
            WHERE b.member_id = :member_id 
              AND cs.start_time <= NOW()
            ORDER BY cs.start_time DESC 
            LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':member_id' => $memberId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['start_time'] : null;
    }
}