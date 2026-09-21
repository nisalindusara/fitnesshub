<style>
    /*
 * Order details page: status block, actions, shipping & billing, cancel dialog.
 *
 * Only NEW classes (prefix os-) live here. The existing card, product-row,
 * totals, detail-* and status-badge classes are unchanged.
 *
 * Colours use var(--name, fallback). The names below are guesses: rename them to
 * the real variables in tokens.css and the fallbacks stop mattering.
 */

    .order-view {
        --os-ink: var(--color-ink, #171717);
        --os-muted: var(--color-muted, #8a8f98);
        --os-line: var(--color-border, #e5e7eb);
        --os-surface: var(--color-surface, #ffffff);
        --os-soft: var(--color-surface-soft, #f6f7f8);
        --os-red: var(--color-brand-red, #ed1c24);
        --os-radius: var(--radius-card, 16px);
    }

    /* ---------- Buttons ---------- */

    .os-actions {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .os-form {
        margin: 0;
    }

    .os-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        height: 36px;
        padding: 0 14px;
        border: 1px solid var(--os-line);
        border-radius: 10px;
        background: var(--os-surface);
        color: var(--os-ink);
        font: inherit;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
    }

    .os-btn:hover {
        background: var(--os-soft);
    }

    .os-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Forward action: ink black. Brand red is kept for cancelling only. */
    .os-btn-primary {
        background: var(--os-ink);
        border-color: var(--os-ink);
        color: #fff;
    }

    .os-btn-primary:hover {
        background: var(--os-ink);
        opacity: 0.88;
    }

    .os-btn-danger {
        color: var(--os-red);
        border-color: var(--os-red);
    }

    .os-btn-danger:hover {
        background: color-mix(in srgb, var(--os-red) 8%, white);
    }

    .os-btn-danger-solid {
        background: var(--os-red);
        border-color: var(--os-red);
        color: #fff;
    }

    .os-btn-danger-solid:hover {
        background: var(--os-red);
        opacity: 0.9;
    }

    /* ---------- Status card header ---------- */

    .os-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    /* ---------- Status track ---------- */

    .os-track {
        display: flex;
        margin: 0 0 32px;
        padding: 0;
        list-style: none;
    }

    .os-step {
        position: relative;
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        text-align: center;
        outline: none;
    }

    /* Line from the previous step's centre to this step's centre.
   ::before is the grey track, ::after is the fill that grows over it. */
    .os-step:not(:first-child)::before,
    .os-step:not(:first-child)::after {
        content: '';
        position: absolute;
        top: 17px;
        left: -50%;
        width: 100%;
        height: 2px;
    }

    .os-step:not(:first-child)::before {
        background: var(--os-line);
    }

    .os-step:not(:first-child)::after {
        background: var(--os-ink);
        transform: scaleX(0);
        transform-origin: left;
    }

    .os-step.is-reached:not(:first-child)::after {
        transform: scaleX(1);
    }

    .os-node {
        position: relative;
        z-index: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border: 2px solid var(--os-line);
        border-radius: 50%;
        background: var(--os-surface);
        color: var(--os-muted);
    }

    .os-step.is-reached .os-node {
        background: var(--os-ink);
        border-color: var(--os-ink);
        color: #fff;
    }

    .os-step.is-current .os-node {
        box-shadow: 0 0 0 4px color-mix(in srgb, var(--os-ink) 12%, transparent);
    }

    .os-label {
        font-size: 13px;
        font-weight: 500;
        color: var(--os-muted);
    }

    .os-step.is-reached .os-label {
        color: var(--os-ink);
    }

    .os-step.is-current .os-label {
        font-weight: 600;
    }

    /* Date and time: only on hover (or keyboard focus). */
    .os-time {
        position: absolute;
        top: 100%;
        left: 50%;
        z-index: 2;
        margin-top: 6px;
        padding: 6px 10px;
        border-radius: 8px;
        background: var(--os-ink);
        color: #fff;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transform: translateX(-50%);
        transition: opacity 0.15s ease;
        pointer-events: none;
    }

    .os-step:hover .os-time,
    .os-step:focus-visible .os-time {
        opacity: 1;
        visibility: visible;
    }

    /* Fill animation: the line grows from the previous step, then the node fills.
   Plays only when the controller sets $animateProgress (the load right after an advance). */
    @keyframes os-segment-fill {
        from {
            transform: scaleX(0);
        }

        to {
            transform: scaleX(1);
        }
    }

    @keyframes os-node-fill {
        from {
            background: var(--os-surface);
            border-color: var(--os-line);
            color: var(--os-muted);
        }

        to {
            background: var(--os-ink);
            border-color: var(--os-ink);
            color: #fff;
        }
    }

    .os-step.os-animate:not(:first-child)::after {
        animation: os-segment-fill 0.6s ease-out both;
    }

    .os-step.os-animate .os-node {
        animation: os-node-fill 0.4s ease-out 0.5s both;
    }

    @media (prefers-reduced-motion: reduce) {

        .os-step.os-animate:not(:first-child)::after,
        .os-step.os-animate .os-node {
            animation: none;
        }
    }

    /* ---------- Cancelled state ---------- */

    .os-cancelled {
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }

    .os-cancelled-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--os-red);
        color: #fff;
    }

    .os-cancelled-title {
        margin: 0;
        font-weight: 600;
        color: var(--os-red);
    }

    .os-cancelled-meta,
    .os-cancelled-reason {
        margin: 2px 0 0;
        font-size: 14px;
        color: var(--os-muted);
    }

    .os-cancelled-reason {
        color: var(--os-ink);
    }

    /* ---------- Items: thumbnail ---------- */

    .os-thumb {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
        width: 56px;
        height: 56px;
        overflow: hidden;
        border: 1px solid var(--os-line);
        border-radius: 10px;
        background: var(--os-soft);
        color: var(--os-muted);
    }

    .os-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* ---------- Customer ---------- */

    .os-customer {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--os-line);
    }

    .os-customer .detail-value,
    .os-sub {
        margin: 0;
    }

    .os-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: none;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--os-ink);
        color: #fff;
        font-size: 14px;
        font-weight: 600;
    }

    .os-sub {
        font-size: 13px;
        color: var(--os-muted);
    }

    /* ---------- Shipping & billing ---------- */

    .os-sb-section+.os-sb-section {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid var(--os-line);
    }

    .os-sb-heading {
        margin: 0 0 12px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--os-ink);
    }

    .os-pill {
        display: inline-block;
        padding: 2px 10px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 500;
    }

    .os-pill-verified {
        background: #e6f4ea;
        color: #14532d;
    }

    .os-pill-pending {
        background: #fef3c7;
        color: #78350f;
    }

    /* ---------- Status badges for the new statuses ----------
   Merge with your existing .status-badge rules. Delete .status-paid,
   which no longer exists. */

    .status-badge.status-confirmed {
        background: #e8f0fe;
    }

    .status-badge.status-handed_for_delivery {
        background: #f1eafe;
    }

    /* ---------- Cancel dialog ---------- */

    .os-dialog {
        width: min(440px, 92vw);
        padding: 0;
        border: none;
        border-radius: var(--os-radius);
        color: var(--os-ink);
    }

    .os-dialog::backdrop {
        background: rgba(0, 0, 0, 0.4);
    }

    .os-dialog-form {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 24px;
    }

    .os-dialog-title {
        margin: 0;
        font-size: 18px;
    }

    .os-dialog-text {
        margin: 0 0 8px;
        font-size: 14px;
        color: var(--os-muted);
    }

    .os-textarea {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 12px;
        border: 1px solid var(--os-line);
        border-radius: 10px;
        font: inherit;
        font-size: 14px;
        resize: vertical;
    }

    .os-textarea:focus {
        outline: 2px solid var(--os-ink);
        outline-offset: 1px;
    }

    .os-dialog-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 12px;
    }
</style>

<?php

/**
 * Order detail view. Read-only apart from the status actions.
 *
 * Expects from the controller:
 *   $order            row from Order::findByIdWithDetails()
 *   $items            rows from Order::getItemsByOrderId()
 *   $statusBlock      from OrderStatusService::buildStatusBlock()
 *   $payment          row from Payment::findByOrderId(), or false
 *   $canUpdateStatus  bool, worked out with Gate in the controller
 *   $csrfToken        optional string
 *   $animateProgress  optional bool, true only on the page load right after a
 *                     successful advance (plays the fill animation once)
 *
 * The view makes no decisions about the order lifecycle. Everything about
 * flows, next steps and cancellation comes pre-computed in $statusBlock.
 */

if (!function_exists('money')) {
    function money($n)
    {
        return 'Rs. ' . number_format((float) $n, 2);
    }
}

if (!function_exists('os_e')) {
    function os_e($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('os_icon')) {
    function os_icon(string $status): string
    {
        $paths = [
            'pending'             => '<circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 14"/>',
            'confirmed'           => '<polyline points="20 6 9 17 4 12"/>',
            'ready_for_pickup'    => '<path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>',
            'handed_for_delivery' => '<rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>',
            'completed'           => '<path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>',
            'cancelled'           => '<circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>',
        ];

        return '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
            . ($paths[$status] ?? $paths['pending'])
            . '</svg>';
    }
}

$canUpdateStatus = !empty($canUpdateStatus);
$animateProgress = !empty($animateProgress);
$csrfToken = $csrfToken ?? '';
$payment = $payment ?? false;

$orderId = (int) $order['id'];
$isDelivery = (int) ($order['requires_address'] ?? 0) === 1;
$nextAction = $statusBlock['next_action'];
$showActions = $canUpdateStatus && ($nextAction !== null || $statusBlock['can_cancel']);

$formatTime = static fn($ts) => date('M j, Y · g:i A', strtotime((string) $ts));

$csrfField = $csrfToken !== ''
    ? '<input type="hidden" name="csrf_token" value="' . os_e($csrfToken) . '">'
    : '';

$customerName = $order['customer_name'] ?? 'Unknown';
$nameParts = preg_split('/\s+/', trim($customerName));
$initials = mb_strtoupper(
    mb_substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? mb_substr($nameParts[1], 0, 1) : '')
);
$isMember = !empty($order['member_id']);

$itemCount = count($items);
?>

<div class="order-view">

    <div class="order-header">
        <a href="/portal/orders" class="icon-btn" title="Back to orders">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
        </a>

        <div class="order-heading">
            <h1>Order #<?= os_e($order['order_number']) ?></h1>
            <div class="order-subline">
                <span class="order-date"><?= os_e($formatTime($order['created_at'])) ?></span>
                <span class="status-badge status-<?= os_e($order['status']) ?>">
                    <span class="status-dot"></span>
                    <?= os_e(ucwords(str_replace('_', ' ', $order['status']))) ?>
                </span>
            </div>
        </div>
    </div>

    <div class="order-body">
        <div class="order-col order-col-main">

            <!-- Status -->
            <section class="card os-status-card">
                <div class="card-header os-card-header">
                    <span class="card-title">Order status</span>

                    <?php if ($showActions): ?>
                        <div class="os-actions">
                            <?php if ($nextAction !== null): ?>
                                <form method="post" action="/portal/orders/advance" class="os-form"
                                    data-confirm="<?= os_e($nextAction['label']) ?>? This cannot be undone.">
                                    <?= $csrfField ?>
                                    <input type="hidden" name="order_id" value="<?= $orderId ?>">
                                    <input type="hidden" name="expected_status" value="<?= os_e($order['status']) ?>">
                                    <button type="submit" class="os-btn os-btn-primary"><?= os_e($nextAction['label']) ?></button>
                                </form>
                            <?php endif; ?>

                            <?php if ($statusBlock['can_cancel']): ?>
                                <button type="button" class="os-btn os-btn-danger" id="os-cancel-open">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    Cancel
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-content">
                    <?php if ($statusBlock['is_cancelled']): ?>
                        <div class="os-cancelled">
                            <span class="os-cancelled-icon"><?= os_icon('cancelled') ?></span>
                            <div>
                                <p class="os-cancelled-title">Cancelled</p>
                                <?php if (!empty($statusBlock['cancelled_at'])): ?>
                                    <p class="os-cancelled-meta"><?= os_e($formatTime($statusBlock['cancelled_at'])) ?></p>
                                <?php endif; ?>
                                <?php if (!empty($statusBlock['cancelled_reason'])): ?>
                                    <p class="os-cancelled-reason">Reason: <?= os_e($statusBlock['cancelled_reason']) ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <ol class="os-track">
                            <?php foreach ($statusBlock['steps'] as $step): ?>
                                <?php
                                $classes = 'os-step';
                                if ($step['reached']) {
                                    $classes .= ' is-reached';
                                }
                                if ($step['current']) {
                                    $classes .= ' is-current';
                                    if ($animateProgress) {
                                        $classes .= ' os-animate';
                                    }
                                }
                                ?>
                                <li class="<?= $classes ?>" tabindex="0"
                                    <?= $step['current'] ? 'aria-current="step"' : '' ?>>
                                    <span class="os-node"><?= os_icon($step['status']) ?></span>
                                    <span class="os-label"><?= os_e($step['label']) ?></span>
                                    <?php if ($step['reached']): ?>
                                        <span class="os-time" role="tooltip">
                                            <?= $step['at'] ? os_e($formatTime($step['at'])) : 'No time recorded' ?>
                                        </span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Items -->
            <section class="card card-shaded">
                <div class="card-header">
                    <span class="card-title">Order items</span>
                </div>
                <div class="card-content">
                    <?php foreach ($items as $item): ?>
                        <div class="product-row">
                            <div class="os-thumb">
                                <?php if (!empty($item['image_url'])): ?>
                                    <img src="<?= os_e($item['image_url']) ?>" alt="">
                                <?php else: ?>
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                                        <line x1="12" y1="22.08" x2="12" y2="12" />
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <div class="product-info">
                                <div class="product-top">
                                    <div class="product-name-group">
                                        <p class="product-name"><?= os_e($item['product_name']) ?></p>
                                        <?php if (!empty($item['variant_label'])): ?>
                                            <p class="product-meta"><?= os_e($item['variant_label']) ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <p class="product-price"><?= money($item['line_subtotal']) ?></p>
                                </div>
                                <div class="product-tags">
                                    <span class="pill"><?= (int) $item['quantity'] ?> × <?= money($item['unit_price']) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Summary -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Order summary</span>
                </div>
                <div class="card-content">
                    <div class="totals">
                        <div class="totals-row">
                            <span>Subtotal (<?= $itemCount ?> <?= $itemCount === 1 ? 'item' : 'items' ?>)</span>
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
                            <span><?= money($order['shipping_cost']) ?></span>
                        </div>
                        <div class="totals-row totals-final">
                            <span>Total</span>
                            <span><?= money($order['total_amount']) ?></span>
                        </div>
                    </div>
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
                    <div class="os-customer">
                        <span class="os-avatar" aria-hidden="true"><?= os_e($initials) ?></span>
                        <div>
                            <p class="detail-value"><?= os_e($customerName) ?></p>
                            <p class="os-sub">
                                <?= $isMember
                                    ? 'Member since ' . os_e(date('M Y', strtotime((string) $order['member_since'])))
                                    : 'Guest' ?>
                            </p>
                        </div>
                    </div>

                    <div class="detail-stack">
                        <?php if ($isMember): ?>
                            <div class="detail-item">
                                <p class="detail-label">Email</p>
                                <p class="detail-value"><?= os_e($order['member_email']) ?></p>
                            </div>
                            <div class="detail-item">
                                <p class="detail-label">Phone</p>
                                <p class="detail-value"><?= os_e($order['member_phone']) ?></p>
                            </div>
                        <?php else: ?>
                            <div class="detail-item">
                                <p class="detail-label">Phone</p>
                                <p class="detail-value"><?= os_e($order['guest_phone'] ?? '—') ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

            <!-- Shipping and billing (replaces the reference design's conversation block) -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Shipping &amp; billing</span>
                </div>
                <div class="card-content">

                    <div class="os-sb-section">
                        <p class="os-sb-heading">Shipping</p>
                        <div class="detail-stack">
                            <div class="detail-item">
                                <p class="detail-label">Method</p>
                                <p class="detail-value">
                                    <?= !empty($order['shipping_method_id'])
                                        ? os_e($order['shipping_method_name'])
                                        : 'No shipping method recorded' ?>
                                </p>
                            </div>
                            <?php if (!empty($order['shipping_method_id'])): ?>
                                <div class="detail-item">
                                    <p class="detail-label">Cost</p>
                                    <p class="detail-value"><?= money($order['shipping_cost']) ?></p>
                                </div>
                            <?php endif; ?>

                            <?php if ($isDelivery): ?>
                                <?php
                                $addressLines = array_filter([
                                    $order['delivery_address'] ?? '',
                                    trim(($order['delivery_city'] ?? '') . ' ' . ($order['delivery_postal_code'] ?? '')),
                                ]);
                                ?>
                                <?php if (!empty($order['delivery_recipient_name']) || $addressLines): ?>
                                    <div class="detail-item">
                                        <p class="detail-label">Recipient</p>
                                        <p class="detail-value"><?= os_e($order['delivery_recipient_name'] ?? '—') ?></p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Recipient phone</p>
                                        <p class="detail-value"><?= os_e($order['delivery_phone'] ?? '—') ?></p>
                                    </div>
                                    <div class="detail-item">
                                        <p class="detail-label">Delivery address</p>
                                        <?php foreach ($addressLines as $line): ?>
                                            <p class="detail-value"><?= os_e($line) ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="detail-item">
                                        <p class="detail-label">Delivery address</p>
                                        <p class="note-empty">No delivery address recorded.</p>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="os-sb-section">
                        <p class="os-sb-heading">Billing</p>
                        <div class="detail-stack">
                            <?php if ($payment): ?>
                                <div class="detail-item">
                                    <p class="detail-label">Payment method</p>
                                    <p class="detail-value"><?= os_e(ucwords(str_replace('_', ' ', $payment['method']))) ?></p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Amount</p>
                                    <p class="detail-value"><?= money($payment['amount']) ?></p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Status</p>
                                    <?php if ($payment['verification_status'] === 'verified'): ?>
                                        <span class="os-pill os-pill-verified">Verified</span>
                                    <?php else: ?>
                                        <span class="os-pill os-pill-pending">Pending verification</span>
                                    <?php endif; ?>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Recorded by</p>
                                    <p class="detail-value"><?= os_e($payment['recorded_by_name']) ?></p>
                                </div>
                                <div class="detail-item">
                                    <p class="detail-label">Recorded on</p>
                                    <p class="detail-value"><?= os_e($formatTime($payment['created_at'])) ?></p>
                                </div>
                            <?php else: ?>
                                <div class="detail-item">
                                    <p class="detail-label">Payment</p>
                                    <p class="note-empty">No payment recorded.</p>
                                </div>
                            <?php endif; ?>
                            <div class="detail-item">
                                <p class="detail-label">Order total</p>
                                <p class="detail-value"><?= money($order['total_amount']) ?></p>
                            </div>
                        </div>
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
                        <p class="note-text">"<?= nl2br(os_e($order['notes'])) ?>"</p>
                    <?php else: ?>
                        <p class="note-empty">No notes for this order.</p>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Order info -->
            <section class="card">
                <div class="card-header">
                    <span class="card-title">Order info</span>
                </div>
                <div class="card-content">
                    <div class="detail-stack">
                        <div class="detail-item">
                            <p class="detail-label">Placed by</p>
                            <p class="detail-value"><?= os_e($order['placed_by_name']) ?></p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Channel</p>
                            <p class="detail-value"><?= $order['channel'] === 'online' ? 'Online' : 'In store' ?></p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Last updated</p>
                            <p class="detail-value"><?= os_e($formatTime($order['updated_at'])) ?></p>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php if ($canUpdateStatus && $statusBlock['can_cancel']): ?>
        <dialog id="os-cancel-dialog" class="os-dialog">
            <form method="post" action="/portal/orders/cancel" class="os-dialog-form">
                <?= $csrfField ?>
                <input type="hidden" name="order_id" value="<?= $orderId ?>">

                <h2 class="os-dialog-title">Cancel order #<?= os_e($order['order_number']) ?></h2>
                <p class="os-dialog-text">The order's stock will be returned to inventory. This cannot be undone.</p>

                <label class="detail-label" for="os-cancel-reason">Reason (required)</label>
                <textarea id="os-cancel-reason" name="reason" class="os-textarea" rows="3" maxlength="255" required></textarea>

                <div class="os-dialog-actions">
                    <button type="button" class="os-btn" data-close>Keep order</button>
                    <button type="submit" class="os-btn os-btn-danger-solid">Cancel order</button>
                </div>
            </form>
        </dialog>
    <?php endif; ?>

</div>

<script>
    (function() {
        // Confirm before moving an order forward, and stop a double click sending it twice.
        document.querySelectorAll('form[data-confirm]').forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!window.confirm(form.dataset.confirm)) {
                    event.preventDefault();
                    return;
                }
                var button = form.querySelector('button[type="submit"]');
                if (button) {
                    button.disabled = true;
                }
            });
        });

        // Cancel dialog
        var dialog = document.getElementById('os-cancel-dialog');
        var openButton = document.getElementById('os-cancel-open');
        if (dialog && openButton) {
            openButton.addEventListener('click', function() {
                dialog.showModal();
            });
            dialog.querySelector('[data-close]').addEventListener('click', function() {
                dialog.close();
            });
        }
    })();
</script>