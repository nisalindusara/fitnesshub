<style>
  /* Member dashboard – page content (id/class selectors only)
   Font (Plus Jakarta Sans), page background and chrome spacing come from member-layout

   Colour meaning (same as Analytics)
   green  #1E8E5A  done / logged / on track
   amber  #D08A0B  partly done / needs attention soon
   red    #C62828  missed (week view)
   light grey      booked / upcoming
*/

  #dashboard-page {
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
    gap: 44px;
    font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
    color: var(--ink);
  }

  /* ---------- Greeting ---------- */
  .greet {
    display: flex;
    align-items: center;
    gap: 18px;
  }

  .greet__avatar {
    flex: none;
    width: 64px;
    height: 64px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--green);
    box-shadow: 0 0 0 4px var(--card), 0 0 0 5px var(--line);
    color: #fff;
    font-size: 1.3rem;
    font-weight: 700;
  }

  .greet__text {
    flex: 1;
    min-width: 0;
  }

  .greet__title {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 500;
    letter-spacing: -0.02em;
  }

  .greet__title strong {
    font-weight: 700;
  }

  .greet__subtitle {
    margin: 4px 0 0;
    font-size: 0.95rem;
    color: var(--muted);
  }

  .greet__badge {
    flex: none;
    padding: 6px 12px;
    border-radius: 999px;
    background: var(--ink);
    color: #fff;
    font-size: 0.78rem;
    font-weight: 600;
  }

  /* ---------- Section block ---------- */
  .block {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .block__head {
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

  .link {
    flex: none;
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--green);
    text-decoration: none;
  }

  .link:hover {
    color: var(--green-dark);
    text-decoration: underline;
  }

  .link--small {
    display: inline-block;
    margin-top: 14px;
    font-size: 0.85rem;
  }

  /* ---------- Card ---------- */
  .card {
    box-sizing: border-box;
    margin: 0;
    padding: 24px;
    border-radius: 20px;
    background: var(--card);
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
  }

  .card__head {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
  }

  .card__title {
    margin: 0;
    font-size: 0.95rem;
    font-weight: 600;
  }

  .card__caption {
    margin: 2px 0 0;
    font-size: 0.82rem;
    color: var(--muted);
  }

  .icon-circle {
    flex: none;
    width: 40px;
    height: 40px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--green-soft);
  }

  .icon-circle svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke: var(--green);
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .icon-circle--small {
    width: 34px;
    height: 34px;
  }

  .icon-circle--small svg {
    width: 17px;
    height: 17px;
  }

  .icon-circle--warn {
    background: var(--amber-soft);
  }

  .icon-circle--warn svg {
    stroke: var(--amber-text);
  }

  /* ---------- Schedule: week view ---------- */
  .week-radio {
    position: absolute;
    opacity: 0;
    pointer-events: none;
  }

  .cal {
    position: relative;
    padding: 24px 28px 22px;
  }

  .cal__panel {
    display: none;
  }

  #week-prev:checked~.cal .cal__panel--prev,
  #week-current:checked~.cal .cal__panel--current,
  #week-next:checked~.cal .cal__panel--next {
    display: block;
  }

  .cal__top {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 18px;
  }

  .cal__month {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 600;
  }

  .cal__range {
    margin: 0;
    font-size: 0.82rem;
    color: var(--muted);
  }

  .cal__grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 8px;
  }

  .cal__day {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    min-width: 0;
  }

  .cal__name {
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--muted);
  }

  .cal__date {
    width: 100%;
    max-width: 96px;
    aspect-ratio: 1;
    display: grid;
    place-items: center;
    border-radius: 14px;
    font-size: 1.5rem;
    font-weight: 500;
    color: var(--ink);
  }

  .cal__day--today .cal__name {
    color: var(--ink);
    font-weight: 700;
  }

  .cal__day--today .cal__date {
    background: var(--ink);
    color: #fff;
    font-weight: 600;
  }

  /* Day tile colour: green attended, red missed, light grey booked */
  .cal__day--attended .cal__date {
    background: var(--green-soft);
    color: var(--green-dark);
    font-weight: 600;
  }

  .cal__day--missed .cal__date {
    background: var(--red-soft);
    color: var(--red);
    font-weight: 600;
  }

  .cal__day--upcoming .cal__date {
    background: #f3f4f6;
  }

  /* What it was (past) or what is booked (future), in plain text */
  .cal__type {
    font-size: 0.85rem;
    font-weight: 600;
    line-height: 1.2;
  }

  .cal__detail {
    margin-top: -6px;
    white-space: nowrap;
    font-size: 0.75rem;
    color: var(--muted);
  }

  .cal__day--missed .cal__detail {
    color: var(--red);
    font-weight: 600;
  }

  .cal__summary {
    margin: 20px 0 0;
    padding-top: 16px;
    border-top: 1px solid var(--line);
    font-size: 0.85rem;
    color: var(--muted);
  }

  /* Week arrows, sitting on the card edges */
  .cal__arrow {
    position: absolute;
    top: 50%;
    z-index: 1;
    width: 42px;
    height: 42px;
    display: grid;
    place-items: center;
    margin-top: -21px;
    border-radius: 50%;
    background: var(--card);
    box-shadow: 0 2px 10px rgba(16, 24, 40, 0.1);
    cursor: pointer;
    transition: background-color 0.15s ease;
  }

  .cal__arrow:hover {
    background: #f3f4f6;
  }

  .cal__arrow svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: var(--ink);
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .cal__arrow--left {
    left: -21px;
  }

  .cal__arrow--right {
    right: -21px;
  }

  .cal__arrow--disabled {
    cursor: default;
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.06);
  }

  .cal__arrow--disabled svg {
    stroke: #c3c7cf;
  }

  .cal__arrow--disabled:hover {
    background: var(--card);
  }

  /* ---------- Today ---------- */
  .today {
    display: grid;
    grid-template-columns: 1.2fr 1fr;
    grid-template-rows: auto auto;
    gap: 16px;
  }

  .meals-today {
    grid-row: 1 / 3;
    display: flex;
    flex-direction: column;
  }

  .meal-list {
    margin: 0 0 20px;
    padding: 0;
    list-style: none;
    display: flex;
    flex-direction: column;
  }

  .meal {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid var(--line);
  }

  .meal__check {
    box-sizing: border-box;
    flex: none;
    width: 26px;
    height: 26px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    border: 1.5px dashed #b8bdc6;
  }

  .meal__check--done {
    border: 0;
    background: var(--green);
  }

  .meal__check svg {
    width: 14px;
    height: 14px;
    fill: none;
    stroke: #fff;
    stroke-width: 2.6;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .meal__slot {
    margin: 0;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--muted);
  }

  .meal__name {
    margin: 2px 0 0;
    font-size: 0.92rem;
    font-weight: 600;
  }

  .meal__name--empty {
    font-weight: 500;
    color: #9aa1ad;
  }

  .feature {
    margin: 0;
    font-size: 1.2rem;
    font-weight: 700;
    letter-spacing: -0.01em;
  }

  .feature__meta {
    margin: 4px 0 0;
    font-size: 0.88rem;
    color: var(--muted);
  }

  /* ---------- Buttons ---------- */
  .btn {
    box-sizing: border-box;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 46px;
    margin-top: auto;
    padding: 0 20px;
    border-radius: 12px;
    font-size: 0.92rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.15s ease;
  }

  .btn--primary {
    background: var(--green);
    color: #fff;
  }

  .btn--primary:hover {
    background: var(--green-dark);
  }

  .btn:focus-visible,
  .link:focus-visible {
    outline: 2.5px solid var(--green);
    outline-offset: 3px;
  }

  /* ---------- Stats ---------- */
  .stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  .stat {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .stat__value {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 700;
    line-height: 1.1;
    letter-spacing: -0.02em;
  }

  .stat__label {
    margin: 4px 0 16px;
    font-size: 0.88rem;
    color: var(--muted);
  }

  /* Mini bar: green on track, amber below 80% */
  .mini-bar {
    width: 100%;
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

  /* ---------- Target ---------- */
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
    margin: 0;
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--green);
  }

  .target__track,
  .membership__track {
    height: 10px;
    border-radius: 999px;
    background: var(--track);
    overflow: hidden;
  }

  .target__fill {
    display: block;
    height: 100%;
    border-radius: inherit;
    background: var(--green);
  }

  .target__note,
  .membership__note {
    margin: 12px 0 0;
    font-size: 0.85rem;
    color: var(--muted);
  }

  /* ---------- Membership ---------- */
  .membership__row {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 18px;
  }

  .membership__plan {
    margin: 0;
    font-size: 1.05rem;
    font-weight: 700;
  }

  .membership__meta {
    margin: 4px 0 0;
    font-size: 0.85rem;
    color: var(--muted);
  }

  .membership__days {
    color: var(--amber-text);
    font-weight: 700;
  }

  /* time used is neutral, not good or bad */
  .membership__fill {
    display: block;
    height: 100%;
    border-radius: inherit;
    background: #9aa1ad;
  }

  /* ---------- Recent activity ---------- */
  .activity {
    list-style: none;
    padding: 8px 24px;
  }

  .activity__item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid var(--line);
  }

  .activity__item:last-child {
    border-bottom: 0;
  }

  .activity__text {
    flex: 1;
    margin: 0;
    font-size: 0.9rem;
    font-weight: 500;
  }

  .activity__time {
    flex: none;
    font-size: 0.8rem;
    color: var(--muted);
  }

  /* ---------- Mobile ---------- */
  @media (max-width: 640px) {
    #dashboard-page {
      gap: 36px;
    }

    .greet {
      flex-wrap: wrap;
      gap: 14px;
    }

    .greet__avatar {
      width: 52px;
      height: 52px;
      font-size: 1.1rem;
    }

    .greet__title {
      font-size: 1.35rem;
    }

    .greet__text {
      flex: 1 1 calc(100% - 66px);
    }

    .greet__badge {
      margin-left: 66px;
      /* wraps under the name */
    }

    .card {
      padding: 18px 16px;
      border-radius: 18px;
    }

    .cal {
      padding: 18px 14px;
    }

    .cal__top {
      flex-direction: column;
      gap: 2px;
      padding: 0 18px;
    }

    .cal__grid {
      gap: 3px;
      padding: 0 16px;
    }

    .cal__name {
      font-size: 0.7rem;
    }

    .cal__date {
      font-size: 1.05rem;
      border-radius: 10px;
    }

    .cal__type {
      font-size: 0.7rem;
    }

    .cal__detail {
      font-size: 0.56rem;
      white-space: nowrap;
    }

    .cal__arrow {
      width: 34px;
      height: 34px;
      margin-top: -17px;
    }

    .cal__arrow--left {
      left: -12px;
    }

    .cal__arrow--right {
      right: -12px;
    }

    .today {
      grid-template-columns: 1fr;
    }

    .meals-today {
      grid-row: auto;
    }

    .stats {
      grid-template-columns: 1fr 1fr;
      gap: 12px;
    }

    .stats .stat:last-child {
      grid-column: 1 / -1;
    }

    .activity {
      padding: 4px 16px;
    }

    .activity__item {
      flex-wrap: wrap;
    }

    .activity__time {
      width: 100%;
      padding-left: 48px;
      margin-top: -8px;
    }
  }

  @media (prefers-reduced-motion: reduce) {

    .cal__arrow,
    .btn {
      transition: none;
    }
  }
</style>

<!-- Member dashboard: page content only (header + bottom nav come from member-layout) -->
<div id="dashboard-page" class="dash">

  <!-- Greeting -->
  <header class="greet">
    <span class="greet__avatar" aria-hidden="true">MV</span>
    <div class="greet__text">
      <h1 class="greet__title">Good morning, <strong>Marcus</strong></h1>
      <p class="greet__subtitle">Sunday, 27 September. It's a rest day, so take it easy.</p>
    </div>
    <span class="greet__badge">VIP Elite</span>
  </header>

  <!-- Schedule (week view) -->
  <section class="block schedule" aria-labelledby="week-title">
    <input type="radio" id="week-prev" class="week-radio" name="week-view">
    <input type="radio" id="week-current" class="week-radio" name="week-view" checked>
    <input type="radio" id="week-next" class="week-radio" name="week-view">

    <div class="block__head">
      <div>
        <h2 id="week-title" class="block__title">Schedule</h2>
        <p class="block__caption">Your visits, classes and personal training</p>
      </div>
      <a href="/member/analytics" class="link">See analytics</a>
    </div>

    <div class="card cal">
      <!-- 14 to 20 September -->
      <div class="cal__panel cal__panel--prev">
        <span class="cal__arrow cal__arrow--left cal__arrow--disabled" aria-hidden="true"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M15 6l-6 6 6 6"></path>
          </svg></span>
        <label for="week-current" class="cal__arrow cal__arrow--right" aria-label="Next week"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M9 6l6 6-6 6"></path>
          </svg></label>
        <div class="cal__top">
          <p class="cal__month">September</p>
          <p class="cal__range">14 to 20 September</p>
        </div>
        <div class="cal__grid">
          <div class="cal__day cal__day--attended" title="Morning Spin class, attended">
            <span class="cal__name">Mon</span>
            <span class="cal__date">14</span>
            <span class="cal__type">Class</span>
            <span class="cal__detail">7:00 AM</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Tue</span>
            <span class="cal__date">15</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day cal__day--attended" title="Gym visit">
            <span class="cal__name">Wed</span>
            <span class="cal__date">16</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">6:30 PM</span>
          </div>
          <div class="cal__day cal__day--attended" title="Personal training with Dave Miller, attended">
            <span class="cal__name">Thu</span>
            <span class="cal__date">17</span>
            <span class="cal__type">PT</span>
            <span class="cal__detail">6:00 PM</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Fri</span>
            <span class="cal__date">18</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Sat</span>
            <span class="cal__date">19</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Sun</span>
            <span class="cal__date">20</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
        </div>
        <p class="cal__summary">3 visits this week.</p>
      </div>
      <!-- 21 to 27 September -->
      <div class="cal__panel cal__panel--current">
        <label for="week-prev" class="cal__arrow cal__arrow--left" aria-label="Previous week"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M15 6l-6 6 6 6"></path>
          </svg></label>
        <label for="week-next" class="cal__arrow cal__arrow--right" aria-label="Next week"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M9 6l6 6-6 6"></path>
          </svg></label>
        <div class="cal__top">
          <p class="cal__month">September</p>
          <p class="cal__range">21 to 27 September</p>
        </div>
        <div class="cal__grid">
          <div class="cal__day cal__day--attended" title="Upper body workout, attended">
            <span class="cal__name">Mon</span>
            <span class="cal__date">21</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">6:30 PM</span>
          </div>
          <div class="cal__day cal__day--attended" title="Cardio workout, attended">
            <span class="cal__name">Tue</span>
            <span class="cal__date">22</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">6:45 PM</span>
          </div>
          <div class="cal__day cal__day--missed" title="Lower body workout was planned but missed">
            <span class="cal__name">Wed</span>
            <span class="cal__date">23</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">Missed</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Thu</span>
            <span class="cal__date">24</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day cal__day--attended" title="Full body workout, attended">
            <span class="cal__name">Fri</span>
            <span class="cal__date">25</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">7:10 AM</span>
          </div>
          <div class="cal__day cal__day--attended" title="Mobility workout, attended">
            <span class="cal__name">Sat</span>
            <span class="cal__date">26</span>
            <span class="cal__type">Gym</span>
            <span class="cal__detail">6:15 PM</span>
          </div>
          <div class="cal__day cal__day--today" title="Today, nothing planned" aria-current="date">
            <span class="cal__name">Today</span>
            <span class="cal__date">27</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
        </div>
        <p class="cal__summary">4 visits this week. You missed Wednesday's lower body session.</p>
      </div>
      <!-- 28 September to 4 October -->
      <div class="cal__panel cal__panel--next">
        <label for="week-current" class="cal__arrow cal__arrow--left" aria-label="Previous week"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M15 6l-6 6 6 6"></path>
          </svg></label>
        <span class="cal__arrow cal__arrow--right cal__arrow--disabled" aria-hidden="true"><svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M9 6l6 6-6 6"></path>
          </svg></span>
        <div class="cal__top">
          <p class="cal__month">September to October</p>
          <p class="cal__range">28 September to 4 October</p>
        </div>
        <div class="cal__grid">
          <div class="cal__day cal__day--upcoming" title="Personal training with Dave Miller">
            <span class="cal__name">Mon</span>
            <span class="cal__date">28</span>
            <span class="cal__type">PT</span>
            <span class="cal__detail">6:00 PM</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Tue</span>
            <span class="cal__date">29</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day cal__day--upcoming" title="Morning Spin with Marcus Lee">
            <span class="cal__name">Wed</span>
            <span class="cal__date">30</span>
            <span class="cal__type">Class</span>
            <span class="cal__detail">7:00 AM</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Thu</span>
            <span class="cal__date">01</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Fri</span>
            <span class="cal__date">02</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
          <div class="cal__day cal__day--upcoming" title="Pilates Reformer with Sophia Carter">
            <span class="cal__name">Sat</span>
            <span class="cal__date">03</span>
            <span class="cal__type">Class</span>
            <span class="cal__detail">9:30 AM</span>
          </div>
          <div class="cal__day" title="Nothing planned">
            <span class="cal__name">Sun</span>
            <span class="cal__date">04</span>
            <span class="cal__type">&nbsp;</span>
            <span class="cal__detail">&nbsp;</span>
          </div>
        </div>
        <p class="cal__summary">Booked: personal training with Dave Miller on Monday, Morning Spin on Wednesday and Pilates Reformer on Saturday.</p>
      </div>
    </div>
  </section>

  <!-- Today -->
  <section class="block" aria-labelledby="today-title">
    <div class="block__head">
      <div>
        <h2 id="today-title" class="block__title">Today</h2>
        <p class="block__caption">What's left for you to do</p>
      </div>
    </div>

    <div class="today">
      <!-- Meals today -->
      <div class="card meals-today">
        <div class="card__head">
          <span class="icon-circle">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M4 3v8a3 3 0 0 0 3 3v7M7 3v8M10 3v8a3 3 0 0 1-3 3"></path>
              <path d="M17 21V3c-2 1.5-3 4-3 7 0 2 1 3 3 3"></path>
            </svg>
          </span>
          <div>
            <p class="card__title">Meals</p>
            <p class="card__caption">1 of 3 picked</p>
          </div>
        </div>

        <ul class="meal-list">
          <li class="meal">
            <span class="meal__check meal__check--done" aria-hidden="true">
              <svg viewBox="0 0 24 24">
                <path d="M5 12l5 5 9-10"></path>
              </svg>
            </span>
            <div class="meal__text">
              <p class="meal__slot">Breakfast</p>
              <p class="meal__name">French Toast, 450 kcal</p>
            </div>
          </li>
          <li class="meal">
            <span class="meal__check" aria-hidden="true"></span>
            <div class="meal__text">
              <p class="meal__slot">Lunch</p>
              <p class="meal__name meal__name--empty">Not picked yet</p>
            </div>
          </li>
          <li class="meal">
            <span class="meal__check" aria-hidden="true"></span>
            <div class="meal__text">
              <p class="meal__slot">Dinner</p>
              <p class="meal__name meal__name--empty">Not picked yet</p>
            </div>
          </li>
        </ul>

        <!-- TODO: set the meal plan route -->
        <a href="#" class="btn btn--primary">Pick lunch</a>
      </div>

      <!-- Next workout -->
      <div class="card">
        <div class="card__head">
          <span class="icon-circle">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M6 7v10M18 7v10M3 10v4M21 10v4M6 12h12"></path>
            </svg>
          </span>
          <div>
            <p class="card__title">Next workout</p>
            <p class="card__caption">Tomorrow, Monday 28, 6:00 PM</p>
          </div>
        </div>
        <p class="feature">Upper body</p>
        <p class="feature__meta">Personal training with Dave Miller. 6 exercises, about 35 minutes.</p>
      </div>

      <!-- Next class -->
      <div class="card">
        <div class="card__head">
          <span class="icon-circle">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <circle cx="12" cy="12" r="9"></circle>
              <path d="M12 7v5l3 2"></path>
            </svg>
          </span>
          <div>
            <p class="card__title">Next class</p>
            <p class="card__caption">Wednesday 30, 7:00 AM</p>
          </div>
        </div>
        <p class="feature">Morning Spin</p>
        <p class="feature__meta">With Marcus Lee</p>
        <a href="/member/classes" class="link link--small">Browse classes</a>
      </div>
    </div>
  </section>

  <!-- Progress -->
  <section class="block" aria-labelledby="progress-title">
    <div class="block__head">
      <div>
        <h2 id="progress-title" class="block__title">My progress</h2>
        <p class="block__caption">How your plan is going this week</p>
      </div>
    </div>

    <div class="stats">
      <div class="card stat">
        <p class="stat__value">80%</p>
        <p class="stat__label">Workouts done</p>
        <div class="mini-bar"><span class="mini-bar__fill mini-bar__fill--good" style="width:80%"></span></div>
        <p class="stat__note">4 of 5 planned sessions</p>
      </div>
      <div class="card stat">
        <p class="stat__value">79%</p>
        <p class="stat__label">Meals logged</p>
        <div class="mini-bar"><span class="mini-bar__fill mini-bar__fill--warn" style="width:79%"></span></div>
        <p class="stat__note">15 of 19 meals so far</p>
      </div>
      <div class="card stat">
        <p class="stat__value">4</p>
        <p class="stat__label">Gym visits</p>
        <div class="mini-bar mini-bar--blank"></div>
        <p class="stat__note">Up from 3 last week</p>
      </div>
    </div>

    <div class="card target">
      <div class="target__row">
        <p class="target__label">September workout target</p>
        <p class="target__percent">50%</p>
      </div>
      <div class="target__track" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
        <span class="target__fill" style="width:50%"></span>
      </div>
      <p class="target__note">4 of 8 planned sessions done. 3 sessions left this month.</p>
    </div>
  </section>

  <!-- Membership -->
  <section class="block" aria-labelledby="membership-title">
    <div class="block__head">
      <div>
        <h2 id="membership-title" class="block__title">Membership</h2>
        <p class="block__caption">Your current plan</p>
      </div>
      <a href="/member/membership" class="link">Manage</a>
    </div>

    <div class="card membership">
      <div class="membership__row">
        <div>
          <p class="membership__plan">Annual VIP All-Access</p>
          <p class="membership__meta">Renews in <strong class="membership__days">22 days</strong> on 19 October 2026. Paid by Visa ending 4821.</p>
        </div>
      </div>
      <div class="membership__track" role="progressbar" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100" aria-label="Membership year used">
        <span class="membership__fill" style="width:94%"></span>
      </div>
      <p class="membership__note">343 of 365 days used</p>
    </div>
  </section>

  <!-- Recent activity -->
  <section class="block" aria-labelledby="activity-title">
    <div class="block__head">
      <div>
        <h2 id="activity-title" class="block__title">Recent activity</h2>
        <p class="block__caption">Last 7 days</p>
      </div>
    </div>

    <ul class="card activity">
      <li class="activity__item">
        <span class="icon-circle icon-circle--small">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M5 12l5 5 9-10"></path>
          </svg>
        </span>
        <p class="activity__text">Picked French Toast for breakfast</p>
        <span class="activity__time">Today, 7:40 AM</span>
      </li>
      <li class="activity__item">
        <span class="icon-circle icon-circle--small">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M6 7v10M18 7v10M3 10v4M21 10v4M6 12h12"></path>
          </svg>
        </span>
        <p class="activity__text">Completed Mobility workout</p>
        <span class="activity__time">Yesterday, 6:15 PM</span>
      </li>
      <li class="activity__item">
        <span class="icon-circle icon-circle--small">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <circle cx="12" cy="12" r="9"></circle>
            <path d="M12 7v5l3 2"></path>
          </svg>
        </span>
        <p class="activity__text">Booked Morning Spin with Marcus Lee</p>
        <span class="activity__time">Fri 25, 8:02 PM</span>
      </li>
      <li class="activity__item">
        <span class="icon-circle icon-circle--small icon-circle--warn">
          <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M6 7v10M18 7v10M3 10v4M21 10v4M6 12h12"></path>
          </svg>
        </span>
        <p class="activity__text">Finished 5 of 6 exercises in Full body workout</p>
        <span class="activity__time">Fri 25, 7:10 AM</span>
      </li>
    </ul>
  </section>

</div>