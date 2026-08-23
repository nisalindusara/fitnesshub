<?php

/**
 * Defines the contract for staff profile persistence.
 *
 * Controllers and services depend on this interface, not on a concrete
 * implementation — this is what lets the underlying storage (currently one
 * shared `staff_profiles` table) change later without touching any calling code.
 */
interface StaffProfileRepositoryInterface
{
    public function findByUserId(int $userId): ?array;
    public function create(int $userId, int $roleId, array $data): bool;
    public function update(int $userId, array $data): bool;
}
