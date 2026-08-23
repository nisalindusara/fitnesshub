<?php
// app/controllers/OnboardingController.php
// The entry choose — not a wizard over one resource, so it
// doesn't extend OnboardingFlowController; it just routes to the others.

class OnboardingController extends Controller
{
    public function start() {}          // GET  /onboarding — show membership plans + "browse plans?" prompt
    public function browsePlans() {}    // POST /onboarding/browse-plans — Yes -> redirect /onboarding/membership, No -> /onboarding/classes-prompt
    public function classesPrompt() {}  // GET  /onboarding/classes-prompt
    public function browseClasses() {}  // POST /onboarding/browse-classes — Yes -> /onboarding/class, No -> /onboarding/store-prompt
    public function storePrompt() {}    // GET  /onboarding/store-prompt
    public function browseStore() {}    // POST /onboarding/browse-store — Yes -> /onboarding/store, No -> /onboarding/personal-info
    public function personalInfo() {}       // GET  /onboarding/personal-info — bare registration, no plan/class/store
    public function storePersonalInfo() {}  // POST -> create bare account -> dashboard
}
