<?php
$pageStyles = ['staff/staff/preview-screen'];
/*
 * Generic staff list screen, used by pages whose feature isn't built yet
 * (they pass sample data) and by simple list pages. Same look as My Clients.
 *
 * $pageTitle  string
 * $subtitle   string
 * $isSample   bool     show the "Sample data" tag (default true)
 * $actions    [['label' => ..., 'href' => ..., 'primary' => bool, 'permission' => key|[keys]], ...]
 *             An action with a 'permission' is only shown to users who have one of them.
 * $stats      [['label' => ..., 'value' => ..., 'meta' => ..., 'alert' => bool], ...]
 * $flash      ['type' => 'success|error', 'message' => ...] shown above the page
 * $table      ['title' => ..., 'columns' => [...], 'rows' => [[cell, ...], ...], 'links' => [href|null, ...], 'empty' => ...]
 *             A cell is a string, or ['text' => ..., 'sub' => ...] for two lines,
 *             or ['tag' => ..., 'tone' => 'neutral|success|warning|danger'].
 */
$isSample = $isSample ?? true;
$actions  = array_filter($actions ?? [], fn($a) => !isset($a['permission']) || Gate::any((array) $a['permission']));
$stats    = $stats ?? [];
$table    = $table ?? null;
$flash    = $flash ?? null;

$renderCell = function ($cell): string {
    if (is_array($cell) && isset($cell['tag'])) {
        $tone = in_array($cell['tone'] ?? 'neutral', ['neutral', 'success', 'warning', 'danger'], true) ? $cell['tone'] : 'neutral';
        return '<span class="ps-tag ps-tag--' . $tone . '">' . htmlspecialchars((string) $cell['tag']) . '</span>';
    }
    if (is_array($cell)) {
        return '<p class="ps-primary">' . htmlspecialchars((string) ($cell['text'] ?? '')) . '</p>'
            . (isset($cell['sub']) ? '<p class="ps-secondary">' . htmlspecialchars((string) $cell['sub']) . '</p>' : '');
    }
    return htmlspecialchars((string) $cell);
};
?>

<div class="ps-view">
    <?php if ($flash): ?>
        <div class="ps-flash ps-flash--<?= $flash['type'] === 'error' ? 'error' : 'success' ?>" role="<?= $flash['type'] === 'error' ? 'alert' : 'status' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>
    <div class="ps-head">
        <div>
            <h1 class="ps-title">
                <?= htmlspecialchars($pageTitle) ?>
                <?php if ($isSample): ?><span class="ps-sample" title="This screen isn't connected to real data yet">Sample data</span><?php endif; ?>
            </h1>
            <?php if (!empty($subtitle)): ?><p class="ps-subtitle"><?= htmlspecialchars($subtitle) ?></p><?php endif; ?>
        </div>
        <?php if ($actions): ?>
            <div class="ps-actions">
                <?php foreach ($actions as $action): ?>
                    <a class="ps-btn<?= !empty($action['primary']) ? ' ps-btn--primary' : '' ?>" href="<?= htmlspecialchars($action['href']) ?>"><?= htmlspecialchars($action['label']) ?></a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($stats): ?>
        <section class="ps-stats">
            <?php foreach ($stats as $stat): ?>
                <div class="ps-stat<?= !empty($stat['alert']) ? ' ps-stat--alert' : '' ?>">
                    <p class="ps-stat__label"><?= htmlspecialchars($stat['label']) ?></p>
                    <p class="ps-stat__value"><?= htmlspecialchars((string) $stat['value']) ?></p>
                    <?php if (!empty($stat['meta'])): ?><p class="ps-stat__meta"><?= htmlspecialchars($stat['meta']) ?></p><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>

    <?php if ($table): ?>
        <section class="ps-panel">
            <?php if (!empty($table['title'])): ?><h2 class="ps-panel__title"><?= htmlspecialchars($table['title']) ?></h2><?php endif; ?>
            <?php if (empty($table['rows'])): ?>
                <p class="ps-empty"><?= htmlspecialchars($table['empty'] ?? 'Nothing here yet.') ?></p>
            <?php else: ?>
                <div class="ps-table-wrap">
                    <table class="ps-table">
                        <thead>
                            <tr>
                                <?php foreach ($table['columns'] as $column): ?><th><?= htmlspecialchars($column) ?></th><?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($table['rows'] as $i => $row): ?>
                                <?php $link = $table['links'][$i] ?? null; ?>
                                <tr<?= $link ? ' class="is-link" data-href="' . htmlspecialchars($link) . '"' : '' ?>>
                                    <?php foreach ($row as $c => $cell): ?>
                                        <td>
                                            <?php if ($link && $c === 0): ?>
                                                <a class="ps-row-link" href="<?= htmlspecialchars($link) ?>"><?= $renderCell($cell) ?></a>
                                            <?php else: ?>
                                                <?= $renderCell($cell) ?>
                                            <?php endif; ?>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>
    <?php endif; ?>
</div>

<script>
    // Whole row is clickable; the first cell holds a real link for keyboard users
    document.querySelectorAll('.ps-table tr.is-link').forEach(row => {
        row.addEventListener('click', (e) => {
            if (!e.target.closest('a')) window.location.href = row.dataset.href;
        });
    });
</script>
