<?php

require_once __DIR__ . '/../../core/Controller.php';

class AnalyticsController extends Controller
{
    public function showUnregisteredUserAnalyticsScreen(): void
    {
        $this->render('analytics_module/unregistered_user_analytics','member-layout');
    }
}