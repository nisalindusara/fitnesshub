<?php

require_once __DIR__ . '/../contracts/RoleRepositoryInterface.php';

/**
 * The only place that turns "a role_id" into "a list of permission keys."
 *
 * Depends on RoleRepositoryInterface, not the concrete Role class — this is
 * the DIP boundary that lets the underlying data source change without this
 * class (or anything that calls it) needing to change.
 *
 * Deliberately DB-touching and called only at login — see Gate.php for the
 * stateless, per-request counterpart that reads the cached result.
 */
class AuthorizationService
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * A null $roleId means "not staff" (plain Customer) — always resolves to
     * an empty permission set rather than erroring, since most accounts fall
     * into this case.
     */
    public function computePermissionsForRole(?int $roleId): array
    {
        if ($roleId === null) {
            return [];
        }

        return $this->roleRepository->getPermissionKeysForRole($roleId);
    }
}
