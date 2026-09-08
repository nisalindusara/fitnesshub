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
                    CONCAT(s.first_name, ' ', s.last_name) AS placed_by_name
                  FROM orders o
                  LEFT JOIN users m ON o.member_id = m.id
                  LEFT JOIN users s ON o.placed_by = s.id
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
}
