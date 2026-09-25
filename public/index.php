<?php

require_once __DIR__ . '/../app/bootstrap.php';

$router = new Router();

require __DIR__ . '/../app/routes/landing.php';
require __DIR__ . '/../app/routes/auth.php';
require __DIR__ . '/../app/routes/onboarding.php';
require __DIR__ . '/../app/routes/account_module.php';
require __DIR__ . '/../app/routes/analytics_module.php';
require __DIR__ . '/../app/routes/class_pt_module.php';
require __DIR__ . '/../app/routes/communication_module.php';
require __DIR__ . '/../app/routes/daily_plan_module.php';
require __DIR__ . '/../app/routes/ecommerce_module.php';
require __DIR__ . '/../app/routes/equipment_module.php';
require __DIR__ . '/../app/routes/payment_module.php';
require __DIR__ . '/../app/routes/work_schedule_module.php';
require __DIR__ . '/../app/routes/dashboard.php';
require __DIR__ . '/../app/routes/member-pages.php';

$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
