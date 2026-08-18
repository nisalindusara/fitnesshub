<?php

require_once __DIR__ . '/../core/Controller.php';

class AuthController extends Controller 
{
    public function personalDetails(): void 
    {
        $this->render('landing/personal-details', 'landing-layout'); 
    }
}