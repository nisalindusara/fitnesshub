<?php

class InstructorClient extends Model
{
    private const MEMBER_COLUMNS = "ic.id, ic.instructor_id, ic.member_id, ic.client_type, ic.status,
                                    ic.flag_title, ic.flag_note, ic.created_at,
                                    u.first_name, u.last_name, u.email, u.profile_image";

    public function listForInstructor(int $instructorId): array
    {
        $query = "SELECT " . self::MEMBER_COLUMNS . "
                  FROM instructor_clients ic
                  JOIN users u ON u.id = ic.member_id
                  WHERE ic.instructor_id = :instructor_id
                  ORDER BY u.first_name, u.last_name";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':instructor_id' => $instructorId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findForInstructor(int $instructorId, int $memberId): array|false
    {
        $query = "SELECT " . self::MEMBER_COLUMNS . "
                  FROM instructor_clients ic
                  JOIN users u ON u.id = ic.member_id
                  WHERE ic.instructor_id = :instructor_id AND ic.member_id = :member_id
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':instructor_id' => $instructorId, ':member_id' => $memberId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(int $instructorId, int $memberId, string $clientType): int
    {
        $query = "INSERT INTO instructor_clients (instructor_id, member_id, client_type)
                  VALUES (:instructor_id, :member_id, :client_type)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':instructor_id' => $instructorId,
            ':member_id'     => $memberId,
            ':client_type'   => $clientType,
        ]);

        return (int) $this->db->lastInsertId();
    }

    /**
     * Members (role_id IS NULL) not yet assigned to this instructor,
     * matched by name or email — backs the Add client search.
     */
    public function searchAssignableMembers(int $instructorId, string $term): array
    {
        $query = "SELECT u.id, u.first_name, u.last_name, u.email
                  FROM users u
                  WHERE u.role_id IS NULL
                    AND u.id NOT IN (
                        SELECT member_id FROM instructor_clients WHERE instructor_id = :instructor_id
                    )
                    AND (
                        u.first_name LIKE :term1
                        OR u.last_name LIKE :term2
                        OR u.email LIKE :term3
                        OR CONCAT(u.first_name, ' ', u.last_name) LIKE :term4
                    )
                  ORDER BY u.first_name, u.last_name
                  LIMIT 10";

        $like = '%' . $term . '%';
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':instructor_id' => $instructorId,
            ':term1' => $like,
            ':term2' => $like,
            ':term3' => $like,
            ':term4' => $like,
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
