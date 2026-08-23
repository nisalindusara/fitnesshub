<?php

require_once __DIR__ . '/../contracts/RoleRepositoryInterface.php';

class AuthorizationService
{
    private RoleRepositoryInterface $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    /**
     * Computes the full permission key list for a role.
     * Called once at login — result gets cached into the session.
     */
    public function computePermissionsForRole(?int $roleId): array
    {
        if ($roleId === null) {
            return []; // Customer / no staff role
        }

        return $this->roleRepository->getPermissionKeysForRole($roleId);
    }
}
