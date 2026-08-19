<?php

require_once __DIR__ . "/../core/Controller.php";

class MemberController extends Controller
{
    public function dashboard() : void
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $data['userName'] = $_SESSION['user_name'];
        
        $this->render('member/dashboard', 'member-layout', $data);
    }
}