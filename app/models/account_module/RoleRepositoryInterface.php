<?php

interface RoleRepositoryInterface
{
    public function findById(int $roleId): ?array;
    public function findByName(string $name): ?array;
    public function getPermissionKeysForRole(int $roleId): array;
}
