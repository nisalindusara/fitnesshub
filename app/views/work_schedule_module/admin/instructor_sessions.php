<style>
    .is-page,
    .is-panel {
        --is-hour: 56px;
        --is-ink: #1c1c1c;
        --is-muted: rgba(28, 28, 28, 0.5);
        --is-line: rgba(28, 28, 28, 0.08);
        --is-accent: #2563eb;
    }

    .is-page {
        padding: 16px 24px 24px;
        font-family: 'Inter', sans-serif;
        color: var(--is-ink);
        box-sizing: border-box;
    }

    .is-page *,
    .is-page *::before,
    .is-page *::after,
    .is-panel,
    .is-panel * {
        box-sizing: border-box;
    }

    /* Toolbar */
    .is-toolbar {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px;
        margin-bottom: 12px;
        border-radius: 12px;
        background: #f7f9fb;
        flex-wrap: wrap;
    }

    .is-tool {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        height: 32px;
        min-width: 32px;
        padding: 0 8px;
        border: none;
        border-radius: 8px;
        background: none;
        color: var(--is-ink);
        font-family: inherit;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
    }

    .is-tool:hover,
    .is-tool[aria-expanded="true"] {
        background: rgba(28, 28, 28, 0.06);
    }

    .is-tool svg {
        width: 16px;
        height: 16px;
    }

    .is-tool__badge {
        min-width: 16px;
        height: 16px;
        padding: 0 4px;
        border-radius: 999px;
        background: var(--is-accent);
        color: #fff;
        font-size: 10px;
        line-height: 16px;
    }

    .is-week-label {
        font-size: 14px;
        font-weight: 600;
        margin: 0 4px;
        white-space: nowrap;
    }

    .is-search {
        position: relative;
        margin-left: auto;
    }

    .is-search svg {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 14px;
        height: 14px;
        color: var(--is-muted);
    }

    .is-search input {
        width: 200px;
        height: 32px;
        padding: 0 10px 0 30px;
        border: 1px solid var(--is-line);
        border-radius: 8px;
        background: #fff;
        font-family: inherit;
        font-size: 13px;
        outline: none;
    }

    .is-search input:focus {
        border-color: var(--is-ink);
    }

    /* Filter popover */
    .is-filter {
        position: relative;
    }

    .is-filter__pop {
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        z-index: 30;
        width: 240px;
        padding: 14px;
        border: 1px solid var(--is-line);
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 12px 32px -12px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .is-filter__pop[hidden] {
        display: none;
    }

    /* Calendar */
    .is-cal {
        border: 1px solid var(--is-line);
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
    }

    .is-cal__head,
    .is-cal__grid {
        display: grid;
        grid-template-columns: 56px repeat(7, minmax(96px, 1fr));
    }

    .is-cal__head {
        background: #f1f2f5;
        border-bottom: 1px solid var(--is-line);
    }

    .is-cal__day {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 4px;
        padding: 10px 4px 8px;
        font-size: 11px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: var(--is-muted);
    }

    .is-cal__day strong {
        font-size: 15px;
        letter-spacing: 0;
        color: var(--is-ink);
    }

    .is-cal__day.is-today {
        background: #e4e6eb;
        box-shadow: inset 0 -3px 0 var(--is-ink);
    }

    .is-cal__body {
        max-height: calc(100vh - 240px);
        min-height: 360px;
        overflow: auto;
    }

    .is-cal__times {
        position: relative;
    }

    .is-cal__time {
        height: var(--is-hour);
        padding: 0 8px;
        font-size: 11px;
        color: var(--is-muted);
        text-align: right;
        transform: translateY(-7px);
    }

    .is-cal__col {
        position: relative;
        border-left: 1px solid var(--is-line);
        background-image: linear-gradient(var(--is-line) 1px, transparent 1px);
        background-size: 100% var(--is-hour);
        cursor: copy;
    }

    .is-cal__col.is-today {
        background-color: #fafbfc;
    }

    .is-now {
        position: absolute;
        left: 0;
        right: 0;
        height: 2px;
        background: #e5484d;
        z-index: 3;
        pointer-events: none;
    }

    .is-now::before {
        content: "";
        position: absolute;
        left: -4px;
        top: -3px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #e5484d;
    }

    /* Session cards */
    .is-event {
        position: absolute;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 4px;
        padding: 6px 8px;
        border: 1px solid transparent;
        border-radius: 8px;
        background: #e3e8f2;
        color: var(--is-ink);
        font-family: inherit;
        text-align: left;
        overflow: hidden;
        cursor: pointer;
        transition: box-shadow 0.15s ease;
    }

    .is-event:hover,
    .is-event.is-open {
        box-shadow: 0 6px 16px -6px rgba(0, 0, 0, 0.25);
        z-index: 4;
    }

    .is-event.is-open {
        border-color: var(--is-ink);
    }

    .is-event:focus-visible {
        outline: 2px solid var(--is-accent);
        outline-offset: 1px;
    }

    .is-event[hidden] {
        display: none;
    }

    .is-event--class {
        background: #dff1e6;
    }

    .is-event--pt {
        background: #ece4fb;
    }

    .is-event--orientation {
        background: #fdecd6;
    }

    .is-event--meeting {
        background: #eceef1;
    }

    .is-event__title {
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .is-event__time {
        display: flex;
        align-items: center;
        gap: 4px;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.65);
        white-space: nowrap;
    }

    .is-event__who {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.7);
        min-width: 0;
    }

    .is-event__who span {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .is-event.is-short {
        flex-direction: row;
        align-items: center;
        gap: 6px;
        padding: 2px 8px;
    }

    .is-event.is-short .is-event__who span {
        display: none;
    }

    .is-avatar {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        flex-shrink: 0;
        object-fit: cover;
        background: #fff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        font-weight: 600;
        color: var(--is-muted);
    }

    .is-repeat-icon {
        width: 11px;
        height: 11px;
        flex-shrink: 0;
    }

    .is-empty-note {
        padding: 10px 14px;
        font-size: 13px;
        color: var(--is-muted);
        border-top: 1px solid var(--is-line);
    }

    /* Overlay panel */
    .is-backdrop {
        position: fixed;
        inset: 0;
        z-index: 40;
        background: rgba(15, 15, 20, 0.12);
    }

    .is-backdrop[hidden],
    .is-panel[hidden] {
        display: none;
    }

    .is-panel {
        position: fixed;
        top: 12px;
        bottom: 12px;
        right: 12px;
        z-index: 41;
        width: 340px;
        display: flex;
        flex-direction: column;
        border: 1px solid var(--is-line);
        border-radius: 14px;
        background: #fff;
        box-shadow: 0 24px 48px -16px rgba(0, 0, 0, 0.3);
        font-family: 'Inter', sans-serif;
        color: var(--is-ink);
        animation: is-slide-left 0.2s ease;
    }

    .is-panel.from-left {
        animation-name: is-slide-right;
    }

    @keyframes is-slide-left {
        from {
            opacity: 0;
            transform: translateX(24px);
        }
    }

    @keyframes is-slide-right {
        from {
            opacity: 0;
            transform: translateX(-24px);
        }
    }

    .is-panel__head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 16px;
        border-bottom: 1px solid var(--is-line);
    }

    .is-panel__title {
        margin: 0;
        font-size: 15px;
        font-weight: 600;
    }

    .is-panel__body {
        flex: 1;
        overflow-y: auto;
        padding: 16px;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .is-panel__foot {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        padding: 14px 16px;
        border-top: 1px solid var(--is-line);
    }

    .is-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .is-field[hidden] {
        display: none;
    }

    .is-label {
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--is-muted);
    }

    .is-label em {
        font-style: normal;
        text-transform: none;
        letter-spacing: 0;
    }

    .is-input {
        width: 100%;
        height: 38px;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.14);
        border-radius: 8px;
        background: #fff;
        font-family: inherit;
        font-size: 14px;
        color: var(--is-ink);
        outline: none;
    }

    .is-input:focus {
        border-color: var(--is-accent);
    }

    select.is-input {
        appearance: none;
        -webkit-appearance: none;
        padding-right: 32px;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%231c1c1c' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 12px center;
        cursor: pointer;
    }

    textarea.is-input {
        height: 84px;
        padding: 10px 12px;
        resize: vertical;
    }

    .is-time-row {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: var(--is-muted);
    }

    .is-switch-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }

    .is-switch-row strong {
        display: block;
        font-size: 14px;
        font-weight: 600;
    }

    .is-switch-row small {
        font-size: 12px;
        color: var(--is-muted);
    }

    .is-switch {
        position: relative;
        width: 40px;
        height: 22px;
        flex-shrink: 0;
        appearance: none;
        -webkit-appearance: none;
        margin: 0;
        border-radius: 999px;
        background: #d9dadf;
        cursor: pointer;
        transition: background-color 0.15s ease;
    }

    .is-switch::after {
        content: "";
        position: absolute;
        top: 3px;
        left: 3px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #fff;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        transition: transform 0.15s ease;
    }

    .is-switch:checked {
        background: var(--is-accent);
    }

    .is-switch:checked::after {
        transform: translateX(18px);
    }

    .is-switch:focus-visible {
        outline: 2px solid var(--is-accent);
        outline-offset: 2px;
    }

    .is-seg {
        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: 1fr;
        gap: 6px;
    }

    .is-seg button,
    .is-days button {
        height: 34px;
        border: 1px solid rgba(28, 28, 28, 0.14);
        border-radius: 8px;
        background: #fff;
        font-family: inherit;
        font-size: 13px;
        color: var(--is-ink);
        cursor: pointer;
    }

    .is-seg button[aria-pressed="true"],
    .is-days button[aria-pressed="true"] {
        background: var(--is-accent);
        border-color: var(--is-accent);
        color: #fff;
    }

    .is-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
    }

    .is-days button {
        height: 30px;
        font-size: 11px;
    }

    .is-repeat {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .is-repeat[hidden] {
        display: none;
    }

    .is-info {
        margin: 0;
        padding: 10px 12px;
        border-radius: 8px;
        background: #f1f5ff;
        color: #1d4ed8;
        font-size: 12px;
        line-height: 1.45;
    }

    .is-info[hidden] {
        display: none;
    }

    .is-error {
        margin: 0;
        padding: 10px 12px;
        border-radius: 8px;
        background: #fdf0f0;
        color: #b42318;
        font-size: 13px;
    }

    .is-error[hidden] {
        display: none;
    }

    .is-btn {
        height: 40px;
        border: 1px solid rgba(28, 28, 28, 0.14);
        border-radius: 10px;
        background: #fff;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        color: var(--is-ink);
        cursor: pointer;
    }

    .is-btn:hover {
        background: #f7f9fb;
    }

    .is-btn--primary {
        background: var(--is-accent);
        border-color: var(--is-accent);
        color: #fff;
    }

    .is-btn--primary:hover {
        background: #1d4ed8;
    }

    .is-btn--danger {
        color: #e5484d;
    }

    .is-btn--danger.is-confirming {
        background: #e5484d;
        border-color: #e5484d;
        color: #fff;
    }

    .is-btn:disabled {
        opacity: 0.6;
        cursor: wait;
    }

    .is-close {
        width: 28px;
        height: 28px;
        border: none;
        border-radius: 6px;
        background: none;
        font-size: 18px;
        line-height: 1;
        color: var(--is-muted);
        cursor: pointer;
    }

    .is-close:hover {
        background: rgba(28, 28, 28, 0.06);
        color: var(--is-ink);
    }

    @media (max-width: 700px) {
        .is-page {
            padding: 12px;
        }

        .is-search {
            margin-left: 0;
            width: 100%;
        }

        .is-search input {
            width: 100%;
        }

        .is-panel {
            left: 12px !important;
            right: 12px;
            width: auto;
        }
    }
</style>

<?php
$firstHour = 6; // calendar shows 06:00 – 23:00
$lastHour = 23;

$todayYmd = (new DateTimeImmutable('today'))->format('Y-m-d');
$dayKeys = [];
for ($i = 0; $i < 7; $i++) {
    $dayKeys[] = $monday->modify("+{$i} days");
}

$minutes = fn(string $time): int => (int) substr($time, 0, 2) * 60 + (int) substr($time, 3, 2);
$initials = fn(array $s): string => mb_strtoupper(mb_substr($s['first_name'], 0, 1) . mb_substr($s['last_name'], 0, 1));
$weekdayShort = [1 => 'Mon', 2 => 'Tue', 3 => 'Wed', 4 => 'Thu', 5 => 'Fri', 6 => 'Sat', 7 => 'Sun'];

// Lay out each day's sessions: overlapping sessions (different instructors) share the column side by side
$byDay = [];
foreach ($sessions as $s) {
    $byDay[$s['session_date']][] = $s;
}
$placement = [];
foreach ($byDay as $date => $list) {
    $cluster = [];
    $clusterEnd = -1;
    $flush = function () use (&$cluster, &$placement) {
        $columns = [];
        foreach ($cluster as $s) {
            $col = 0;
            while (isset($columns[$col]) && $columns[$col] > $s['_start']) {
                $col++;
            }
            $columns[$col] = $s['_end'];
            $placement[$s['id']] = ['col' => $col];
        }
        foreach ($cluster as $s) {
            $placement[$s['id']]['cols'] = count($columns);
        }
        $cluster = [];
    };
    foreach ($list as $s) {
        $s['_start'] = $minutes($s['start_time']);
        $s['_end'] = $minutes($s['end_time']);
        if ($cluster && $s['_start'] >= $clusterEnd) {
            $flush();
            $clusterEnd = -1;
        }
        $cluster[] = $s;
        $clusterEnd = max($clusterEnd, $s['_end']);
    }
    $flush();
}

// What the overlay needs to open a session for editing
$sessionData = [];
foreach ($sessions as $s) {
    $sessionData[$s['id']] = [
        'id'            => (int) $s['id'],
        'session_type'  => $s['session_type'],
        'instructor_id' => (int) $s['instructor_id'],
        'session_date'  => $s['session_date'],
        'start_time'    => substr($s['start_time'], 0, 5),
        'end_time'      => substr($s['end_time'], 0, 5),
        'notes'         => (string) $s['notes'],
        'series'        => $s['series_id'] === null ? null : [
            'frequency'    => $s['frequency'],
            'weekdays'     => $s['weekdays'] === null ? [] : array_map('intval', explode(',', $s['weekdays'])),
            'repeat_until' => $s['repeat_until'],
        ],
    ];
}

$weekLabel = $monday->format('M j') . ' – ' . ($monday->format('M') === $sunday->format('M') ? $sunday->format('j') : $sunday->format('M j')) . ', ' . $sunday->format('Y');
$weekUrl = fn(DateTimeImmutable $d): string => '/portal/instructor-sessions?week=' . $d->format('Y-m-d');
$clockSvg = '<svg class="is-repeat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><polyline points="12 7 12 12 15 14"/></svg>';
$repeatSvg = '<svg class="is-repeat-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="17 1 21 5 17 9"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><polyline points="7 23 3 19 7 15"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>';
?>

<div class="page-header">
    <button class="icon-btn" type="button" aria-label="Toggle sidebar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="9" y1="3" x2="9" y2="21"></line>
        </svg>
    </button>
    <span class="page-title" aria-current="page">Instructor Sessions</span>
</div>

<div class="is-page">
    <div class="is-toolbar">
        <button type="button" class="is-tool" id="is-add" aria-label="Add session" title="Add session">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
        </button>

        <div class="is-filter">
            <button type="button" class="is-tool" id="is-filter-btn" aria-expanded="false" aria-controls="is-filter-pop" aria-label="Filter sessions" title="Filter">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><line x1="4" y1="7" x2="20" y2="7" /><line x1="7" y1="12" x2="17" y2="12" /><line x1="10" y1="17" x2="14" y2="17" /></svg>
                <span class="is-tool__badge" id="is-filter-count" hidden></span>
            </button>
            <div class="is-filter__pop" id="is-filter-pop" hidden>
                <label class="is-field">
                    <span class="is-label">Instructor</span>
                    <select class="is-input" id="is-filter-instructor">
                        <option value="">All instructors</option>
                        <?php foreach ($instructors as $i): ?>
                            <option value="<?= (int) $i['id'] ?>"><?= htmlspecialchars($i['first_name'] . ' ' . $i['last_name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="is-field">
                    <span class="is-label">Session type</span>
                    <select class="is-input" id="is-filter-type">
                        <option value="">All types</option>
                        <?php foreach ($types as $key => $label): ?>
                            <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <button type="button" class="is-btn" id="is-filter-clear">Clear filters</button>
            </div>
        </div>

        <a class="is-tool" href="<?= $weekUrl($monday->modify('-7 days')) ?>" aria-label="Previous week" title="Previous week">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6" /></svg>
        </a>
        <a class="is-tool" href="/portal/instructor-sessions">Today</a>
        <a class="is-tool" href="<?= $weekUrl($monday->modify('+7 days')) ?>" aria-label="Next week" title="Next week">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6" /></svg>
        </a>
        <span class="is-week-label"><?= htmlspecialchars($weekLabel) ?></span>

        <label class="is-search">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"><circle cx="11" cy="11" r="7" /><line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>
            <input type="search" id="is-search" placeholder="Search" aria-label="Search sessions by type, instructor or notes">
        </label>
    </div>

    <div class="is-cal">
        <div class="is-cal__head">
            <div></div>
            <?php foreach ($dayKeys as $d): ?>
                <div class="is-cal__day <?= $d->format('Y-m-d') === $todayYmd ? 'is-today' : '' ?>">
                    <?= $d->format('D') ?>
                    <strong><?= $d->format('j') ?></strong>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="is-cal__body" id="is-cal-body">
            <div class="is-cal__grid" style="height: calc(var(--is-hour) * <?= $lastHour - $firstHour ?>)">
                <div class="is-cal__times" aria-hidden="true">
                    <?php for ($h = $firstHour; $h < $lastHour; $h++): ?>
                        <div class="is-cal__time"><?= $h > $firstHour ? sprintf('%02d:00', $h) : '' ?></div>
                    <?php endfor; ?>
                </div>

                <?php foreach ($dayKeys as $d): ?>
                    <?php $ymd = $d->format('Y-m-d'); ?>
                    <div class="is-cal__col <?= $ymd === $todayYmd ? 'is-today' : '' ?>" data-date="<?= $ymd ?>"
                        title="Double-click to add a session on <?= $d->format('D, M j') ?>">
                        <?php foreach ($byDay[$ymd] ?? [] as $s): ?>
                            <?php
                            $start = max($minutes($s['start_time']), $firstHour * 60);
                            $end = min($minutes($s['end_time']), $lastHour * 60);
                            $top = ($start - $firstHour * 60) / 60;
                            $height = max(($end - $start) / 60, 0.4);
                            $cols = $placement[$s['id']]['cols'];
                            $col = $placement[$s['id']]['col'];
                            $name = $s['first_name'] . ' ' . $s['last_name'];
                            $label = $types[$s['session_type']] ?? $s['session_type'];
                            $time = substr($s['start_time'], 0, 5) . ' – ' . substr($s['end_time'], 0, 5);
                            $short = ($end - $start) < 45;
                            ?>
                            <button type="button" class="is-event is-event--<?= htmlspecialchars($s['session_type']) ?> <?= $short ? 'is-short' : '' ?>"
                                data-id="<?= (int) $s['id'] ?>"
                                data-instructor="<?= (int) $s['instructor_id'] ?>"
                                data-type="<?= htmlspecialchars($s['session_type']) ?>"
                                data-search="<?= htmlspecialchars(mb_strtolower($label . ' ' . $name . ' ' . $s['notes'])) ?>"
                                style="top: calc(var(--is-hour) * <?= $top ?> + 2px); height: calc(var(--is-hour) * <?= $height ?> - 4px);
                                       left: calc(<?= 100 / $cols * $col ?>% + 4px); width: calc(<?= 100 / $cols ?>% - 8px);"
                                aria-label="<?= htmlspecialchars("$label, $time, $name" . ($s['series_id'] !== null ? ', repeating' : '') . '. Edit') ?>">
                                <span class="is-event__title"><?= htmlspecialchars($label) ?></span>
                                <span class="is-event__time">
                                    <?= $clockSvg ?> <?= htmlspecialchars($time) ?>
                                    <?= $s['series_id'] !== null ? $repeatSvg : '' ?>
                                </span>
                                <span class="is-event__who">
                                    <?php if (!empty($s['profile_image'])): ?>
                                        <img class="is-avatar" src="<?= htmlspecialchars('/' . ltrim($s['profile_image'], '/')) ?>" alt="">
                                    <?php else: ?>
                                        <span class="is-avatar"><?= htmlspecialchars($initials($s)) ?></span>
                                    <?php endif; ?>
                                    <span><?= htmlspecialchars($name) ?></span>
                                </span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (!$sessions): ?>
            <p class="is-empty-note">No sessions this week. Use <strong>+</strong> or double-click a day to add one.</p>
        <?php else: ?>
            <p class="is-empty-note" id="is-no-match" hidden>No sessions match your search or filters.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Add / edit session overlay -->
<div class="is-backdrop" id="is-backdrop" hidden></div>
<form class="is-panel" id="is-panel" role="dialog" aria-modal="true" aria-labelledby="is-panel-title" hidden novalidate>
    <div class="is-panel__head">
        <h2 class="is-panel__title" id="is-panel-title">Add Session</h2>
        <button type="button" class="is-close" data-close aria-label="Close">×</button>
    </div>

    <div class="is-panel__body">
        <input type="hidden" name="id" value="">

        <div class="is-field" id="is-scope-field" hidden>
            <span class="is-label">Apply changes to</span>
            <div class="is-seg" role="group" aria-label="Apply changes to">
                <button type="button" data-scope="one" aria-pressed="true">This session</button>
                <button type="button" data-scope="following" aria-pressed="false">This &amp; following</button>
            </div>
            <input type="hidden" name="scope" value="one">
        </div>

        <label class="is-field">
            <span class="is-label">Session type</span>
            <select class="is-input" name="session_type" required>
                <option value="" disabled>Select session type...</option>
                <?php foreach ($types as $key => $label): ?>
                    <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label class="is-field">
            <span class="is-label">Select instructor</span>
            <select class="is-input" name="instructor_id" required>
                <option value="" disabled>Select Instructor</option>
                <?php foreach ($instructors as $i): ?>
                    <option value="<?= (int) $i['id'] ?>"><?= htmlspecialchars($i['first_name'] . ' ' . $i['last_name']) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label class="is-field">
            <span class="is-label">Date</span>
            <input class="is-input" type="date" name="session_date" required>
        </label>

        <div class="is-field">
            <span class="is-label" id="is-time-label">Time</span>
            <div class="is-time-row" role="group" aria-labelledby="is-time-label">
                <input class="is-input" type="time" name="start_time" step="900" required aria-label="Start time">
                <span>to</span>
                <input class="is-input" type="time" name="end_time" step="900" required aria-label="End time">
            </div>
        </div>

        <p class="is-info" id="is-series-info" hidden></p>

        <div class="is-field" id="is-repeat-field">
            <div class="is-switch-row">
                <label for="is-repeat">
                    <strong>Repeating</strong>
                    <small>Repeat this session on a schedule.</small>
                </label>
                <input type="checkbox" class="is-switch" id="is-repeat" name="repeat" value="1" role="switch">
            </div>

            <div class="is-repeat" id="is-repeat-options" hidden>
                <div class="is-seg" role="group" aria-label="Repeat frequency">
                    <?php foreach ($frequencies as $key => $label): ?>
                        <button type="button" data-frequency="<?= $key ?>" aria-pressed="false"><?= $label ?></button>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="frequency" value="weekly">

                <div class="is-days" id="is-weekdays" role="group" aria-label="Repeat on">
                    <?php foreach ($weekdayShort as $n => $short): ?>
                        <button type="button" data-weekday="<?= $n ?>" aria-pressed="false"><?= $short ?></button>
                    <?php endforeach; ?>
                </div>

                <label class="is-field">
                    <span class="is-label" style="text-transform: none; letter-spacing: 0; font-size: 12px;">Repeat until</span>
                    <input class="is-input" type="date" name="repeat_until">
                </label>
            </div>
        </div>

        <label class="is-field">
            <span class="is-label">Notes <em>(optional)</em></span>
            <textarea class="is-input" name="notes" maxlength="500" placeholder="Add any relevant details..."></textarea>
        </label>

        <p class="is-error" id="is-error" role="alert" hidden></p>
    </div>

    <div class="is-panel__foot">
        <button type="button" class="is-btn" data-close id="is-cancel">Cancel</button>
        <button type="button" class="is-btn is-btn--danger" id="is-delete" hidden>Delete</button>
        <button type="submit" class="is-btn is-btn--primary" id="is-save">Save Session</button>
    </div>
</form>

<script>
    (function () {
        const SESSIONS = <?= json_encode((object) $sessionData) ?>;
        const FIRST_HOUR = <?= $firstHour ?>;
        const LAST_HOUR = <?= $lastHour ?>;
        const TODAY = <?= json_encode($todayYmd) ?>;
        const FREQ_LABEL = { daily: 'daily', weekly: 'weekly', monthly: 'monthly' };
        const DAY_SHORT = <?= json_encode($weekdayShort) ?>;

        const body = document.getElementById('is-cal-body');
        const panel = document.getElementById('is-panel');
        const backdrop = document.getElementById('is-backdrop');
        const form = panel;
        const error = document.getElementById('is-error');
        const repeat = document.getElementById('is-repeat');
        const repeatOptions = document.getElementById('is-repeat-options');
        const repeatField = document.getElementById('is-repeat-field');
        const scopeField = document.getElementById('is-scope-field');
        const seriesInfo = document.getElementById('is-series-info');
        const deleteBtn = document.getElementById('is-delete');
        const cancelBtn = document.getElementById('is-cancel');
        const saveBtn = document.getElementById('is-save');
        const hourPx = () => parseFloat(getComputedStyle(body).getPropertyValue('--is-hour')) || 56;
        let openEvent = null;
        let current = null; // session being edited, or null when adding

        // ---------- calendar ----------
        // Start the view at 08:00 (or the earliest session if it's before that)
        const earliest = Math.min(8, ...Object.values(SESSIONS).map(s => parseInt(s.start_time, 10)));
        body.scrollTop = Math.max(0, earliest - FIRST_HOUR - 0.25) * hourPx();

        function drawNow() {
            document.querySelector('.is-now')?.remove();
            const col = document.querySelector(`.is-cal__col[data-date="${TODAY}"]`);
            const now = new Date();
            const hours = now.getHours() + now.getMinutes() / 60;
            if (!col || hours < FIRST_HOUR || hours >= LAST_HOUR) return;
            const line = document.createElement('div');
            line.className = 'is-now';
            line.style.top = `${(hours - FIRST_HOUR) * hourPx()}px`;
            col.appendChild(line);
        }
        drawNow();
        setInterval(drawNow, 60000);

        // ---------- search + filters ----------
        const search = document.getElementById('is-search');
        const filterBtn = document.getElementById('is-filter-btn');
        const filterPop = document.getElementById('is-filter-pop');
        const filterInstructor = document.getElementById('is-filter-instructor');
        const filterType = document.getElementById('is-filter-type');
        const filterCount = document.getElementById('is-filter-count');
        const noMatch = document.getElementById('is-no-match');

        function applyFilters() {
            const term = search.value.trim().toLowerCase();
            let shown = 0;
            const events = document.querySelectorAll('.is-event');
            events.forEach(ev => {
                const show = (!term || ev.dataset.search.includes(term))
                    && (!filterInstructor.value || ev.dataset.instructor === filterInstructor.value)
                    && (!filterType.value || ev.dataset.type === filterType.value);
                ev.hidden = !show;
                if (show) shown++;
            });
            const active = [filterInstructor.value, filterType.value].filter(Boolean).length;
            filterCount.hidden = !active;
            filterCount.textContent = active;
            if (noMatch) noMatch.hidden = shown > 0 || events.length === 0;
        }

        search.addEventListener('input', applyFilters);
        filterInstructor.addEventListener('change', applyFilters);
        filterType.addEventListener('change', applyFilters);
        document.getElementById('is-filter-clear').addEventListener('click', () => {
            filterInstructor.value = '';
            filterType.value = '';
            applyFilters();
        });
        filterBtn.addEventListener('click', () => {
            const open = filterPop.hidden;
            filterPop.hidden = !open;
            filterBtn.setAttribute('aria-expanded', String(open));
        });
        document.addEventListener('click', e => {
            if (!filterPop.hidden && !e.target.closest('.is-filter')) {
                filterPop.hidden = true;
                filterBtn.setAttribute('aria-expanded', 'false');
            }
        });

        // ---------- overlay form ----------
        function setPressed(buttons, isOn) {
            buttons.forEach(b => b.setAttribute('aria-pressed', String(isOn(b))));
        }

        function setScope(scope) {
            form.elements.scope.value = scope;
            setPressed(scopeField.querySelectorAll('[data-scope]'), b => b.dataset.scope === scope);
            // Changing one date of a series keeps the series rule; "this & following" can change it
            const lockedToSeries = current && current.series && scope === 'one';
            repeatField.hidden = lockedToSeries;
            seriesInfo.hidden = !lockedToSeries;
            deleteBtn.textContent = current && current.series && scope === 'following' ? 'Delete this & following' : 'Delete';
            resetDelete();
        }

        function setFrequency(frequency) {
            form.elements.frequency.value = frequency;
            setPressed(repeatOptions.querySelectorAll('[data-frequency]'), b => b.dataset.frequency === frequency);
            document.getElementById('is-weekdays').hidden = frequency !== 'weekly';
        }

        function setWeekdays(days) {
            setPressed(document.querySelectorAll('[data-weekday]'), b => days.includes(Number(b.dataset.weekday)));
        }

        function weekdayOf(ymd) {
            const day = new Date(ymd + 'T00:00:00').getDay();
            return day === 0 ? 7 : day;
        }

        function showRepeat(on) {
            repeat.checked = on;
            repeatOptions.hidden = !on;
        }

        function describeSeries(series) {
            let text = `Part of a ${FREQ_LABEL[series.frequency]} series`;
            if (series.frequency === 'weekly' && series.weekdays.length) {
                text += ' on ' + series.weekdays.map(d => DAY_SHORT[d]).join(', ');
            }
            const until = new Date(series.repeat_until + 'T00:00:00').toLocaleDateString(undefined, { day: 'numeric', month: 'short', year: 'numeric' });
            return `${text} until ${until}. Choose "This & following" to change the repeat.`;
        }

        function fill(session, defaults) {
            form.reset();
            error.hidden = true;
            const s = session || defaults;
            form.elements.id.value = session ? session.id : '';
            form.elements.session_type.value = s.session_type || '';
            form.elements.instructor_id.value = s.instructor_id || '';
            form.elements.session_date.value = s.session_date || '';
            form.elements.start_time.value = s.start_time || '';
            form.elements.end_time.value = s.end_time || '';
            form.elements.notes.value = s.notes || '';

            const series = session && session.series;
            setFrequency(series ? series.frequency : 'weekly');
            setWeekdays(series ? series.weekdays : (s.session_date ? [weekdayOf(s.session_date)] : []));
            form.elements.repeat_until.value = series ? series.repeat_until : '';
            showRepeat(Boolean(series));
            seriesInfo.textContent = series ? describeSeries(series) : '';
            scopeField.hidden = !series;
        }

        function place(anchor) {
            panel.classList.remove('from-left');
            panel.style.left = '';
            panel.style.right = '';
            if (!anchor || innerWidth <= 700) return; // Add: always slides in from the right edge

            // Edit: open beside the session — to its right, or to its left when it sits on the right half
            const r = anchor.getBoundingClientRect();
            const width = panel.offsetWidth;
            const onRightHalf = r.left + r.width / 2 > innerWidth / 2;
            let left = onRightHalf ? r.left - 12 - width : r.right + 12;
            left = Math.min(Math.max(12, left), innerWidth - width - 12);
            panel.style.left = `${left}px`;
            panel.style.right = 'auto';
            if (onRightHalf) panel.classList.add('from-left');
        }

        function open(session, anchor, defaults = {}) {
            current = session;
            fill(session, defaults);
            document.getElementById('is-panel-title').textContent = session ? 'Edit Session' : 'Add Session';
            deleteBtn.hidden = !session;
            cancelBtn.hidden = Boolean(session);
            setScope('one');

            openEvent?.classList.remove('is-open');
            openEvent = anchor || null;
            openEvent?.classList.add('is-open');

            backdrop.hidden = false;
            panel.hidden = false;
            // Restart the slide-in animation for every open
            panel.style.animation = 'none';
            panel.offsetHeight;
            panel.style.animation = '';
            place(anchor);
            form.elements[session ? 'start_time' : 'session_type'].focus({ preventScroll: true });
        }

        function close() {
            panel.hidden = true;
            backdrop.hidden = true;
            openEvent?.classList.remove('is-open');
            openEvent?.focus({ preventScroll: true });
            openEvent = null;
            current = null;
        }

        document.getElementById('is-add').addEventListener('click', () => open(null, null, {
            session_date: TODAY,
            start_time: '09:00',
            end_time: '10:00',
        }));

        document.querySelectorAll('.is-event').forEach(ev => ev.addEventListener('click', () => {
            open(SESSIONS[ev.dataset.id], ev);
        }));

        // Double-click an empty slot to add a session there, rounded to the half hour
        document.querySelectorAll('.is-cal__col').forEach(col => col.addEventListener('dblclick', e => {
            if (e.target.closest('.is-event')) return;
            const y = e.clientY - col.getBoundingClientRect().top;
            const start = Math.min(LAST_HOUR - 1, FIRST_HOUR + Math.floor(y / hourPx() * 2) / 2);
            const fmt = h => `${String(Math.floor(h)).padStart(2, '0')}:${h % 1 ? '30' : '00'}`;
            open(null, null, { session_date: col.dataset.date, start_time: fmt(start), end_time: fmt(start + 1) });
        }));

        panel.querySelectorAll('[data-close]').forEach(b => b.addEventListener('click', close));
        backdrop.addEventListener('click', close);
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && !panel.hidden) close();
        });
        addEventListener('resize', () => { if (!panel.hidden) place(openEvent); });

        scopeField.querySelectorAll('[data-scope]').forEach(b => b.addEventListener('click', () => setScope(b.dataset.scope)));
        repeatOptions.querySelectorAll('[data-frequency]').forEach(b => b.addEventListener('click', () => setFrequency(b.dataset.frequency)));
        document.querySelectorAll('[data-weekday]').forEach(b => b.addEventListener('click', () => {
            b.setAttribute('aria-pressed', String(b.getAttribute('aria-pressed') !== 'true'));
        }));
        repeat.addEventListener('change', () => {
            showRepeat(repeat.checked);
            // Sensible default: repeat for 4 weeks on the session's weekday
            if (repeat.checked && !form.elements.repeat_until.value && form.elements.session_date.value) {
                const until = new Date(form.elements.session_date.value + 'T00:00:00');
                until.setDate(until.getDate() + 28);
                form.elements.repeat_until.value = until.toLocaleDateString('sv-SE'); // YYYY-MM-DD
                if (!document.querySelector('[data-weekday][aria-pressed="true"]')) {
                    setWeekdays([weekdayOf(form.elements.session_date.value)]);
                }
            }
        });

        // ---------- save / delete ----------
        async function send(url, data) {
            const response = await fetch(url, { method: 'POST', body: data });
            const result = await response.json().catch(() => ({}));
            if (!response.ok) throw new Error(result.error || 'Something went wrong. Please try again.');
            return result;
        }

        function showError(message) {
            error.textContent = message;
            error.hidden = false;
            error.scrollIntoView({ block: 'nearest' });
        }

        form.addEventListener('submit', async e => {
            e.preventDefault();
            const data = new FormData(form);
            if (!repeat.checked || repeatField.hidden) data.delete('repeat');
            document.querySelectorAll('[data-weekday][aria-pressed="true"]').forEach(b => data.append('weekdays[]', b.dataset.weekday));

            saveBtn.disabled = true;
            error.hidden = true;
            try {
                const result = await send('/api/instructor-sessions/save', data);
                location.href = `/portal/instructor-sessions?week=${result.week}`;
            } catch (err) {
                showError(err.message);
                saveBtn.disabled = false;
            }
        });

        // Delete asks for a second click rather than a browser confirm box
        let confirmTimer = null;
        function resetDelete() {
            clearTimeout(confirmTimer);
            deleteBtn.classList.remove('is-confirming');
            deleteBtn.textContent = current && current.series && form.elements.scope.value === 'following' ? 'Delete this & following' : 'Delete';
        }

        deleteBtn.addEventListener('click', async () => {
            if (!deleteBtn.classList.contains('is-confirming')) {
                deleteBtn.classList.add('is-confirming');
                deleteBtn.textContent = 'Click to confirm';
                confirmTimer = setTimeout(resetDelete, 4000);
                return;
            }
            clearTimeout(confirmTimer);
            deleteBtn.disabled = true;
            const data = new FormData();
            data.append('id', current.id);
            data.append('scope', form.elements.scope.value);
            try {
                await send('/api/instructor-sessions/delete', data);
                location.reload();
            } catch (err) {
                showError(err.message);
                deleteBtn.disabled = false;
                resetDelete();
            }
        });
    })();
</script>
