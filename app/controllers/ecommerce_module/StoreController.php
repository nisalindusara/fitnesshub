<?php

class StoreController extends Controller
{
    public function showStoreLandingPageScreen(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/eCom-landing', 'landing-layout', $data);
    }
    public function ecommerceCshowStoreCatalogScreenatalogue(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/eCom-catalogue', 'landing-layout', $data);
    }
    public function sampleProduct(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/sample-product', 'landing-layout', $data);
    }
    public function showCartScreen(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/cart', 'landing-layout', $data);
    }
    public function showStoreCheckoutScreen(): void
    {
        $data['isLoggedIn'] = isset($_SESSION['user_id']);
        $this->render('landing/ecommerce-checkout', 'landing-layout', $data);
    }
}
