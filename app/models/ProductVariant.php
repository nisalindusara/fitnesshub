<?php

require_once __DIR__ . '/../core/Model.php';

class ProductVariant extends Model
{
    public function findById(int $id): array|false
    {
        $query = "SELECT pv.*, p.name AS product_name
                  FROM product_variants pv
                  JOIN products p ON pv.product_id = p.id
                  WHERE pv.id = :id AND pv.is_active = 1
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function decrementStock(int $variantId, int $quantity): bool
    {
        $query = "UPDATE product_variants
                  SET stock_quantity = stock_quantity - :quantity
                  WHERE id = :id AND stock_quantity >= :quantity";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':quantity' => $quantity,
            ':id'       => $variantId,
        ]);

        return $stmt->rowCount() > 0;
    }

    public function search(string $term): array
    {
        $query = "SELECT
                    pv.id,
                    pv.size,
                    pv.color,
                    pv.sku,
                    pv.price,
                    pv.stock_quantity,
                    p.name AS product_name
                  FROM product_variants pv
                  JOIN products p ON pv.product_id = p.id
                  WHERE pv.is_active = 1
                    AND p.is_active = 1
                    AND (
                        p.name LIKE :term
                        OR pv.sku LIKE :term
                        OR pv.size LIKE :term
                        OR pv.color LIKE :term
                    )
                  ORDER BY p.name ASC, pv.size ASC, pv.color ASC
                  LIMIT 20";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':term' => '%' . $term . '%']);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
