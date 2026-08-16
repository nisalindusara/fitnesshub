<?php 

require_once __DIR__ . '/../core/Controller.php';

class LandingController extends Controller
{
    public function index(): void
    {
        $this->render('landing/home', 'landing-layout');
    }
}