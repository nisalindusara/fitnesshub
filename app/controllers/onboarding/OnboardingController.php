<?php

require_once __DIR__ . '/../../core/Controller.php';

class OnboardingController extends Controller
{
    public function start()
    {
        $this->render('onboarding/start', 'minimal');
    }
    public function browsePlans()
    {
        $this->render('onboarding/browse-plans', 'minimal');
    }
    public function browseClasses()
    {
        $this->render('onboarding/view-classes', 'minimal');
    }
    public function browseStore()
    {
        $this->render('onboarding/view-store', 'minimal');
    }
}
