<?php
// Onboarding wizard

$router->get('/onboarding', [OnboardingController::class, 'start']);
$router->get('/onboarding/membership', [OnboardingController::class, 'browsePlans']);
$router->get('/onboarding/class', [OnboardingController::class, 'browseClasses']);
$router->get('/onboarding/store', [OnboardingController::class, 'browseStore']);
$router->get('/onboarding/payment-summary', [OnboardingController::class, 'showPaymentSummary']);
$router->get('/onboarding/confirmation', [OnboardingController::class, 'showOnboardConfirmation']);

$router->get('/onboarding/membership/select-goal', [MembershipOnboardingController::class, 'showSelectGoal']);
$router->get('/onboarding/membership/coach-recommend', [MembershipOnboardingController::class, 'showCoachRecommend']);
$router->get('/onboarding/membership/select-coach', [MembershipOnboardingController::class, 'showSelectCoach']);
$router->get('/onboarding/membership/want-session', [MembershipOnboardingController::class, 'showWantSession']);
$router->get('/onboarding/membership/pick-date', [MembershipOnboardingController::class, 'showPickDate']);
$router->get('/onboarding/membership/select-session', [MembershipOnboardingController::class, 'showSelectSession']);
