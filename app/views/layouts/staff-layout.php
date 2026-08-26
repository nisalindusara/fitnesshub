<?php

/**
 * Nav structure lives here as a plain array, gated by the same permission
 * keys used everywhere else in the app (Gate::allows / $_SESSION['permissions']).
 * Collapse rule for items with children:
 * - 0 visible children -> item omitted entirely
 * - 1 visible child   -> that child replaces the parent (its own label/icon/route)
 * - 2+ visible children -> renders as a dropdown
 */

$permissions = $_SESSION['permissions'] ?? [];

$navItems = [
    ['label' => 'Overview', 'icon' => 'pie-chart', 'route' => '/dashboard-super-admin', 'permission' => 'view_overview'],
    ['label' => 'Attendance', 'icon' => 'clipboard-check', 'route' => '/attendance', 'permission' => 'manage_attendance'],
    ['label' => 'Members', 'icon' => 'users', 'route' => '/members', 'permission' => 'manage_members'],
    ['label' => 'Support', 'icon' => 'headset', 'route' => '/support', 'permission' => 'handle_support_tickets'],
    ['label' => 'Classes', 'icon' => 'folder', 'route' => '/classes', 'permission' => 'manage_classes'],
    ['label' => 'Facility', 'icon' => 'building', 'route' => '/facility', 'permission' => 'manage_equipment'],
    ['label' => 'Payments', 'icon' => 'credit-card', 'children' => [
        ['label' => 'Payments Overview', 'icon' => 'bar-chart', 'route' => '/payments/overview', 'permission' => 'view_payments_overview'],
        ['label' => 'Add Payment', 'icon' => 'plus-circle', 'route' => '/payments/add', 'permission' => 'add_payment'],
    ]],
    ['label' => 'Store', 'icon' => 'box', 'route' => '/store', 'permission' => 'manage_inventory'],
    ['label' => 'Orders', 'icon' => 'package', 'route' => '/orders', 'permission' => 'manage_orders'],
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
            $visibleNav[] = $visibleChildren[0] + ['type' => 'link'];
        }
        // 0 visible children -> omitted
    } else {
        if (in_array($item['permission'], $permissions, true)) {
            $visibleNav[] = $item + ['type' => 'link'];
        }
    }
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
</head>

<body>

    <?php include __DIR__ . '/../partials/_icon-sprite.php'; ?>

    <div class="staff-shell">
        <aside class="staff-shell__sidebar">
            <nav class="sidebar-nav">
                <?php foreach ($visibleNav as $item): ?>
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
            </nav>
        </aside>

        <main class="staff-shell__content">
            <?= $content ?>
        </main>
    </div>

    <script type="module" src="/assets/js/fh-nav-item.js"></script>
    <script type="module" src="/assets/js/fh-nav-dropdown.js"></script>

</body>

</html>