<?php

require_once __DIR__ . '/../core/Model.php';

class ShippingMethod extends Model
{
    public function findActiveById(int $id): array|false
    {
        $query = "SELECT * FROM shipping_methods WHERE id = :id AND is_active = 1 LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllActive(): array
    {
        $stmt = $this->db->prepare("SELECT * FROM shipping_methods WHERE is_active = 1");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
