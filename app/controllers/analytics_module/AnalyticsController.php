<?php

class AnalyticsController extends Controller
{
    public function showUserAnalyticsScreen(): void
    {
        $this->render('analytics_module/user_analytics', 'member-layout');
    }

    public function showMemberAnalyticsScreen(): void
    {
        $this->render('analytics_module/member_analytics', 'member-layout');
    }
}
