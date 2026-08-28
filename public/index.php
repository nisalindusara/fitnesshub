<?php

session_start();

require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/Gate.php';
require_once __DIR__ . '/../app/controllers/LandingController.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MemberController.php';
require_once __DIR__ . '/../app/controllers/StoreController.php';
require_once __DIR__ . '/../app/controllers/onboarding/OnboardingFlowController.php'; // base class first
require_once __DIR__ . '/../app/controllers/onboarding/OnboardingController.php';
require_once __DIR__ . '/../app/controllers/onboarding/MembershipOnboardingController.php';
require_once __DIR__ . '/../app/controllers/onboarding/ClassOnboardingController.php';
require_once __DIR__ . '/../app/controllers/onboarding/DayPassOnboardingController.php';
require_once __DIR__ . '/../app/controllers/onboarding/StoreOnboardingController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/MemberManagementController.php';
require_once __DIR__ . '/../app/controllers/StaffDashboardController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/controllers/InstructorController.php';
require_once __DIR__ . '/../app/controllers/OrderController.php';

$router = new Router();

// LANDING PAGE
$router->get('/', [LandingController::class, "index"]);
$router->get('/classes', [LandingController::class, "class"]);
$router->get('/contact', [LandingController::class, "contact"]);
$router->get('/about', [LandingController::class, "about"]);
$router->get('/privacy-policy', [LandingController::class, "privacyPolicy"]);
$router->get('/terms-of-conditions', [LandingController::class, "termsOfConditions"]);

// ONBOARDING — CHOOSER
$router->get('/onboarding', [OnboardingController::class, 'start']);
$router->get('/onboarding/browse-plans', [OnboardingController::class, 'browsePlans']);
$router->get('/onboarding/view-classes', [OnboardingController::class, 'browseClasses']);
$router->get('/onboarding/view-store', [OnboardingController::class, 'browseStore']);

// MEMBERSHIP ONBOARDING FLOW
$router->get('/onboarding/membership', [MembershipOnboardingController::class, 'selectGoal']);
$router->post('/onboarding/membership/select-goal', [MembershipOnboardingController::class, 'storeGoal']);
$router->get('/onboarding/membership/select-instructor', [MembershipOnboardingController::class, 'selectInstructor']);
$router->post('/onboarding/membership/select-instructor', [MembershipOnboardingController::class, 'storeInstructor']);
$router->get('/onboarding/membership/select-session', [MembershipOnboardingController::class, 'selectSession']);
$router->post('/onboarding/membership/select-session', [MembershipOnboardingController::class, 'storeSession']);
$router->get('/onboarding/membership/enroll-classes', [MembershipOnboardingController::class, 'enrollClassesPrompt']);
$router->get('/onboarding/membership/select-classes', [MembershipOnboardingController::class, 'selectClasses']);
$router->post('/onboarding/membership/select-classes', [MembershipOnboardingController::class, 'storeClasses']);
$router->get('/onboarding/membership/personal-info', [MembershipOnboardingController::class, 'personalInfo']);
$router->post('/onboarding/membership/personal-info', [MembershipOnboardingController::class, 'storePersonalInfo']);
$router->get('/onboarding/membership/payment', [MembershipOnboardingController::class, 'payment']);
$router->post('/onboarding/membership/payment', [MembershipOnboardingController::class, 'completePayment']);

// CLASS (JOIN A CLASS) ONBOARDING FLOW — embeds a modified membership flow
$router->get('/onboarding/class', [ClassOnboardingController::class, 'browsePlansPrompt']);
$router->post('/onboarding/class/browse-plans', [ClassOnboardingController::class, 'browsePlans']);
$router->get('/onboarding/class/select-goal', [ClassOnboardingController::class, 'selectGoal']);
$router->post('/onboarding/class/select-goal', [ClassOnboardingController::class, 'storeGoal']);
$router->get('/onboarding/class/select-instructor', [ClassOnboardingController::class, 'selectInstructor']);
$router->post('/onboarding/class/select-instructor', [ClassOnboardingController::class, 'storeInstructor']);
$router->get('/onboarding/class/select-session', [ClassOnboardingController::class, 'selectSession']);
$router->post('/onboarding/class/select-session', [ClassOnboardingController::class, 'storeSession']);
$router->get('/onboarding/class/personal-info', [ClassOnboardingController::class, 'personalInfo']);
$router->post('/onboarding/class/personal-info', [ClassOnboardingController::class, 'storePersonalInfo']);
$router->get('/onboarding/class/payment', [ClassOnboardingController::class, 'payment']);
$router->post('/onboarding/class/payment', [ClassOnboardingController::class, 'completePayment']);

// ONE-DAY PASS ONBOARDING FLOW
$router->get('/onboarding/day-pass', [DayPassOnboardingController::class, 'selectInstructor']);
$router->post('/onboarding/day-pass/select-instructor', [DayPassOnboardingController::class, 'storeInstructor']);
$router->get('/onboarding/day-pass/sessions', [DayPassOnboardingController::class, 'sessions']);
$router->post('/onboarding/day-pass/sessions', [DayPassOnboardingController::class, 'storeSession']);
$router->get('/onboarding/day-pass/personal-info', [DayPassOnboardingController::class, 'personalInfo']);
$router->post('/onboarding/day-pass/personal-info', [DayPassOnboardingController::class, 'storePersonalInfo']);
$router->get('/onboarding/day-pass/payment', [DayPassOnboardingController::class, 'payment']);
$router->post('/onboarding/day-pass/payment', [DayPassOnboardingController::class, 'completePayment']);

// STORE CHECKOUT ONBOARDING FLOW
$router->get('/onboarding/store', [StoreOnboardingController::class, 'personalInfo']);
$router->post('/onboarding/store/personal-info', [StoreOnboardingController::class, 'storePersonalInfo']);
$router->get('/onboarding/store/address', [StoreOnboardingController::class, 'address']);
$router->post('/onboarding/store/address', [StoreOnboardingController::class, 'storeAddress']);
$router->get('/onboarding/store/payment', [StoreOnboardingController::class, 'payment']);
$router->post('/onboarding/store/payment', [StoreOnboardingController::class, 'completePayment']);

// STORE ROUTES
$router->get('/store', [StoreController::class, "ecommerceLandingPage"]);
$router->get('/catalog', [StoreController::class, "ecommerceCatalogue"]);
$router->get('/sample-product', [StoreController::class, "sampleProduct"]);
$router->get('/cart', [StoreController::class, "cart"]);
$router->get('/store-checkout', [StoreController::class, "ecommerceCheckout"]);

// CHECK AGAIN
$router->get('/personal-details', [AuthController::class, "personalDetails"]);
$router->post('/register-submit', [AuthController::class, "storeUser"]);
$router->get('/login', [AuthController::class, "login"]);
$router->post('/login', [AuthController::class, "authenticate"]);

// MEMBER ROUTES
$router->get('/dashboard', [MemberController::class, "dashboard"]);

// INSTRUCTOR ROUTES
$router->get('/my-clients', [InstructorController::class, 'myClients'], 'view_own_clients');

// STAFF ROUTES
$router->get('/portal/members', [MemberManagementController::class, 'index'], 'manage_members');
$router->get('/dashboard-ecom', [StaffDashboardController::class, 'ecommerceAdmin'], 'manage_inventory');
$router->get('/dashboard-super-admin', [StaffDashboardController::class, 'superAdmin'], 'register_super_admins');
$router->get('/dashboard-manager', [StaffDashboardController::class, 'manager'], 'view_overview');
$router->get('/portal/orders', [OrderController::class, 'index'], 'manage_orders');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
