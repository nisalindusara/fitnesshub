<div class="page-header">
    <button class="icon-btn">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="9" y1="3" x2="9" y2="21"></line>
        </svg>
    </button>
    <span class="page-title">Orders</span>
</div>

<div class="content-body">
    <!-- Toolbar -->
    <div class="toolbar">
        <div class="toolbar-actions">
            <button class="icon-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
            <button class="icon-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2">
                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                </svg>
            </button>
            <button class="icon-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <polyline points="19 12 12 19 5 12"></polyline>
                </svg>
            </button>
        </div>
        <div class="search-box">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" placeholder="Search">
        </div>
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
                    <th class="col-options"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <!-- Order Number (kept as plain text) -->
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

                        <!-- Actions Column -->
                        <td class="col-options">
                            <div style="display: flex; gap: 10px; align-items: center;">
                                <!-- View Link wrapping ONLY the SVG icon -->
                                <a href="/portal/orders/view?id=<?= (int) $order['id'] ?>"
                                    title="View order"
                                    style="display: inline-flex; color: #0284c7;">
                                    <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                        <polyline points="15 3 21 3 21 9"></polyline>
                                        <line x1="10" y1="14" x2="21" y2="3"></line>
                                    </svg>
                                </a>

                                <!-- Delete -->
                                <form action="delete_order.php" method="POST" style="margin: 0; display: inline-flex;" onsubmit="return confirm('Are you sure you want to delete Order #<?= htmlspecialchars($order['order_number']) ?>?');">
                                    <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['order_number']) ?>">
                                    <button type="submit"
                                        title="Delete order"
                                        style="display: inline-flex; border: none; background: none; padding: 0; cursor: pointer; color: #dc2626;">
                                        <svg xmlns="http://w3.org" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>