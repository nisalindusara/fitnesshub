<?php

class StaffProfileController extends Controller
{
    public function showStaffProfileScreen(): void
    {
        $this->render('account_module/staff-profile', 'staff-layout');
    }
}
