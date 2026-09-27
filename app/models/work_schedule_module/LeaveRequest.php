<?php

class LeaveRequest extends Model
{
    /** The request with the names of the instructor and the staff who decided / cancelled it. */
    public function find(int $id): ?array
    {
        $query = "SELECT lr.*,
                         i.first_name, i.last_name, i.profile_image,
                         d.first_name AS decided_first_name, d.last_name AS decided_last_name,
                         c.first_name AS cancelled_first_name, c.last_name AS cancelled_last_name
                  FROM leave_requests lr
                  JOIN users i ON i.id = lr.instructor_id
                  LEFT JOIN users d ON d.id = lr.decided_by
                  LEFT JOIN users c ON c.id = lr.cancelled_by
                  WHERE lr.id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /** Recorded outcome of every session a processed request affected. */
    public function outcomes(int $requestId): array
    {
        $query = "SELECT lrs.*,
                         o.first_name AS original_first_name, o.last_name AS original_last_name,
                         r.first_name AS replacement_first_name, r.last_name AS replacement_last_name
                  FROM leave_request_sessions lrs
                  JOIN users o ON o.id = lrs.original_instructor_id
                  LEFT JOIN users r ON r.id = lrs.replacement_instructor_id
                  WHERE lrs.leave_request_id = :id
                  ORDER BY lrs.session_date, lrs.start_time, lrs.id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $requestId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Instructor IDs on approved leave for each date in the range: ['2026-10-14' => [13, …], …]. */
    public function approvedLeaveByDate(string $from, string $to): array
    {
        $query = "SELECT instructor_id, start_date, end_date FROM leave_requests
                  WHERE status = 'approved' AND start_date <= :to_date AND end_date >= :from_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':from_date' => $from, ':to_date' => $to]);

        $byDate = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $day = new DateTimeImmutable(max($row['start_date'], $from));
            $last = new DateTimeImmutable(min($row['end_date'], $to));
            for (; $day <= $last; $day = $day->modify('+1 day')) {
                $byDate[$day->format('Y-m-d')][] = (int) $row['instructor_id'];
            }
        }
        return $byDate;
    }

    /**
     * Approves or rejects a pending request and records each session's outcome,
     * applying it to the schedule in the same transaction:
     *  replaced → the session moves to the replacement instructor
     *  cancelled → the session is removed from the schedule
     *  kept → no change
     * Returns false if the request was no longer pending (someone else decided it first).
     */
    public function decide(int $requestId, string $status, int $managerId, array $outcomes): bool
    {
        $this->db->beginTransaction();
        try {
            $stmt = $this->db->prepare(
                "UPDATE leave_requests SET status = ?, decided_by = ?, decided_at = NOW() WHERE id = ? AND status = 'pending'"
            );
            $stmt->execute([$status, $managerId, $requestId]);
            if ($stmt->rowCount() === 0) {
                $this->db->rollBack();
                return false;
            }

            $reassign = $this->db->prepare("UPDATE work_sessions SET instructor_id = ? WHERE id = ?");
            $remove = $this->db->prepare("DELETE FROM work_sessions WHERE id = ?");
            foreach ($outcomes as $row) {
                if ($row['outcome'] === 'replaced') {
                    $reassign->execute([$row['replacement_instructor_id'], $row['work_session_id']]);
                } elseif ($row['outcome'] === 'cancelled') {
                    $remove->execute([$row['work_session_id']]);
                    $row['work_session_id'] = null;
                }
                $this->insertOutcome($requestId, $row);
            }

            $this->db->commit();
            return true;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * Cancels an approved leave and undoes its schedule changes:
     *  reverted → the session goes back to the original instructor
     *  restored → a cancelled session is put back on the schedule
     * $changes: [outcome row id => ['outcome' => …, 'outcome_note' => …, 'action' => 'revert'|'restore'|null]].
     */
    public function cancel(int $requestId, int $managerId, array $outcomes, array $changes): bool
    {
        $this->db->beginTransaction();
        try {
            $stmt = $this->db->prepare(
                "UPDATE leave_requests SET status = 'cancelled', cancelled_by = ?, cancelled_at = NOW() WHERE id = ? AND status = 'approved'"
            );
            $stmt->execute([$managerId, $requestId]);
            if ($stmt->rowCount() === 0) {
                $this->db->rollBack();
                return false;
            }

            $revert = $this->db->prepare("UPDATE work_sessions SET instructor_id = ? WHERE id = ?");
            $restore = $this->db->prepare(
                "INSERT INTO work_sessions (instructor_id, session_type, session_date, start_time, end_time, notes, created_by)
                 VALUES (?, ?, ?, ?, ?, ?, ?)"
            );
            $record = $this->db->prepare(
                "UPDATE leave_request_sessions SET outcome = ?, outcome_note = ?, work_session_id = ? WHERE id = ?"
            );

            foreach ($outcomes as $row) {
                $change = $changes[(int) $row['id']] ?? null;
                if ($change === null) {
                    continue;
                }
                $sessionId = $row['work_session_id'];
                if ($change['action'] === 'revert') {
                    $revert->execute([$row['original_instructor_id'], $sessionId]);
                } elseif ($change['action'] === 'restore') {
                    $restore->execute([
                        $row['original_instructor_id'], $row['session_type'], $row['session_date'],
                        $row['start_time'], $row['end_time'], $row['notes'], $managerId,
                    ]);
                    $sessionId = (int) $this->db->lastInsertId();
                }
                $record->execute([$change['outcome'], $change['outcome_note'], $sessionId, $row['id']]);
            }

            $this->db->commit();
            return true;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    private function insertOutcome(int $requestId, array $row): void
    {
        $this->db->prepare(
            "INSERT INTO leave_request_sessions
               (leave_request_id, work_session_id, session_date, start_time, end_time, session_type, notes,
                original_instructor_id, replacement_instructor_id, outcome, outcome_note)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        )->execute([
            $requestId, $row['work_session_id'], $row['session_date'], $row['start_time'], $row['end_time'],
            $row['session_type'], $row['notes'], $row['original_instructor_id'], $row['replacement_instructor_id'],
            $row['outcome'], $row['outcome_note'],
        ]);
    }
}
