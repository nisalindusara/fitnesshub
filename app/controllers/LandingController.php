<?php 

require_once __DIR__ . '/../core/Controller.php';

class LandingController extends Controller
{
    public function index(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/home', 'landing-layout', $data);
    }

    public function about() : void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/about', 'landing-layout', $data);
    }
}