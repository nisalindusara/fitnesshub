<?php

$router->get('/portal/payments', [PaymentController::class, 'showPaymentListScreen'], 'view_payments_overview');
$router->get('/portal/payments/record', [PaymentController::class, 'showAddCashPaymentScreen'], 'add_payment');
$router->get('/portal/payments/bank-slips', [PaymentController::class, 'showReviewBankTransferScreen'], 'verify_bank_slips');
$router->get('/portal/payments/settings', [PaymentController::class, 'showPyamentSettingScreen'], 'change_payment_settings');
