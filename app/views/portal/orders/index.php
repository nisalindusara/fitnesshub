<div class="page-header">
    <h1>Orders</h1>
</div>

<?php if (empty($orders)): ?>
    <p class="empty-state">No orders yet.</p>
<?php else: ?>
    <table class="data-table">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>Placed By</th>
                <th>Items</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['order_number']) ?></td>
                    <td><?= htmlspecialchars($order['customer_name'] ?? 'Unknown') ?></td>
                    <td><?= htmlspecialchars($order['placed_by_name']) ?></td>
                    <td><?= (int) $order['item_count'] ?></td>
                    <td>Rs. <?= number_format((float) $order['total_amount'], 2) ?></td>
                    <td>
                        <span class="status-badge status-<?= htmlspecialchars($order['status']) ?>">
                            <?= htmlspecialchars(ucwords(str_replace('_', ' ', $order['status']))) ?>
                        </span>
                    </td>
                    <td><?= date('M j, Y', strtotime($order['created_at'])) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>