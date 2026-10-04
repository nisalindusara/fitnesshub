<?php $pageStyles = ['staff/daily_plan_module/workout-plan']; ?>

<?php
$memberName = trim($client['first_name'] . ' ' . $client['last_name']);
$nameParts = preg_split('/\s+/', $memberName);
$memberInitials = mb_strtoupper(mb_substr($nameParts[0], 0, 1) . mb_substr(end($nameParts), 0, 1));
$typeLabel = ClientRosterService::TYPES[$client['client_type']] ?? $client['client_type'];

// Plan details: what the instructor typed before a failed save, otherwise the stored / blank plan
$details = [
    'name'              => $unsaved['name'] ?? $plan['name'],
    'goal'              => $unsaved['goal'] ?? $plan['goal'],
    'duration_weeks'    => (int) ($unsaved['duration_weeks'] ?? $plan['duration_weeks']),
    'start_date'        => $unsaved['start_date'] ?? $plan['start_date'],
    'sessions_per_week' => (int) ($unsaved['sessions_per_week'] ?? $plan['sessions_per_week']),
    'difficulty'        => $unsaved['difficulty'] ?? $plan['difficulty'],
];

$libraryById = [];
foreach ($library as $item) {
    $libraryById[(int) $item['id']] = $item;
}

// The weekly plan the editor starts from, keyed 1 (Mon) … 7 (Sun)
$initialDays = [];
if ($unsaved !== null && is_array($restored = json_decode((string) ($unsaved['days_json'] ?? ''), true))) {
    foreach ($restored as $day) {
        $exercises = [];
        foreach ((array) ($day['exercises'] ?? []) as $e) {
            $item = $libraryById[(int) ($e['exercise_id'] ?? 0)] ?? null;
            if ($item === null) {
                continue;
            }
            $exercises[] = [
                'exercise_id' => (int) $item['id'],
                'name'        => $item['name'],
                'muscle'      => $item['muscle_group'],
                'sets'        => (int) ($e['sets'] ?? 3),
                'reps'        => (int) ($e['reps'] ?? 10),
                'load'        => (string) ($e['load'] ?? ''),
                'rest'        => (int) ($e['rest'] ?? 60),
                'superset'    => isset($e['superset']) && $e['superset'] !== '' ? (int) $e['superset'] : null,
            ];
        }
        $initialDays[(int) ($day['day'] ?? 0)] = [
            'focus'     => (string) ($day['focus'] ?? ''),
            'note'      => (string) ($day['note'] ?? ''),
            'exercises' => $exercises,
        ];
    }
}
foreach ($dayNames as $dow => $_) {
    if (isset($initialDays[$dow])) {
        continue;
    }
    $initialDays[$dow] = [
        'focus'     => (string) ($days[$dow]['focus'] ?? ''),
        'note'      => (string) ($days[$dow]['note'] ?? ''),
        'exercises' => array_map(fn($e) => [
            'exercise_id' => $e['exercise_id'],
            'name'        => $e['name'],
            'muscle'      => $e['muscle'],
            'sets'        => $e['sets'],
            'reps'        => $e['reps'],
            'load'        => (string) ($e['load'] ?? ''),
            'rest'        => $e['rest'],
            'superset'    => $e['superset'],
        ], $days[$dow]['exercises'] ?? []),
    ];
}
ksort($initialDays);

// Every muscle group gets a filter chip, so one added from "New exercise" is filterable straight away
$muscleGroups = array_values(array_unique(array_merge($muscleOptions, array_column($library, 'muscle_group'))));
$title = $isEdit ? 'Edit workout plan' : 'Create workout plan';

if ($hasDraft) {
    $statusPill = ['wp-status--draft', $isPublished ? 'Draft · unpublished changes' : 'Draft · not published'];
} elseif ($isPublished) {
    $statusPill = ['wp-status--published', 'Published'];
} else {
    $statusPill = null;
}
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
        <a href="/portal/clients" class="crumb-link">My Clients</a>
        <span class="crumb-sep">/</span>
        <span class="crumb-link"><?= htmlspecialchars($memberName) ?></span>
        <span class="crumb-sep">/</span>
        <span class="page-title" aria-current="page"><?= $title ?></span>
    </nav>
</div>

<form class="wp-view" id="wp-form" method="post" action="/portal/clients/workout-plan/save" novalidate>
    <input type="hidden" name="member_id" value="<?= (int) $memberId ?>">
    <input type="hidden" name="intent" id="wp-intent" value="draft">
    <input type="hidden" name="days_json" id="wp-days-json">

    <?php if ($flash): ?>
        <div class="wp-flash wp-flash--<?= $flash['type'] ?>" role="<?= $flash['type'] === 'error' ? 'alert' : 'status' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <div class="wp-head">
        <div>
            <div class="wp-title-row">
                <h1 class="wp-title"><?= $title ?></h1>
                <?php if ($statusPill): ?>
                    <span class="wp-status <?= $statusPill[0] ?>"><?= $statusPill[1] ?></span>
                <?php endif; ?>
            </div>
            <p class="wp-subtitle">
                <?= $isEdit ? 'Updating the weekly plan for ' : 'Building a weekly plan for ' ?><?= htmlspecialchars($memberName) ?>. Changes save as a draft until you publish.
            </p>
        </div>
        <div class="wp-actions">
            <?php if ($isEdit): ?>
                <button type="button" class="wp-btn wp-btn--danger" id="wp-delete-open">Delete plan</button>
            <?php endif; ?>
            <button type="button" class="wp-btn" id="wp-preview-open">Preview</button>
            <button type="submit" class="wp-btn" data-intent="draft">Save draft</button>
            <button type="submit" class="wp-btn wp-btn--primary" data-intent="publish">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M2.5 7.5L5.5 10.5L11.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <?= $isPublished ? 'Publish changes' : 'Publish plan' ?>
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
                        <input class="wp-input" type="text" name="name" maxlength="100" required value="<?= htmlspecialchars($details['name']) ?>" placeholder="e.g. Hypertrophy Block A">
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Goal</span>
                        <select class="wp-input" name="goal">
                            <?php foreach ($goals as $goal): ?>
                                <option <?= $goal === $details['goal'] ? 'selected' : '' ?>><?= htmlspecialchars($goal) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Duration</span>
                        <select class="wp-input" name="duration_weeks">
                            <?php foreach ($durations as $weeks): ?>
                                <option value="<?= $weeks ?>" <?= $weeks === $details['duration_weeks'] ? 'selected' : '' ?>><?= $weeks ?> weeks</option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Start date</span>
                        <input class="wp-input" type="date" name="start_date" required value="<?= htmlspecialchars($details['start_date']) ?>">
                    </label>
                    <label class="wp-field">
                        <span class="wp-label">Sessions per week</span>
                        <input class="wp-input" type="number" name="sessions_per_week" min="1" max="7" required value="<?= (int) $details['sessions_per_week'] ?>">
                    </label>
                    <div class="wp-field wp-field--wide">
                        <span class="wp-label" id="wp-difficulty-label">Difficulty</span>
                        <div class="wp-segment" role="radiogroup" aria-labelledby="wp-difficulty-label">
                            <?php foreach ($difficulties as $key => $label): ?>
                                <button type="button" role="radio" data-value="<?= htmlspecialchars($key) ?>"
                                    class="<?= $key === $details['difficulty'] ? 'is-active' : '' ?>"
                                    aria-checked="<?= $key === $details['difficulty'] ? 'true' : 'false' ?>">
                                    <?= htmlspecialchars($label) ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" name="difficulty" id="wp-difficulty" value="<?= htmlspecialchars($details['difficulty']) ?>">
                    </div>
                </div>
            </section>

            <!-- Weekly plan -->
            <section class="wp-panel">
                <div class="wp-panel__head">
                    <h2 class="wp-panel__title">Weekly plan</h2>
                    <div class="wp-actions">
                        <?php if ($hasPrevious): ?>
                            <button type="button" class="wp-btn wp-btn--sm" id="wp-copy-last">Copy last week</button>
                        <?php endif; ?>
                        <button type="button" class="wp-btn wp-btn--sm" data-focus-library>Add from library</button>
                    </div>
                </div>

                <div class="wp-days" role="tablist" aria-label="Days of the week">
                    <?php foreach ($dayNames as $dow => $day): ?>
                        <button type="button" role="tab" class="wp-day <?= $dow === 1 ? 'is-active' : '' ?>" data-day="<?= $dow ?>"
                            aria-selected="<?= $dow === 1 ? 'true' : 'false' ?>" aria-controls="wp-day-panel">
                            <span class="wp-day__short"><?= htmlspecialchars($day['short']) ?></span>
                            <span class="wp-day__focus"></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div id="wp-day-panel" role="tabpanel"></div>

                <div class="wp-daybtns">
                    <button type="button" class="wp-btn wp-btn--primary" data-focus-library>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add exercise
                    </button>
                    <button type="button" class="wp-btn" id="wp-add-superset">Add superset</button>
                    <button type="button" class="wp-btn" id="wp-add-note">Add note for this day</button>
                </div>
            </section>
        </div>

        <aside class="wp-col">
            <!-- Client -->
            <section class="wp-panel">
                <div class="wp-client">
                    <span class="wp-avatar"><?= htmlspecialchars($memberInitials) ?></span>
                    <div>
                        <p class="wp-client__name"><?= htmlspecialchars($memberName) ?></p>
                        <p class="wp-client__meta"><?= htmlspecialchars($typeLabel) ?> · <?= htmlspecialchars($client['email']) ?></p>
                    </div>
                    <a href="/portal/messages" class="wp-btn wp-btn--icon" aria-label="Message <?= htmlspecialchars($memberName) ?>">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                        </svg>
                    </a>
                </div>
                <div class="wp-adherence">
                    <div class="wp-adherence__row">
                        <span>Adherence, last 30 days</span>
                        <strong><?= $adherence !== null ? (int) $adherence . '%' : '—' ?></strong>
                    </div>
                    <div class="wp-bar">
                        <?php if ($adherence !== null): ?>
                            <div class="wp-bar__fill <?= $adherence < ClientRosterService::NEEDS_REVIEW_BELOW ? 'wp-bar__fill--low' : '' ?>" style="width: <?= (int) $adherence ?>%"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="wp-tags">
                    <span class="wp-tag">Goal: <?= htmlspecialchars(mb_strtolower($details['goal'])) ?></span>
                    <?php if ($lastLogDate): ?>
                        <span class="wp-tag">Last workout <?= htmlspecialchars((new DateTimeImmutable($lastLogDate))->format('j M')) ?></span>
                    <?php else: ?>
                        <span class="wp-tag">No workouts logged yet</span>
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
                        <p class="wp-stat__value" id="wp-total-exercises">0</p>
                        <p class="wp-stat__label">Exercises</p>
                    </div>
                    <div>
                        <p class="wp-stat__value" id="wp-total-sessions">0</p>
                        <p class="wp-stat__label">Sessions</p>
                    </div>
                    <div>
                        <p class="wp-stat__value" id="wp-weekly-time">0m</p>
                        <p class="wp-stat__label">Weekly time</p>
                    </div>
                </div>
                <div class="wp-chart" aria-hidden="true">
                    <?php foreach ($dayNames as $dow => $day): ?>
                        <div class="wp-chart__bar" data-day="<?= $dow ?>"></div>
                    <?php endforeach; ?>
                </div>
                <div class="wp-chart__labels">
                    <?php foreach ($dayNames as $day): ?>
                        <span><?= htmlspecialchars($day['short']) ?></span>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Library: opened by "Add exercise" -->
            <section class="wp-panel" id="wp-library" hidden>
                <div class="wp-panel__head" style="margin-bottom: 12px;">
                    <h2 class="wp-panel__title">Exercise library</h2>
                    <span class="wp-panel__meta" id="wp-lib-count" style="margin-right: auto;"><?= count($library) ?> items</span>
                    <button type="button" class="wp-btn wp-btn--sm" id="wp-lib-new-open">New exercise</button>
                    <button type="button" class="wp-btn wp-btn--icon" id="wp-lib-close" aria-label="Close exercise library">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="wp-lib-new" id="wp-lib-new" hidden>
                    <label class="wp-field">
                        <span class="wp-label">Exercise name</span>
                        <input class="wp-input" type="text" id="wp-new-name" maxlength="100" placeholder="e.g. Incline dumbbell press">
                    </label>
                    <div class="wp-lib-new__row">
                        <label class="wp-field">
                            <span class="wp-label">Muscle group</span>
                            <select class="wp-input" id="wp-new-muscle">
                                <?php foreach ($muscleOptions as $option): ?>
                                    <option><?= htmlspecialchars($option) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                        <label class="wp-field">
                            <span class="wp-label">Equipment</span>
                            <select class="wp-input" id="wp-new-equipment">
                                <?php foreach ($equipmentOptions as $option): ?>
                                    <option><?= htmlspecialchars($option) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </label>
                    </div>
                    <p class="wp-lib-new__error" id="wp-new-error" role="alert" hidden></p>
                    <div class="wp-modal__actions">
                        <button type="button" class="wp-btn wp-btn--sm" id="wp-lib-new-cancel">Cancel</button>
                        <button type="button" class="wp-btn wp-btn--sm wp-btn--primary" id="wp-lib-new-save">Save to library</button>
                    </div>
                </div>
                <input class="wp-input" type="search" id="wp-lib-search" placeholder="Search exercises" aria-label="Search exercises">
                <div class="wp-lib-filters">
                    <?php foreach ($muscleGroups as $group): ?>
                        <button type="button" data-muscle="<?= htmlspecialchars($group) ?>" aria-pressed="false"><?= htmlspecialchars($group) ?></button>
                    <?php endforeach; ?>
                </div>
                <div id="wp-lib-list">
                    <?php foreach ($library as $item): ?>
                        <div class="wp-lib-item" data-id="<?= (int) $item['id'] ?>" data-name="<?= htmlspecialchars($item['name']) ?>" data-muscle="<?= htmlspecialchars($item['muscle_group']) ?>">
                            <span class="wp-lib-thumb"></span>
                            <div>
                                <p class="wp-lib-name"><?= htmlspecialchars($item['name']) ?></p>
                                <p class="wp-lib-meta"><?= htmlspecialchars($item['muscle_group'] . ', ' . mb_strtolower($item['equipment'])) ?></p>
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

<?php if ($isEdit): ?>
    <form method="post" action="/portal/clients/workout-plan/delete" id="wp-delete-form">
        <input type="hidden" name="member_id" value="<?= (int) $memberId ?>">
    </form>

    <div class="wp-modal" id="wp-delete-modal" hidden>
        <div class="wp-modal__box" role="alertdialog" aria-modal="true" aria-labelledby="wp-delete-title" aria-describedby="wp-delete-text">
            <h2 class="wp-modal__title" id="wp-delete-title">Delete this workout plan?</h2>
            <p class="wp-modal__text" id="wp-delete-text">
                <?= htmlspecialchars($memberName) ?> will no longer see this plan, and any unpublished draft is discarded.
                Their workout history is kept, and you can bring the plan back later with <strong>Copy last week</strong>.
            </p>
            <div class="wp-modal__actions">
                <button type="button" class="wp-btn" data-close>Cancel</button>
                <button type="submit" form="wp-delete-form" class="wp-btn wp-btn--danger-solid">Delete plan</button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="wp-modal" id="wp-copy-modal" hidden>
    <div class="wp-modal__box" role="alertdialog" aria-modal="true" aria-labelledby="wp-copy-title">
        <h2 class="wp-modal__title" id="wp-copy-title">Replace this week?</h2>
        <p class="wp-modal__text" id="wp-copy-text"></p>
        <div class="wp-modal__actions">
            <button type="button" class="wp-btn" data-close>Cancel</button>
            <button type="button" class="wp-btn wp-btn--primary" id="wp-copy-confirm">Replace</button>
        </div>
    </div>
</div>

<div class="wp-modal" id="wp-preview-modal" hidden>
    <div class="wp-modal__box wp-modal__box--wide" role="dialog" aria-modal="true" aria-labelledby="wp-preview-title">
        <h2 class="wp-modal__title" id="wp-preview-title">Preview</h2>
        <p class="wp-modal__text" style="margin-bottom: 8px;">How <?= htmlspecialchars($memberName) ?>'s week will look once published.</p>
        <div id="wp-preview-body"></div>
        <div class="wp-modal__actions" style="margin-top: 16px;">
            <button type="button" class="wp-btn" data-close>Close</button>
        </div>
    </div>
</div>

<div class="wp-toast" id="wp-toast" role="status" hidden></div>

<script>
    (function () {
        const DAY_NAMES = <?= json_encode(array_map(fn($d) => $d['long'], $dayNames)) ?>;
        const MEMBER_ID = <?= (int) $memberId ?>;
        const state = {
            days: <?= json_encode((object) $initialDays) ?>,
            active: 1,
            supersetTarget: null, // index of the exercise a superset is being built on
            showNote: {},
            dirty: <?= $unsaved !== null ? 'true' : 'false' ?>,
        };

        const form = document.getElementById('wp-form');
        const panel = document.getElementById('wp-day-panel');
        const tabs = document.querySelectorAll('.wp-day');
        const handleSvg = '<svg width="10" height="14" viewBox="0 0 10 14" fill="currentColor"><circle cx="3" cy="2" r="1.2"/><circle cx="7" cy="2" r="1.2"/><circle cx="3" cy="7" r="1.2"/><circle cx="7" cy="7" r="1.2"/><circle cx="3" cy="12" r="1.2"/><circle cx="7" cy="12" r="1.2"/></svg>';
        const removeSvg = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>';

        // ---------- helpers ----------
        function toast(message) {
            const el = document.getElementById('wp-toast');
            el.textContent = message;
            el.hidden = false;
            clearTimeout(toast.timer);
            toast.timer = setTimeout(() => { el.hidden = true; }, 3500);
        }

        function markDirty() {
            state.dirty = true;
        }

        function el(tag, className, text) {
            const node = document.createElement(tag);
            if (className) node.className = className;
            if (text !== undefined) node.textContent = text;
            return node;
        }

        function day(dow = state.active) {
            return state.days[dow];
        }

        // Estimated time: each set ≈ 40 s of work plus the prescribed rest
        function dayMinutes(d) {
            const seconds = d.exercises.reduce((sum, e) => sum + e.sets * (40 + e.rest), 0);
            return seconds ? Math.max(5, Math.round(seconds / 300) * 5) : 0;
        }

        function parseRest(value) {
            const match = String(value).match(/(\d+(?:\.\d+)?)/);
            if (!match) return null;
            const n = parseFloat(match[1]);
            return Math.round(/m/i.test(value) ? n * 60 : n);
        }

        function focusLabel(d) {
            if (d.focus.trim()) return d.focus.trim();
            return d.exercises.length ? 'Training' : 'Rest';
        }

        function supersetLetters(d) {
            const letters = {};
            let next = 0;
            d.exercises.forEach(e => {
                if (e.superset !== null && !(e.superset in letters)) {
                    letters[e.superset] = String.fromCharCode(65 + next++);
                }
            });
            return letters;
        }

        function clearLoneSupersets(d) {
            const sizes = {};
            d.exercises.forEach(e => { if (e.superset !== null) sizes[e.superset] = (sizes[e.superset] || 0) + 1; });
            d.exercises.forEach(e => { if (e.superset !== null && sizes[e.superset] < 2) e.superset = null; });
        }

        // ---------- rendering ----------
        function renderTabs() {
            tabs.forEach(tab => {
                const d = day(Number(tab.dataset.day));
                tab.querySelector('.wp-day__focus').textContent = focusLabel(d);
                tab.classList.toggle('wp-day--empty', d.exercises.length === 0);
            });
        }

        function renderSummary() {
            let total = 0;
            let sessions = 0;
            let minutes = 0;
            const perDay = {};
            Object.keys(state.days).forEach(dow => {
                const d = state.days[dow];
                total += d.exercises.length;
                if (d.exercises.length) sessions++;
                perDay[dow] = dayMinutes(d);
                minutes += perDay[dow];
            });
            const max = Math.max(1, ...Object.values(perDay));

            document.getElementById('wp-total-exercises').textContent = total;
            document.getElementById('wp-total-sessions').textContent = sessions;
            document.getElementById('wp-weekly-time').textContent =
                minutes >= 60 ? `${Math.floor(minutes / 60)}h ${minutes % 60}m` : `${minutes}m`;

            document.querySelectorAll('.wp-chart__bar').forEach(bar => {
                bar.style.height = `${Math.round(perDay[bar.dataset.day] / max * 100)}%`;
                bar.classList.toggle('is-active', Number(bar.dataset.day) === state.active);
            });
        }

        function renderDay() {
            const d = day();
            const letters = supersetLetters(d);
            panel.innerHTML = '';

            // Heading: "Monday," + editable focus, counts
            const head = el('div', 'wp-dayhead');
            head.appendChild(el('span', 'wp-dot'));
            head.appendChild(el('h3', 'wp-dayhead__title', DAY_NAMES[state.active] + ','));
            const focus = el('input', 'wp-focus-input');
            focus.type = 'text';
            focus.maxLength = 50;
            focus.placeholder = d.exercises.length ? 'add a focus' : 'rest day, or add a focus';
            focus.value = d.focus;
            focus.setAttribute('aria-label', DAY_NAMES[state.active] + ' focus');
            focus.addEventListener('input', () => {
                d.focus = focus.value;
                markDirty();
                renderTabs();
            });
            head.appendChild(focus);
            head.appendChild(el('span', 'wp-tag', `${d.exercises.length} exercises`));
            const minutes = dayMinutes(d);
            if (minutes) head.appendChild(el('span', 'wp-tag', `Est. ${minutes} min`));
            if (d.exercises.length > 1) head.appendChild(el('span', 'wp-dayhead__hint', 'Drag rows to reorder'));
            panel.appendChild(head);

            // Day note
            if (d.note || state.showNote[state.active]) {
                const note = el('textarea', 'wp-note');
                note.maxLength = 500;
                note.placeholder = `Note for ${DAY_NAMES[state.active]}, shown to your client`;
                note.value = d.note;
                note.setAttribute('aria-label', `Note for ${DAY_NAMES[state.active]}`);
                note.addEventListener('input', () => { d.note = note.value; markDirty(); });
                panel.appendChild(note);
            }

            // Superset in progress
            if (state.supersetTarget !== null && d.exercises[state.supersetTarget]) {
                const banner = el('div', 'wp-banner');
                banner.appendChild(el('span', '', `Pick an exercise from the library to pair with ${d.exercises[state.supersetTarget].name} as a superset.`));
                const cancel = el('button', '', 'Cancel');
                cancel.type = 'button';
                cancel.addEventListener('click', () => { state.supersetTarget = null; renderDay(); });
                banner.appendChild(cancel);
                panel.appendChild(banner);
            }

            const rows = el('div', 'wp-rows');
            if (d.exercises.length === 0) {
                const empty = el('div', 'wp-rest');
                empty.appendChild(el('strong', '', d.focus.trim() ? 'No exercises yet' : 'Rest day'));
                empty.appendChild(document.createTextNode('Add exercises from the library to plan this day.'));
                rows.appendChild(empty);
                panel.appendChild(rows);
                return;
            }

            const header = el('div', 'wp-row wp-row--head');
            ['', 'Exercise', 'Sets', 'Reps', 'Load', 'Rest', ''].forEach(t => header.appendChild(el('span', '', t)));
            rows.appendChild(header);

            const list = el('div', 'wp-row-list');
            d.exercises.forEach((exercise, index) => {
                const row = el('div', 'wp-row' + (exercise.superset !== null ? ' is-superset' : ''));
                row.draggable = true;
                row.dataset.index = index;

                const handle = el('span', 'wp-handle');
                handle.innerHTML = handleSvg;
                handle.setAttribute('aria-hidden', 'true');
                row.appendChild(handle);

                const name = el('span', 'wp-exercise');
                name.appendChild(el('span', 'wp-exercise__name', exercise.name));
                name.appendChild(el('span', 'wp-tag', exercise.muscle));
                if (exercise.superset !== null) {
                    name.appendChild(el('span', 'wp-tag wp-tag--superset', 'Superset ' + letters[exercise.superset]));
                }
                row.appendChild(name);

                const fields = [
                    ['sets', 'number', 'Sets', v => { const n = parseInt(v, 10); return n > 0 ? n : null; }],
                    ['reps', 'number', 'Reps', v => { const n = parseInt(v, 10); return n > 0 ? n : null; }],
                    ['load', 'text', 'Load', v => v.trim()],
                    ['rest', 'text', 'Rest', parseRest],
                ];
                fields.forEach(([key, type, label, parse]) => {
                    const input = el('input', 'wp-cell');
                    input.type = type;
                    if (type === 'number') input.min = 1;
                    if (key === 'load') { input.maxLength = 20; input.placeholder = '—'; }
                    input.value = key === 'rest' ? `${exercise.rest} s` : exercise[key];
                    input.setAttribute('aria-label', `${label} for ${exercise.name}`);
                    input.addEventListener('change', () => {
                        const value = parse(input.value);
                        if (value === null) {
                            input.value = key === 'rest' ? `${exercise.rest} s` : exercise[key];
                            return;
                        }
                        exercise[key] = value;
                        if (key === 'rest') input.value = `${value} s`;
                        markDirty();
                        renderSummary();
                        updateEstimate();
                    });
                    row.appendChild(input);
                });

                const remove = el('button', 'wp-btn wp-btn--icon');
                remove.type = 'button';
                remove.innerHTML = removeSvg;
                remove.setAttribute('aria-label', `Remove ${exercise.name}`);
                remove.addEventListener('click', () => {
                    d.exercises.splice(index, 1);
                    clearLoneSupersets(d);
                    state.supersetTarget = null;
                    markDirty();
                    renderAll();
                });
                row.appendChild(remove);

                list.appendChild(row);
            });
            rows.appendChild(list);
            panel.appendChild(rows);
            bindDrag(list);
        }

        // Keeps the "Est. N min" tag current while typing, without re-rendering inputs
        function updateEstimate() {
            const tags = panel.querySelectorAll('.wp-dayhead .wp-tag');
            const minutes = dayMinutes(day());
            if (tags[1]) tags[1].textContent = `Est. ${minutes} min`;
        }

        function renderAll() {
            renderTabs();
            renderDay();
            renderSummary();
        }

        // ---------- drag to reorder ----------
        function bindDrag(list) {
            let dragged = null;
            list.addEventListener('dragstart', e => {
                dragged = e.target.closest('.wp-row');
                if (!dragged) return;
                dragged.classList.add('is-dragging');
                e.dataTransfer.effectAllowed = 'move';
            });
            list.addEventListener('dragover', e => {
                if (!dragged) return;
                e.preventDefault();
                const after = [...list.querySelectorAll('.wp-row:not(.is-dragging)')]
                    .find(row => e.clientY < row.getBoundingClientRect().top + row.offsetHeight / 2);
                list.insertBefore(dragged, after ?? null);
            });
            list.addEventListener('dragend', () => {
                if (!dragged) return;
                const d = day();
                const order = [...list.querySelectorAll('.wp-row')].map(row => Number(row.dataset.index));
                const reordered = order.map(i => d.exercises[i]);
                const changed = order.some((value, i) => value !== i);
                d.exercises = reordered;
                dragged = null;
                if (changed) markDirty();
                state.supersetTarget = null;
                renderDay();
            });
        }

        // ---------- day tabs ----------
        tabs.forEach(tab => tab.addEventListener('click', () => {
            state.active = Number(tab.dataset.day);
            state.supersetTarget = null;
            tabs.forEach(t => {
                const on = t === tab;
                t.classList.toggle('is-active', on);
                t.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            renderDay();
            renderSummary();
        }));

        // ---------- plan details ----------
        const segment = document.querySelectorAll('.wp-segment button');
        segment.forEach(btn => btn.addEventListener('click', () => {
            segment.forEach(b => {
                b.classList.toggle('is-active', b === btn);
                b.setAttribute('aria-checked', b === btn ? 'true' : 'false');
            });
            document.getElementById('wp-difficulty').value = btn.dataset.value;
            markDirty();
        }));
        form.querySelectorAll('.wp-fields input, .wp-fields select').forEach(input => input.addEventListener('input', markDirty));

        // ---------- library ----------
        const library = document.getElementById('wp-library');
        const libList = document.getElementById('wp-lib-list');
        const libSearch = document.getElementById('wp-lib-search');
        const libFilters = document.querySelectorAll('.wp-lib-filters button');
        const addSvg = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>';
        let muscle = null;

        function openLibrary() {
            library.hidden = false;
            library.scrollIntoView({ behavior: 'smooth', block: 'start' });
            libSearch.focus({ preventScroll: true });
        }

        function filterLibrary() {
            const term = libSearch.value.trim().toLowerCase();
            let visible = 0;
            libList.querySelectorAll('.wp-lib-item').forEach(item => {
                const show = item.dataset.name.toLowerCase().includes(term) && (!muscle || item.dataset.muscle === muscle);
                item.classList.toggle('is-hidden', !show);
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

        // Delegated so exercises created with "New exercise" can be added too
        libList.addEventListener('click', e => {
            const btn = e.target.closest('[data-add]');
            if (!btn) return;
            const item = btn.closest('.wp-lib-item');
            const d = day();
            if (d.exercises.length >= 30) {
                toast('A day can have at most 30 exercises.');
                return;
            }

            const exercise = {
                exercise_id: Number(item.dataset.id),
                name: item.dataset.name,
                muscle: item.dataset.muscle,
                sets: 3,
                reps: 10,
                load: '',
                rest: 60,
                superset: null,
            };

            if (state.supersetTarget !== null && d.exercises[state.supersetTarget]) {
                const target = d.exercises[state.supersetTarget];
                if (target.superset === null) {
                    const used = d.exercises.map(e => e.superset).filter(g => g !== null);
                    target.superset = used.length ? Math.max(...used) + 1 : 1;
                }
                exercise.superset = target.superset;
                // Insert after the last exercise already in that superset
                let at = state.supersetTarget;
                while (d.exercises[at + 1] && d.exercises[at + 1].superset === target.superset) at++;
                d.exercises.splice(at + 1, 0, exercise);
                state.supersetTarget = null;
                toast(`Added ${exercise.name} as a superset.`);
            } else {
                d.exercises.push(exercise);
                toast(`Added ${exercise.name} to ${DAY_NAMES[state.active]}.`);
            }

            markDirty();
            renderAll();
        });

        document.querySelectorAll('[data-focus-library]').forEach(btn => btn.addEventListener('click', openLibrary));

        document.getElementById('wp-lib-close').addEventListener('click', () => {
            library.hidden = true;
            state.supersetTarget = null;
            renderDay();
        });

        // ---------- new exercise (saved to the shared library) ----------
        const newForm = document.getElementById('wp-lib-new');
        const newName = document.getElementById('wp-new-name');
        const newError = document.getElementById('wp-new-error');
        const newSave = document.getElementById('wp-lib-new-save');

        function closeNewForm() {
            newForm.hidden = true;
            newName.value = '';
            newError.hidden = true;
        }

        function libraryItem(exercise) {
            const item = el('div', 'wp-lib-item');
            item.dataset.id = exercise.id;
            item.dataset.name = exercise.name;
            item.dataset.muscle = exercise.muscle_group;
            item.appendChild(el('span', 'wp-lib-thumb'));
            const text = el('div');
            text.appendChild(el('p', 'wp-lib-name', exercise.name));
            text.appendChild(el('p', 'wp-lib-meta', `${exercise.muscle_group}, ${exercise.equipment.toLowerCase()}`));
            item.appendChild(text);
            const add = el('button', 'wp-btn wp-btn--icon');
            add.type = 'button';
            add.dataset.add = '';
            add.innerHTML = addSvg;
            add.setAttribute('aria-label', `Add ${exercise.name} to the selected day`);
            item.appendChild(add);
            return item;
        }

        async function saveNewExercise() {
            if (!newName.value.trim()) {
                newError.textContent = 'Give the exercise a name.';
                newError.hidden = false;
                newName.focus();
                return;
            }

            const body = new FormData();
            body.append('name', newName.value);
            body.append('muscle_group', document.getElementById('wp-new-muscle').value);
            body.append('equipment', document.getElementById('wp-new-equipment').value);

            newSave.disabled = true;
            try {
                const response = await fetch('/api/exercises', { method: 'POST', body });
                const exercise = await response.json();
                if (!response.ok) throw new Error(exercise.error || 'Could not save the exercise.');

                // Keep the list in the same muscle group → name order as the server
                const items = [...libList.querySelectorAll('.wp-lib-item')];
                const before = items.find(i =>
                    i.dataset.muscle.localeCompare(exercise.muscle_group) > 0 ||
                    (i.dataset.muscle === exercise.muscle_group && i.dataset.name.localeCompare(exercise.name) > 0));
                libList.insertBefore(libraryItem(exercise), before ?? document.getElementById('wp-lib-empty'));
                document.getElementById('wp-lib-count').textContent = `${items.length + 1} items`;

                closeNewForm();
                filterLibrary();
                toast(`${exercise.name} added to the library.`);
            } catch (e) {
                newError.textContent = e.message;
                newError.hidden = false;
            } finally {
                newSave.disabled = false;
            }
        }

        document.getElementById('wp-lib-new-open').addEventListener('click', () => {
            newForm.hidden = false;
            newName.focus();
        });
        document.getElementById('wp-lib-new-cancel').addEventListener('click', closeNewForm);
        newSave.addEventListener('click', saveNewExercise);
        // Enter would otherwise submit the whole plan form
        newName.addEventListener('keydown', e => {
            if (e.key !== 'Enter') return;
            e.preventDefault();
            saveNewExercise();
        });

        // ---------- superset + note ----------
        document.getElementById('wp-add-superset').addEventListener('click', () => {
            const d = day();
            if (!d.exercises.length) {
                toast('Add an exercise first, then pair another with it.');
                return;
            }
            state.supersetTarget = d.exercises.length - 1;
            renderDay();
            openLibrary();
        });

        document.getElementById('wp-add-note').addEventListener('click', () => {
            state.showNote[state.active] = true;
            renderDay();
            panel.querySelector('.wp-note')?.focus();
        });

        // ---------- dialogs ----------
        function openModal(id) {
            const modal = document.getElementById(id);
            modal.hidden = false;
            modal.querySelector('[data-close]')?.focus();
        }

        document.querySelectorAll('.wp-modal').forEach(modal => {
            modal.addEventListener('click', e => {
                if (e.target === modal || e.target.closest('[data-close]')) modal.hidden = true;
            });
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') document.querySelectorAll('.wp-modal').forEach(m => { m.hidden = true; });
        });

        document.getElementById('wp-delete-open')?.addEventListener('click', () => openModal('wp-delete-modal'));
        document.getElementById('wp-delete-form')?.addEventListener('submit', () => { state.dirty = false; });

        // Preview: the week the way the client will see it
        document.getElementById('wp-preview-open').addEventListener('click', () => {
            const body = document.getElementById('wp-preview-body');
            body.innerHTML = '';
            Object.keys(state.days).forEach(dow => {
                const d = state.days[dow];
                const block = el('div', 'wp-preview-day');
                block.appendChild(el('h3', '', `${DAY_NAMES[dow]} · ${focusLabel(d)}`));
                if (d.note.trim()) block.appendChild(el('p', '', d.note.trim()));
                if (d.exercises.length) {
                    const ul = el('ul');
                    const letters = supersetLetters(d);
                    d.exercises.forEach(e => {
                        let text = `${e.name} — ${e.sets} sets x ${e.reps} reps`;
                        if (e.load) text += ` • ${e.load}`;
                        text += ` • rest ${e.rest} s`;
                        if (e.superset !== null) text += ` (superset ${letters[e.superset]})`;
                        ul.appendChild(el('li', '', text));
                    });
                    block.appendChild(ul);
                } else {
                    block.appendChild(el('p', '', 'Rest day'));
                }
                body.appendChild(block);
            });
            openModal('wp-preview-modal');
        });

        // Copy last week: pull the previous plan's week into the editor
        const copyBtn = document.getElementById('wp-copy-last');
        let pendingCopy = null;

        function applyCopy(previous) {
            Object.keys(state.days).forEach(dow => {
                const src = previous.days[dow] || { focus: null, note: null, exercises: [] };
                state.days[dow] = {
                    focus: src.focus || '',
                    note: src.note || '',
                    exercises: src.exercises.map(e => ({
                        exercise_id: e.exercise_id,
                        name: e.name,
                        muscle: e.muscle,
                        sets: e.sets,
                        reps: e.reps,
                        load: e.load || '',
                        rest: e.rest,
                        superset: e.superset,
                    })),
                };
            });
            state.supersetTarget = null;
            markDirty();
            renderAll();
            toast(`Copied the week from ${previous.name}. Save or publish to keep it.`);
        }

        copyBtn?.addEventListener('click', async () => {
            copyBtn.disabled = true;
            try {
                const response = await fetch(`/api/workout-plans/previous?member=${MEMBER_ID}`);
                const previous = await response.json();
                if (!response.ok) throw new Error(previous.error || 'Could not load the previous plan.');

                const hasExercises = Object.values(state.days).some(d => d.exercises.length);
                if (!hasExercises) {
                    applyCopy(previous);
                    return;
                }
                pendingCopy = previous;
                document.getElementById('wp-copy-text').textContent =
                    `This replaces every day of the current week with the week from ${previous.name}. Nothing is saved until you save or publish.`;
                openModal('wp-copy-modal');
            } catch (e) {
                toast(e.message);
            } finally {
                copyBtn.disabled = false;
            }
        });

        document.getElementById('wp-copy-confirm').addEventListener('click', () => {
            document.getElementById('wp-copy-modal').hidden = true;
            if (pendingCopy) applyCopy(pendingCopy);
            pendingCopy = null;
        });

        // ---------- save draft / publish ----------
        let intent = 'draft';
        form.querySelectorAll('button[type="submit"][data-intent]').forEach(btn => btn.addEventListener('click', () => {
            intent = btn.dataset.intent;
        }));

        form.addEventListener('submit', e => {
            const name = form.elements.name;
            if (!name.value.trim()) {
                e.preventDefault();
                toast('Give the plan a name before saving.');
                name.focus();
                return;
            }
            if (intent === 'publish' && !Object.values(state.days).some(d => d.exercises.length)) {
                e.preventDefault();
                toast('Add at least one exercise before publishing.');
                return;
            }

            document.getElementById('wp-intent').value = intent;
            document.getElementById('wp-days-json').value = JSON.stringify(Object.keys(state.days).map(dow => ({
                day: Number(dow),
                focus: state.days[dow].focus.trim(),
                note: state.days[dow].note.trim(),
                exercises: state.days[dow].exercises.map(ex => ({
                    exercise_id: ex.exercise_id,
                    sets: ex.sets,
                    reps: ex.reps,
                    load: ex.load,
                    rest: ex.rest,
                    superset: ex.superset,
                })),
            })));

            state.dirty = false;
            form.querySelectorAll('button[type="submit"]').forEach(b => { b.disabled = true; });
        });

        window.addEventListener('beforeunload', e => {
            if (!state.dirty) return;
            e.preventDefault();
            e.returnValue = '';
        });

        renderAll();
    })();
</script>
