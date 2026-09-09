<?php

require_once __DIR__ . '/../models/Payment.php';

/**
 * Enforces the rule that an order cannot move to a "money already
 * received" status (paid, ready_for_pickup, completed) while its
 * linked payment is still pending_verification. An order can always
 * move to 'cancelled' regardless of payment state.
 */
class OrderStatusService
{
    private const STATUSES_REQUIRING_VERIFIED_PAYMENT = ['paid', 'ready_for_pickup', 'completed'];

    public function canTransitionTo(int $orderId, string $newStatus): bool
    {
        if (!in_array($newStatus, self::STATUSES_REQUIRING_VERIFIED_PAYMENT, true)) {
            return true; // e.g. 'cancelled' or 'pending' — no payment check needed
        }

        $paymentModel = new Payment();
        $verificationStatus = $paymentModel->getVerificationStatusForOrder($orderId);

        // No payment recorded at all, or it's still pending — block the transition
        return $verificationStatus === 'verified';
    }
}
