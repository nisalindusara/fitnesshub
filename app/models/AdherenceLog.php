<?php

require_once __DIR__ . '/../../core/Model.php';

class AdherenceLog extends Model
{
    /**
     * Log a member workout or attendance event.
     *
     * @param int $memberId
     * @param int $sessionId
     * @param bool $attended
     * @param string|null $notes
     * @return bool
     */
    public function logAttendance(int $memberId, int $sessionId, bool $attended, ?string $notes = null): bool
    {
        $sql = "INSERT INTO adherence_logs (member_id, session_id, attended, notes, logged_at)
                VALUES (:member_id, :session_id, :attended, :notes, NOW())";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':member_id'  => $memberId,
            ':session_id' => $sessionId,
            ':attended'   => $attended ? 1 : 0,
            ':notes'      => $notes,
        ]);
    }

    /**
     * Calculate adherence / attendance percentage for the last 30 days.
     *
     * @param int $memberId
     * @return float
     */
    public function getAdherenceRate(int $memberId): float
    {
        $sql = "
            SELECT 
                COUNT(*) AS total_logged,
                SUM(CASE WHEN attended = 1 THEN 1 ELSE 0 END) AS total_attended
            FROM adherence_logs
            WHERE member_id = :member_id
              AND logged_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':member_id' => $memberId]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data || (int) $data['total_logged'] === 0) {
            return 0.0;
        }

        return round(((int) $data['total_attended'] / (int) $data['total_logged']) * 100, 1);
    }
}