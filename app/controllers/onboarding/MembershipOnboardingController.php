<?php
// app/controllers/MembershipOnboardingController.php

class MembershipOnboardingController extends OnboardingFlowController
{
    protected string $flowKey = 'membership';

    public function showSelectGoal()
    {
        $this->render('onboarding/membership/select-goal', 'minimal');
    }
    public function showCoachRecommend()
    {
        $this->render('onboarding/membership/coach-recommend', 'minimal');
    }
    public function showSelectCoach()
    {
        $this->render('onboarding/membership/select-coach', 'minimal');
    }
    public function showWantSession()
    {
        $this->render('onboarding/membership/want-session', 'minimal');
    }
    public function showPickDate()
    {
        $this->render('onboarding/membership/pick-date', 'minimal');
    }
    public function showSelectSession()
    {
        $this->render('onboarding/membership/select-session', 'minimal');
    }
}
