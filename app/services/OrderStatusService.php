<?php

require_once __DIR__ . '/../models/ecommerce/Order.php';
require_once __DIR__ . '/../models/payment/Payment.php';

/**
 * Owns the order status lifecycle. See order-status-logic.md.
 *
 * Rules enforced here:
 *  - An order only ever moves to the NEXT state of its flow. No skipping, no going back.
 *  - The admin can only advance an order into ready_for_pickup / handed_for_delivery / completed.
 *    'confirmed' is set only through confirmPayment(), called by the payment module.
 *  - Cancellation needs a reason and is only allowed while pending, confirmed or ready_for_pickup.
 *
 * This class never opens a transaction. Every multi-table write (status + history,
 * cancel + stock restore) is a single Order model method, because all models share
 * one PDO connection and PDO cannot nest transactions.
 *
 * Authorization (who may call these methods) is checked by the controller with Gate,
 * not here.
 *
 * Business-rule violations throw InvalidArgumentException; a lost race with another
 * update throws RuntimeException. Controllers catch both and flash the message.
 */
class OrderStatusService
{
    // Flows are data. A new flow is a new entry, not new branching code.
    private const PICKUP_FLOW   = ['pending', 'confirmed', 'ready_for_pickup', 'completed'];
    private const DELIVERY_FLOW = ['pending', 'confirmed', 'handed_for_delivery', 'completed'];
    private const IN_STORE_FLOW = ['completed'];

    // Statuses an admin can move an order INTO from the order page.
    private const MANUAL_TARGETS = ['ready_for_pickup', 'handed_for_delivery', 'completed'];

    private const CANCELLABLE = ['pending', 'confirmed', 'ready_for_pickup'];

    // Statuses that mean "the money has been received".
    private const STATUSES_REQUIRING_VERIFIED_PAYMENT = [
        'confirmed',
        'ready_for_pickup',
        'handed_for_delivery',
        'completed',
    ];

    private const MAX_REASON_LENGTH = 255; // orders.cancelled_reason is varchar(255)

    private const LABELS = [
        'pending'             => 'Pending',
        'confirmed'           => 'Confirmed',
        'ready_for_pickup'    => 'Ready for Pickup',
        'handed_for_delivery' => 'Handed for Delivery',
        'completed'           => 'Completed',
        'cancelled'           => 'Cancelled',
    ];

    private Order $orders;
    private Payment $payments;

    public function __construct(?Order $orders = null, ?Payment $payments = null)
    {
        $this->orders = $orders ?? new Order();
        $this->payments = $payments ?? new Payment();
    }

    // ------------------------------------------------------------------
    // Read helpers for the view
    // ------------------------------------------------------------------

    /**
     * The ordered list of statuses this order follows.
     * $order is a row from Order::findByIdWithDetails().
     */
    public function getFlow(array $order): array
    {
        $isDelivery = (int) ($order['requires_address'] ?? 0) === 1;

        // Only an in-store PICKUP order collapses to a single Completed state
        // (paid and collected at the counter). An in-store delivery order still
        // has to go out with a courier, so it follows the delivery flow.
        if ($order['channel'] === 'in_store' && !$isDelivery) {
            return self::IN_STORE_FLOW;
        }

        return $isDelivery ? self::DELIVERY_FLOW : self::PICKUP_FLOW;
    }

    /** The status after the current one, or null at the end of the flow / when cancelled. */
    public function getNextStatus(array $order): ?string
    {
        $flow = $this->getFlow($order);
        $index = array_search($order['status'], $flow, true);

        if ($index === false || !isset($flow[$index + 1])) {
            return null;
        }

        return $flow[$index + 1];
    }

    /** The status the admin can advance to right now, or null if the system owns the next step. */
    public function getNextManualStatus(array $order): ?string
    {
        $next = $this->getNextStatus($order);

        return in_array($next, self::MANUAL_TARGETS, true) ? $next : null;
    }

    public function canCancel(array $order): bool
    {
        return in_array($order['status'], self::CANCELLABLE, true);
    }

    /**
     * Everything the status block in the view needs, so the view stays a plain renderer.
     * $history is Order::getStatusHistory() for this order.
     *
     * Pending's time is orders.created_at. So is the single Completed state of an
     * in-store pickup order. Every other time comes from order_status_history; orders
     * migrated from before that table have no row for earlier steps, so 'at' is null.
     */
    public function buildStatusBlock(array $order, array $history): array
    {
        if ($order['status'] === 'cancelled') {
            return [
                'is_cancelled'     => true,
                'steps'            => [],
                'cancelled_at'     => $order['cancelled_at'],
                'cancelled_reason' => $order['cancelled_reason'],
                'next_action'      => null,
                'can_cancel'       => false,
            ];
        }

        $timeByStatus = [];
        foreach ($history as $row) {
            $timeByStatus[$row['status']] = $row['changed_at'];
        }

        $flow = $this->getFlow($order);
        $currentIndex = array_search($order['status'], $flow, true);

        $steps = [];
        foreach ($flow as $index => $status) {
            $isFirstOrInStore = $status === 'pending' || $flow === self::IN_STORE_FLOW;

            $steps[] = [
                'status'  => $status,
                'label'   => self::LABELS[$status],
                'reached' => $currentIndex !== false && $index <= $currentIndex,
                'current' => $index === $currentIndex,
                'at'      => $isFirstOrInStore ? $order['created_at'] : ($timeByStatus[$status] ?? null),
            ];
        }

        $next = $this->getNextManualStatus($order);

        return [
            'is_cancelled'     => false,
            'steps'            => $steps,
            'cancelled_at'     => null,
            'cancelled_reason' => null,
            'next_action'      => $next === null ? null : [
                'status' => $next,
                'label'  => 'Mark as ' . self::LABELS[$next],
            ],
            'can_cancel'       => $this->canCancel($order),
        ];
    }

    // ------------------------------------------------------------------
    // Actions
    // ------------------------------------------------------------------

    /**
     * Admin pressed the "Mark as ..." button. Moves the order to its next manual status.
     * $expectedStatus is the status the admin was looking at when they pressed it.
     */
    public function advance(int $orderId, int $adminId, string $expectedStatus): void
    {
        $order = $this->getOrderOrFail($orderId);

        // If the status changed since the page loaded, do nothing. Pressing
        // "Mark as Ready" must never complete an order that someone else has
        // just moved to Ready.
        if ($order['status'] !== $expectedStatus) {
            throw new RuntimeException('This order was updated by someone else. Reload and try again.');
        }

        $next = $this->getNextManualStatus($order);

        if ($next === null) {
            throw new InvalidArgumentException('This order cannot be advanced from its current status.');
        }

        $changed = $this->orders->applyStatusChange($orderId, $order['status'], $next, $adminId);

        if (!$changed) {
            throw new RuntimeException('This order was updated by someone else. Reload and try again.');
        }
    }

    /**
     * Called by the payment module after a payment is verified (card success,
     * or the super admin approving a bank transfer).
     *
     * Returns true if the order is now confirmed (or already was), false if its
     * payment is not verified yet. Safe to call more than once.
     * $approvedBy is the super admin for a bank transfer, null for an automatic
     * card confirmation.
     */
    public function confirmPayment(int $orderId, ?int $approvedBy): bool
    {
        $order = $this->getOrderOrFail($orderId);

        if ($order['status'] === 'cancelled') {
            throw new InvalidArgumentException('A cancelled order cannot be confirmed.');
        }

        if ($order['status'] !== 'pending') {
            return true; // already confirmed or further along
        }

        if (!$this->canTransitionTo($orderId, 'confirmed')) {
            return false;
        }

        return $this->orders->applyStatusChange($orderId, 'pending', 'confirmed', $approvedBy);
    }

    /**
     * Cancels an order and restores its stock. $cancelledBy is the admin, or null
     * for an automatic cancellation such as "Payment not received".
     */
    public function cancel(int $orderId, ?int $cancelledBy, string $reason): void
    {
        $reason = trim($reason);

        if ($reason === '') {
            throw new InvalidArgumentException('A cancellation reason is required.');
        }

        if (mb_strlen($reason) > self::MAX_REASON_LENGTH) {
            throw new InvalidArgumentException('The cancellation reason is too long.');
        }

        $order = $this->getOrderOrFail($orderId);

        if (!$this->canCancel($order)) {
            throw new InvalidArgumentException('An order in this status cannot be cancelled.');
        }

        $cancelled = $this->orders->cancel($orderId, $order['status'], $reason, $cancelledBy);

        if (!$cancelled) {
            throw new RuntimeException('This order was updated by someone else. Reload and try again.');
        }
    }

    // ------------------------------------------------------------------
    // Payment gate (kept from the previous version so existing callers still work)
    // ------------------------------------------------------------------

    /**
     * An order can only be in a "money received" status if its payment is verified.
     * Any other target status needs no payment check. An order has at most one
     * payment (unique key on order_payments.order_id).
     */
    public function canTransitionTo(int $orderId, string $newStatus): bool
    {
        if (!in_array($newStatus, self::STATUSES_REQUIRING_VERIFIED_PAYMENT, true)) {
            return true;
        }

        return $this->payments->getVerificationStatusForOrder($orderId) === 'verified';
    }

    private function getOrderOrFail(int $orderId): array
    {
        $order = $this->orders->findByIdWithDetails($orderId);

        if ($order === false) {
            throw new InvalidArgumentException('Order not found.');
        }

        return $order;
    }
}
