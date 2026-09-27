<?php

class MemberScreenController extends Controller
{
    public function showMemberPersonalDetailsScreen(): void
    {
        $this->render('member/personal-details', 'member-layout');
    }
    public function showMemberOrderHistoryScreen(): void
    {
        $this->render('member/order-history', 'member-layout');
    }
    public function showMemberOrderDetailsScreen(): void
    {
        $this->render('member/order-detail', 'member-layout');
    }
    public function showMemberPaymentHistoryScreen(): void
    {
        $this->render('member/payment-history', 'member-layout');
    }
    public function showMemberNotificationSettingsScreen(): void
    {
        $this->render('member/notification-settings', 'member-layout');
    }
    public function showMemberPrivacyDataScreen(): void
    {
        $this->render('member/privacy-data', 'member-layout');
    }
}
