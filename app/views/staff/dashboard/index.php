<div class="dashboard-toolbar">
    <?php foreach ($visibleSections as $key => $section): ?>
        <a href="/portal?section=<?= htmlspecialchars($key) ?>"
            class="dashboard-toolbar__tab<?= $key === $activeKey ? ' dashboard-toolbar__tab--active' : '' ?>">
            <?= htmlspecialchars($section['label']) ?>
        </a>
    <?php endforeach; ?>
</div>

<div class="dashboard-content">
    <?php require __DIR__ . '/_' . $activeSection['partial'] . '.php'; ?>
</div>