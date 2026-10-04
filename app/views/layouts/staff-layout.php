<?php

$permissions = $_SESSION['permissions'] ?? [];
$firstName   = $_SESSION['user_name'] ?? '';
$lastName    = $_SESSION['user_last_name'] ?? '';

$fullName = trim($firstName . ' ' . $lastName);
$avatar   = $_SESSION['user_avatar'] ?? null;
$initials = mb_strtoupper(mb_substr($firstName, 0, 1) . mb_substr($lastName, 0, 1));
$role     = $_SESSION['role_name'] ?? '';

/*
 * Items with 'children' are groups. When a user can see many links, each
 * group with 2+ visible children renders as an <fh-nav-dropdown>. Users with
 * short menus (receptionist, instructor, e-commerce admin) get the children
 * as plain links instead, since their menu already fits.
 *
 * Duplicate labels are dropped (first one wins). "My Work" is listed first so
 * instructors keep their own Attendance / Adherence / Messages links.
 */
$navItems = [
    // Instructor: only shown to users with view_own_clients ('requires'),
    // so managers with the same permissions don't get these links at the top.
    ['section' => 'My Work', 'label' => 'Overview', 'icon' => 'pie-chart', 'route' => '/portal/instructor', 'permission' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'My Clients', 'icon' => 'users', 'route' => '/portal/clients', 'permission' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'My Schedule', 'icon' => 'calendar', 'route' => '/portal/schedule', 'permission' => 'view_own_schedule', 'requires' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'Attendance', 'icon' => 'clipboard-check', 'route' => '/portal/attendance', 'permission' => 'manage_attendance', 'requires' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'Adherence Tracking', 'icon' => 'activity', 'route' => '/portal/adherence', 'permission' => 'view_adherence', 'requires' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'Meal Plan Requests', 'icon' => 'clipboard-list', 'route' => '/portal/meal-plan-requests', 'permission' => 'manage_action_plans', 'requires' => 'view_own_clients'],
    ['section' => 'My Work', 'label' => 'Messages', 'icon' => 'message-circle', 'route' => '/portal/messages', 'permission' => 'manage_messages', 'requires' => 'view_own_clients'],

    // Operations
    // Same permissions as the /portal route: any one of the dashboard sections
    ['section' => 'Operations', 'label' => 'Overview', 'icon' => 'pie-chart', 'route' => '/portal', 'permission' => ['view_daily_overview', 'view_ecommerce_overview', 'view_system_overview', 'view_manager_summary']],

    ['section' => 'Operations', 'label' => 'Members', 'icon' => 'users', 'children' => [
        ['label' => 'Members', 'icon' => 'users', 'route' => '/portal/members', 'permission' => 'manage_members'],
        ['label' => 'Membership Plans', 'icon' => 'id-card', 'route' => '/portal/membership-plans', 'permission' => 'manage_membership_plans'],
    ]],

    ['section' => 'Operations', 'label' => 'Scheduling', 'icon' => 'calendar', 'children' => [
        ['label' => 'Classes', 'icon' => 'folder', 'route' => '/portal/classes', 'permission' => 'manage_classes'],
        ['label' => 'Personal Training', 'icon' => 'user-check', 'route' => '/portal/personal-training', 'permission' => 'manage_personal_training'],
        ['label' => 'Instructor Sessions', 'icon' => 'calendar', 'route' => '/portal/instructor-sessions', 'permission' => 'manage_schedule'],
        ['label' => 'Staff Availability', 'icon' => 'calendar', 'route' => '/portal/staff-availability', 'permission' => 'manage_schedule'],
        ['label' => 'Leave Requests', 'icon' => 'calendar', 'route' => '/portal/leave-requests', 'permission' => 'manage_leave_requests'],
        ['label' => 'Attendance', 'icon' => 'clipboard-check', 'route' => '/portal/attendance', 'permission' => 'manage_attendance'],
    ]],

    ['section' => 'Operations', 'label' => 'Communication', 'icon' => 'message-circle', 'children' => [
        ['label' => 'Messages', 'icon' => 'message-circle', 'route' => '/portal/messages', 'permission' => 'manage_messages'],
        ['label' => 'Notifications', 'icon' => 'bell', 'route' => '/portal/notifications', 'permission' => 'manage_notifications'],
        ['label' => 'Support', 'icon' => 'headset', 'route' => '/portal/support-tickets', 'permission' => 'handle_support_tickets'],
        ['label' => 'Staff Requests', 'icon' => 'headset', 'route' => '/portal/staff-requests', 'permission' => 'manage_leave_requests'],
    ]],

    ['section' => 'Operations', 'label' => 'Payments', 'icon' => 'credit-card', 'children' => [
        ['label' => 'Transactions', 'icon' => 'bar-chart', 'route' => '/portal/payments', 'permission' => 'view_payments_overview'],
        ['label' => 'Record Payment', 'icon' => 'credit-card', 'route' => '/portal/payments/record', 'permission' => 'add_payment'],
        ['label' => 'Bank Slip Verification', 'icon' => 'file-check', 'route' => '/portal/payments/bank-slips', 'permission' => 'verify_bank_slips'],
        ['label' => 'Payment Settings', 'icon' => 'settings', 'route' => '/portal/payments/settings', 'permission' => 'change_payment_settings'],
    ]],

    ['section' => 'Operations', 'label' => 'Training', 'icon' => 'clipboard-list', 'children' => [
        ['label' => 'Assigned Plans', 'icon' => 'clipboard-list', 'route' => '/portal/action-plans', 'permission' => 'manage_action_plans'],
        ['label' => 'Adherence Tracking', 'icon' => 'activity', 'route' => '/portal/adherence', 'permission' => 'view_adherence'],
    ]],

    ['section' => 'Operations', 'label' => 'Facility', 'icon' => 'tool', 'children' => [
        ['label' => 'Equipment', 'icon' => 'tool', 'route' => '/portal/equipment', 'permission' => 'manage_equipment'],
        ['label' => 'Facility Map', 'icon' => 'map', 'route' => '/portal/facility-map', 'permission' => 'view_facility_map'],
    ]],

    ['section' => 'Operations', 'label' => 'Insights', 'icon' => 'trending-up', 'children' => [
        ['label' => 'Reports', 'icon' => 'trending-up', 'route' => '/portal/reports', 'permission' => 'view_reports'],
        ['label' => 'At-Risk Members', 'icon' => 'alert-triangle', 'route' => '/portal/reports/at-risk', 'permission' => 'view_at_risk_members'],
    ]],

    // eCommerce
    ['section' => 'eCommerce', 'label' => 'eCommerce', 'icon' => 'package', 'children' => [
        ['label' => 'Orders', 'icon' => 'package', 'route' => '/portal/orders', 'permission' => 'manage_orders'],
        ['label' => 'Products', 'icon' => 'box', 'route' => '/portal/products', 'permission' => 'manage_inventory'],
        ['label' => 'Categories', 'icon' => 'tag', 'route' => '/portal/categories', 'permission' => 'manage_inventory'],
    ]],
];

// Above this many links, groups collapse into dropdowns so the menu fits the screen.
$navCollapseThreshold = 12;

// 'permission' can be a string or an array (user needs any one of them)
$canSee = fn(array $entry) => (bool) array_intersect((array) $entry['permission'], $permissions)
    && (!isset($entry['requires']) || in_array($entry['requires'], $permissions, true));

// Pass 1: filter by permission and drop duplicate labels.
$seenLabels = [];
$filtered   = [];
$linkCount  = 0;

foreach ($navItems as $item) {
    if (isset($item['children'])) {
        $children = [];
        foreach ($item['children'] as $child) {
            if ($canSee($child) && !isset($seenLabels[$child['label']])) {
                $seenLabels[$child['label']] = true;
                $children[] = $child;
            }
        }
        if ($children) {
            $filtered[] = array_merge($item, ['children' => $children]);
            $linkCount += count($children);
        }
    } elseif ($canSee($item) && !isset($seenLabels[$item['label']])) {
        $seenLabels[$item['label']] = true;
        $filtered[] = $item;
        $linkCount++;
    }
}

$useDropdowns = $linkCount > $navCollapseThreshold;

// Pass 2: groups become dropdowns (long menus) or plain links (short menus).
$visibleNav = [];
foreach ($filtered as $item) {
    if (isset($item['children'])) {
        if ($useDropdowns && count($item['children']) > 1) {
            $visibleNav[] = $item + ['type' => 'dropdown'];
        } else {
            foreach ($item['children'] as $child) {
                $visibleNav[] = $child + ['type' => 'link', 'section' => $item['section']];
            }
        }
    } else {
        $visibleNav[] = $item + ['type' => 'link'];
    }
}

// Highlight the nav item for the current page, or for its closest parent
// (e.g. /portal/orders/view highlights Orders). Views can still pass $activeNavRoute.
$currentRoute = $currentRoute ?? '';
if (!isset($activeNavRoute)) {
    $activeNavRoute = '';
    foreach ($navItems as $item) {
        foreach ($item['children'] ?? [$item] as $entry) {
            $route = $entry['route'];
            $matches = $currentRoute === $route || str_starts_with($currentRoute, $route . '/');
            if ($matches && $route !== '/portal' && strlen($route) > strlen($activeNavRoute)) {
                $activeNavRoute = $route;
            }
        }
    }
    if ($activeNavRoute === '' && $currentRoute === '/portal') {
        $activeNavRoute = '/portal';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'FitnessHub') ?></title>
    <?php $surfaceStyle = 'staff';
    include __DIR__ . '/../partials/_stylesheets.php'; ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
</head>

<body<?= isset($bodyClass) ? ' class="' . htmlspecialchars($bodyClass) . '"' : '' ?>>

    <?php include __DIR__ . '/../partials/_icon-sprite.php'; ?>

    <aside class="staff-shell__sidebar">
        <div class="sidebar-logo">
            <img src="/assets/images/logo_bg_removed.png" alt="FitnessHub">
        </div>

        <nav class="sidebar-nav" aria-label="Staff navigation">
            <?php foreach ($visibleNav as $item): ?>
                <?php if ($item['type'] === 'dropdown'): ?>
                    <fh-nav-dropdown
                        label="<?= htmlspecialchars($item['label']) ?>"
                        icon="<?= htmlspecialchars($item['icon']) ?>"
                        current-route="<?= htmlspecialchars($activeNavRoute) ?>">
                        <?php foreach ($item['children'] as $child): ?>
                            <fh-nav-item
                                slot="child"
                                icon="<?= htmlspecialchars($child['icon']) ?>"
                                label="<?= htmlspecialchars($child['label']) ?>"
                                route="<?= htmlspecialchars($child['route']) ?>"
                                active="<?= $activeNavRoute === $child['route'] ? 'true' : 'false' ?>">
                            </fh-nav-item>
                        <?php endforeach; ?>
                    </fh-nav-dropdown>
                <?php else: ?>
                    <fh-nav-item
                        icon="<?= htmlspecialchars($item['icon']) ?>"
                        label="<?= htmlspecialchars($item['label']) ?>"
                        route="<?= htmlspecialchars($item['route']) ?>"
                        active="<?= $activeNavRoute === $item['route'] ? 'true' : 'false' ?>">
                    </fh-nav-item>
                <?php endif; ?>
            <?php endforeach; ?>
        </nav>

        <div class="sidebar-bottom">
            <div class="fh-account">
                <a href="/portal/profile" class="fh-account-top<?= $currentRoute === '/portal/profile' ? ' fh-account-top--active' : '' ?>" aria-label="View your profile">
                    <?php if (!empty($avatar)): ?>
                        <img
                            src="<?= htmlspecialchars('/' . ltrim($avatar, '/')) ?>"
                            alt="<?= htmlspecialchars($fullName) ?>"
                            class="fh-account__avatar">
                    <?php else: ?>
                        <div class="fh-account__avatar fh-account__avatar--placeholder">
                            <?= htmlspecialchars($initials) ?>
                        </div>
                    <?php endif; ?>
                    <div class="fh-account__text">
                        <span class="fh-account__name"><?= htmlspecialchars($fullName) ?></span>
                        <span class="fh-account__role"><?= htmlspecialchars($role) ?></span>
                    </div>
                </a>
                <div class="fh-account-bottom">
                    <form action="/logout" method="post"><button type="submit" class="fh-account__button">Logout</button></form>
                </div>
            </div>
        </div>
    </aside>

    <main class="staff-shell__content <?= htmlspecialchars($pageClass ?? '') ?>">
        <?= $content ?>
    </main>

    <?php $assetVersion = fn(string $path) => @filemtime(($_SERVER['DOCUMENT_ROOT'] ?? '') . $path) ?: time(); ?>
    <script type="module" src="/assets/js/fh-nav-item.js?v=<?= $assetVersion('/assets/js/fh-nav-item.js') ?>"></script>
    <script type="module" src="/assets/js/fh-nav-dropdown.js?v=<?= $assetVersion('/assets/js/fh-nav-dropdown.js') ?>"></script>

</body>

</html>