<?php

require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../contracts/StaffProfileRepositoryInterface.php';

class StaffProfile extends Model implements StaffProfileRepositoryInterface
{
    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM staff_profiles WHERE user_id = :user_id');
        $stmt->execute(['user_id' => $userId]);
        $profile = $stmt->fetch();
        return $profile ?: null;
    }

    public function create(int $userId, int $roleId, array $data): bool
    {
        $stmt = $this->db->prepare(
            'INSERT INTO staff_profiles (user_id, role_id, employee_id, hire_date)
             VALUES (:user_id, :role_id, :employee_id, :hire_date)'
        );
        return $stmt->execute([
            'user_id'     => $userId,
            'role_id'     => $roleId,
            'employee_id' => $data['employee_id'] ?? null,
            'hire_date'   => $data['hire_date'] ?? null,
        ]);
    }

    public function update(int $userId, array $data): bool
    {
        $stmt = $this->db->prepare(
            'UPDATE staff_profiles SET employee_id = :employee_id, hire_date = :hire_date
             WHERE user_id = :user_id'
        );
        return $stmt->execute([
            'user_id'     => $userId,
            'employee_id' => $data['employee_id'] ?? null,
            'hire_date'   => $data['hire_date'] ?? null,
        ]);
    }
}
