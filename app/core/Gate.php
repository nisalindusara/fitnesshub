<?php

/**
 * Reads the current session's cached permission list.
 *
 * Deliberately stateless and DB-free — this runs on every protected route,
 * every request, so it only ever checks the array AuthorizationService wrote
 * into the session at login. If Gate ever needs a database, that's a sign
 * the caching strategy changed and this class's contract has changed with it.
 */
class Gate
{
    public static function allows(string $permissionKey): bool
    {
        $permissions = $_SESSION['permissions'] ?? [];
        return in_array($permissionKey, $permissions, true);
    }

    /**
     * True if the session holds ANY of the given permissions.
     * Useful for routes reachable by more than one role.
     */
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
