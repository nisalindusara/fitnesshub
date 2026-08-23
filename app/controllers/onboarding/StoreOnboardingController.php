<?php
// app/controllers/StoreOnboardingController.php

class StoreOnboardingController extends OnboardingFlowController
{
    protected string $flowKey = 'store';

    public function personalInfo() {}       // GET  /onboarding/store
    public function storePersonalInfo() {}  // POST -> address

    public function address() {}
    public function storeAddress() {}       // POST -> payment

    public function payment() {}
    public function completePayment() {}    // commit: Order::createFromOnboarding(...)
}
