<?php

require_once __DIR__ . "/../core/Controller.php";

class StaffDashboardController extends Controller
{
    public function ecommerceAdmin(): void
    {
        $this->render('staff/dashboard-ecommerce-admin', 'staff-layout');
    }

    public function superAdmin(): void
    {
        $this->render('staff/dashboard-super-admin', 'staff-layout');
    }

    public function manager(): void
    {
        $this->render('staff/dashboard-manager', 'staff-layout');
    }
}
