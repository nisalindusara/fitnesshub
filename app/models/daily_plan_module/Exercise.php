<?php

class Exercise extends Model
{
    /**
     * The instructor's exercise library, grouped for display by muscle.
     */
    public function allActive(): array
    {
        $query = "SELECT id, name, muscle_group, equipment
                  FROM exercises
                  WHERE is_active = 1
                  ORDER BY muscle_group, name";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Active library rows for the given IDs, keyed by ID — used to validate
     * a submitted plan in one query instead of one lookup per exercise.
     */
    public function findActiveByIds(array $ids): array
    {
        $ids = array_values(array_unique(array_map('intval', $ids)));
        if (empty($ids)) {
            return [];
        }

        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $query = "SELECT id, name, muscle_group
                  FROM exercises
                  WHERE is_active = 1 AND id IN ($placeholders)";

        $stmt = $this->db->prepare($query);
        $stmt->execute($ids);

        $byId = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $byId[(int) $row['id']] = $row;
        }
        return $byId;
    }
}
