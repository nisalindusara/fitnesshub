<?php

/**
 * Resolves and validates customer info from the order form submission.
 * Enforces "exactly one of member_id / guest_name+phone" as a business
 * rule — moved here from OrderController rather than left inline.
 */
class OrderService
{
    public static function resolveCustomer(array $post): array
    {
        $customerType = $post['customer_type'] ?? 'member';

        if ($customerType === 'member') {
            $memberId = (int) ($post['member_id'] ?? 0);

            if ($memberId <= 0) {
                throw new InvalidArgumentException('A member must be selected.');
            }

            return ['member_id' => $memberId, 'guest_name' => null, 'guest_phone' => null];
        }

        $guestName = trim($post['guest_name'] ?? '');
        $guestPhone = trim($post['guest_phone'] ?? '');

        if ($guestName === '' || $guestPhone === '') {
            throw new InvalidArgumentException('Guest name and phone are required.');
        }

        return ['member_id' => null, 'guest_name' => $guestName, 'guest_phone' => $guestPhone];
    }
}
