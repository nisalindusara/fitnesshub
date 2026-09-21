<?php

class StaffDashboardController extends Controller
{
    public function ecommerceAdmin(): void
    {
        $this->render('dashboards/dashboard-ecommerce-admin', 'staff-layout');
    }

    public function superAdmin(): void
    {
        $this->render('dashboards/dashboard-super-admin', 'staff-layout');
    }

    public function manager(): void
    {
        $this->render('dashboards/dashboard-manager', 'staff-layout');
    }
}
