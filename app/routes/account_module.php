<?php
// Account & Membership

$router->get('/dashboard', [MemberController::class, 'dashboard']);
$router->get('/portal/members/search', [MemberController::class, 'search'], 'manage_orders');
