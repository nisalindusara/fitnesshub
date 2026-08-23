<?php

interface StaffProfileRepositoryInterface
{
    public function findByUserId(int $userId): ?array;
    public function create(int $userId, int $roleId, array $data): bool;
    public function update(int $userId, array $data): bool;
}
