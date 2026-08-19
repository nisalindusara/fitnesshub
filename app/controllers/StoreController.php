<?php

require_once __DIR__ . '/../core/Controller.php';

class StoreController extends Controller
{
    public function ecommerceLandingPage(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/eCom-landing', 'landing-layout', $data);
    }
}
