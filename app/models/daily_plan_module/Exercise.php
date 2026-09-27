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

    /** Any library row with this name (active or not) — names are unique. */
    public function findByName(string $name): ?array
    {
        $stmt = $this->db->prepare("SELECT id, name, muscle_group, equipment, is_active FROM exercises WHERE name = ?");
        $stmt->execute([$name]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function create(string $name, string $muscleGroup, string $equipment): int
    {
        $stmt = $this->db->prepare("INSERT INTO exercises (name, muscle_group, equipment) VALUES (?, ?, ?)");
        $stmt->execute([$name, $muscleGroup, $equipment]);

        return (int) $this->db->lastInsertId();
    }

    /** Brings a removed exercise back into the library with the details just entered. */
    public function reactivate(int $id, string $muscleGroup, string $equipment): void
    {
        $stmt = $this->db->prepare("UPDATE exercises SET is_active = 1, muscle_group = ?, equipment = ? WHERE id = ?");
        $stmt->execute([$muscleGroup, $equipment, $id]);
    }
}
