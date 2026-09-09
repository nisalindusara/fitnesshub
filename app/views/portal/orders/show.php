<?php

/**
 * Order detail view — read-only.
 *
 * Payment method, billing address, and delete/status-update actions were
 * removed from the original template: they don't correspond to anything
 * in the current schema (no payments module yet, single-branch pickup/
 * delivery only, and orders were never decided to be deletable — they're
 * historical records, same reasoning as order_items snapshotting).
 *
 * Shipping fields are shown as a placeholder ("—") since shipping_method_id
 * and shipping_cost columns don't exist on `orders` yet.
 */

function money($n)
{
    return 'Rs. ' . number_format((float) $n, 2);
}
?>

<div class="order-view">

    <div class="order-header">
        <a href="/portal/orders" class="icon-btn" title="Back to orders">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>

        <div class="order-heading">
            <h1>Order #<?= htmlspecialchars($order['order_number']) ?></h1>
            <div class="order-subline">
                <span class="order-date"><?= date('M j, Y · g:i A', strtotime($order['created_at'])) ?></span>
                <span class="status-badge status-<?= htmlspecialchars($order['status']) ?>">
                    <span class="status-dot"></span>
                    <?= htmlspecialchars(ucwords(str_replace('_', ' ', $order['status']))) ?>
                </span>
            </div>
        </div>
    </div>

    <div class="order-body">
        <div class="order-col order-col-main">

            <!-- Items -->
            <section class="card card-shaded">
                <div class="card-header">
                    <span class="card-title">Items</span>
                </div>
                <div class="card-content">
                    <?php foreach ($items as $item): ?>
                        <div class="product-row">
                            <div class="product-info">
                                <div class="product-top">
                                    <div class="product-name-group">
                                        <p class="product-name"><?= htmlspecialchars($item['product_name']) ?></p>
                                        <?php if (!empty($item['variant_label'])): ?>
                                            <p class="product-meta"><?= htmlspecialchars($item['variant_label']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <p class="product-price"><?= money($item['unit_price']) ?></p>
                                </div>
                                <div class="product-tags">
                                    <span class="pill">Qty: <?= (int) $item['quantity'] ?></span>
                                    <span class="pill">Line total: <?= money($item['line_subtotal']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="totals">
                        <div class="totals-row">
                            <span>Subtotal</span>
                            <span><?= money($order['subtotal']) ?></span>
                        </div>
                        <div class="totals-row">
                            <span>Discount</span>
                            <span><?= money($order['discount_amount']) ?></span>
                        </div>
                        <div class="totals-row">
                            <span>Tax</span>
                            <span><?= money($order['tax_amount']) ?></span>
                        </div>
                        <div class="totals-row">
                            <span>Shipping</span>
                            <span>—</span>
                        </div>
                        <div class="totals-row totals-final">
                            <span>Total</span>
                            <span><?= money($order['total_amount']) ?></span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Shipping -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Shipping</span>
                </div>
                <div class="card-content detail-grid">
                    <div class="detail-item">
                        <p class="detail-label">Shipping Method</p>
                        <p class="detail-value">Not yet available</p>
                    </div>
                </div>
            </section>

            <!-- Notes -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Notes</span>
                </div>
                <div class="card-content">
                    <?php if (!empty($order['notes'])): ?>
                        <p class="note-text">"<?= nl2br(htmlspecialchars($order['notes'])) ?>"</p>
                    <?php else: ?>
                        <p class="note-empty">No notes for this order.</p>
                    <?php endif; ?>
                </div>
            </section>

        </div>

        <div class="order-col order-col-side">

            <!-- Customer -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Customer</span>
                </div>
                <div class="card-content">
                    <div class="detail-stack">
                        <div class="detail-item">
                            <p class="detail-label">Name</p>
                            <p class="detail-value"><?= htmlspecialchars($order['customer_name'] ?? 'Unknown') ?></p>
                        </div>
                        <?php if (!empty($order['member_id'])): ?>
                            <div class="detail-item">
                                <p class="detail-label">Email</p>
                                <p class="detail-value"><?= htmlspecialchars($order['member_email']) ?></p>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Phone</p>
                                <p class="detail-value"><?= htmlspecialchars($order['member_phone']) ?></p>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Member Since</p>
                                <p class="detail-value"><?= date('M Y', strtotime($order['member_since'])) ?></p>
                            </div>
                        <?php else: ?>
                            <div class="detail-item">
                                <p class="detail-label">Type</p>
                                <p class="detail-value">Guest</p>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Phone</p>
                                <p class="detail-value"><?= htmlspecialchars($order['guest_phone'] ?? '—') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Order info -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Order Info</span>
                </div>
                <div class="card-content">
                    <div class="detail-stack">
                        <div class="detail-item">
                            <p class="detail-label">Placed By</p>
                            <p class="detail-value"><?= htmlspecialchars($order['placed_by_name']) ?></p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Last Updated</p>
                            <p class="detail-value"><?= date('M j, Y · g:i A', strtotime($order['updated_at'])) ?></p>
                        </div>
                        <?php if ($order['status'] === 'cancelled'): ?>
                            <div class="detail-item">
                                <p class="detail-label">Cancelled At</p>
                                <p class="detail-value"><?= date('M j, Y · g:i A', strtotime($order['cancelled_at'])) ?></p>
                            </div>
                            <?php if (!empty($order['cancelled_reason'])): ?>
                                <div class="detail-item">
                                    <p class="detail-label">Reason</p>
                                    <p class="detail-value"><?= htmlspecialchars($order['cancelled_reason']) ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>