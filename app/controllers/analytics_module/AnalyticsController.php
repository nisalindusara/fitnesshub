<?php

class AnalyticsController extends Controller
{
    public function showUserAnalyticsScreen(): void
    {
        $this->render('analytics_module/user_analytics', 'member-layout');
    }
}
