<?php $pageStyles = ['member/member/_primary-button']; ?>
<style>
    /* Book a session – page content (id/class selectors only)
   Font (Plus Jakarta Sans), page background and chrome spacing come from member-layout

   States
   dark tile       selected
   light grey      already booked (same as upcoming on the dashboard)
   faded           not available
*/

    #booking-page {
        --ink: #18181b;
        --muted: #64748b;
        --line: #ececef;
        --card: #ffffff;
        --track: #f3f4f6;
        --border: #e3e5e9;

        --green: #1e8e5a;
        --green-dark: #17744a;
        --green-soft: #e6f4ec;

        box-sizing: border-box;
        width: min(100%, 960px);
        align-self: flex-start;
        font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
        color: var(--ink);
    }

    .visually-hidden {
        position: absolute;
        width: 1px;
        height: 1px;
        overflow: hidden;
        clip: rect(0 0 0 0);
        white-space: nowrap;
    }

    /* ---------- Page heading ---------- */
    .page-head {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 44px;
    }

    .page-head__back {
        flex: none;
        width: 42px;
        height: 42px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: var(--card);
        box-shadow: 0 1px 3px rgba(16, 24, 40, 0.06);
        transition: background-color 0.15s ease;
    }

    .page-head__back:hover {
        background: var(--track);
    }

    .page-head__back svg {
        width: 18px;
        height: 18px;
        fill: none;
        stroke: var(--ink);
        stroke-width: 2.2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .page-head__subtitle {
        margin: 4px 0 0;
        font-size: 0.95rem;
        color: var(--muted);
    }

    /* ---------- Form layout ---------- */
    .booking__form {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .block {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .card {
        box-sizing: border-box;
        margin: 0;
        padding: 24px;
        border: 0;
        border-radius: 20px;
        background: var(--card);
        box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
    }

    /* ---------- Instructor ---------- */
    .coach {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .coach__avatar {
        flex: none;
        width: 52px;
        height: 52px;
        display: grid;
        place-items: center;
        border-radius: 50%;
        background: var(--green);
        color: #fff;
        font-size: 1.05rem;
        font-weight: 700;
    }

    .coach__text {
        flex: 1;
        min-width: 0;
    }

    .coach__name {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 700;
    }

    .coach__meta {
        margin: 3px 0 0;
        font-size: 0.88rem;
        color: var(--muted);
    }

    .coach__next {
        flex: none;
        margin: 0;
        font-size: 0.82rem;
        line-height: 1.5;
        color: var(--muted);
        text-align: right;
    }

    .coach__next strong {
        color: var(--ink);
        font-weight: 600;
    }

    /* ---------- Day picker ---------- */
    .dates {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
    }

    .date {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        min-width: 0;
    }

    .date__input,
    .slot__input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .date__label {
        box-sizing: border-box;
        width: 100%;
        max-width: 96px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        padding: 14px 0 16px;
        border: 1.5px solid var(--border);
        border-radius: 16px;
        cursor: pointer;
        transition: background-color 0.15s ease, border-color 0.15s ease;
    }

    .date__label:hover {
        border-color: var(--ink);
    }

    .date__name {
        font-size: 0.82rem;
        font-weight: 500;
        color: var(--muted);
    }

    .date__num {
        font-size: 1.45rem;
        font-weight: 600;
        line-height: 1;
    }

    .date__note {
        font-size: 0.72rem;
        font-weight: 500;
        color: var(--muted);
        white-space: nowrap;
    }

    /* selected */
    .date__input:checked+.date__label {
        background: var(--ink);
        border-color: var(--ink);
    }

    .date__input:checked+.date__label .date__name {
        color: rgba(255, 255, 255, 0.7);
    }

    .date__input:checked+.date__label .date__num {
        color: #fff;
    }

    /* already booked */
    .date--booked .date__label {
        background: var(--track);
        border-color: var(--track);
        cursor: default;
    }

    /* instructor off */
    .date--off .date__label {
        border-style: dashed;
        cursor: default;
    }

    .date--off .date__num,
    .date--off .date__name {
        color: #b8bdc6;
    }

    .date--booked .date__label:hover,
    .date--off .date__label:hover {
        border-color: var(--border);
    }

    .date--booked .date__label:hover {
        border-color: var(--track);
    }

    /* ---------- Time picker ---------- */
    .times {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .slot-group__title {
        margin: 0 0 10px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--muted);
    }

    .slots {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    .slot__label {
        box-sizing: border-box;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        border: 1.5px solid var(--border);
        border-radius: 12px;
        font-size: 0.92rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.15s ease, border-color 0.15s ease;
    }

    .slot__label:hover {
        border-color: var(--ink);
    }

    .slot__check {
        display: none;
        width: 16px;
        height: 16px;
        fill: none;
        stroke: #fff;
        stroke-width: 2.6;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .slot__input:checked+.slot__label {
        background: var(--ink);
        border-color: var(--ink);
        color: #fff;
    }

    .slot__input:checked+.slot__label .slot__check {
        display: block;
    }

    .slot--taken .slot__label,
    .slot--taken .slot__label:hover {
        background: var(--track);
        border-color: var(--track);
        color: #a3a9b4;
        font-weight: 500;
        cursor: default;
    }

    .slot__taken {
        font-size: 0.75rem;
        font-weight: 500;
    }

    /* keyboard focus on the hidden radios */
    .date__input:focus-visible+.date__label,
    .slot__input:focus-visible+.slot__label {
        outline: 2.5px solid var(--green);
        outline-offset: 2px;
    }

    /* ---------- Note ---------- */
    .note {
        box-sizing: border-box;
        display: block;
        width: 100%;
        min-height: 110px;
        padding: 14px 16px;
        border: 1.5px solid var(--border);
        border-radius: 12px;
        background: var(--card);
        font: 500 0.92rem/1.5 "Plus Jakarta Sans", system-ui, sans-serif;
        color: var(--ink);
        resize: vertical;
        outline: none;
        transition: border-color 0.15s ease;
    }

    .note::placeholder {
        color: #a3a9b4;
    }

    .note:focus {
        border-color: var(--green);
    }

    /* ---------- Confirm ---------- */
    .confirm {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    .confirm__text {
        margin: 0;
        font-size: 0.88rem;
        color: var(--muted);
    }

    .btn {
        box-sizing: border-box;
        flex: none;
        height: 48px;
        padding: 0 28px;
        border: 0;
        border-radius: 12px;
        font: 600 0.95rem "Plus Jakarta Sans", system-ui, sans-serif;
        cursor: pointer;
        transition: background-color 0.15s ease;
    }

    .btn:focus-visible,
    .page-head__back:focus-visible {
        outline: 2.5px solid var(--green);
        outline-offset: 3px;
    }

    /* ---------- Mobile ---------- */
    @media (max-width: 640px) {
        .page-head {
            margin-bottom: 36px;
        }

        .page-head__title {
            font-size: 1.45rem;
        }

        .booking__form {
            gap: 34px;
        }

        .card {
            padding: 18px 14px;
            border-radius: 18px;
        }

        .coach {
            flex-wrap: wrap;
        }

        .coach__next {
            width: 100%;
            padding-top: 12px;
            border-top: 1px solid var(--line);
            text-align: left;
        }

        .coach__next br {
            display: none;
        }

        .dates {
            gap: 4px;
        }

        .date__label {
            padding: 10px 0 12px;
            border-radius: 12px;
        }

        .date__name {
            font-size: 0.68rem;
        }

        .date__num {
            font-size: 1.1rem;
        }

        .date__note {
            font-size: 0.6rem;
        }

        .slots {
            grid-template-columns: repeat(2, 1fr);
        }

        .confirm {
            flex-direction: column-reverse;
            align-items: stretch;
            text-align: center;
        }

        .btn {
            width: 100%;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .date__label,
        .slot__label,
        .note,
        .btn,
        .page-head__back {
            transition: none;
        }
    }
</style>

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