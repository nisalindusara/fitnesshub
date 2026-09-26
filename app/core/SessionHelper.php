<?php
class SessionHelper
{
    public static function resolveHomeRouteForSession(): string
    {
        if (empty($_SESSION['user_id'])) {
            return '/login'; // not logged in at all
        }

        if (empty($_SESSION['is_staff'])) {
            return '/member';
        }

        $redirects = [
            'receptionist'     => '/portal',
            'ecommerce_admin'  => '/portal',
            'super_admin'      => '/portal',
            'manager'          => '/portal',
            'instructor'       => '/instructor',
        ];

        return $redirects[$_SESSION['role_name'] ?? ''] ?? '/member';
    }
}
