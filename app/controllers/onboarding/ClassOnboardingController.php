<?php
// app/controllers/ClassOnboardingController.php
// "Modified membership flow" = same shape as MembershipOnboardingController
// minus the enroll-classes/select-classes branch (they're already here to join one).
// If that reuse feels like real duplication once you build it, a shared
// trait (e.g. GoalInstructorSessionSteps) between this and
// MembershipOnboardingController is a reasonable follow-up refactor —
// not worth doing before either flow actually has logic in it.

class ClassOnboardingController extends OnboardingFlowController
{
    protected string $flowKey = 'class';

    public function browsePlansPrompt() {} // GET  /onboarding/class
    public function browsePlans() {}       // POST — Yes -> select-goal, No -> personal-info

    public function selectGoal() {}
    public function storeGoal() {}
    public function selectInstructor() {}
    public function storeInstructor() {}
    public function selectSession() {}
    public function storeSession() {}      // -> personal-info

    public function personalInfo() {}
    public function storePersonalInfo() {} // -> payment

    public function payment() {}
    public function completePayment() {}   // commit: Membership + ClassEnrollment together
}
