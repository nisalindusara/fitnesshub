<?php

class Gate
{
    public static function allows(string $permissionKey): bool
    {
        $permissions = $_SESSION['permissions'] ?? [];
        return in_array($permissionKey, $permissions, true);
    }

    public static function any(array $permissionKeys): bool
    {
        foreach ($permissionKeys as $key) {
            if (self::allows($key)) {
                return true;
            }
        }
        return false;
    }
}
