<?php $pageStyles = ['member/analytics_module/member_analytics']; ?>

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