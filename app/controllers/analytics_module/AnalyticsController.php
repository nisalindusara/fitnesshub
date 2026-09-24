<?php

class AnalyticsController
{
    public function showUnregisteredUserAnalyticsScreen()
    {
        // Adjust the relative path if your controller is inside app/controllers/
        require_once __DIR__ . '/routes/analytics_module.php';
    }
}