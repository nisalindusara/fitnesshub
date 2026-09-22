<?php

$permissions = $_SESSION['permissions'] ?? [];

$navItems = [
    // Operations — everything except the storefront
    ['section' => 'Operations', 'label' => 'Overview', 'icon' => 'pie-chart', 'route' => '/dashboard-super-admin', 'permission' => 'view_overview'],

    ['section' => 'Operations', 'label' => 'Members', 'icon' => 'users', 'route' => '/members', 'permission' => 'manage_members'],
    ['section' => 'Operations', 'label' => 'Membership Plans', 'icon' => 'id-card', 'route' => '/membership-plans', 'permission' => 'manage_membership_plans'],

    ['section' => 'Operations', 'label' => 'Classes', 'icon' => 'folder', 'route' => '/classes', 'permission' => 'manage_classes'],
    ['section' => 'Operations', 'label' => 'Personal Training', 'icon' => 'user-check', 'route' => '/personal-training', 'permission' => 'manage_personal_training'],
    ['section' => 'Operations', 'label' => 'Staff Availability', 'icon' => 'calendar', 'route' => '/staff-availability', 'permission' => 'manage_staff_schedule'],
    ['section' => 'Operations', 'label' => 'Attendance', 'icon' => 'clipboard-check', 'route' => '/attendance', 'permission' => 'manage_attendance'],

    ['section' => 'Operations', 'label' => 'Messages', 'icon' => 'message-circle', 'route' => '/messages', 'permission' => 'manage_messages'],
    ['section' => 'Operations', 'label' => 'Notifications', 'icon' => 'bell', 'route' => '/notifications', 'permission' => 'manage_notifications'],
    ['section' => 'Operations', 'label' => 'Support', 'icon' => 'headset', 'route' => '/support', 'permission' => 'handle_support_tickets'],

    ['section' => 'Operations', 'label' => 'Payments', 'icon' => 'credit-card', 'children' => [
        ['label' => 'Transactions', 'icon' => 'bar-chart', 'route' => '/payments/transactions', 'permission' => 'view_payments_overview'],
        ['label' => 'Bank Slip Verification', 'icon' => 'file-check', 'route' => '/payments/bank-slips', 'permission' => 'verify_bank_slips'],
    ]],

    ['section' => 'Operations', 'label' => 'Assigned Plans', 'icon' => 'clipboard-list', 'route' => '/action-plans', 'permission' => 'manage_action_plans'],
    ['section' => 'Operations', 'label' => 'Adherence Tracking', 'icon' => 'activity', 'route' => '/adherence', 'permission' => 'view_adherence'],

    ['section' => 'Operations', 'label' => 'Equipment', 'icon' => 'tool', 'route' => '/equipment', 'permission' => 'manage_equipment'],
    ['section' => 'Operations', 'label' => 'Facility Map', 'icon' => 'map', 'route' => '/facility-map', 'permission' => 'view_facility_map'],

    ['section' => 'Operations', 'label' => 'Reports', 'icon' => 'trending-up', 'route' => '/reports', 'permission' => 'view_reports'],
    ['section' => 'Operations', 'label' => 'At-Risk Members', 'icon' => 'alert-triangle', 'route' => '/reports/at-risk', 'permission' => 'view_at_risk_members'],

    // eCommerce — storefront only
    ['section' => 'eCommerce', 'label' => 'Store', 'icon' => 'box', 'route' => '/store', 'permission' => 'manage_inventory'],
    ['section' => 'eCommerce', 'label' => 'Orders', 'icon' => 'package', 'route' => '/portal/orders', 'permission' => 'manage_orders'],
];

$visibleNav = [];
foreach ($navItems as $item) {
    if (isset($item['children'])) {
        $visibleChildren = array_values(array_filter(
            $item['children'],
            fn($child) => in_array($child['permission'], $permissions, true)
        ));

        if (count($visibleChildren) > 1) {
            $visibleNav[] = $item + ['type' => 'dropdown', 'children' => $visibleChildren];
        } elseif (count($visibleChildren) === 1) {
            $visibleNav[] = $visibleChildren[0] + ['type' => 'link', 'section' => $item['section']];
        }
    } else {
        if (in_array($item['permission'], $permissions, true)) {
            $visibleNav[] = $item + ['type' => 'link'];
        }
    }
}

// Group by section, preserving order of first appearance
$navBySections = [];
foreach ($visibleNav as $item) {
    $navBySections[$item['section']][] = $item;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'FitnessHub') ?></title>
    <link rel="stylesheet" href="/assets/css/tokens.css">
    <link rel="stylesheet" href="/assets/css/sidebar.css">
    <link rel="stylesheet" href="/assets/css/portals.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>

    <?php include __DIR__ . '/../partials/_icon-sprite.php'; ?>

    <aside class="staff-shell__sidebar">
        <div class="sidebar-logo">
            <img src="/assets/images/logo_bg_removed.png" alt="FitnessHub" width="28" height="28">
        </div>

        <nav class="sidebar-nav">
            <?php foreach ($navBySections as $section => $items): ?>
                <div class="nav-section">
                    <div class="nav-section-label"><?= htmlspecialchars($section) ?></div>

                    <?php foreach ($items as $item): ?>
                        <?php if ($item['type'] === 'dropdown'): ?>
                            <fh-nav-dropdown
                                label="<?= htmlspecialchars($item['label']) ?>"
                                icon="<?= htmlspecialchars($item['icon']) ?>"
                                current-route="<?= htmlspecialchars($currentRoute ?? '') ?>">
                                <?php foreach ($item['children'] as $child): ?>
                                    <fh-nav-item
                                        slot="child"
                                        icon="<?= htmlspecialchars($child['icon']) ?>"
                                        label="<?= htmlspecialchars($child['label']) ?>"
                                        route="<?= htmlspecialchars($child['route']) ?>"
                                        active="<?= $currentRoute === $child['route'] ? 'true' : 'false' ?>">
                                    </fh-nav-item>
                                <?php endforeach; ?>
                            </fh-nav-dropdown>
                        <?php else: ?>
                            <fh-nav-item
                                icon="<?= htmlspecialchars($item['icon']) ?>"
                                label="<?= htmlspecialchars($item['label']) ?>"
                                route="<?= htmlspecialchars($item['route']) ?>"
                                active="<?= $currentRoute === $item['route'] ? 'true' : 'false' ?>">
                            </fh-nav-item>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </nav>

        <div class="sidebar-bottom">
            <a href="/account" class="fh-nav-item__link">
                <svg class="fh-nav-item__icon" width="20" height="20">
                    <use href="#icon-account"></use>
                </svg>
                <span>Account</span>
            </a>
        </div>
    </aside>

    <main class="staff-shell__content">
        <?= $content ?>
    </main>

    <script type="module" src="/assets/js/fh-nav-item.js"></script>
    <script type="module" src="/assets/js/fh-nav-dropdown.js"></script>

</body>

</html>