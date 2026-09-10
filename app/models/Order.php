<?php

require_once __DIR__ . '/../core/Model.php';

class Order extends Model
{
    /**
     * Listing query for the /portal/orders screen.
     *
     * Customer display is member name if member_id is set, else guest_name —
     * resolved here via COALESCE rather than in the view, so the view stays
     * a dumb renderer and doesn't need to know about the guest/member split.
     *
     * item_count is a scalar subquery rather than a JOIN + GROUP BY against
     * order_items, since a JOIN would multiply the orders row per item and
     * require aggregating every other selected column unnecessarily.
     */
    public function getOrderListing(): array
    {
        $query = "SELECT 
                    o.id,
                    o.order_number,
                    o.status,
                    o.total_amount,
                    o.created_at,
                    COALESCE(
                        CONCAT(m.first_name, ' ', m.last_name),
                        o.guest_name
                    ) AS customer_name,
                    CONCAT(s.first_name, ' ', s.last_name) AS placed_by_name,
                    (SELECT COUNT(*) FROM order_items oi WHERE oi.order_id = o.id) AS item_count
                  FROM orders o
                  LEFT JOIN users m ON o.member_id = m.id
                  LEFT JOIN users s ON o.placed_by = s.id
                  ORDER BY o.created_at DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Single order header, joined with member/staff names.
     * Returns false if the id doesn't exist — controller must handle that
     * as a 404, not assume a row is always present.
     */
    public function findByIdWithDetails(int $id): array|false
    {
        $query = "SELECT
                    o.*,
                    COALESCE(CONCAT(m.first_name, ' ', m.last_name), o.guest_name) AS customer_name,
                    m.email AS member_email,
                    m.phone_number AS member_phone,
                    m.created_at AS member_since,
                    CONCAT(s.first_name, ' ', s.last_name) AS placed_by_name,
                    sm.name AS shipping_method_name
                  FROM orders o
                  LEFT JOIN users m ON o.member_id = m.id
                  LEFT JOIN users s ON o.placed_by = s.id
                  LEFT JOIN shipping_methods sm ON o.shipping_method_id = sm.id
                  WHERE o.id = :id
                  LIMIT 1";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Line items for one order — separate query rather than a JOIN on the
     * header query, same reasoning as getOrderListing()'s item_count:
     * avoids multiplying/duplicating header columns per item row.
     */
    public function getItemsByOrderId(int $orderId): array
    {
        $query = "SELECT * FROM order_items WHERE order_id = :order_id";

        $stmt = $this->db->prepare($query);
        $stmt->execute([':order_id' => $orderId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $orderData, array $items): int|false
    {
        $variantModel = new ProductVariant();

        try {
            $this->db->beginTransaction();

            $insertOrder = "INSERT INTO orders
                (order_number, member_id, guest_name, guest_phone, placed_by,
                 shipping_method_id, shipping_cost, subtotal, discount_amount,
                 tax_amount, total_amount, notes, status)
                VALUES
                (:order_number, :member_id, :guest_name, :guest_phone, :placed_by,
                 :shipping_method_id, :shipping_cost, :subtotal, :discount_amount,
                 :tax_amount, :total_amount, :notes, 'pending')";

            $stmt = $this->db->prepare($insertOrder);
            $stmt->execute([
                ':order_number'        => 'TEMP',
                ':member_id'           => $orderData['member_id'],
                ':guest_name'          => $orderData['guest_name'],
                ':guest_phone'         => $orderData['guest_phone'],
                ':placed_by'           => $orderData['placed_by'],
                ':shipping_method_id'  => $orderData['shipping_method_id'],
                ':shipping_cost'       => $orderData['shipping_cost'],
                ':subtotal'            => $orderData['subtotal'],
                ':discount_amount'     => $orderData['discount_amount'],
                ':tax_amount'          => $orderData['tax_amount'],
                ':total_amount'        => $orderData['total_amount'],
                ':notes'               => $orderData['notes'] ?? null,
            ]);

            $orderId = (int) $this->db->lastInsertId();

            $orderNumber = 'FH-' . date('Y') . '-' . str_pad((string) $orderId, 5, '0', STR_PAD_LEFT);
            $this->db->prepare("UPDATE orders SET order_number = :order_number WHERE id = :id")
                ->execute([':order_number' => $orderNumber, ':id' => $orderId]);

            $insertItem = "INSERT INTO order_items
                (order_id, product_variant_id, product_name, variant_label, unit_price, quantity, line_subtotal)
                VALUES (:order_id, :product_variant_id, :product_name, :variant_label, :unit_price, :quantity, :line_subtotal)";
            $itemStmt = $this->db->prepare($insertItem);

            foreach ($items as $item) {
                $variant = $variantModel->findById($item['variant_id']);

                if ($variant === false) {
                    throw new RuntimeException("Variant {$item['variant_id']} not found or inactive.");
                }

                $decremented = $variantModel->decrementStock($item['variant_id'], $item['quantity']);

                if (!$decremented) {
                    throw new RuntimeException("Insufficient stock for variant {$item['variant_id']}.");
                }

                $variantLabel = trim(implode(' / ', array_filter([$variant['size'], $variant['color']])));

                $itemStmt->execute([
                    ':order_id'           => $orderId,
                    ':product_variant_id' => $item['variant_id'],
                    ':product_name'       => $variant['product_name'],
                    ':variant_label'      => $variantLabel ?: null,
                    ':unit_price'         => $variant['price'],
                    ':quantity'           => $item['quantity'],
                    ':line_subtotal'      => $variant['price'] * $item['quantity'],
                ]);
            }

            $this->db->commit();
            return $orderId;
        } catch (Throwable $e) {
            $this->db->rollBack();
            return false;
        }
    }

    /**
     * Direct status update — used when a form lets staff set an initial
     * status other than 'pending'. Callers must check OrderStatusService
     * first; this method does not enforce the payment-verification link.
     */
    public function updateStatus(int $orderId, string $status): bool
    {
        $stmt = $this->db->prepare("UPDATE orders SET status = :status WHERE id = :id");
        return $stmt->execute([':status' => $status, ':id' => $orderId]);
    }
}
