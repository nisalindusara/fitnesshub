<?php $pageStyles = ['member/member/_primary-button', 'member/member/dashboard']; ?>

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