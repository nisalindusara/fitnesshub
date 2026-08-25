<?php

require_once __DIR__ . '/../core/Model.php';
require_once __DIR__ . '/../contracts/RoleRepositoryInterface.php';

/**
 * Concrete, PDO-backed implementation of role data access.
 *
 * Role inheritance (Manager ⊇ Super Admin ⊇ Receptionist/E-commerce Admin)
 * is NOT expressed here in code — it's expressed as data, via which rows
 * exist in role_permissions. Adding or changing a role's capabilities never
 * requires touching this class.
 */
class Role extends Model implements RoleRepositoryInterface
{
    public function findById(int $roleId): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM roles WHERE id = :id');
        $stmt->execute(['id' => $roleId]);
        $role = $stmt->fetch();
        return $role ?: null;
    }

    public function findByName(string $name): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM roles WHERE name = :name');
        $stmt->execute(['name' => $name]);
        $role = $stmt->fetch();
        return $role ?: null;
    }

    /**
     * Flat list of permission keys granted to a role, e.g. ['manage_members', ...].
     * This is what gets cached into $_SESSION['permissions'] at login.
     */
    public function getPermissionKeysForRole(int $roleId): array
    {
        $stmt = $this->db->prepare(
            'SELECT p.`key`
             FROM permissions p
             INNER JOIN role_permissions rp ON rp.permission_id = p.id
             WHERE rp.role_id = :role_id'
        );
        $stmt->execute(['role_id' => $roleId]);
        return array_column($stmt->fetchAll(), 'key');
    }
}
