<?php
// Account & Membership
$router->get('/portal/members/search', [MemberController::class, 'search'], 'manage_orders');

// Membership Plan Management CRUD
$router->get('/membership-plans', [MembershipPlanController::class, 'index'], 'manage_membership_plans');
$router->get('/membership-plans/create', [MembershipPlanController::class, 'create'], 'manage_membership_plans');
$router->post('/membership-plans/store', [MembershipPlanController::class, 'store'], 'manage_membership_plans');
$router->get('/membership-plans/show', [MembershipPlanController::class, 'show'], 'manage_membership_plans');
$router->get('/membership-plans/edit', [MembershipPlanController::class, 'edit'], 'manage_membership_plans');
$router->post('/membership-plans/update', [MembershipPlanController::class, 'update'], 'manage_membership_plans');
$router->post('/membership-plans/deactivate', [MembershipPlanController::class, 'deactivate'], 'manage_membership_plans');
