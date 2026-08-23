<?php
// app/controllers/MembershipOnboardingController.php

class MembershipOnboardingController extends OnboardingFlowController
{
    protected string $flowKey = 'membership';

    public function selectGoal() {}         // GET  /onboarding/membership
    public function storeGoal() {}          // POST — save goal, redirect select-instructor

    public function selectInstructor() {}   // GET
    public function storeInstructor() {}    // POST — if "no instructor", skip to enrollClassesPrompt

    public function selectSession() {}      // GET — PT slot picker; loops on "change instructor" internally
    public function storeSession() {}       // POST — validate slot still available, redirect enroll-classes

    public function enrollClassesPrompt() {} // GET — Yes -> select-classes, No -> personal-info
    public function selectClasses() {}       // GET
    public function storeClasses() {}        // POST -> personal-info

    public function personalInfo() {}       // GET
    public function storePersonalInfo() {}  // POST -> payment

    public function payment() {}            // GET
    public function completePayment() {}    // POST — this is the final commit:
    // call Membership::createFromOnboarding($this->getFlowData())
    // then $this->clearFlowData(); redirect to dashboard
}
