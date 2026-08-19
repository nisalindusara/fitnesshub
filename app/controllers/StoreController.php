<?php

require_once __DIR__ . '/../core/Controller.php';

class StoreController extends Controller
{
    public function ecommerceLandingPage(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/eCom-landing', 'landing-layout', $data);
    }
    public function ecommerceCatalogue(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/eCom-catalogue', 'landing-layout', $data);
    }
    public function sampleProduct(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/sample-product', 'landing-layout', $data);
    }
    public function cart(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/cart', 'landing-layout', $data);
    }
    public function ecommerceCheckout(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/ecommerce-checkout', 'landing-layout', $data);
    }
}
