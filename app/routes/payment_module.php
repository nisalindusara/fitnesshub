<?php

$router->get('/portal/payments', [PaymentController::class, 'showPaymentListScreen']);
$router->get('/portal/payments/add-cash-payment', [PaymentController::class, 'showAddCashPaymentScreen']);
$router->get('/portal/payments/payment-settings', [PaymentController::class, 'showPyamentSettingScreen']);
$router->get('/portal/payments/review-bank-transfers', [PaymentController::class, 'showReviewBankTransferScreen']);
