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
}
