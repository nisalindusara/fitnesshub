<?php

/**
 * Decides whether a payment is immediately verified or needs confirmation,
 * based on the payment method and (for methods that aren't self-verifying)
 * whether staff explicitly confirmed it.
 *
 * Cash and card are self-verifying — the receptionist physically has the
 * cash, or a card machine already confirmed the transaction. Bank transfer
 * and "other" are not self-verifying: staff must explicitly attest they
 * confirmed the payment (e.g. saw the transfer land) before it counts as
 * verified, otherwise it's pending_verification until someone checks it.
 */
class PaymentVerificationService
{
    private const SELF_VERIFYING_METHODS = ['cash', 'card'];

    public static function determineStatus(string $method, bool $staffConfirmed): string
    {
        if (in_array($method, self::SELF_VERIFYING_METHODS, true)) {
            return 'verified';
        }

        return $staffConfirmed ? 'verified' : 'pending_verification';
    }
}
