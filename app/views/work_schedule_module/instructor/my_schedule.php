<link
    rel="stylesheet"
    href="/assets/css/instructor-schedule.css"
>

<section class="ws-page">


    <!-- Header -->
    <div class="ws-page-head">

        <div>
            <h1>My Schedule</h1>

            <p>
                View your classes, personal training sessions,
                floor duties, leave and replacement sessions.
            </p>
        </div>

        <div class="ws-head-controls">

            <div class="ws-week-control">
                <button
                    type="button"
                    class="ws-icon-btn"
                    aria-label="Previous week"
                >
                    ←
                </button>

                <span>
                    <?= htmlspecialchars($week['start']) ?>
                    –
                    <?= htmlspecialchars($week['end']) ?>,
                    <?= htmlspecialchars($week['year']) ?>
                </span>

                <button
                    type="button"
                    class="ws-icon-btn"
                    aria-label="Next week"
                >
                    →
                </button>
            </div>
        </div>
    </div>


    <!-- Calendar -->
    <div class="ws-calendar-card">

        <!-- Calendar toolbar -->
        <div class="ws-calendar-toolbar">

            <div class="ws-calendar-tools">
                <button type="button" class="ws-tool-btn">
                    +
                </button>

                <button type="button" class="ws-tool-btn">
                    ☰
                </button>
            </div>

            <div class="ws-calendar-search">
                <span>⌕</span>

                <input
                    type="text"
                    id="scheduleSearch"
                    placeholder="Search schedule..."
                >
            </div>

        </div>


        <!-- Day header -->
        <div class="ws-calendar-header">

            <div class="ws-time-header"></div>

            <?php foreach ($days as $day): ?>

                <div
                    class="ws-day-header
                    <?= $day['today'] ? 'is-current' : '' ?>"
                >
                    <span>
                        <?= htmlspecialchars(
                            strtoupper($day['name'])
                        ) ?>
                    </span>

                    <strong>
                        <?= htmlspecialchars($day['date']) ?>
                    </strong>

                    <?php if ($day['today']): ?>
                        <div class="ws-current-indicator"></div>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>


        <!-- Calendar body -->
        <div class="ws-calendar-body">

            <!-- Time column -->
            <div class="ws-times">

                <?php
                $times = [
                    '07:00 AM',
                    '08:00 AM',
                    '09:00 AM',
                    '10:00 AM',
                    '11:00 AM',
                    '12:00 PM',
                    '01:00 PM',
                    '02:00 PM',
                    '03:00 PM',
                    '04:00 PM',
                    '05:00 PM'
                ];
                ?>

                <?php foreach ($times as $time): ?>

                    <div class="ws-time-label">
                        <?= htmlspecialchars($time) ?>
                    </div>

                <?php endforeach; ?>

            </div>


            <!-- Days -->
            <?php foreach ($days as $day): ?>

                <div
                    class="ws-day-column"
                    data-day="<?= htmlspecialchars($day['key']) ?>"
                >

                    <?php for ($i = 0; $i < 10; $i++): ?>
                        <div class="ws-hour-line"></div>
                    <?php endfor; ?>


                    <?php foreach ($schedule as $item): ?>

                        <?php if ($item['day'] !== $day['key']) {
                            continue;
                        } ?>

                        <article
                            class="ws-event
                            ws-event--<?= htmlspecialchars($item['type']) ?>"
                            data-search="
                                <?= htmlspecialchars(
                                    strtolower(
                                        $item['title']
                                        . ' '
                                        . $item['subtitle']
                                        . ' '
                                        . $item['type']
                                    )
                                ) ?>
                            "
                            style="
                                top:
                                <?= (int)$item['top'] ?>px;

                                height:
                                <?= (int)$item['height'] ?>px;
                            "
                        >

                            <div class="ws-event-time">

                                <?php if (
                                    $item['start'] === 'Full Day'
                                ): ?>

                                    Full Day

                                <?php else: ?>

                                    <?= htmlspecialchars($item['start']) ?>
                                    –
                                    <?= htmlspecialchars($item['end']) ?>

                                <?php endif; ?>

                            </div>

                            <h3>
                                <?= htmlspecialchars($item['title']) ?>
                            </h3>

                            <p>
                                <?= htmlspecialchars(
                                    $item['subtitle']
                                ) ?>
                            </p>

                            <div class="ws-event-status">

                                <span></span>

                                <?= htmlspecialchars(
                                    $item['status']
                                ) ?>

                            </div>

                        </article>

                    <?php endforeach; ?>

                </div>

            <?php endforeach; ?>

        </div>


        <!-- Legend -->
        <div class="ws-calendar-legend">

            <span class="ws-legend-title">
                LEGEND:
            </span>

            <div>
                <i class="ws-dot ws-dot--class"></i>
                Class Session
            </div>

            <div>
                <i class="ws-dot ws-dot--pt"></i>
                PT Session
            </div>

            <div>
                <i class="ws-dot ws-dot--floor"></i>
                Floor Duty
            </div>

            <div>
                <i class="ws-dot ws-dot--leave"></i>
                Approved Leave
            </div>

            <div>
                <i class="ws-dot ws-dot--replacement"></i>
                Replacement Session
            </div>

        </div>

    </div>

</section>

<script src="/assets/js/instructor-schedule.js"></script>