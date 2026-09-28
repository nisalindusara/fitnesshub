<style>
  /* Analytics screen – page content (id/class selectors only)
   Font (Plus Jakarta Sans), page background and chrome spacing come from member-layout

   Colour meaning (same as the dashboard)
   green  #1E8E5A  done / logged / attended
   amber  #D08A0B  partly done / below 80%
   red    #C62828  missed / not logged
   light grey      later today / other periods
   dashed outline  rest day
*/

  #analytics-page {
    --ink: #18181b;
    --muted: #64748b;
    --line: #ececef;
    --card: #ffffff;
    --track: #eef0f3;
    --bar: #dfe2e7;

    --green: #1e8e5a;
    --green-dark: #17744a;
    --green-soft: #e6f4ec;
    --amber: #d08a0b;
    --amber-text: #9a6406;
    --amber-soft: #fdf1dc;
    --red: #c62828;
    --red-soft: #fdeaea;

    box-sizing: border-box;
    width: min(100%, 960px);
    display: flex;
    flex-direction: column;
    gap: 48px;
    font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
    color: var(--ink);
  }

  /* ---------- Page heading ---------- */
  .page-head__title {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 700;
    letter-spacing: -0.02em;
  }

  .page-head__subtitle {
    margin: 6px 0 0;
    font-size: 0.95rem;
    color: var(--muted);
  }

  /* ---------- Section block ---------- */
  .block {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .block__head--row {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 16px;
  }

  .block__title {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
    letter-spacing: -0.01em;
  }

  .block__caption {
    margin: 4px 0 0;
    font-size: 0.9rem;
    color: var(--muted);
  }

  /* ---------- Card ---------- */
  .card {
    box-sizing: border-box;
    padding: 24px;
    border-radius: 20px;
    background: var(--card);
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
  }

  .card__summary {
    margin: 24px 0 0;
    padding-top: 16px;
    border-top: 1px solid var(--line);
    font-size: 0.88rem;
    line-height: 1.5;
    color: var(--muted);
  }

  /* ---------- Stat cards ---------- */
  .stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  .stat__top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 10px;
  }

  .stat__label {
    margin: 0;
    font-size: 0.88rem;
    font-weight: 500;
    color: var(--muted);
  }

  .stat__icon {
    flex: none;
    width: 36px;
    height: 36px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--green-soft);
  }

  .stat__icon svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: var(--green);
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .stat__value {
    margin: 0 0 16px;
    font-size: 2rem;
    font-weight: 700;
    line-height: 1;
    letter-spacing: -0.02em;
  }

  .mini-bar {
    height: 6px;
    border-radius: 999px;
    background: var(--track);
    overflow: hidden;
  }

  .mini-bar--blank {
    background: transparent;
  }

  .mini-bar__fill {
    display: block;
    height: 100%;
    border-radius: inherit;
  }

  .mini-bar__fill--good {
    background: var(--green);
  }

  .mini-bar__fill--warn {
    background: var(--amber);
  }

  .stat__note {
    margin: 10px 0 0;
    font-size: 0.84rem;
    color: var(--muted);
  }

  /* ---------- Monthly target ---------- */
  .target__row {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 14px;
  }

  .target__label {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 600;
  }

  .target__percent {
    flex: none;
    margin: 0;
    white-space: nowrap;
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--green);
  }

  .target__of {
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--muted);
  }

  .target__track {
    position: relative;
    height: 10px;
    border-radius: 999px;
    background: var(--track);
    overflow: hidden;
  }

  .target__fill {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    background: var(--green);
  }

  /* the missed session, shown after the done ones */
  .target__miss {
    position: absolute;
    top: 0;
    bottom: 0;
    background: var(--red);
    opacity: 0.35;
  }

  .target__note {
    margin: 12px 0 0;
    font-size: 0.85rem;
    color: var(--muted);
  }

  /* ---------- Legend ---------- */
  .legend {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    gap: 8px 20px;
    margin-bottom: 20px;
  }

  .legend__item {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    font-size: 0.78rem;
    color: var(--muted);
  }

  .swatch {
    box-sizing: border-box;
    width: 12px;
    height: 12px;
    border-radius: 4px;
  }

  .swatch--done {
    background: var(--green);
  }

  .swatch--partial {
    background: var(--amber);
  }

  .swatch--missed {
    background: var(--red-soft);
    border: 1.5px solid #f3b9b9;
  }

  .swatch--upcoming {
    background: var(--track);
  }

  .swatch--rest {
    border: 1.5px dashed #c9cdd4;
  }

  /* ---------- Workout schedule ---------- */
  .wk {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 12px;
  }

  .wk__col {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    min-width: 0;
    text-align: center;
  }

  .wk__day {
    font-size: 0.82rem;
    font-weight: 500;
    color: var(--muted);
  }

  .wk__day--today {
    color: var(--ink);
    font-weight: 700;
  }

  .wk__track {
    box-sizing: border-box;
    width: 100%;
    max-width: 52px;
    height: 150px;
    display: flex;
    align-items: flex-end;
    border-radius: 14px;
    background: var(--track);
    overflow: hidden;
  }

  .wk__fill {
    display: block;
    width: 100%;
  }

  .wk__fill--done {
    background: var(--green);
  }

  .wk__fill--partial {
    background: var(--amber);
  }

  .wk__col--missed .wk__track {
    background: var(--red-soft);
    border: 1.5px solid #f3b9b9;
  }

  .wk__track--rest {
    background: transparent;
    border: 1.5px dashed #d6d9df;
  }

  .wk__session {
    font-size: 0.84rem;
    font-weight: 600;
    line-height: 1.25;
  }

  .wk__session--rest {
    font-weight: 500;
    color: var(--muted);
  }

  .wk__detail {
    margin-top: -6px;
    font-size: 0.76rem;
    color: var(--muted);
    white-space: nowrap;
  }

  .wk__col--partial .wk__detail {
    color: var(--amber-text);
    font-weight: 600;
  }

  .wk__col--missed .wk__detail {
    color: var(--red);
    font-weight: 600;
  }

  /* ---------- Meal plan ---------- */
  .meals {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .meals__row {
    display: grid;
    grid-template-columns: 90px repeat(7, 1fr) 44px;
    align-items: center;
    gap: 10px;
  }

  .meals__meal {
    font-size: 0.88rem;
    font-weight: 600;
  }

  .meals__day {
    font-size: 0.82rem;
    font-weight: 500;
    color: var(--muted);
    text-align: center;
  }

  .meals__day--today {
    color: var(--ink);
    font-weight: 700;
  }

  .meals__cell {
    box-sizing: border-box;
    display: block;
    height: 38px;
    border-radius: 10px;
  }

  .meals__cell--done {
    background: var(--green);
  }

  .meals__cell--missed {
    background: var(--red-soft);
    border: 1.5px solid #f3b9b9;
  }

  .meals__cell--upcoming {
    background: var(--track);
  }

  .meals__total {
    font-size: 0.88rem;
    font-weight: 700;
    text-align: right;
  }

  .meals__total--good {
    color: var(--green);
  }

  .meals__total--warn {
    color: var(--amber-text);
  }

  /* ---------- Attendance ---------- */
  .trend__radio {
    position: absolute;
    opacity: 0;
    pointer-events: none;
  }

  .toggle {
    flex: none;
    display: flex;
    gap: 4px;
    padding: 4px;
    border-radius: 999px;
    background: var(--card);
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
  }

  .toggle__tab {
    padding: 7px 18px;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--muted);
    cursor: pointer;
    transition: background-color 0.15s ease, color 0.15s ease;
  }

  .toggle__tab:hover {
    color: var(--ink);
  }

  #view-week:checked~.block__head .toggle__tab--week,
  #view-month:checked~.block__head .toggle__tab--month {
    background: var(--ink);
    color: #fff;
    font-weight: 600;
  }

  #view-week:focus-visible~.block__head .toggle__tab--week,
  #view-month:focus-visible~.block__head .toggle__tab--month {
    outline: 2px solid var(--green);
    outline-offset: 2px;
  }

  .trend__caption--month,
  .trend__summary--month,
  .chart--month {
    display: none;
  }

  #view-month:checked~.block__head .trend__caption--week,
  #view-month:checked~.card .chart--week,
  #view-month:checked~.card .trend__summary--week {
    display: none;
  }

  #view-month:checked~.block__head .trend__caption--month,
  #view-month:checked~.card .chart--month,
  #view-month:checked~.card .trend__summary--month {
    display: block;
  }

  .chart {
    position: relative;
    height: 200px;
    padding: 8px 0 28px 44px;
  }

  .grid {
    position: absolute;
    top: 8px;
    right: 0;
    bottom: 28px;
    left: 44px;
    pointer-events: none;
  }

  .grid__line {
    position: absolute;
    left: 0;
    right: 0;
    border-top: 1px dashed var(--line);
  }

  .grid__value {
    position: absolute;
    right: calc(100% + 10px);
    top: -8px;
    font-size: 0.72rem;
    color: var(--muted);
    white-space: nowrap;
  }

  .bars {
    position: relative;
    height: 100%;
    display: flex;
    justify-content: space-between;
    gap: 10px;
  }

  .bar-col {
    flex: 1;
    position: relative;
    display: flex;
    justify-content: center;
  }

  .bar-track {
    width: 100%;
    max-width: 40px;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;
  }

  .bar {
    width: 100%;
    min-height: 4px;
    border-radius: 8px 8px 4px 4px;
    background: var(--bar);
  }

  .bar--empty {
    background: var(--track);
  }

  .bar--visit,
  .bar--current {
    background: var(--green);
  }

  .bar__value {
    margin-bottom: 6px;
    font-size: 0.78rem;
    font-weight: 700;
    color: var(--green);
  }

  .bar__label {
    position: absolute;
    bottom: -26px;
    font-size: 0.75rem;
    font-weight: 500;
    color: var(--muted);
    white-space: nowrap;
  }

  .bar__label--current {
    color: var(--ink);
    font-weight: 700;
  }

  /* ---------- Mobile ---------- */
  @media (max-width: 640px) {
    #analytics-page {
      gap: 40px;
    }

    .card {
      padding: 18px 14px;
      border-radius: 18px;
    }

    .stats {
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .stats .stat:last-child {
      grid-column: 1 / -1;
    }

    .stat__value {
      font-size: 1.7rem;
    }

    .block__head--row {
      flex-wrap: wrap;
      align-items: flex-start;
    }

    .legend {
      justify-content: flex-start;
      gap: 6px 14px;
    }

    .wk {
      gap: 4px;
    }

    .wk__track {
      height: 110px;
      border-radius: 10px;
    }

    .wk__day {
      font-size: 0.7rem;
    }

    .wk__session {
      font-size: 0.66rem;
    }

    .wk__detail {
      font-size: 0.6rem;
    }

    .meals__row {
      grid-template-columns: 66px repeat(7, 1fr) 28px;
      gap: 4px;
    }

    .meals__meal {
      font-size: 0.72rem;
    }

    .meals__day {
      font-size: 0.64rem;
    }

    .meals__cell {
      height: 28px;
      border-radius: 8px;
    }

    .meals__total {
      font-size: 0.75rem;
    }

    .chart {
      padding-left: 36px;
    }

    .grid {
      left: 36px;
    }

    .bars {
      gap: 4px;
    }

    .chart--month .bar__label {
      font-size: 0.62rem;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    .toggle__tab {
      transition: none;
    }
  }
</style>

<!-- Analytics screen: page content only (header + bottom nav come from member-layout) -->
<div id="analytics-page" class="analytics">

  <!-- Page heading -->
  <header class="page-head">
    <h1 class="page-head__title">Analytics</h1>
    <p class="page-head__subtitle">Your week at a glance, 21 to 27 September</p>
  </header>

  <!-- Summary -->
  <section class="block" aria-label="Weekly summary">
    <div class="stats">
      <div class="card stat">
        <div class="stat__top">
          <p class="stat__label">Workouts done</p>
          <span class="stat__icon"><svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M6 7v10M18 7v10M3 10v4M21 10v4M6 12h12"></path>
            </svg></span>
        </div>
        <p class="stat__value">80%</p>
        <div class="mini-bar"><span class="mini-bar__fill mini-bar__fill--good" style="width:80%"></span></div>
        <p class="stat__note">4 of 5 planned sessions</p>
      </div>
      <div class="card stat">
        <div class="stat__top">
          <p class="stat__label">Meals logged</p>
          <span class="stat__icon"><svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M4 3v8a3 3 0 0 0 3 3v7M7 3v8M10 3v8a3 3 0 0 1-3 3"></path>
              <path d="M17 21V3c-2 1.5-3 4-3 7 0 2 1 3 3 3"></path>
            </svg></span>
        </div>
        <p class="stat__value">79%</p>
        <div class="mini-bar"><span class="mini-bar__fill mini-bar__fill--warn" style="width:79%"></span></div>
        <p class="stat__note">15 of 19 meals so far</p>
      </div>
      <div class="card stat">
        <div class="stat__top">
          <p class="stat__label">Gym visits</p>
          <span class="stat__icon"><svg viewBox="0 0 24 24" aria-hidden="true">
              <rect x="3" y="5" width="18" height="16" rx="2"></rect>
              <path d="M16 3v4M8 3v4M3 10h18"></path>
              <path d="M9 15l2 2 4-4"></path>
            </svg></span>
        </div>
        <p class="stat__value">4</p>
        <div class="mini-bar mini-bar--blank"></div>
        <p class="stat__note">Up from 3 last week</p>
      </div>
    </div>

    <div class="card target">
      <div class="target__row">
        <p class="target__label">September workout target</p>
        <p class="target__percent">4 <span class="target__of">of 8 sessions</span></p>
      </div>
      <div class="target__track" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" aria-label="September workout target">
        <span class="target__fill" style="width:50%"></span>
        <span class="target__miss" style="left:50%;width:12.5%"></span>
      </div>
      <p class="target__note">Halfway there with 3 sessions left this month. One session was missed.</p>
    </div>
  </section>

  <!-- Workout schedule -->
  <section class="block" aria-labelledby="workout-title">
    <div class="block__head">
      <h2 id="workout-title" class="block__title">Workout schedule</h2>
      <p class="block__caption">Exercises completed in each planned session</p>
    </div>

    <div class="card">
      <div class="legend"><span class="legend__item"><span class="swatch swatch--done"></span>All done</span><span class="legend__item"><span class="swatch swatch--partial"></span>Some skipped</span><span class="legend__item"><span class="swatch swatch--missed"></span>Missed</span><span class="legend__item"><span class="swatch swatch--rest"></span>Rest day</span></div>
      <div class="wk">
        <div class="wk__col wk__col--done" title="Mon Upper body: 6 of 6 exercises">
          <span class="wk__day">Mon</span>
          <div class="wk__track"><span class="wk__fill wk__fill--done" style="height:100%"></span></div>
          <span class="wk__session">Upper body</span>
          <span class="wk__detail">6 of 6</span>
        </div>
        <div class="wk__col wk__col--done" title="Tue Cardio: 1 of 1 exercises">
          <span class="wk__day">Tue</span>
          <div class="wk__track"><span class="wk__fill wk__fill--done" style="height:100%"></span></div>
          <span class="wk__session">Cardio</span>
          <span class="wk__detail">1 of 1</span>
        </div>
        <div class="wk__col wk__col--missed" title="Wed Lower body: 0 of 5 exercises">
          <span class="wk__day">Wed</span>
          <div class="wk__track"></div>
          <span class="wk__session">Lower body</span>
          <span class="wk__detail">Missed</span>
        </div>
        <div class="wk__col" title="Thu: rest day">
          <span class="wk__day">Thu</span>
          <div class="wk__track wk__track--rest"></div>
          <span class="wk__session wk__session--rest">Rest</span>
          <span class="wk__detail">&nbsp;</span>
        </div>
        <div class="wk__col wk__col--partial" title="Fri Full body: 5 of 6 exercises">
          <span class="wk__day">Fri</span>
          <div class="wk__track"><span class="wk__fill wk__fill--partial" style="height:83%"></span></div>
          <span class="wk__session">Full body</span>
          <span class="wk__detail">5 of 6</span>
        </div>
        <div class="wk__col wk__col--done" title="Sat Mobility: 4 of 4 exercises">
          <span class="wk__day">Sat</span>
          <div class="wk__track"><span class="wk__fill wk__fill--done" style="height:100%"></span></div>
          <span class="wk__session">Mobility</span>
          <span class="wk__detail">4 of 4</span>
        </div>
        <div class="wk__col" title="Sun: rest day">
          <span class="wk__day wk__day--today">Today</span>
          <div class="wk__track wk__track--rest"></div>
          <span class="wk__session wk__session--rest">Rest</span>
          <span class="wk__detail">&nbsp;</span>
        </div>
      </div>
      <p class="card__summary">You missed Wednesday's lower body session and skipped 1 exercise on Friday. Everything else was completed.</p>
    </div>
  </section>

  <!-- Meal plan -->
  <section class="block" aria-labelledby="meal-title">
    <div class="block__head">
      <h2 id="meal-title" class="block__title">Meal plan</h2>
      <p class="block__caption">Meals you picked from your plan each day</p>
    </div>

    <div class="card">
      <div class="legend"><span class="legend__item"><span class="swatch swatch--done"></span>Logged</span><span class="legend__item"><span class="swatch swatch--missed"></span>Not logged</span><span class="legend__item"><span class="swatch swatch--upcoming"></span>Later today</span></div>
      <div class="meals">
        <div class="meals__row meals__row--head">
          <span class="meals__meal"></span>
          <span class="meals__day">Mon</span><span class="meals__day">Tue</span><span class="meals__day">Wed</span><span class="meals__day">Thu</span><span class="meals__day">Fri</span><span class="meals__day">Sat</span><span class="meals__day meals__day--today">Today</span>
          <span class="meals__total"></span>
        </div>
        <div class="meals__row">
          <span class="meals__meal">Breakfast</span>
          <span class="meals__cell meals__cell--done" title="Mon breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Tue breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Wed breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Thu breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Fri breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Sat breakfast: logged"></span>
          <span class="meals__cell meals__cell--done" title="Sun breakfast: logged"></span>
          <span class="meals__total meals__total--good">7/7</span>
        </div>
        <div class="meals__row">
          <span class="meals__meal">Lunch</span>
          <span class="meals__cell meals__cell--done" title="Mon lunch: logged"></span>
          <span class="meals__cell meals__cell--done" title="Tue lunch: logged"></span>
          <span class="meals__cell meals__cell--done" title="Wed lunch: logged"></span>
          <span class="meals__cell meals__cell--done" title="Thu lunch: logged"></span>
          <span class="meals__cell meals__cell--missed" title="Fri lunch: not logged"></span>
          <span class="meals__cell meals__cell--missed" title="Sat lunch: not logged"></span>
          <span class="meals__cell meals__cell--upcoming" title="Sun lunch: later today"></span>
          <span class="meals__total meals__total--warn">4/6</span>
        </div>
        <div class="meals__row">
          <span class="meals__meal">Dinner</span>
          <span class="meals__cell meals__cell--done" title="Mon dinner: logged"></span>
          <span class="meals__cell meals__cell--done" title="Tue dinner: logged"></span>
          <span class="meals__cell meals__cell--missed" title="Wed dinner: not logged"></span>
          <span class="meals__cell meals__cell--done" title="Thu dinner: logged"></span>
          <span class="meals__cell meals__cell--missed" title="Fri dinner: not logged"></span>
          <span class="meals__cell meals__cell--done" title="Sat dinner: logged"></span>
          <span class="meals__cell meals__cell--upcoming" title="Sun dinner: later today"></span>
          <span class="meals__total meals__total--warn">4/6</span>
        </div>
      </div>
      <p class="card__summary">Breakfast every day so far. Lunch was skipped on Friday and Saturday, dinner on Wednesday and Friday. Friday was the hardest day, with breakfast only.</p>
    </div>
  </section>

  <!-- Attendance trend -->
  <section class="block trend" aria-labelledby="trend-title">
    <input type="radio" id="view-week" class="trend__radio" name="trend-period" checked>
    <input type="radio" id="view-month" class="trend__radio" name="trend-period">

    <div class="block__head block__head--row">
      <div>
        <h2 id="trend-title" class="block__title">Attendance</h2>
        <p class="block__caption trend__caption--week">Minutes in the gym on the days you visited</p>
        <p class="block__caption trend__caption--month">Gym visits per month over the last year</p>
      </div>
      <div class="toggle" role="group" aria-label="Period">
        <label for="view-week" class="toggle__tab toggle__tab--week">Week</label>
        <label for="view-month" class="toggle__tab toggle__tab--month">Year</label>
      </div>
    </div>

    <div class="card">
      <div class="chart chart--week">
        <div class="grid">
          <div class="grid__line" style="bottom:0%"><span class="grid__value">0</span></div>
          <div class="grid__line" style="bottom:33%"><span class="grid__value">30</span></div>
          <div class="grid__line" style="bottom:67%"><span class="grid__value">60</span></div>
          <div class="grid__line" style="bottom:100%"><span class="grid__value">90 min</span></div>
        </div>
        <div class="bars">
          <div class="bar-col" title="Mon: 55 minutes">
            <div class="bar-track">
              <div class="bar bar--visit" style="height:61%"></div>
            </div>
            <span class="bar__label">Mon</span>
          </div>
          <div class="bar-col" title="Tue: 40 minutes">
            <div class="bar-track">
              <div class="bar bar--visit" style="height:44%"></div>
            </div>
            <span class="bar__label">Tue</span>
          </div>
          <div class="bar-col" title="Wed: 0 minutes">
            <div class="bar-track">
              <div class="bar bar--empty" style="height:0%"></div>
            </div>
            <span class="bar__label">Wed</span>
          </div>
          <div class="bar-col" title="Thu: 0 minutes">
            <div class="bar-track">
              <div class="bar bar--empty" style="height:0%"></div>
            </div>
            <span class="bar__label">Thu</span>
          </div>
          <div class="bar-col" title="Fri: 60 minutes">
            <div class="bar-track">
              <div class="bar bar--visit" style="height:67%"></div>
            </div>
            <span class="bar__label">Fri</span>
          </div>
          <div class="bar-col" title="Sat: 35 minutes">
            <div class="bar-track">
              <div class="bar bar--visit" style="height:39%"></div>
            </div>
            <span class="bar__label">Sat</span>
          </div>
          <div class="bar-col" title="Sun: 0 minutes">
            <div class="bar-track">
              <div class="bar bar--empty" style="height:0%"></div>
            </div>
            <span class="bar__label bar__label--current">Today</span>
          </div>
        </div>
      </div>

      <div class="chart chart--month">
        <div class="grid">
          <div class="grid__line" style="bottom:0%"><span class="grid__value">0</span></div>
          <div class="grid__line" style="bottom:25%"><span class="grid__value">5</span></div>
          <div class="grid__line" style="bottom:50%"><span class="grid__value">10</span></div>
          <div class="grid__line" style="bottom:75%"><span class="grid__value">15</span></div>
          <div class="grid__line" style="bottom:100%"><span class="grid__value">20</span></div>
        </div>
        <div class="bars">
          <div class="bar-col" title="Oct: 10 visits">
            <div class="bar-track">
              <div class="bar" style="height:50%"></div>
            </div>
            <span class="bar__label">Oct</span>
          </div>
          <div class="bar-col" title="Nov: 8 visits">
            <div class="bar-track">
              <div class="bar" style="height:40%"></div>
            </div>
            <span class="bar__label">Nov</span>
          </div>
          <div class="bar-col" title="Dec: 14 visits">
            <div class="bar-track">
              <div class="bar" style="height:70%"></div>
            </div>
            <span class="bar__label">Dec</span>
          </div>
          <div class="bar-col" title="Jan: 12 visits">
            <div class="bar-track">
              <div class="bar" style="height:60%"></div>
            </div>
            <span class="bar__label">Jan</span>
          </div>
          <div class="bar-col" title="Feb: 15 visits">
            <div class="bar-track">
              <div class="bar" style="height:75%"></div>
            </div>
            <span class="bar__label">Feb</span>
          </div>
          <div class="bar-col" title="Mar: 9 visits">
            <div class="bar-track">
              <div class="bar" style="height:45%"></div>
            </div>
            <span class="bar__label">Mar</span>
          </div>
          <div class="bar-col" title="Apr: 13 visits">
            <div class="bar-track">
              <div class="bar" style="height:65%"></div>
            </div>
            <span class="bar__label">Apr</span>
          </div>
          <div class="bar-col" title="May: 16 visits">
            <div class="bar-track">
              <div class="bar" style="height:80%"></div>
            </div>
            <span class="bar__label">May</span>
          </div>
          <div class="bar-col" title="Jun: 11 visits">
            <div class="bar-track">
              <div class="bar" style="height:55%"></div>
            </div>
            <span class="bar__label">Jun</span>
          </div>
          <div class="bar-col" title="Jul: 14 visits">
            <div class="bar-track">
              <div class="bar" style="height:70%"></div>
            </div>
            <span class="bar__label">Jul</span>
          </div>
          <div class="bar-col" title="Aug: 9 visits">
            <div class="bar-track">
              <div class="bar" style="height:45%"></div>
            </div>
            <span class="bar__label">Aug</span>
          </div>
          <div class="bar-col" title="Sep: 12 visits">
            <div class="bar-track">
              <span class="bar__value">12</span>
              <div class="bar bar--current" style="height:60%"></div>
            </div>
            <span class="bar__label bar__label--current">Sep</span>
          </div>
        </div>
      </div>

      <p class="card__summary trend__summary--week">190 minutes over 4 visits. Your longest session was Friday at 60 minutes.</p>
      <p class="card__summary trend__summary--month">12 visits so far in September, in green. Your best month was May with 16.</p>
    </div>
  </section>

</div>