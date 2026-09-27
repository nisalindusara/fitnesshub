<?php
include __DIR__ . '/_shared.php';

$leaveDate = new DateTimeImmutable($request['start_date']);
$submitted = new DateTimeImmutable($request['submitted_at']);
[$statusClass, $statusLabel] = $lvStatusChips[$request['status']];

// Countdown to the first affected session that hasn't started yet — the time left to
// decide before members turn up to a session with no instructor
$deadline = null;
foreach ($sessions as $s) {
    $startsAt = new DateTimeImmutable($s['session_date'] . ' ' . $s['start_time']);
    if ($startsAt > new DateTimeImmutable() && ($deadline === null || $startsAt < $deadline)) {
        $deadline = $startsAt;
    }
}
?>
<style>
    .lv-countdown {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 16px;
        flex-wrap: wrap;
    }

    .lv-countdown__label {
        display: block;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.45);
    }

    .lv-countdown__row {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-top: 4px;
    }

    .lv-countdown__time {
        font-size: 34px;
        font-weight: 700;
        letter-spacing: -0.02em;
        font-variant-numeric: tabular-nums;
    }

    .lv-countdown__sub {
        display: block;
        margin-top: 2px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }
</style>

<div class="page-header">
    <nav class="lv-crumbs" aria-label="Breadcrumb">
        <span>Work Schedule</span>
        <span class="lv-crumbs__sep">/</span>
        <span>Leave Management</span>
        <span class="lv-crumbs__sep">/</span>
        <span class="lv-crumbs__current" aria-current="page">Immediate Leave</span>
    </nav>
</div>

<div class="lv-page">
    <?php if ($error): ?>
        <div class="lv-alert" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="lv-head">
        <div>
            <h1 class="lv-title">Immediate Leave</h1>
            <p class="lv-subtitle">Short-notice request — decide before the first affected session starts.</p>
        </div>
        <a class="lv-back" href="<?= htmlspecialchars($backUrl) ?>">← Back to Leave Management</a>
    </div>

    <section class="lv-card" aria-labelledby="lv-info-title">
        <div class="lv-card__head">
            <h2 class="lv-card__title" id="lv-info-title">Request Information</h2>
        </div>
        <div class="lv-fields lv-fields--3">
            <div>
                <span class="lv-field__label">Instructor</span>
                <span class="lv-field__value"><?= $lvAvatar($request['first_name'], $request['last_name'], 'lv-avatar--lg') ?><?= htmlspecialchars($lvName($request['first_name'], $request['last_name'])) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Leave type</span>
                <span class="lv-field__value"><?= htmlspecialchars($leaveTypes[$request['leave_type']]) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Leave date</span>
                <span class="lv-field__value"><?= $leaveDate->format('F j, Y') ?></span>
                <span class="lv-field__sub">Full day</span>
            </div>
            <div>
                <span class="lv-field__label">Reason</span>
                <span class="lv-field__value"><?= htmlspecialchars($request['reason']) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Submitted time</span>
                <span class="lv-field__value"><?= $submitted->format('h:i A') ?></span>
                <span class="lv-field__sub"><?= htmlspecialchars($submitted->format('M j') . ' · ' . $lvAgo($request['submitted_at'])) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Request status</span>
                <span class="lv-chip <?= $statusClass ?>"><?= $statusLabel ?></span>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/_affected_table.php'; ?>

    <div class="lv-countdown">
        <div>
            <span class="lv-countdown__label">Cancellation time remaining</span>
            <div class="lv-countdown__row">
                <span class="lv-countdown__time" id="lv-countdown" data-deadline="<?= $deadline ? $deadline->format(DATE_ATOM) : '' ?>" role="timer" aria-live="off">
                    <?= $deadline ? '' : '00:00' ?>
                </span>
                <span class="lv-chip <?= $deadline ? 'lv-chip--green' : 'lv-chip--grey' ?>" id="lv-countdown-chip"><?= $deadline ? 'Available' : 'Closed' ?></span>
            </div>
            <span class="lv-countdown__sub" id="lv-countdown-sub">
                <?= $deadline
                    ? 'Until the first affected session starts at ' . $deadline->format('H:i') . ($deadline->format('Y-m-d') !== date('Y-m-d') ? ' on ' . $deadline->format('M j') : '') . '.'
                    : ($sessions ? 'All affected sessions have already started.' : 'No sessions are affected.') ?>
            </span>
        </div>
    </div>

    <?php include __DIR__ . '/_decision.php'; ?>
</div>

<script>
    (function () {
        const el = document.getElementById('lv-countdown');
        if (!el.dataset.deadline) return;
        const deadline = new Date(el.dataset.deadline).getTime();
        const chip = document.getElementById('lv-countdown-chip');
        const pad = n => String(n).padStart(2, '0');

        function tick() {
            const left = Math.max(0, Math.floor((deadline - Date.now()) / 1000));
            const h = Math.floor(left / 3600);
            const m = Math.floor(left % 3600 / 60);
            const s = left % 60;
            el.textContent = h ? `${pad(h)}:${pad(m)}:${pad(s)}` : `${pad(m)}:${pad(s)}`;
            if (!left) {
                chip.className = 'lv-chip lv-chip--grey';
                chip.textContent = 'Closed';
                document.getElementById('lv-countdown-sub').textContent = 'The first affected session has started.';
                clearInterval(timer);
            }
        }

        const timer = setInterval(tick, 1000);
        tick();
    })();
</script>
