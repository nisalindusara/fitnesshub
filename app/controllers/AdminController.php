<?php

require_once __DIR__ . '/../core/Controller.php';

class AdminController extends Controller
{
    /**
     * Placeholder reports action.
     *
     * If execution reaches this point at all, Gate::allows('view_reports')
     * already passed inside Router::dispatch() — the permission check happens
     * before the controller is even instantiated. Real report logic replaces
     * this once the Reporting & Analytics module is built.
     */
    public function reports(): void
    {
        echo "You have access to view reports. (This confirms the RBAC guard passed.)";
    }
}
