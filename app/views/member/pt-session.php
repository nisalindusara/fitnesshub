<?php $pageStyles = ['member/member/_primary-button', 'member/member/pt-session']; ?>

<!-- Book a session: page content only (header + bottom nav come from member-layout) -->
<div id="booking-page" class="booking">

    <!-- Page heading -->
    <header class="page-head">
        <a href="/member/membership" class="page-head__back" aria-label="Back to membership">
            <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M15 6l-6 6 6 6"></path>
            </svg>
        </a>
        <div>
            <h1 class="page-head__title">Book a session</h1>
            <p class="page-head__subtitle">Personal training with your instructor</p>
        </div>
    </header>

    <!-- TODO: set the booking route -->
    <form id="booking-form" class="booking__form" action="#" method="post">

        <!-- Instructor -->
        <section class="block" aria-labelledby="instructor-title">
            <h2 id="instructor-title" class="block__title">Your instructor</h2>
            <div class="card coach">
                <span class="coach__avatar" aria-hidden="true">DM</span>
                <div class="coach__text">
                    <p class="coach__name">Dave Miller</p>
                    <p class="coach__meta">Strength and conditioning</p>
                </div>
                <p class="coach__next">Next session <br><strong>Mon 28, 6:00 PM</strong></p>
            </div>
        </section>

        <!-- Day -->
        <section class="block" aria-labelledby="day-title">
            <div class="block__head">
                <h2 id="day-title" class="block__title">Pick a day</h2>
                <p class="block__caption">28 September to 4 October</p>
            </div>
            <fieldset class="card dates">
                <legend class="visually-hidden">Day</legend>
                <div class="date date--booked" title="You already have a session at 6:00 PM">
                    <input type="radio" id="date-2026-09-28" class="date__input" name="date" value="2026-09-28" disabled>
                    <label for="date-2026-09-28" class="date__label">
                        <span class="date__name">Mon</span>
                        <span class="date__num">28</span>
                    </label>
                    <span class="date__note">Booked</span>
                </div>
                <div class="date">
                    <input type="radio" id="date-2026-09-29" class="date__input" name="date" value="2026-09-29" checked>
                    <label for="date-2026-09-29" class="date__label">
                        <span class="date__name">Tue</span>
                        <span class="date__num">29</span>
                    </label>
                    <span class="date__note">&nbsp;</span>
                </div>
                <div class="date">
                    <input type="radio" id="date-2026-09-30" class="date__input" name="date" value="2026-09-30">
                    <label for="date-2026-09-30" class="date__label">
                        <span class="date__name">Wed</span>
                        <span class="date__num">30</span>
                    </label>
                    <span class="date__note">&nbsp;</span>
                </div>
                <div class="date">
                    <input type="radio" id="date-2026-10-01" class="date__input" name="date" value="2026-10-01">
                    <label for="date-2026-10-01" class="date__label">
                        <span class="date__name">Thu</span>
                        <span class="date__num">01</span>
                    </label>
                    <span class="date__note">&nbsp;</span>
                </div>
                <div class="date">
                    <input type="radio" id="date-2026-10-02" class="date__input" name="date" value="2026-10-02">
                    <label for="date-2026-10-02" class="date__label">
                        <span class="date__name">Fri</span>
                        <span class="date__num">02</span>
                    </label>
                    <span class="date__note">&nbsp;</span>
                </div>
                <div class="date">
                    <input type="radio" id="date-2026-10-03" class="date__input" name="date" value="2026-10-03">
                    <label for="date-2026-10-03" class="date__label">
                        <span class="date__name">Sat</span>
                        <span class="date__num">03</span>
                    </label>
                    <span class="date__note">&nbsp;</span>
                </div>
                <div class="date date--off" title="Dave Miller is not working this day">
                    <input type="radio" id="date-2026-10-04" class="date__input" name="date" value="2026-10-04" disabled>
                    <label for="date-2026-10-04" class="date__label">
                        <span class="date__name">Sun</span>
                        <span class="date__num">04</span>
                    </label>
                    <span class="date__note">Off</span>
                </div>
            </fieldset>
        </section>

        <!-- Time -->
        <section class="block" aria-labelledby="time-title">
            <div class="block__head">
                <h2 id="time-title" class="block__title">Pick a time</h2>
                <p class="block__caption">Free times with Dave on Tuesday 29 September</p>
            </div>
            <fieldset class="card times">
                <legend class="visually-hidden">Time</legend>
                <div class="slot-group">
                    <p class="slot-group__title">Morning</p>
                    <div class="slots">
                        <div class="slot">
                            <input type="radio" id="time-0800" class="slot__input" name="time" value="08:00">
                            <label for="time-0800" class="slot__label">8:00 AM<svg class="slot__check" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12l5 5 9-10"></path>
                                </svg></label>
                        </div>
                        <div class="slot">
                            <input type="radio" id="time-0930" class="slot__input" name="time" value="09:30">
                            <label for="time-0930" class="slot__label">9:30 AM<svg class="slot__check" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12l5 5 9-10"></path>
                                </svg></label>
                        </div>
                        <div class="slot">
                            <input type="radio" id="time-1100" class="slot__input" name="time" value="11:00" checked>
                            <label for="time-1100" class="slot__label">11:00 AM<svg class="slot__check" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12l5 5 9-10"></path>
                                </svg></label>
                        </div>
                    </div>
                </div>
                <div class="slot-group">
                    <p class="slot-group__title">Afternoon</p>
                    <div class="slots">
                        <div class="slot slot--taken">
                            <input type="radio" id="time-1400" class="slot__input" name="time" value="14:00" disabled>
                            <label for="time-1400" class="slot__label">2:00 PM<span class="slot__taken">Taken</span></label>
                        </div>
                        <div class="slot">
                            <input type="radio" id="time-1530" class="slot__input" name="time" value="15:30">
                            <label for="time-1530" class="slot__label">3:30 PM<svg class="slot__check" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12l5 5 9-10"></path>
                                </svg></label>
                        </div>
                    </div>
                </div>
                <div class="slot-group">
                    <p class="slot-group__title">Evening</p>
                    <div class="slots">
                        <div class="slot">
                            <input type="radio" id="time-1700" class="slot__input" name="time" value="17:00">
                            <label for="time-1700" class="slot__label">5:00 PM<svg class="slot__check" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12l5 5 9-10"></path>
                                </svg></label>
                        </div>
                        <div class="slot slot--taken">
                            <input type="radio" id="time-1830" class="slot__input" name="time" value="18:30" disabled>
                            <label for="time-1830" class="slot__label">6:30 PM<span class="slot__taken">Taken</span></label>
                        </div>
                    </div>
                </div>
            </fieldset>
        </section>

        <!-- Note -->
        <section class="block" aria-labelledby="note-title">
            <div class="block__head">
                <h2 id="note-title" class="block__title">Note for Dave</h2>
                <p class="block__caption">Optional. Anything he should know before the session.</p>
            </div>
            <div class="card">
                <label for="booking-note" class="visually-hidden">Note for your instructor</label>
                <textarea id="booking-note" class="note" name="note" rows="4" maxlength="300" placeholder="For example, I'd like to focus on lower body today"></textarea>
            </div>
        </section>

        <!-- Confirm -->
        <div class="card confirm">
            <p class="confirm__text">Your session will show up in the schedule on your dashboard.</p>
            <button type="submit" class="btn btn--primary">Confirm booking</button>
        </div>

    </form>
</div>