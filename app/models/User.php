<?php

require_once __DIR__ . '/../core/Model.php';

class User extends Model
{
    /**
     * Returns the new user's ID on success, or false on failure.
     *
     * Return type is intentionally int|false, not bool — an earlier version
     * declared `: bool` while returning an int, which PHP silently coerced
     * to `true` without strict_types enabled. That meant $_SESSION['user_id']
     * was storing a boolean cast to 1 instead of the real ID. Keep this
     * signature honest; don't revert it to bool.
     */
    public function register(array $userData): int|false
    {
        $query = "INSERT INTO users (first_name, last_name, email, phone_number, password_hash) 
                  VALUES (:first_name, :last_name, :email, :phone_number, :password_hash)";

        $stmt = $this->db->prepare($query);

        $success = $stmt->execute([
            ':first_name'    => $userData['first_name'],
            ':last_name'     => $userData['last_name'],
            ':email'         => $userData['email'],
            ':phone_number'  => $userData['phone_number'],
            ':password_hash' => $userData['password_hash']
        ]);

        if ($success) {
            return (int) $this->db->lastInsertId();
        }

        return false;
    }

    /**
     * Single source of truth for login lookups. Returning the full row
     * (SELECT *) is what lets role_id flow into the login/permission chain
     * automatically whenever new columns are added to `users`.
     */
    public function findByEmail(string $email): array|false
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Search active members (role_id IS NULL) by name or phone —
     * backs the order form's customer search box.
     */
    public function searchMembers(string $term): array
    {
        $query = "SELECT id, first_name, last_name, phone_number
                  FROM users
                  WHERE role_id IS NULL
                    AND (
                        first_name LIKE :term
                        OR last_name LIKE :term
                        OR phone_number LIKE :term
                        OR CONCAT(first_name, ' ', last_name) LIKE :term
                    )
                  LIMIT 20";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':term' => '%' . $term . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
