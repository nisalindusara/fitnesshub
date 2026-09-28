<?php

class LandingController extends Controller
{
    public function showLandingHomeScreen(): void
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
        $data['sent'] = isset($_GET['sent']);
        $this->render('landing/contact', 'landing-layout', $data);
    }

    // POST /contact — messages aren't stored yet; confirm and return to the page
    public function submitContactForm(): void
    {
        $this->redirect('/contact?sent=1');
    }

    // POST /classes/book — members go to their classes, visitors sign up first
    public function bookClass(): void
    {
        $classId = (int) ($_POST['class_id'] ?? 0);

        if (!empty($_SESSION['user_id']) && empty($_SESSION['is_staff'])) {
            $this->redirect('/member/classes');
        }
        $this->redirect('/onboarding/class' . ($classId ? '?class=' . $classId : ''));
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
