<style>
    .io-view {
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
    }

    .io-view *,
    .io-view *::before,
    .io-view *::after {
        box-sizing: border-box;
    }

    /* Welcome band */
    .io-hero {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin: 16px 0 0;
        padding: 24px 28px;
        background: #f7f9fb;
    }

    .io-hero__title {
        font-size: 22px;
        font-weight: 700;
        letter-spacing: -0.01em;
        margin: 0;
    }

    .io-hero__text {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.65);
        margin: 6px 0 0;
    }

    .io-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 34px;
        padding: 0 14px;
        border-radius: 6px;
        border: 1px solid rgba(28, 28, 28, 0.15);
        background: #ffffff;
        color: #1c1c1c;
        font-family: inherit;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
    }

    .io-btn--primary {
        height: 38px;
        padding: 0 18px;
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
        font-size: 14px;
    }

    .io-btn--primary:hover {
        background: #333333;
    }

    .io-btn--danger {
        background: #8f1111;
        border-color: #8f1111;
        color: #ffffff;
    }

    .io-btn--ghost {
        border-color: transparent;
        background: transparent;
        color: #8f1111;
    }

    .io-body {
        padding: 24px 28px 32px;
        display: flex;
        flex-direction: column;
        gap: 28px;
    }

    /* Stat cards */
    .io-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .io-stat {
        position: relative;
        overflow: hidden;
        min-height: 92px;
        padding: 16px;
        border-radius: 12px;
        background: #eef0f3;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        gap: 18px;
    }

    .io-stat::after {
        content: "";
        position: absolute;
        top: -48px;
        right: -40px;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        background: rgba(28, 28, 28, 0.05);
        pointer-events: none;
    }

    .io-stat--alert {
        background: #fbd5d5;
        color: #8f1111;
    }

    .io-stat--alert::after {
        background: rgba(143, 17, 17, 0.06);
    }

    .io-stat__head {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        position: relative;
    }

    .io-stat__icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: rgba(28, 28, 28, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .io-stat--alert .io-stat__icon {
        background: rgba(143, 17, 17, 0.1);
    }

    .io-stat__foot {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        position: relative;
    }

    .io-stat__value {
        font-size: 20px;
        font-weight: 600;
        line-height: 1;
    }

    .io-badge {
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 4px;
        background: rgba(28, 28, 28, 0.08);
        color: rgba(28, 28, 28, 0.6);
        white-space: nowrap;
    }

    .io-stat--alert .io-badge {
        background: rgba(143, 17, 17, 0.1);
        color: #8f1111;
    }

    .io-trend {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.55);
    }

    .io-link {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        font-size: 12px;
        font-weight: 500;
        color: #1c1c1c;
        text-decoration: none;
    }

    .io-link:hover {
        text-decoration: underline;
    }

    /* Two columns */
    .io-columns {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 260px;
        gap: 24px;
        align-items: start;
    }

    .io-section-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .io-section-title {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 16px;
        font-weight: 600;
        margin: 0;
    }

    .io-section-title--alert {
        color: #8f1111;
    }

    .io-date {
        font-size: 11px;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.6);
    }

    /* Schedule */
    .io-schedule {
        border-radius: 10px;
        overflow: hidden;
        background: #eef0f3;
        overflow-x: auto;
    }

    .io-table {
        width: 100%;
        min-width: 520px;
        border-collapse: collapse;
        text-align: left;
    }

    .io-table th {
        font-size: 10px;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: rgba(28, 28, 28, 0.6);
        padding: 12px 16px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
    }

    .io-table td {
        padding: 14px 16px;
        font-size: 13px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
    }

    .io-table tr:last-child td {
        border-bottom: none;
    }

    .io-row--completed td {
        color: rgba(28, 28, 28, 0.5);
    }

    .io-row--next td {
        background: #e2e4e8;
    }

    .io-row--next td:first-child {
        box-shadow: inset 3px 0 0 #1c1c1c;
    }

    .io-time {
        font-size: 13px;
    }

    .io-row--next .io-time {
        font-weight: 600;
        color: #1c1c1c;
    }

    .io-time__note {
        display: block;
        font-size: 11px;
        margin-top: 2px;
    }

    .io-who {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .io-avatar {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #d9dce1;
        color: rgba(28, 28, 28, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .io-avatar--class {
        background: #cfe3f5;
        color: #2a5d8a;
        font-size: 13px;
        font-weight: 500;
    }

    .io-who__name {
        display: block;
        font-weight: 600;
        color: inherit;
        text-decoration: none;
    }

    a.io-who__name:hover {
        text-decoration: underline;
    }

    .io-row--completed .io-who__name {
        font-weight: 500;
    }

    .io-who__detail {
        display: block;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.55);
        margin-top: 1px;
    }

    .io-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        white-space: nowrap;
    }

    .io-status::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
    }

    .io-status--completed {
        color: rgba(28, 28, 28, 0.5);
    }

    .io-status--next {
        color: #1c1c1c;
        font-weight: 600;
    }

    .io-status--scheduled {
        color: rgba(28, 28, 28, 0.6);
    }

    .io-status--scheduled::before {
        background: #b7b3e6;
    }

    /* Adherence alerts */
    .io-side {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .io-alert {
        display: flex;
        gap: 12px;
        padding: 14px;
        border-radius: 10px;
        background: #eef0f3;
    }

    .io-alert--high {
        background: #fbd5d5;
        color: #8f1111;
    }

    .io-alert__name {
        font-size: 13px;
        font-weight: 600;
        margin: 2px 0 4px;
        color: #1c1c1c;
    }

    .io-alert--high .io-alert__name {
        color: #8f1111;
    }

    .io-alert__text {
        font-size: 12px;
        line-height: 1.45;
        margin: 0;
    }

    .io-alert__actions {
        display: flex;
        gap: 6px;
        margin-top: 10px;
    }

    .io-alert__actions .io-btn {
        height: 26px;
        padding: 0 10px;
        font-size: 11px;
    }

    .io-empty {
        padding: 20px 14px;
        border-radius: 10px;
        background: #eef0f3;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.55);
        text-align: center;
    }

    /* Capacity */
    .io-capacity {
        margin-top: 12px;
        padding: 16px 14px;
        border-radius: 10px;
        background: #eef0f3;
    }

    .io-capacity__title {
        font-size: 13px;
        font-weight: 600;
        margin: 0 0 12px;
    }

    .io-capacity__row {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.6);
        margin-bottom: 8px;
    }

    .io-capacity__row strong {
        color: #1c1c1c;
    }

    .io-bar {
        height: 6px;
        border-radius: 999px;
        background: rgba(28, 28, 28, 0.08);
        overflow: hidden;
    }

    .io-bar__fill {
        height: 100%;
        border-radius: 999px;
        background: #1c1c1c;
    }

    @media (max-width: 1100px) {
        .io-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .io-columns {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 600px) {
        .io-hero,
        .io-body {
            padding-left: 16px;
            padding-right: 16px;
        }

        .io-stats {
            grid-template-columns: 1fr;
        }
    }
</style>

<?php
$initialsOf = function (string $name): string {
    $parts = preg_split('/\s+/', trim($name));
    return mb_strtoupper(mb_substr($parts[0], 0, 1) . mb_substr(end($parts), 0, 1));
};

$statusLabels = [
    'completed' => 'Completed',
    'next' => 'Up Next',
    'scheduled' => 'Scheduled',
];

$capacityPercent = $capacity['total'] > 0 ? round($capacity['booked'] / $capacity['total'] * 100) : 0;
?>

<div class="page-header">
    <button class="icon-btn" type="button" aria-label="Toggle sidebar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="9" y1="3" x2="9" y2="21"></line>
        </svg>
    </button>
    <button class="icon-btn" type="button" aria-label="Add to favorites">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
    </button>
    <span class="page-title">Overview</span>
</div>

<div class="io-view">
    <section class="io-hero">
        <div>
            <h1 class="io-hero__title"><?= htmlspecialchars($greeting) ?>, <?= htmlspecialchars($firstName) ?>.</h1>
            <p class="io-hero__text">Here is your daily overview. You have a busy schedule and a few clients needing attention.</p>
        </div>
        <button type="button" class="io-btn io-btn--primary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            New Session
        </button>
    </section>

    <div class="io-body">
        <section class="io-stats">
            <div class="io-stat">
                <div class="io-stat__head">
                    <span class="io-stat__icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </span>
                    Sessions Today
                </div>
                <div class="io-stat__foot">
                    <span class="io-stat__value"><?= (int) $stats['sessions']['value'] ?></span>
                    <span class="io-badge"><?= htmlspecialchars($stats['sessions']['badge']) ?></span>
                </div>
            </div>

            <div class="io-stat">
                <div class="io-stat__head">
                    <span class="io-stat__icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </span>
                    Active Clients
                </div>
                <div class="io-stat__foot">
                    <span class="io-stat__value"><?= (int) $stats['clients']['value'] ?></span>
                    <span class="io-trend">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <?= htmlspecialchars($stats['clients']['trend']) ?>
                    </span>
                </div>
            </div>

            <div class="io-stat">
                <div class="io-stat__head">
                    <span class="io-stat__icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </span>
                    Unread Messages
                </div>
                <div class="io-stat__foot">
                    <span class="io-stat__value"><?= (int) $stats['messages']['value'] ?></span>
                    <a href="/messages" class="io-link">View All
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="io-stat io-stat--alert">
                <div class="io-stat__head">
                    <span class="io-stat__icon">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"></path>
                        </svg>
                    </span>
                    Adherence Alerts
                </div>
                <div class="io-stat__foot">
                    <span class="io-stat__value"><?= (int) $stats['alerts']['value'] ?></span>
                    <span class="io-badge">Needs Review</span>
                </div>
            </div>
        </section>

        <div class="io-columns">
            <section>
                <div class="io-section-head">
                    <h2 class="io-section-title">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        Today's Schedule
                    </h2>
                    <span class="io-date"><?= htmlspecialchars($today) ?></span>
                </div>

                <div class="io-schedule">
                    <table class="io-table">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Client / Class</th>
                                <th>Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($schedule as $session): ?>
                                <tr class="io-row--<?= htmlspecialchars($session['status']) ?>">
                                    <td>
                                        <span class="io-time"><?= htmlspecialchars($session['time']) ?></span>
                                        <?php if ($session['note']): ?>
                                            <span class="io-time__note"><?= htmlspecialchars($session['note']) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="io-who">
                                            <?php if ($session['member_id'] !== null): ?>
                                                <span class="io-avatar"><?= htmlspecialchars($initialsOf($session['name'])) ?></span>
                                            <?php else: ?>
                                                <span class="io-avatar io-avatar--class"><?= htmlspecialchars(mb_substr($session['name'], 0, 1)) ?></span>
                                            <?php endif; ?>
                                            <div>
                                                <?php if ($session['member_id'] !== null): ?>
                                                    <a class="io-who__name" href="/my-clients/client?member=<?= (int) $session['member_id'] ?>"><?= htmlspecialchars($session['name']) ?></a>
                                                <?php else: ?>
                                                    <span class="io-who__name"><?= htmlspecialchars($session['name']) ?></span>
                                                <?php endif; ?>
                                                <span class="io-who__detail"><?= htmlspecialchars($session['detail']) ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?= htmlspecialchars($session['type']) ?></td>
                                    <td>
                                        <span class="io-status io-status--<?= htmlspecialchars($session['status']) ?>">
                                            <?= $statusLabels[$session['status']] ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <aside>
                <div class="io-section-head">
                    <h2 class="io-section-title io-section-title--alert">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path>
                        </svg>
                        Client Adherence
                    </h2>
                </div>

                <div class="io-side" id="io-alerts">
                    <?php foreach ($alerts as $alert): ?>
                        <div class="io-alert io-alert--<?= htmlspecialchars($alert['severity']) ?>">
                            <span class="io-avatar"><?= htmlspecialchars($initialsOf($alert['name'])) ?></span>
                            <div>
                                <p class="io-alert__name"><?= htmlspecialchars($alert['name']) ?></p>
                                <p class="io-alert__text"><?= htmlspecialchars($alert['message']) ?></p>
                                <div class="io-alert__actions">
                                    <?php if ($alert['severity'] === 'high'): ?>
                                        <a href="/messages" class="io-btn io-btn--danger">Message</a>
                                        <button type="button" class="io-btn io-btn--ghost" data-dismiss>Dismiss</button>
                                    <?php else: ?>
                                        <a href="/my-clients/client?member=<?= (int) $alert['member_id'] ?>" class="io-btn">Review Log</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <p class="io-empty" id="io-alerts-empty" <?= empty($alerts) ? '' : 'hidden' ?>>No clients need attention right now.</p>
                </div>

                <div class="io-capacity">
                    <p class="io-capacity__title">Weekly Capacity</p>
                    <div class="io-capacity__row">
                        <span>Sessions booked</span>
                        <strong><?= (int) $capacity['booked'] ?> / <?= (int) $capacity['total'] ?></strong>
                    </div>
                    <div class="io-bar">
                        <div class="io-bar__fill" style="width: <?= $capacityPercent ?>%"></div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>

<script>
    // UI only — dismissing hides the alert on this page; it isn't saved yet
    document.querySelectorAll('#io-alerts [data-dismiss]').forEach(btn => btn.addEventListener('click', () => {
        btn.closest('.io-alert').remove();
        document.getElementById('io-alerts-empty').hidden = document.querySelectorAll('#io-alerts .io-alert').length > 0;
    }));
</script>
