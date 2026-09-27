<?php

class PaymentController extends Controller
{
    public function showPaymentListScreen(): void
    {
        $this->render('payment_module/payment-list', 'staff-layout');
    }

    public function showAddCashPaymentScreen(): void
    {
        $this->render('payment_module/add-cash-payment', 'staff-layout');
    }

    public function showPyamentSettingScreen(): void
    {
        $this->render('payment_module/payment-setting', 'staff-layout');
    }

    public function showReviewBankTransferScreen(): void
    {
        $this->render('payment_module/review-bank-transfers', 'staff-layout');
    }
}
