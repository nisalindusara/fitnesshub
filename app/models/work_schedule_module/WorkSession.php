<?php

class WorkSession extends Model
{
    private const COLUMNS = "s.id, s.instructor_id, s.session_type, s.session_date, s.start_time, s.end_time, s.notes, s.series_id,
                             ser.frequency, ser.weekdays, ser.repeat_until";

    /** Staff with the instructor role, for the instructor dropdown. */
    public function instructors(): array
    {
        $query = "SELECT u.id, u.first_name, u.last_name, u.profile_image
                  FROM users u
                  JOIN roles r ON r.id = u.role_id
                  WHERE r.name = 'instructor'
                  ORDER BY u.first_name, u.last_name";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** Every session between two dates (inclusive), with its instructor and repeat rule. */
    public function between(string $from, string $to): array
    {
        $query = "SELECT " . self::COLUMNS . ", u.first_name, u.last_name, u.profile_image
                  FROM work_sessions s
                  JOIN users u ON u.id = s.instructor_id
                  LEFT JOIN work_session_series ser ON ser.id = s.series_id
                  WHERE s.session_date BETWEEN :from_date AND :to_date
                  ORDER BY s.session_date, s.start_time, s.id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':from_date' => $from, ':to_date' => $to]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $query = "SELECT " . self::COLUMNS . "
                  FROM work_sessions s
                  LEFT JOIN work_session_series ser ON ser.id = s.series_id
                  WHERE s.id = :id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    /** One instructor's sessions between two dates — used to check for double-booking. */
    public function forInstructorBetween(int $instructorId, string $from, string $to): array
    {
        $query = "SELECT id, session_type, session_date, start_time, end_time
                  FROM work_sessions
                  WHERE instructor_id = :instructor_id AND session_date BETWEEN :from_date AND :to_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':instructor_id' => $instructorId, ':from_date' => $from, ':to_date' => $to]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** IDs of a series' sessions on or after a date. */
    public function seriesIdsFrom(int $seriesId, string $from): array
    {
        $query = "SELECT id FROM work_sessions WHERE series_id = :series_id AND session_date >= :from_date";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':series_id' => $seriesId, ':from_date' => $from]);

        return array_map('intval', $stmt->fetchAll(PDO::FETCH_COLUMN));
    }

    /**
     * Applies one schedule change atomically:
     *  - deletes the sessions in $deleteIds,
     *  - updates the one session in $update (['id' => …, fields…]) if given,
     *  - creates the series in $series if given, and
     *  - inserts $inserts, linking them (and $update, when $linkUpdate) to that new series.
     * Returns the IDs of the inserted sessions.
     */
    public function apply(array $deleteIds, ?array $update, ?array $series, array $inserts, int $adminId, bool $linkUpdate = false): array
    {
        $this->db->beginTransaction();
        try {
            if ($deleteIds) {
                $placeholders = implode(',', array_fill(0, count($deleteIds), '?'));
                $this->db->prepare("DELETE FROM work_sessions WHERE id IN ($placeholders)")->execute(array_values($deleteIds));
            }

            $seriesId = null;
            if ($series !== null) {
                $this->db->prepare(
                    "INSERT INTO work_session_series (frequency, weekdays, repeat_until, created_by) VALUES (?, ?, ?, ?)"
                )->execute([$series['frequency'], $series['weekdays'], $series['repeat_until'], $adminId]);
                $seriesId = (int) $this->db->lastInsertId();
            }

            if ($update !== null) {
                $this->db->prepare(
                    "UPDATE work_sessions
                     SET instructor_id = ?, session_type = ?, session_date = ?, start_time = ?, end_time = ?, notes = ?,
                         series_id = " . ($linkUpdate ? '?' : 'series_id') . "
                     WHERE id = ?"
                )->execute(array_merge(
                    [$update['instructor_id'], $update['session_type'], $update['session_date'], $update['start_time'], $update['end_time'], $update['notes']],
                    $linkUpdate ? [$seriesId] : [],
                    [$update['id']]
                ));
            }

            $insert = $this->db->prepare(
                "INSERT INTO work_sessions (instructor_id, session_type, session_date, start_time, end_time, notes, series_id, created_by)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $ids = [];
            foreach ($inserts as $row) {
                $insert->execute([
                    $row['instructor_id'], $row['session_type'], $row['session_date'],
                    $row['start_time'], $row['end_time'], $row['notes'], $seriesId, $adminId,
                ]);
                $ids[] = (int) $this->db->lastInsertId();
            }

            // A series with nothing left in it is just clutter
            $this->db->exec("DELETE ser FROM work_session_series ser
                             LEFT JOIN work_sessions s ON s.series_id = ser.id
                             WHERE s.id IS NULL");

            $this->db->commit();
            return $ids;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
