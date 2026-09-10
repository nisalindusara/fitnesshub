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
require_once __DIR__ . '/../app/controllers/ProductController.php';

$router = new Router();

$router->get('/', [LandingController::class, "index"]);
$router->get('/classes', [LandingController::class, "class"]);
$router->get('/contact', [LandingController::class, "contact"]);
$router->get('/about', [LandingController::class, "about"]);
$router->get('/privacy-policy', [LandingController::class, "privacyPolicy"]);
$router->get('/terms-of-conditions', [LandingController::class, "termsOfConditions"]);

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
$router->get('/portal/orders/view', [OrderController::class, 'show'], 'manage_orders');
$router->get('/portal/products/search', [ProductController::class, 'searchVariants'], 'manage_orders');
$router->get('/portal/products/add-order', [OrderController::class, 'showAddOrder'], 'manage_orders');
$router->get('/portal/orders/create', [OrderController::class, 'create'], 'manage_orders');
$router->post('/portal/orders', [OrderController::class, 'store'], 'manage_orders');
$router->get('/portal/products/search', [ProductController::class, 'searchVariants'], 'manage_orders');
$router->get('/portal/members/search', [MemberController::class, 'search'], 'manage_orders');

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
