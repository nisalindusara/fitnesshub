<?php

class ProductCategory extends Model
{
    public function getCategoryAndNumberOfItems(): array
    {
        $query = "
        SELECT pc.id, pc.name, COUNT(p.category_id) as item_count 
        FROM `product_categories` as pc 
        LEFT JOIN `products` as p ON pc.id = p.category_id 
        GROUP BY pc.id, pc.name
    ";

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

    public function addNewCategory(string $newCategoryName, string $newCategoryDescription): bool
    {
        $query = "INSERT INTO `product_categories` (`name`, `description`) VALUES (:name, :description)";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':name' => $newCategoryName,
            ':description' => $newCategoryDescription
        ]);
    }

    public function getNumberOfItemsForCategory(int $categoryId): int
    {
        $query = "
        SELECT COUNT(p.category_id) as item_count 
        FROM `product_categories` as pc 
        LEFT JOIN `products` as p ON pc.id = p.category_id
        WHERE p.category_id = :id
    ";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $categoryId]);

        return $stmt->fetchColumn();
    }

    public function deleteCategory(int $categoryId): bool
    {
        try {
            $query = "DELETE FROM `product_categories` WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $categoryId]);

            return true;
        } catch (Throwable $e) {
            return false;
        }
    }
}
