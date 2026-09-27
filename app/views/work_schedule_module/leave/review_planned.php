<?php
include __DIR__ . '/_shared.php';

$start = new DateTimeImmutable($request['start_date']);
$end = new DateTimeImmutable($request['end_date']);
$submitted = new DateTimeImmutable($request['submitted_at']);
$noticeDays = (int) (new DateTimeImmutable($submitted->format('Y-m-d')))->diff($start)->format('%r%a');
[$statusClass, $statusLabel] = $lvStatusChips[$request['status']];
?>

<div class="page-header">
    <nav class="lv-crumbs" aria-label="Breadcrumb">
        <span>Work Schedule</span>
        <span class="lv-crumbs__sep">/</span>
        <span>Leave Management</span>
        <span class="lv-crumbs__sep">/</span>
        <span class="lv-crumbs__current" aria-current="page">Planned Holiday</span>
    </nav>
</div>

<div class="lv-page">
    <?php if ($error): ?>
        <div class="lv-alert" role="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="lv-head">
        <div>
            <h1 class="lv-title">Planned Holiday Request</h1>
            <p class="lv-subtitle">Review the request and affected sessions before making a decision.</p>
        </div>
        <a class="lv-back" href="<?= htmlspecialchars($backUrl) ?>">← Back to Leave Management</a>
    </div>

    <section class="lv-card" aria-labelledby="lv-info-title">
        <div class="lv-card__head">
            <h2 class="lv-card__title" id="lv-info-title">Request Information</h2>
        </div>
        <div class="lv-fields">
            <div>
                <span class="lv-field__label">Instructor</span>
                <span class="lv-field__value"><?= $lvAvatar($request['first_name'], $request['last_name'], 'lv-avatar--lg') ?><?= htmlspecialchars($lvName($request['first_name'], $request['last_name'])) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Leave type</span>
                <span class="lv-field__value"><?= htmlspecialchars($leaveTypes[$request['leave_type']]) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Start date</span>
                <span class="lv-field__value"><?= $start->format('F j, Y') ?></span>
            </div>
            <div>
                <span class="lv-field__label">End date</span>
                <span class="lv-field__value"><?= $end->format('F j, Y') ?></span>
            </div>
            <div>
                <span class="lv-field__label">Reason</span>
                <span class="lv-field__value"><?= htmlspecialchars($request['reason']) ?></span>
            </div>
            <div>
                <span class="lv-field__label">Submitted date</span>
                <span class="lv-field__value"><?= $submitted->format('F j, Y') ?></span>
            </div>
            <div>
                <span class="lv-field__label">Notice period</span>
                <span class="lv-field__value"><?= $noticeDays >= 0 ? $noticeDays . ' day' . ($noticeDays === 1 ? '' : 's') : 'Submitted after the start' ?></span>
            </div>
            <div>
                <span class="lv-field__label">Request status</span>
                <span class="lv-chip <?= $statusClass ?>"><?= $statusLabel ?></span>
            </div>
        </div>
    </section>

    <?php include __DIR__ . '/_affected_table.php'; ?>

    <?php include __DIR__ . '/_decision.php'; ?>
</div>
