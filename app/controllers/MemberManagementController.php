<?php

require_once __DIR__ . "/../core/Controller.php";

class MemberManagementController extends Controller
{
    public function index(): void
    {
        $this->render('admin/members', 'staff-layout');
    }
}
