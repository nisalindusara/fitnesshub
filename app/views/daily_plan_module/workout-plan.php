<style>
    .wp-view {
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
        padding: 24px 28px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
    }

    .wp-view *,
    .wp-view *::before,
    .wp-view *::after {
        box-sizing: border-box;
    }

    .crumb-link {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.4);
        text-decoration: none;
    }

    a.crumb-link:hover {
        color: #1c1c1c;
    }

    .crumb-sep {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.2);
    }

    /* Heading */
    .wp-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        flex-wrap: wrap;
    }

    .wp-title {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin: 0;
    }

    .wp-subtitle {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        margin: 4px 0 0;
    }

    .wp-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .wp-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 36px;
        padding: 0 16px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: #1c1c1c;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
        transition: background-color 0.15s ease;
    }

    .wp-btn:hover {
        background: #f7f9fb;
    }

    .wp-btn--primary {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .wp-btn--primary:hover {
        background: #333333;
    }

    .wp-btn--sm {
        height: 32px;
        padding: 0 12px;
        font-size: 13px;
    }

    .wp-btn--icon {
        width: 28px;
        height: 28px;
        padding: 0;
        border-radius: 6px;
        flex-shrink: 0;
    }

    /* Layout */
    .wp-grid {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 340px;
        gap: 20px;
        align-items: start;
    }

    .wp-col {
        display: flex;
        flex-direction: column;
        gap: 20px;
        min-width: 0;
    }

    .wp-panel {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        padding: 18px;
        background: #ffffff;
    }

    .wp-panel__head {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }

    .wp-panel__title {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
    }

    .wp-panel__meta {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
    }

    /* Form fields */
    .wp-fields {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 14px 14px;
    }

    .wp-field {
        display: flex;
        flex-direction: column;
        gap: 6px;
        min-width: 0;
    }

    .wp-field--wide {
        grid-column: span 2;
    }

    .wp-label {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
    }

    .wp-input {
        height: 38px;
        width: 100%;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        background: #ffffff;
        font-family: inherit;
        font-size: 14px;
        color: #1c1c1c;
        outline: none;
    }

    .wp-input:focus {
        border-color: #1c1c1c;
    }

    select.wp-input {
        appearance: none;
        -webkit-appearance: none;
        padding-right: 32px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%231c1c1c' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        cursor: pointer;
    }

    .wp-segment {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .wp-segment button {
        height: 38px;
        padding: 0 14px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        background: #ffffff;
        font-family: inherit;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.75);
        cursor: pointer;
    }

    .wp-segment button.is-active {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
        font-weight: 500;
    }

    /* Day tabs */
    .wp-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 4px;
        padding: 4px;
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 10px;
        margin-bottom: 18px;
    }

    .wp-day {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 2px;
        padding: 8px 4px;
        border: 1px solid transparent;
        border-radius: 8px;
        background: none;
        font-family: inherit;
        cursor: pointer;
        min-width: 0;
    }

    .wp-day__short {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.45);
    }

    .wp-day__focus {
        font-size: 13px;
        font-weight: 600;
        color: #1c1c1c;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
    }

    .wp-day.is-active {
        background: #f7f9fb;
        border-color: rgba(28, 28, 28, 0.12);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04);
    }

    .wp-day--empty .wp-day__focus {
        color: rgba(28, 28, 28, 0.4);
        font-weight: 500;
    }

    /* Day panel */
    .wp-dayhead {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 6px;
    }

    .wp-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #e5484d;
    }

    .wp-dayhead__title {
        font-size: 14px;
        font-weight: 600;
        margin: 0 4px 0 0;
    }

    .wp-tag {
        display: inline-block;
        font-size: 11px;
        padding: 2px 8px;
        border-radius: 6px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.6);
        white-space: nowrap;
    }

    .wp-dayhead__hint {
        margin-left: auto;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.45);
    }

    .wp-rows {
        --wp-cols: 20px minmax(180px, 1fr) 72px 72px 90px 80px 28px;
    }

    .wp-row {
        display: grid;
        grid-template-columns: var(--wp-cols);
        align-items: center;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
    }

    .wp-row--head {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
        padding: 8px 0;
        border-bottom-color: rgba(28, 28, 28, 0.1);
    }

    .wp-row.is-dragging {
        opacity: 0.4;
    }

    .wp-handle {
        cursor: grab;
        color: rgba(28, 28, 28, 0.3);
        display: flex;
        justify-content: center;
    }

    .wp-exercise {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
    }

    .wp-exercise__name {
        font-size: 14px;
        font-weight: 500;
    }

    .wp-cell {
        height: 34px;
        width: 100%;
        padding: 0 6px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        text-align: center;
        font-family: inherit;
        font-size: 14px;
        color: #1c1c1c;
        outline: none;
        -moz-appearance: textfield;
    }

    .wp-cell::-webkit-outer-spin-button,
    .wp-cell::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .wp-cell:focus {
        border-color: #1c1c1c;
    }

    .wp-rest {
        text-align: center;
        padding: 40px 16px;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    .wp-rest strong {
        display: block;
        color: #1c1c1c;
        font-weight: 600;
        margin-bottom: 4px;
    }

    .wp-daybtns {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 18px;
    }

    /* Side: client */
    .wp-client {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .wp-avatar {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: #eeeeef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 600;
        color: rgba(28, 28, 28, 0.45);
        flex-shrink: 0;
    }

    .wp-client__name {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
    }

    .wp-client__meta {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin: 2px 0 0;
    }

    .wp-client .wp-btn--icon {
        margin-left: auto;
    }

    .wp-adherence {
        margin-top: 16px;
    }

    .wp-adherence__row {
        display: flex;
        justify-content: space-between;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.6);
        margin-bottom: 8px;
    }

    .wp-adherence__row strong {
        color: #1c1c1c;
    }

    .wp-bar {
        height: 5px;
        border-radius: 999px;
        background: rgba(28, 28, 28, 0.07);
        overflow: hidden;
    }

    .wp-bar__fill {
        height: 100%;
        background: #1c1c1c;
        border-radius: 999px;
    }

    .wp-bar__fill--low {
        background: #e5484d;
    }

    .wp-tags {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 14px;
    }

    /* Side: summary */
    .wp-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 8px;
        margin-bottom: 20px;
    }

    .wp-stat__value {
        font-size: 20px;
        font-weight: 700;
        margin: 0;
    }

    .wp-stat__label {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
        margin: 2px 0 0;
    }

    .wp-chart {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        align-items: end;
        height: 64px;
    }

    .wp-chart__bar {
        min-height: 4px;
        border-radius: 3px;
        background: #d9dadf;
        transition: background-color 0.15s ease;
    }

    .wp-chart__bar.is-active {
        background: #1c1c1c;
    }

    .wp-chart__labels {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        margin-top: 8px;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.45);
        text-align: center;
    }

    /* Side: flag */
    .wp-flag {
        display: flex;
        gap: 10px;
        padding: 16px 18px;
        border-radius: 12px;
        background: #fdf0f0;
        border: 1px solid #f6d5d5;
    }

    .wp-flag svg {
        flex-shrink: 0;
        margin-top: 2px;
    }

    .wp-flag__title {
        font-size: 14px;
        font-weight: 600;
        margin: 0;
    }

    .wp-flag__note {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.65);
        margin: 4px 0 0;
        line-height: 1.45;
    }

    /* Side: library */
    .wp-lib-filters {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
        margin: 12px 0 8px;
    }

    .wp-lib-filters button {
        height: 30px;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        background: #ffffff;
        font-family: inherit;
        font-size: 12px;
        color: #1c1c1c;
        cursor: pointer;
    }

    .wp-lib-filters button.is-active {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .wp-lib-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
    }

    .wp-lib-item:last-child {
        border-bottom: none;
    }

    .wp-lib-thumb {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        background: #eeeeef;
        flex-shrink: 0;
    }

    .wp-lib-name {
        font-size: 14px;
        font-weight: 500;
        margin: 0;
    }

    .wp-lib-meta {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
        margin: 1px 0 0;
    }

    .wp-lib-item .wp-btn--icon {
        margin-left: auto;
    }

    .wp-lib-empty {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        padding: 12px 0;
        text-align: center;
    }

    @media (max-width: 1200px) {
        .wp-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    @media (max-width: 900px) {
        .wp-fields {
            grid-template-columns: 1fr 1fr;
        }

        .wp-days {
            overflow-x: auto;
            grid-template-columns: repeat(7, minmax(84px, 1fr));
        }

        .wp-rows {
            overflow-x: auto;
        }

        .wp-row {
            min-width: 620px;
        }
    }

    @media (max-width: 600px) {
        .wp-view {
            padding: 20px 16px;
        }

        .wp-fields {
            grid-template-columns: 1fr;
        }

        .wp-field--wide {
            grid-column: auto;
        }
    }
</style>

<?php
$nameParts = preg_split('/\s+/', trim($member['name']));
$memberInitials = mb_strtoupper(mb_substr($nameParts[0], 0, 1) . mb_substr(end($nameParts), 0, 1));

$exerciseCount = array_sum(array_map(fn($d) => count($d['exercises']), $days));
$sessionCount = count(array_filter($days, fn($d) => count($d['exercises']) > 0));
$weeklyMinutes = array_sum(array_column($days, 'minutes'));
$maxMinutes = max(1, ...array_column($days, 'minutes'));
$weeklyTime = intdiv($weeklyMinutes, 60) . 'h ' . ($weeklyMinutes % 60) . 'm';
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
    <nav aria-label="Breadcrumb" style="display: flex; align-items: center; gap: 8px;">
        <a href="/my-clients" class="crumb-link">My Clients</a>
        <span class="crumb-sep">/</span>
        <span class="crumb-link"><?= htmlspecialchars($member['name']) ?></span>
        <span class="crumb-sep">/</span>
        <span class="page-title" aria-current="page"><?= $isEdit ? 'Edit workout plan' : 'Create workout plan' ?></span>
    </nav>
</div>

<form class="wp-view" id="wp-form" onsubmit="return false">
    <div class="wp-head">
        <div>
            <h1 class="wp-title"><?= $isEdit ? 'Edit workout plan' : 'Create workout plan' ?></h1>
            <p class="wp-subtitle">
                <?= $isEdit ? 'Updating the weekly plan for ' : 'Building a weekly plan for ' ?><?= htmlspecialchars($member['name']) ?>. Changes save as a draft until you publish.
            </p>
        </div>
        <div class="wp-actions">
            <button type="button" class="wp-btn">Preview</button>
            <button type="button" class="wp-btn">Save draft</button>
            <button type="button" class="wp-btn wp-btn--primary">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M2.5 7.5L5.5 10.5L11.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <?= $isEdit ? 'Publish changes' : 'Publish plan' ?>
            </button>
        </div>
    </div>

    <div class="wp-grid">
        <div class="wp-col">
            <!-- Plan details -->
            <section class="wp-panel">
                <div class="wp-panel__head">
                    <h2 class="wp-panel__title">Plan details</h2>
                </div>
                <div class="wp-fields">
                    <label class="wp-field wp-field--wide">
                        <span class="wp-label">Plan name</span>
                        <input class="wp-input" type="text" name="name" value="<?= htmlspecialchars($plan['name']) ?>" placeholder="e.g. Hypertrophy Block A">
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Goal</span>
                        <select class="wp-input" name="goal">
                            <?php foreach ($goals as $goal): ?>
                                <option <?= $goal === $plan['goal'] ? 'selected' : '' ?>><?= htmlspecialchars($goal) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Duration</span>
                        <select class="wp-input" name="duration">
                            <?php foreach ($durations as $duration): ?>
                                <option <?= $duration === $plan['duration'] ? 'selected' : '' ?>><?= htmlspecialchars($duration) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Start date</span>
                        <input class="wp-input" type="date" name="start_date" value="<?= htmlspecialchars($plan['start_date']) ?>">
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Sessions per week</span>
                        <input class="wp-input" type="number" name="sessions_per_week" min="1" max="7" value="<?= (int) $plan['sessions_per_week'] ?>">
                    </label>
                    <div class="wp-field wp-field--wide">
                        <span class="wp-label">Difficulty</span>
                        <div class="wp-segment" role="radiogroup" aria-label="Difficulty">
                            <?php foreach ($difficulties as $difficulty): ?>
                                <button type="button" role="radio"
                                    class="<?= $difficulty === $plan['difficulty'] ? 'is-active' : '' ?>"
                                    aria-checked="<?= $difficulty === $plan['difficulty'] ? 'true' : 'false' ?>">
                                    <?= htmlspecialchars($difficulty) ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" name="difficulty" id="wp-difficulty" value="<?= htmlspecialchars($plan['difficulty']) ?>">
                    </div>
                </div>
            </section>

            <!-- Weekly plan -->
            <section class="wp-panel">
                <div class="wp-panel__head">
                    <h2 class="wp-panel__title">Weekly plan</h2>
                    <div class="wp-actions">
                        <?php if ($isEdit): ?>
                            <button type="button" class="wp-btn wp-btn--sm">Copy last week</button>
                        <?php endif; ?>
                        <button type="button" class="wp-btn wp-btn--sm" data-focus-library>Add from library</button>
                    </div>
                </div>

                <div class="wp-days" role="tablist">
                    <?php foreach ($days as $i => $day): ?>
                        <button type="button" role="tab" id="tab-<?= $day['key'] ?>"
                            class="wp-day <?= $i === 0 ? 'is-active' : '' ?> <?= empty($day['exercises']) ? 'wp-day--empty' : '' ?>"
                            aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
                            aria-controls="panel-<?= $day['key'] ?>"
                            data-day="<?= $day['key'] ?>">
                            <span class="wp-day__short"><?= htmlspecialchars($day['short']) ?></span>
                            <span class="wp-day__focus"><?= htmlspecialchars($day['focus']) ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <?php foreach ($days as $i => $day): ?>
                    <div class="wp-daypanel" role="tabpanel" id="panel-<?= $day['key'] ?>" aria-labelledby="tab-<?= $day['key'] ?>" <?= $i === 0 ? '' : 'hidden' ?>>
                        <div class="wp-dayhead">
                            <span class="wp-dot"></span>
                            <h3 class="wp-dayhead__title"><?= htmlspecialchars($day['long']) ?><?= $day['focus'] !== 'Not set' ? ', ' . htmlspecialchars(strtolower($day['focus'])) : '' ?></h3>
                            <span class="wp-tag" data-count><?= count($day['exercises']) ?> exercises</span>
                            <?php if ($day['minutes'] > 0): ?>
                                <span class="wp-tag">Est. <?= (int) $day['minutes'] ?> min</span>
                            <?php endif; ?>
                            <span class="wp-dayhead__hint">Drag rows to reorder</span>
                        </div>

                        <div class="wp-rows">
                            <div class="wp-row wp-row--head" <?= empty($day['exercises']) ? 'hidden' : '' ?>>
                                <span></span>
                                <span>Exercise</span>
                                <span>Sets</span>
                                <span>Reps</span>
                                <span>Load</span>
                                <span>Rest</span>
                                <span></span>
                            </div>
                            <div class="wp-row-list">
                                <?php foreach ($day['exercises'] as $exercise): ?>
                                    <div class="wp-row" draggable="true">
                                        <span class="wp-handle" aria-hidden="true">
                                            <svg width="10" height="14" viewBox="0 0 10 14" fill="currentColor">
                                                <circle cx="3" cy="2" r="1.2" /><circle cx="7" cy="2" r="1.2" />
                                                <circle cx="3" cy="7" r="1.2" /><circle cx="7" cy="7" r="1.2" />
                                                <circle cx="3" cy="12" r="1.2" /><circle cx="7" cy="12" r="1.2" />
                                            </svg>
                                        </span>
                                        <span class="wp-exercise">
                                            <span class="wp-exercise__name"><?= htmlspecialchars($exercise['name']) ?></span>
                                            <span class="wp-tag"><?= htmlspecialchars($exercise['muscle']) ?></span>
                                        </span>
                                        <input class="wp-cell" type="number" min="1" value="<?= (int) $exercise['sets'] ?>" aria-label="Sets">
                                        <input class="wp-cell" type="number" min="1" value="<?= (int) $exercise['reps'] ?>" aria-label="Reps">
                                        <input class="wp-cell" type="text" value="<?= htmlspecialchars($exercise['load']) ?>" aria-label="Load">
                                        <input class="wp-cell" type="text" value="<?= htmlspecialchars($exercise['rest']) ?>" aria-label="Rest">
                                        <button type="button" class="wp-btn wp-btn--icon" data-remove aria-label="Remove <?= htmlspecialchars($exercise['name']) ?>">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="wp-rest" <?= empty($day['exercises']) ? '' : 'hidden' ?>>
                                <?php if ($day['focus'] === 'Rest'): ?>
                                    <strong>Rest day</strong>
                                    Nothing planned. Add an exercise from the library to make this a training day.
                                <?php else: ?>
                                    <strong>No exercises yet</strong>
                                    Add exercises from the library to plan this day.
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="wp-daybtns">
                    <button type="button" class="wp-btn wp-btn--primary" data-focus-library>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add exercise
                    </button>
                    <button type="button" class="wp-btn">Add superset</button>
                    <button type="button" class="wp-btn">Add note for this day</button>
                </div>
            </section>
        </div>

        <aside class="wp-col">
            <!-- Client -->
            <section class="wp-panel">
                <div class="wp-client">
                    <span class="wp-avatar"><?= htmlspecialchars($memberInitials) ?></span>
                    <div>
                        <p class="wp-client__name"><?= htmlspecialchars($member['name']) ?></p>
                        <p class="wp-client__meta"><?= htmlspecialchars($member['program']) ?></p>
                    </div>
                    <a href="/messages" class="wp-btn wp-btn--icon" aria-label="Message <?= htmlspecialchars($member['name']) ?>">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                    </a>
                </div>
                <div class="wp-adherence">
                    <div class="wp-adherence__row">
                        <span>Adherence, last 30 days</span>
                        <strong><?= $member['adherence'] !== null ? (int) $member['adherence'] . '%' : '—' ?></strong>
                    </div>
                    <div class="wp-bar">
                        <?php if ($member['adherence'] !== null): ?>
                            <div class="wp-bar__fill <?= $member['adherence'] < 60 ? 'wp-bar__fill--low' : '' ?>" style="width: <?= (int) $member['adherence'] ?>%"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="wp-tags">
                    <span class="wp-tag">Goal: <?= htmlspecialchars(strtolower($member['goal'])) ?></span>
                    <?php if ($isEdit): ?>
                        <span class="wp-tag">Last session <?= htmlspecialchars($member['last_session']) ?></span>
                    <?php endif; ?>
                </div>
            </section>

            <!-- Summary -->
            <section class="wp-panel">
                <div class="wp-panel__head">
                    <h2 class="wp-panel__title">Plan summary</h2>
                </div>
                <div class="wp-stats">
                    <div>
                        <p class="wp-stat__value" id="wp-total-exercises"><?= $exerciseCount ?></p>
                        <p class="wp-stat__label">Exercises</p>
                    </div>
                    <div>
                        <p class="wp-stat__value" id="wp-total-sessions"><?= $sessionCount ?></p>
                        <p class="wp-stat__label">Sessions</p>
                    </div>
                    <div>
                        <p class="wp-stat__value"><?= $weeklyTime ?></p>
                        <p class="wp-stat__label">Weekly time</p>
                    </div>
                </div>
                <div class="wp-chart" aria-hidden="true">
                    <?php foreach ($days as $i => $day): ?>
                        <div class="wp-chart__bar <?= $i === 0 ? 'is-active' : '' ?>" data-day="<?= $day['key'] ?>"
                            style="height: <?= round($day['minutes'] / $maxMinutes * 100) ?>%"></div>
                    <?php endforeach; ?>
                </div>
                <div class="wp-chart__labels">
                    <?php foreach ($days as $day): ?>
                        <span><?= htmlspecialchars($day['short']) ?></span>
                    <?php endforeach; ?>
                </div>
            </section>

            <?php if (!empty($member['flag'])): ?>
                <section class="wp-flag">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#e5484d" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <div>
                        <p class="wp-flag__title"><?= htmlspecialchars($member['flag']['title']) ?></p>
                        <p class="wp-flag__note"><?= htmlspecialchars($member['flag']['note']) ?></p>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Library -->
            <section class="wp-panel" id="wp-library">
                <div class="wp-panel__head" style="margin-bottom: 12px;">
                    <h2 class="wp-panel__title">Exercise library</h2>
                    <span class="wp-panel__meta"><?= (int) $library['total'] ?> items</span>
                </div>
                <input class="wp-input" type="search" id="wp-lib-search" placeholder="Search exercises" aria-label="Search exercises">
                <div class="wp-lib-filters">
                    <?php foreach ($library['filters'] as $filter): ?>
                        <button type="button" data-muscle="<?= htmlspecialchars($filter) ?>" aria-pressed="false"><?= htmlspecialchars($filter) ?></button>
                    <?php endforeach; ?>
                </div>
                <div id="wp-lib-list">
                    <?php foreach ($library['items'] as $item): ?>
                        <div class="wp-lib-item" data-name="<?= htmlspecialchars($item['name']) ?>" data-muscle="<?= htmlspecialchars($item['muscle']) ?>">
                            <span class="wp-lib-thumb"></span>
                            <div>
                                <p class="wp-lib-name"><?= htmlspecialchars($item['name']) ?></p>
                                <p class="wp-lib-meta"><?= htmlspecialchars($item['meta']) ?></p>
                            </div>
                            <button type="button" class="wp-btn wp-btn--icon" data-add aria-label="Add <?= htmlspecialchars($item['name']) ?> to the selected day">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    <?php endforeach; ?>
                    <p class="wp-lib-empty" id="wp-lib-empty" hidden>No exercises match.</p>
                </div>
            </section>
        </aside>
    </div>
</form>

<script>
    // UI only — edits stay on the page; nothing is saved until the save/publish endpoints exist
    (function () {
        // Difficulty
        const segment = document.querySelectorAll('.wp-segment button');
        const difficultyInput = document.getElementById('wp-difficulty');
        segment.forEach(btn => btn.addEventListener('click', () => {
            segment.forEach(b => {
                b.classList.remove('is-active');
                b.setAttribute('aria-checked', 'false');
            });
            btn.classList.add('is-active');
            btn.setAttribute('aria-checked', 'true');
            difficultyInput.value = btn.textContent.trim();
        }));

        // Day tabs
        const tabs = document.querySelectorAll('.wp-day');
        const bars = document.querySelectorAll('.wp-chart__bar');
        let activeDay = tabs[0].dataset.day;

        function activePanel() {
            return document.getElementById('panel-' + activeDay);
        }

        tabs.forEach(tab => tab.addEventListener('click', () => {
            activeDay = tab.dataset.day;
            tabs.forEach(t => {
                const on = t === tab;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
                document.getElementById('panel-' + t.dataset.day).hidden = !on;
            });
            bars.forEach(bar => bar.classList.toggle('is-active', bar.dataset.day === activeDay));
        }));

        // Counts
        function refreshCounts() {
            let total = 0;
            let sessions = 0;
            document.querySelectorAll('.wp-daypanel').forEach(panel => {
                const count = panel.querySelectorAll('.wp-row-list .wp-row').length;
                total += count;
                if (count > 0) sessions++;
                panel.querySelector('[data-count]').textContent = `${count} exercises`;
                panel.querySelector('.wp-row--head').hidden = count === 0;
                panel.querySelector('.wp-rest').hidden = count > 0;
                document.getElementById('tab-' + panel.id.replace('panel-', ''))
                    .classList.toggle('wp-day--empty', count === 0);
            });
            document.getElementById('wp-total-exercises').textContent = total;
            document.getElementById('wp-total-sessions').textContent = sessions;
        }

        // Remove
        document.addEventListener('click', e => {
            const btn = e.target.closest('[data-remove]');
            if (!btn) return;
            btn.closest('.wp-row').remove();
            refreshCounts();
        });

        // Add from library → appends to the selected day
        const handleSvg = `<svg width="10" height="14" viewBox="0 0 10 14" fill="currentColor">
            <circle cx="3" cy="2" r="1.2" /><circle cx="7" cy="2" r="1.2" />
            <circle cx="3" cy="7" r="1.2" /><circle cx="7" cy="7" r="1.2" />
            <circle cx="3" cy="12" r="1.2" /><circle cx="7" cy="12" r="1.2" /></svg>`;

        function buildRow(name, muscle) {
            const row = document.createElement('div');
            row.className = 'wp-row';
            row.draggable = true;
            row.innerHTML = `
                <span class="wp-handle" aria-hidden="true">${handleSvg}</span>
                <span class="wp-exercise">
                    <span class="wp-exercise__name"></span>
                    <span class="wp-tag"></span>
                </span>
                <input class="wp-cell" type="number" min="1" value="3" aria-label="Sets">
                <input class="wp-cell" type="number" min="1" value="10" aria-label="Reps">
                <input class="wp-cell" type="text" value="" placeholder="—" aria-label="Load">
                <input class="wp-cell" type="text" value="60 s" aria-label="Rest">
                <button type="button" class="wp-btn wp-btn--icon" data-remove aria-label="Remove">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>`;
            row.querySelector('.wp-exercise__name').textContent = name;
            row.querySelector('.wp-tag').textContent = muscle;
            row.querySelector('[data-remove]').setAttribute('aria-label', `Remove ${name}`);
            return row;
        }

        document.querySelectorAll('[data-add]').forEach(btn => btn.addEventListener('click', () => {
            const item = btn.closest('.wp-lib-item');
            activePanel().querySelector('.wp-row-list').appendChild(buildRow(item.dataset.name, item.dataset.muscle));
            refreshCounts();
        }));

        // "Add exercise" / "Add from library" → jump to the library search
        const libSearch = document.getElementById('wp-lib-search');
        document.querySelectorAll('[data-focus-library]').forEach(btn => btn.addEventListener('click', () => {
            document.getElementById('wp-library').scrollIntoView({ behavior: 'smooth', block: 'center' });
            libSearch.focus({ preventScroll: true });
        }));

        // Library search + muscle filter
        const libItems = document.querySelectorAll('.wp-lib-item');
        const libFilters = document.querySelectorAll('.wp-lib-filters button');
        let muscle = null;

        function filterLibrary() {
            const term = libSearch.value.trim().toLowerCase();
            let visible = 0;
            libItems.forEach(item => {
                const show = item.dataset.name.toLowerCase().includes(term) && (!muscle || item.dataset.muscle === muscle);
                item.hidden = !show;
                if (show) visible++;
            });
            document.getElementById('wp-lib-empty').hidden = visible > 0;
        }

        libSearch.addEventListener('input', filterLibrary);
        libFilters.forEach(btn => btn.addEventListener('click', () => {
            muscle = muscle === btn.dataset.muscle ? null : btn.dataset.muscle;
            libFilters.forEach(b => {
                const on = b.dataset.muscle === muscle;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-pressed', on ? 'true' : 'false');
            });
            filterLibrary();
        }));

        // Drag to reorder within a day
        let dragged = null;
        document.addEventListener('dragstart', e => {
            const row = e.target.closest?.('.wp-row-list .wp-row');
            if (!row) return;
            dragged = row;
            row.classList.add('is-dragging');
            e.dataTransfer.effectAllowed = 'move';
        });
        document.addEventListener('dragend', () => {
            dragged?.classList.remove('is-dragging');
            dragged = null;
        });
        document.addEventListener('dragover', e => {
            if (!dragged) return;
            const list = e.target.closest('.wp-row-list');
            if (list !== dragged.parentElement) return;
            e.preventDefault();
            const after = [...list.querySelectorAll('.wp-row:not(.is-dragging)')]
                .find(row => e.clientY < row.getBoundingClientRect().top + row.offsetHeight / 2);
            list.insertBefore(dragged, after ?? null);
        });
    })();
</script>
