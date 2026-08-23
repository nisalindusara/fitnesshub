<?php

require_once __DIR__ . '/../core/Controller.php';

class AdminController extends Controller
{
    public function reports(): void
    {
        // Placeholder — real reporting logic comes later.
        // If we've reached this method at all, it means Gate::allows('view_reports')
        // already passed in the Router, so this account has permission.
        echo "You have access to view reports. (This confirms the RBAC guard passed.)";
    }
}
