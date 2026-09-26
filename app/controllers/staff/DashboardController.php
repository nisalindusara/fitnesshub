<?php

class DashboardController extends Controller
{
    private const SECTIONS = [
        'daily-overview'     => [
            'label'      => 'Daily Overview',
            'permission' => 'view_daily_overview',
            'dataMethod' => 'getDailyOverview',
            'partial'    => 'daily-overview',
        ],
        'ecommerce-overview' => [
            'label'      => 'eCommerce Overview',
            'permission' => 'view_ecommerce_overview',
            'dataMethod' => 'getEcommerceOverview',
            'partial'    => 'ecommerce-overview',
        ],
        'system-overview'    => [
            'label'      => 'System Overview',
            'permission' => 'view_system_overview',
            'dataMethod' => 'getSystemOverview',
            'partial'    => 'system-overview',
        ],
        'manager-summary'    => [
            'label'      => 'Manager Summary',
            'permission' => 'view_manager_summary',
            'dataMethod' => 'getManagerSummary',
            'partial'    => 'manager-summary',
        ],
    ];

    private const DEFAULT_SECTION_BY_ROLE = [
        'receptionist'    => 'daily-overview',
        'ecommerce_admin' => 'ecommerce-overview',
        'super_admin'     => 'system-overview',
        'manager'         => 'manager-summary',
    ];

    public function showDashboardIndexScreen(): void
    {
        $permissions = $_SESSION['permissions'] ?? [];
        $roleName    = $_SESSION['role_name'] ?? null;

        $visibleSections = array_filter(
            self::SECTIONS,
            fn($section) => in_array($section['permission'], $permissions, true)
        );

        $requested = $_GET['section'] ?? null;
        if ($requested !== null && isset($visibleSections[$requested])) {
            $activeKey = $requested;
        } else {
            $roleDefault = self::DEFAULT_SECTION_BY_ROLE[$roleName] ?? null;
            $activeKey = ($roleDefault !== null && isset($visibleSections[$roleDefault]))
                ? $roleDefault
                : array_key_first($visibleSections);
        }

        $activeSection = self::SECTIONS[$activeKey];

        $reportingService = new ReportingService();
        $data = $reportingService->{$activeSection['dataMethod']}();

        $this->render('staff/dashboard/index', 'staff-layout', [
            'pageTitle'       => $activeSection['label'],
            'visibleSections' => $visibleSections,
            'activeKey'       => $activeKey,
            'activeSection'   => $activeSection,
            'data'            => $data,
        ]);
    }
}
