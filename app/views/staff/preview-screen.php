<?php
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
<style>
    .ps-view {
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
        padding: 24px 28px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
    }

    .ps-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        flex-wrap: wrap;
    }

    .ps-title {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .ps-subtitle {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        margin: 4px 0 0;
    }

    .ps-sample {
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0;
        padding: 3px 8px;
        border-radius: 6px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.6);
    }

    .ps-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .ps-btn {
        display: inline-flex;
        align-items: center;
        height: 36px;
        padding: 0 16px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: #1c1c1c;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        white-space: nowrap;
        transition: background-color 0.15s ease;
    }

    .ps-btn:hover {
        background: #f7f9fb;
    }

    .ps-btn--primary {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .ps-btn--primary:hover {
        background: #333333;
    }

    .ps-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
    }

    .ps-stat {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        padding: 18px 18px 16px;
    }

    .ps-stat--alert {
        background: #fdf0f0;
        border-color: #f6d5d5;
    }

    .ps-stat__label {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.55);
        margin: 0;
    }

    .ps-stat__value {
        font-size: 26px;
        font-weight: 700;
        margin: 8px 0 10px;
        letter-spacing: -0.02em;
    }

    .ps-stat__meta {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
        margin: 0;
    }

    .ps-stat--alert .ps-stat__label,
    .ps-stat--alert .ps-stat__value {
        color: #b42318;
    }

    .ps-panel {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        padding: 18px;
    }

    .ps-panel__title {
        font-size: 15px;
        font-weight: 600;
        margin: 0 0 8px;
    }

    .ps-table-wrap {
        overflow-x: auto;
    }

    .ps-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .ps-table th {
        font-size: 13px;
        font-weight: 400;
        color: rgba(28, 28, 28, 0.5);
        padding: 12px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
        white-space: nowrap;
    }

    .ps-table td {
        padding: 12px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
        vertical-align: middle;
        font-size: 14px;
    }

    .ps-table tbody tr:last-child td {
        border-bottom: none;
    }

    .ps-table tr.is-link {
        cursor: pointer;
    }

    .ps-table tr.is-link:hover td {
        background: #f7f9fb;
    }

    .ps-row-link {
        color: inherit;
        text-decoration: none;
    }

    .ps-primary {
        font-weight: 600;
        margin: 0;
    }

    .ps-secondary {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin: 1px 0 0;
    }

    .ps-tag {
        display: inline-block;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 6px;
        white-space: nowrap;
    }

    .ps-tag--neutral {
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.7);
    }

    .ps-tag--success {
        background: #ecfdf3;
        color: #146c3a;
    }

    .ps-tag--warning {
        background: #fff6e5;
        color: #9a5b00;
    }

    .ps-tag--danger {
        background: #fdecec;
        color: #b42318;
    }

    .ps-flash {
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 14px;
        border: 1px solid transparent;
    }

    .ps-flash--success {
        background: #ecfdf3;
        border-color: #c6f0d6;
        color: #146c3a;
    }

    .ps-flash--error {
        background: #fdf0f0;
        border-color: #f6d5d5;
        color: #b42318;
    }

    .ps-empty {
        text-align: center;
        padding: 32px 0;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    @media (max-width: 600px) {
        .ps-view {
            padding: 20px 16px;
        }
    }
</style>

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
