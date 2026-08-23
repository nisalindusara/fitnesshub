<?php
// app/controllers/DayPassOnboardingController.php

class DayPassOnboardingController extends OnboardingFlowController
{
    protected string $flowKey = 'day-pass';

    public function selectInstructor() {}  // GET  /onboarding/day-pass
    public function storeInstructor() {}   // POST — No instructor -> straight to personal-info

    public function sessions() {}          // GET — available PT sessions this week; "change instructor/date" loops back here
    public function storeSession() {}      // POST -> personal-info

    public function personalInfo() {}
    public function storePersonalInfo() {} // -> payment

    public function payment() {}
    public function completePayment() {}   // commit: DayPass::createFromOnboarding(...)
}
