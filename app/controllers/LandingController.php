<?php

require_once __DIR__ . '/../core/Controller.php';

class LandingController extends Controller
{
    public function index(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/home', 'landing-layout', $data);
    }
    public function class(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/classes', 'landing-layout', $data);
    }
    public function about(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/about', 'landing-layout', $data);
    }
    public function contact(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/contact', 'landing-layout', $data);
    }
    public function privacyPolicy(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/privacy-policy', 'landing-layout', $data);
    }
    public function termsOfConditions(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/terms-of-conditions', 'landing-layout', $data);
    }
}
