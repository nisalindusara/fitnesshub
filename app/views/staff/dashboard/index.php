<style>
    .dashboard-toolbar {
        display: flex;
        gap: 32px;
        border-bottom: 1px solid #e2e8f0;
        margin-bottom: 32px;
        padding-top: 16px;
        padding-left: 16px;
    }

    .dashboard-toolbar__tab {
        padding: 0 0 16px 0;
        color: #a0aec0;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
    }

    .dashboard-toolbar__tab--active {
        color: #1a202c;
        font-weight: 700;
        border-bottom: 2px solid #1a202c;
    }

    .dashboard-content {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        background-color: #ffffff;
        padding: 32px;
        padding-top: 0;
        margin: 0 auto;
        box-sizing: border-box;
        color: #1a202c;
    }
</style>

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