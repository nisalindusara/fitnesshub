<?php
// $navBySections comes from $_SESSION['nav'], set at login.
// Falls back to empty array defensively — e.g. if this partial is ever
// reached by an actor type nav wasn't computed for.
$navBySections = $_SESSION['nav'] ?? [];
?>

<nav class="sidebar-nav">
    <?php foreach ($navBySections as $section => $items): ?>
        <div class="nav-section">
            <div class="nav-section-label"><?= htmlspecialchars(ucfirst($section)) ?></div>

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