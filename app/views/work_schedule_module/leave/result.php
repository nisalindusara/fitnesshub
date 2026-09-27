<?php
include __DIR__ . '/_shared.php';

$status = $request['status'];
$start = new DateTimeImmutable($request['start_date']);
$end = new DateTimeImmutable($request['end_date']);
$days = (int) $start->diff($end)->days + 1;
$instructorName = $lvName($request['first_name'], $request['last_name']);
$firstName = $request['first_name'];
$deciderName = $lvName($request['decided_first_name'], $request['decided_last_name']) ?: 'a manager';
$cancellerName = $lvName($request['cancelled_first_name'], $request['cancelled_last_name']) ?: 'a manager';
$completedAt = new DateTimeImmutable($request['cancelled_at'] ?? $request['decided_at']);
[$statusClass, $statusLabel] = $lvStatusChips[$status];

if ($start == $end) {
    $dateRange = $start->format('M j, Y');
} elseif ($start->format('Y-m') === $end->format('Y-m')) {
    $dateRange = $start->format('M j') . '–' . $end->format('j, Y');
} else {
    $dateRange = $start->format('M j') . ' – ' . $end->format('M j, Y');
}

// The three headline numbers depend on what the manager did
$stats = match ($status) {
    'approved'  => [
        ['Replacements assigned', $counts['replaced'], 'moved to another instructor', 'green', 'user-check'],
        ['Sessions cancelled', $counts['cancelled'], 'no instructor available', 'red', 'calendar-x'],
    ],
    'rejected'  => [
        ['Sessions kept', $counts['kept'], "stay with {$firstName}", 'green', 'user-check'],
        ['Schedule changes', 0, 'nothing was reassigned', 'grey', 'calendar-x'],
    ],
    'cancelled' => [
        ['Replacements reversed', $counts['reverted'], "back with {$firstName}", 'orange', 'user-check'],
        ['Sessions restored', $counts['restored'], 'put back on the schedule', 'blue', 'calendar-x'],
    ],
};

$resultChips = [
    'replaced'  => ['lv-chip--green', 'Replacement Assigned'],
    'cancelled' => ['lv-chip--red', 'Session Cancelled'],
    'kept'      => ['lv-chip--grey', 'Kept'],
    'reverted'  => ['lv-chip--orange', 'Reverted'],
    'restored'  => ['lv-chip--blue', 'Restored'],
];

$icons = [
    'calendar'   => '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><circle cx="12" cy="15" r="2"/>',
    'user-check' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><polyline points="16 11 18 13 22 9"/>',
    'calendar-x' => '<rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/><line x1="10" y1="14" x2="14" y2="18"/><line x1="14" y1="14" x2="10" y2="18"/>',
];
$icon = fn(string $name): string => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $icons[$name] . '</svg>';
?>
<style>
    .lv-stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
    }

    .lv-stat {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 16px 18px;
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        background: #fff;
    }

    .lv-stat__icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .lv-stat__icon--blue {
        background: #eaf1ff;
        color: #1d4ed8;
    }

    .lv-stat__icon--green {
        background: #e9f8ef;
        color: #146c3a;
    }

    .lv-stat__icon--red {
        background: #fdecec;
        color: #c0262d;
    }

    .lv-stat__icon--orange {
        background: #fff1e6;
        color: #c2410c;
    }

    .lv-stat__icon--grey {
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.6);
    }

    .lv-stat__label {
        display: block;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.45);
    }

    .lv-stat__value {
        display: flex;
        align-items: baseline;
        gap: 8px;
        margin-top: 2px;
    }

    .lv-stat__value strong {
        font-size: 26px;
        font-weight: 700;
    }

    .lv-stat__value span {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }

    .lv-decision {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        flex-wrap: wrap;
        padding: 12px 18px;
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        background: #fff;
    }

    .lv-decision__label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 600;
    }

    @media (max-width: 900px) {
        .lv-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="page-header">
    <nav class="lv-crumbs" aria-label="Breadcrumb">
        <span>Work Schedule</span>
        <span class="lv-crumbs__sep">/</span>
        <span>Leave Management</span>
        <span class="lv-crumbs__sep">/</span>
        <span class="lv-crumbs__current" aria-current="page">Processing Result</span>
    </nav>
</div>

<div class="lv-page">
    <?php if ($error): ?>
        <div class="lv-alert" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="lv-head">
        <div>
            <h1 class="lv-title">Leave Processing Result</h1>
            <p class="lv-subtitle">Final session outcomes for this leave request.</p>
        </div>
        <a class="lv-back" href="<?= htmlspecialchars($backUrl) ?>">← Back to Leave Management</a>
    </div>

    <section class="lv-card" aria-labelledby="lv-info-title">
        <div class="lv-card__head">
            <h2 class="lv-card__title" id="lv-info-title">Leave Information</h2>
            <span class="lv-chip lv-chip--green lv-chip--plain">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10" /><polyline points="8 12 11 15 16 9" /></svg>
                Processing complete
            </span>
        </div>
        <div class="lv-fields">
            <div>
                <span class="lv-field__label">Instructor</span>
                <span class="lv-field__value"><?= $lvAvatar($request['first_name'], $request['last_name'], 'lv-avatar--lg') ?><?= htmlspecialchars($instructorName) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Leave type</span>
                <span class="lv-field__value"><?= htmlspecialchars($leaveTypes[$request['leave_type']]) ?></span>
                <span class="lv-field__sub"><?= htmlspecialchars($request['reason']) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Leave dates</span>
                <span class="lv-field__value"><?= htmlspecialchars($dateRange) ?></span>
                <span class="lv-field__sub"><?= $days ?> calendar day<?= $days === 1 ? '' : 's' ?></span>
            </div>
            <div>
                <span class="lv-field__label">Status</span>
                <span class="lv-chip <?= $statusClass ?>"><?= $statusLabel ?></span>
                <span class="lv-field__sub">Completed <?= $completedAt->format('M j \a\t g:i A') ?></span>
            </div>
        </div>
    </section>

    <div class="lv-stats">
        <div class="lv-stat">
            <span class="lv-stat__icon lv-stat__icon--blue"><?= $icon('calendar') ?></span>
            <div>
                <span class="lv-stat__label">Affected sessions</span>
                <span class="lv-stat__value"><strong><?= count($outcomes) ?></strong><span>reviewed automatically</span></span>
            </div>
        </div>
        <?php foreach ($stats as [$label, $value, $sub, $tone, $iconName]): ?>
            <div class="lv-stat">
                <span class="lv-stat__icon lv-stat__icon--<?= $tone ?>"><?= $icon($iconName) ?></span>
                <div>
                    <span class="lv-stat__label"><?= htmlspecialchars($label) ?></span>
                    <span class="lv-stat__value"><strong><?= (int) $value ?></strong><span><?= htmlspecialchars($sub) ?></span></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="lv-decision">
        <span class="lv-decision__label">
            <?= $status === 'cancelled' ? 'Cancellation Outcome' : 'Decision' ?>
            <?php if ($status === 'approved'): ?>
                <span class="lv-chip lv-chip--green">Approved by <?= htmlspecialchars($deciderName) ?></span>
            <?php elseif ($status === 'rejected'): ?>
                <span class="lv-chip lv-chip--red">Rejected by <?= htmlspecialchars($deciderName) ?></span>
            <?php else: ?>
                <span class="lv-chip lv-chip--red">Leave Cancelled by <?= htmlspecialchars($cancellerName) ?></span>
            <?php endif; ?>
        </span>
        <?php if ($canCancel): ?>
            <button type="button" class="lv-btn lv-btn--reject" data-open="lv-cancel-modal">Cancel Leave</button>
        <?php endif; ?>
    </div>

    <section class="lv-card" aria-labelledby="lv-sessions-title">
        <div class="lv-card__head">
            <h2 class="lv-card__title" id="lv-sessions-title">Affected Sessions <span class="lv-count"><?= count($outcomes) ?></span></h2>
            <span class="lv-card__meta">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="23 4 23 10 17 10" />
                    <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10" />
                </svg>
                Finalized <?= $completedAt->format('M j, g:i A') ?>
            </span>
        </div>

        <?php if (!$outcomes): ?>
            <p class="lv-empty"><?= htmlspecialchars($instructorName) ?> had no scheduled sessions during this leave.</p>
        <?php else: ?>
            <div class="lv-table-wrap">
                <table class="lv-table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Type</th>
                            <th scope="col">Class / Member</th>
                            <th scope="col">Original instructor</th>
                            <th scope="col">Assigned replacement</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($outcomes as $o): ?>
                            <?php
                            [$chipClass, $chipLabel] = $resultChips[$o['outcome']];
                            $hasReplacement = $o['replacement_first_name'] !== null;
                            ?>
                            <tr>
                                <td class="lv-date"><?= htmlspecialchars((new DateTimeImmutable($o['session_date']))->format('D, M j')) ?></td>
                                <td class="lv-time"><?= $lvTime($o['start_time'], $o['end_time']) ?></td>
                                <td><?= $lvType($o['session_type']) ?></td>
                                <td><?= $lvClassMember($o['notes']) ?></td>
                                <td>
                                    <span class="lv-person"><?= $lvAvatar($o['original_first_name'], $o['original_last_name']) ?><?= htmlspecialchars($lvName($o['original_first_name'], $o['original_last_name'])) ?></span>
                                </td>
                                <td>
                                    <?php if ($o['outcome'] === 'reverted' && $hasReplacement): ?>
                                        <span class="lv-person"><?= $lvAvatar($o['replacement_first_name'], $o['replacement_last_name']) ?><?= htmlspecialchars($lvName($o['replacement_first_name'], $o['replacement_last_name']) . ' → ' . $o['original_first_name']) ?></span>
                                    <?php elseif ($o['outcome'] === 'restored'): ?>
                                        <span class="lv-person"><?= $lvAvatar($o['original_first_name'], $o['original_last_name']) ?><?= htmlspecialchars($lvName($o['original_first_name'], $o['original_last_name'])) ?></span>
                                    <?php elseif ($o['outcome'] === 'replaced' && $hasReplacement): ?>
                                        <span class="lv-person"><?= $lvAvatar($o['replacement_first_name'], $o['replacement_last_name'], 'lv-avatar--green') ?><?= htmlspecialchars($lvName($o['replacement_first_name'], $o['replacement_last_name'])) ?></span>
                                    <?php else: ?>
                                        <span class="lv-muted">—</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="lv-chip lv-chip--plain <?= $chipClass ?>"><?= $chipLabel ?></span>
                                    <?php if ($o['outcome_note']): ?>
                                        <span class="lv-note <?= $o['outcome'] === 'cancelled' ? 'lv-note--red' : '' ?>"><?= htmlspecialchars($o['outcome_note']) ?></span>
                                    <?php elseif ($o['outcome'] === 'kept'): ?>
                                        <span class="lv-note">Stays with <?= htmlspecialchars($firstName) ?>.</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <p class="lv-foot-note" style="margin: 0;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10" /><line x1="12" y1="16" x2="12" y2="12" /><line x1="12" y1="8" x2="12.01" y2="8" /></svg>
            <?php if ($canCancel): ?>
                The schedule has been updated. You can still cancel this leave until it starts on <?= $start->format('M j') ?> — replacements are reversed and cancelled sessions restored where <?= htmlspecialchars($firstName) ?> is free.
            <?php else: ?>
                All processing results are final. No manual candidate assignment or action is required.
            <?php endif; ?>
        </p>
    </section>
</div>

<?php if ($canCancel): ?>
    <div class="lv-modal" id="lv-cancel-modal" hidden>
        <form class="lv-modal__box" method="post" action="/leave-requests/cancel" role="alertdialog" aria-modal="true" aria-labelledby="lv-cancel-title">
            <input type="hidden" name="id" value="<?= (int) $request['id'] ?>">
            <h2 class="lv-modal__title" id="lv-cancel-title">Cancel this approved leave?</h2>
            <p class="lv-modal__text">
                <?= htmlspecialchars($instructorName) ?> will be back on the schedule for <?= htmlspecialchars($dateRange) ?>.
                Sessions handed to replacements go back to <?= htmlspecialchars($firstName) ?>, and cancelled sessions are restored wherever <?= htmlspecialchars($firstName) ?> is still free.
            </p>
            <div class="lv-modal__actions">
                <button type="button" class="lv-btn" data-close>Keep Leave</button>
                <button type="submit" class="lv-btn lv-btn--danger">Cancel Leave</button>
            </div>
        </form>
    </div>

    <script>
        (function () {
            const modal = document.getElementById('lv-cancel-modal');
            const opener = document.querySelector('[data-open="lv-cancel-modal"]');
            const close = () => { modal.hidden = true; opener.focus(); };
            opener.addEventListener('click', () => { modal.hidden = false; modal.querySelector('[data-close]').focus(); });
            modal.addEventListener('click', e => { if (e.target === modal || e.target.closest('[data-close]')) close(); });
            document.addEventListener('keydown', e => { if (e.key === 'Escape' && !modal.hidden) close(); });
            modal.querySelector('form').addEventListener('submit', e => {
                e.target.querySelectorAll('button').forEach(b => { b.disabled = true; });
            });
        })();
    </script>
<?php endif; ?>
