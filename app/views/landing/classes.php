<?php
// Classes / weekly schedule view (script: classes.js, loaded at the bottom)
$pageStyles = ['landing/classes'];

$isLoggedIn = !empty($isLoggedIn);

// TODO: replace with data from the database (controller should pass $schedule)
$img = '/assets/images/landing/';
$types = [
    'hiit'     => ['label' => 'High Intensity', 'image' => $img . 'image-hiit-blast.png'],
    'strength' => ['label' => 'Strength',       'image' => $img . 'image-strength-circuit.png'],
    'cardio'   => ['label' => 'Cardio',         'image' => $img . 'image-spin-and-burn.png'],
    'flex'     => ['label' => 'Flexibility',    'image' => $img . 'image-yoga-flow.png'],
];

$schedule = $schedule ?? [
    // id, day, time, minutes, name, type, coach, level, spots left, capacity
    [1,  'mon', '06:00', 45, 'HIIT Blast',       'hiit',     'Lakmal',          'Advanced',     4,  20],
    [2,  'mon', '09:00', 60, 'Yoga Flow',        'flex',     'Nimali Fernando', 'All levels',   12, 15],
    [3,  'mon', '12:00', 50, 'Strength Circuit', 'strength', 'Dinesh Silva',    'Intermediate', 8,  16],
    [4,  'mon', '18:00', 40, 'Spin & Burn',      'cardio',   'Tharaka Jayasinghe', 'Intermediate', 0, 12],
    [5,  'mon', '19:30', 45, 'HIIT Blast',       'hiit',     'Lakmal',          'Advanced',     6,  20],
    [6,  'tue', '06:30', 50, 'Strength Circuit', 'strength', 'Lakmal',          'Intermediate', 10, 16],
    [7,  'tue', '17:30', 40, 'Spin & Burn',      'cardio',   'Tharaka Jayasinghe', 'All levels', 3, 12],
    [8,  'tue', '19:00', 60, 'Yoga Flow',        'flex',     'Nimali Fernando', 'All levels',   9,  15],
    [9,  'wed', '06:00', 45, 'HIIT Blast',       'hiit',     'Lakmal',          'Advanced',     11, 20],
    [10, 'wed', '12:00', 50, 'Strength Circuit', 'strength', 'Dinesh Silva',    'Intermediate', 0,  16],
    [11, 'wed', '18:30', 40, 'Spin & Burn',      'cardio',   'Tharaka Jayasinghe', 'Intermediate', 7, 12],
    [12, 'thu', '06:30', 60, 'Yoga Flow',        'flex',     'Nimali Fernando', 'Beginner',     14, 15],
    [13, 'thu', '17:30', 50, 'Strength Circuit', 'strength', 'Lakmal',          'Advanced',     5,  16],
    [14, 'thu', '19:00', 45, 'HIIT Blast',       'hiit',     'Dinesh Silva',    'Intermediate', 2,  20],
    [15, 'fri', '06:00', 40, 'Spin & Burn',      'cardio',   'Tharaka Jayasinghe', 'All levels', 9, 12],
    [16, 'fri', '18:00', 45, 'HIIT Blast',       'hiit',     'Lakmal',          'Advanced',     13, 20],
    [17, 'sat', '08:00', 60, 'Yoga Flow',        'flex',     'Nimali Fernando', 'All levels',   6,  15],
    [18, 'sat', '10:00', 50, 'Strength Circuit', 'strength', 'Lakmal',          'Intermediate', 12, 16],
    [19, 'sun', '09:00', 40, 'Spin & Burn',      'cardio',   'Tharaka Jayasinghe', 'Beginner',  10, 12],
];

$days = ['mon' => 'Monday', 'tue' => 'Tuesday', 'wed' => 'Wednesday', 'thu' => 'Thursday', 'fri' => 'Friday', 'sat' => 'Saturday', 'sun' => 'Sunday'];
$today  = strtolower(date('D'));
$monday = strtotime('monday this week');
$coaches = array_values(array_unique(array_column($schedule, 6)));
sort($coaches);
$e = fn($s) => htmlspecialchars((string) $s, ENT_QUOTES);
?>

<div class="cs">

    <!-- ─── Hero ─── -->
    <header class="cs-hero">
        <img class="cs-hero__img" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1600&h=700&fit=crop" alt="">
        <div class="cs-hero__shade" aria-hidden="true"></div>
        <div class="cs-container cs-hero__inner">
            <a href="/" class="cs-back">
                <svg viewBox="0 0 24 24">
                    <path d="M19 12H5m7 7-7-7 7-7" />
                </svg>
                Back to home
            </a>
            <h1 class="cs-hero__title">Class schedule</h1>
            <p class="cs-hero__text">Pick a day, find a session, and book your spot. Spots update in real time, and full classes are marked.</p>
        </div>
    </header>

    <!-- ─── Day tabs (sticky) ─── -->
    <nav class="cs-days" aria-label="Days of the week">
        <div class="cs-container">
            <div class="cs-days__list" role="tablist">
                <?php $i = 0;
                foreach ($days as $key => $name):
                    $date = strtotime("+$i day", $monday);
                    $i++;
                    $isToday = $key === $today; ?>
                    <button class="cs-day<?= $isToday ? ' is-active' : '' ?>" role="tab"
                        aria-selected="<?= $isToday ? 'true' : 'false' ?>"
                        data-day="<?= $key ?>" data-day-name="<?= $name ?>">
                        <span class="cs-day__name"><?= substr($name, 0, 3) ?></span>
                        <span class="cs-day__date"><?= date('j', $date) ?></span>
                        <?php if ($isToday): ?><span class="cs-day__today">Today</span><?php endif; ?>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>
    </nav>

    <!-- ─── Filters ─── -->
    <section class="cs-filters" aria-label="Filter classes">
        <div class="cs-container cs-filters__inner">
            <div class="cs-chips" role="group" aria-label="Class type">
                <button class="cs-chip is-active" data-type="all" aria-pressed="true">All types</button>
                <?php foreach ($types as $key => $t): ?>
                    <button class="cs-chip" data-type="<?= $key ?>" aria-pressed="false">
                        <span class="cs-dot cs-dot--<?= $key ?>" aria-hidden="true"></span><?= $e($t['label']) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <label class="cs-select">
                <span class="cs-sr">Filter by coach</span>
                <select id="cs-coach">
                    <option value="all">All coaches</option>
                    <?php foreach ($coaches as $c): ?>
                        <option value="<?= $e($c) ?>"><?= $e($c) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        </div>
    </section>

    <!-- ─── Schedule ─── -->
    <section class="cs-schedule">
        <div class="cs-container">
            <div class="cs-schedule__head">
                <h2 class="cs-schedule__title">
                    <span id="cs-day-title"><?= $days[$today] ?? 'Monday' ?></span>
                    <span class="cs-schedule__count" id="cs-count" aria-live="polite"></span>
                </h2>
                <?php if (!$isLoggedIn): ?>
                    <a href="/onboarding?flow=class" class="cs-btn">
                        <span class="cs-btn__label">Join to book</span>
                        <span class="cs-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                <?php endif; ?>
            </div>

            <div class="cs-list" id="cs-list">
                <?php foreach ($schedule as [$id, $day, $time, $mins, $name, $type, $coach, $level, $left, $cap]):
                    $full = $left <= 0;
                    $low  = !$full && $left <= 5;
                    $pct  = $cap > 0 ? round((($cap - $left) / $cap) * 100) : 100; ?>
                    <article class="cs-card<?= $full ? ' is-full' : '' ?>"
                        data-day="<?= $day ?>" data-type="<?= $type ?>" data-coach="<?= $e($coach) ?>">

                        <div class="cs-card__time">
                            <strong><?= $e($time) ?></strong>
                            <span><?= (int) $mins ?> min</span>
                        </div>

                        <div class="cs-card__info">
                            <img src="<?= $e($types[$type]['image']) ?>" alt="" loading="lazy">
                            <div>
                                <span class="cs-tag cs-tag--<?= $type ?>"><?= $e($types[$type]['label']) ?></span>
                                <h3><?= $e($name) ?></h3>
                                <p>with <?= $e($coach) ?></p>
                            </div>
                        </div>

                        <dl class="cs-card__meta">
                            <div>
                                <dt>Level</dt>
                                <dd><?= $e($level) ?></dd>
                            </div>
                            <div>
                                <dt>Spots left</dt>
                                <dd class="cs-spots<?= $low ? ' is-low' : '' ?><?= $full ? ' is-full' : '' ?>">
                                    <?= $full ? 'Full' : (int) $left . '<small>/' . (int) $cap . '</small>' ?>
                                </dd>
                                <span class="cs-bar" aria-hidden="true"><span style="width: <?= $pct ?>%"></span></span>
                            </div>
                        </dl>

                        <div class="cs-card__action">
                            <?php if ($full): ?>
                                <button class="cs-book is-disabled" disabled>Class full</button>
                            <?php elseif ($isLoggedIn): ?>
                                <!-- TODO: point action at your booking route -->
                                <form method="post" action="/classes/book">
                                    <input type="hidden" name="class_id" value="<?= (int) $id ?>">
                                    <button class="cs-book" type="submit">Book now</button>
                                </form>
                            <?php else: ?>
                                <a class="cs-book" href="/onboarding?flow=class&amp;class=<?= (int) $id ?>">Book now</a>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endforeach; ?>

                <div class="cs-empty" id="cs-empty" hidden>
                    <p>No classes match these filters on this day.</p>
                    <button class="cs-link" type="button" id="cs-reset">Clear filters</button>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── CTA ─── -->
    <?php if (!$isLoggedIn): ?>
        <section class="cs-cta">
            <div class="cs-container cs-cta__inner">
                <div>
                    <h2>Ready to book your first class?</h2>
                    <p>Become a member to book any session on the weekly schedule.</p>
                </div>
                <a href="/onboarding" class="cs-btn">
                    <span class="cs-btn__label">Join now</span>
                    <span class="cs-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></span>
                </a>
            </div>
        </section>
    <?php endif; ?>

</div>

<script src="/assets/js/classes.js" defer></script>