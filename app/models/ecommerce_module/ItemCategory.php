<?php

class ItemCategory extends Model
{
    public function getCategories(): array
    {
        $query = "SELECT * FROM `product_categories`";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateCategoryName(int $categoryId, string $newName): bool|int
    {
        try {
            $query = "UPDATE `product_categories` SET name = :name WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':name' => $newName,
                ':id'   => $categoryId
            ]);


            if ($stmt->rowCount() === 0) {
                return false;
            }

            return $categoryId;
        } catch (Throwable $e) {
            // Tip: It is highly recommended to log $e->getMessage() here
            return false;
        }
    }
}
