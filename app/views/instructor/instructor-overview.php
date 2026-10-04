<style>
    /* ---------- Page container ---------- */
    .ins-dashboard {
        padding: 32px;
        box-sizing: border-box;
        width: 100%;
    }

    /* ---------- Metrics ---------- */
    .ins-metrics-row {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .ins-metric-card {
        flex: 1;
        padding: 24px;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .ins-bg-blue {
        background-color: #e6f3ff;
    }

    .ins-bg-gray {
        background-color: #eef2f6;
    }

    .ins-metric-label {
        font-size: 13px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }

    .ins-metric-val {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
    }

    .ins-metric-sub {
        font-size: 12px;
        color: #718096;
        margin-top: 6px;
    }

    /* ---------- Sections ---------- */
    .ins-section {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
        min-width: 0;
    }

    .ins-row {
        display: flex;
        gap: 24px;
        margin-bottom: 24px;
    }

    .ins-row .ins-section {
        flex: 1;
        margin-bottom: 0;
    }

    .ins-row .ins-wide {
        flex: 3;
    }

    .ins-row .ins-narrow {
        flex: 2;
    }

    .ins-section-title {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 24px;
    }

    .ins-heading-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
    }

    .ins-heading-row .ins-section-title {
        margin-bottom: 0;
    }

    .ins-heading-note {
        font-size: 12px;
        color: #a0aec0;
    }

    .ins-subheading {
        font-size: 13px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 14px;
    }

    .ins-divider {
        height: 1px;
        background-color: #edf2f7;
        margin: 24px 0;
    }

    /* ---------- Buttons / links ---------- */
    .ins-btn {
        font-family: inherit;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
        white-space: nowrap;
        border: 1px solid #1a202c;
        background-color: #1a202c;
        color: #ffffff;
    }

    .ins-btn:hover {
        background-color: #2d3748;
        border-color: #2d3748;
    }

    .ins-btn-outline {
        background-color: transparent;
        color: #2d3748;
        border-color: #cbd5e0;
    }

    .ins-btn-outline:hover {
        background-color: #edf2f7;
        border-color: #cbd5e0;
    }

    .ins-link {
        font-size: 12px;
        font-weight: 600;
        color: #4a5568;
        text-decoration: none;
        white-space: nowrap;
    }

    .ins-link:hover {
        text-decoration: underline;
    }

    .ins-btn:focus-visible,
    .ins-link:focus-visible,
    .ins-msg:focus-visible {
        outline: 2px solid #3182ce;
        outline-offset: 2px;
    }

    /* ---------- Text helpers ---------- */
    .ins-text-dark {
        color: #2d3748;
    }

    .ins-text-muted {
        color: #a0aec0;
    }

    .ins-text-soft {
        color: #718096;
    }

    .ins-text-medium {
        font-weight: 500;
    }

    .ins-text-green {
        color: #38a169;
        font-weight: 600;
    }

    .ins-text-amber {
        color: #dd6b20;
        font-weight: 600;
    }

    .ins-text-red {
        color: #e53e3e;
        font-weight: 600;
    }

    /* ---------- Today's schedule ---------- */
    .ins-timeline {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ins-slot {
        display: flex;
        gap: 16px;
        align-items: stretch;
    }

    .ins-slot-time {
        width: 72px;
        flex-shrink: 0;
        padding-top: 14px;
        font-size: 12px;
        font-weight: 600;
        color: #718096;
        text-align: right;
    }

    .ins-slot-card {
        flex: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        background-color: #ffffff;
        border-radius: 10px;
        padding: 12px 16px;
        border-left: 4px solid #cbd5e0;
        min-width: 0;
    }

    .ins-slot-card.is-done {
        border-left-color: #e2e8f0;
        background-color: #fbfcfd;
    }

    .ins-slot-card.is-next {
        border-left-color: #38a169;
    }

    .ins-slot-card.is-duty {
        border-left-color: #90a4ff;
    }

    .ins-slot-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .ins-slot-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .ins-slot-card.is-done .ins-slot-title {
        color: #a0aec0;
    }

    .ins-slot-detail {
        font-size: 12px;
        color: #a0aec0;
    }

    .ins-slot-status {
        font-size: 12px;
        flex-shrink: 0;
        text-align: right;
    }

    /* ---------- Generic list ---------- */
    .ins-list {
        display: flex;
        flex-direction: column;
    }

    .ins-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .ins-list-item:first-child {
        padding-top: 0;
    }

    .ins-list-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ins-list-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .ins-list-name {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .ins-list-note {
        font-size: 12px;
        color: #4a5568;
    }

    .ins-list-detail {
        font-size: 12px;
        color: #a0aec0;
    }

    .ins-list-side {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-shrink: 0;
    }

    /* ---------- Alerts ---------- */
    .ins-alert {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 16px;
        border-left: 4px solid #e53e3e;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .ins-alert+.ins-alert {
        margin-top: 12px;
    }

    .ins-alert.is-warning {
        border-left-color: #dd6b20;
    }

    .ins-alert-top {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        gap: 12px;
    }

    .ins-alert-name {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .ins-alert-date {
        font-size: 12px;
        color: #a0aec0;
        white-space: nowrap;
    }

    .ins-alert-reason {
        font-size: 13px;
        color: #4a5568;
        line-height: 1.45;
    }

    .ins-alert-actions {
        display: flex;
        gap: 8px;
    }

    .ins-alert-footnote {
        font-size: 12px;
        color: #a0aec0;
        margin-top: 16px;
        line-height: 1.45;
    }

    /* ---------- Clients table ---------- */
    .ins-table-head {
        display: flex;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        color: #a0aec0;
        font-weight: 500;
    }

    .ins-table-row {
        display: flex;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        align-items: center;
    }

    .ins-table-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ins-col-name {
        width: 22%;
    }

    .ins-col-plan {
        width: 12%;
    }

    .ins-col-goal {
        width: 16%;
    }

    .ins-col-visits {
        width: 12%;
    }

    .ins-col-workout {
        width: 12%;
    }

    .ins-col-meals {
        width: 12%;
    }

    .ins-col-last {
        width: 14%;
    }

    /* ---------- Messages ---------- */
    .ins-msg {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 14px 0;
        border-bottom: 1px solid #edf2f7;
        text-decoration: none;
    }

    .ins-msg:first-child {
        padding-top: 0;
    }

    .ins-msg:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ins-msg-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: transparent;
        margin-top: 6px;
        flex-shrink: 0;
    }

    .ins-msg.is-unread .ins-msg-dot {
        background-color: #3182ce;
    }

    .ins-msg-body {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .ins-msg-top {
        display: flex;
        justify-content: space-between;
        gap: 12px;
    }

    .ins-msg-name {
        font-size: 14px;
        font-weight: 500;
        color: #4a5568;
    }

    .ins-msg.is-unread .ins-msg-name {
        font-weight: 700;
        color: #1a202c;
    }

    .ins-msg-time {
        font-size: 12px;
        color: #a0aec0;
        white-space: nowrap;
    }

    .ins-msg-preview {
        font-size: 13px;
        color: #718096;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ins-msg.is-unread .ins-msg-preview {
        color: #2d3748;
    }

    /* ---------- Week availability ---------- */
    .ins-week {
        display: grid;
        grid-template-columns: repeat(7, minmax(96px, 1fr));
        gap: 10px;
    }

    .ins-week-scroll {
        overflow-x: auto;
    }

    .ins-day {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 14px;
        display: flex;
        flex-direction: column;
        gap: 6px;
        border: 2px solid transparent;
        box-sizing: border-box;
    }

    .ins-day.is-today {
        border-color: #38a169;
    }

    .ins-day.is-off {
        background-color: #edf2f7;
    }

    .ins-day-name {
        font-size: 12px;
        color: #a0aec0;
    }

    .ins-day-date {
        font-size: 18px;
        font-weight: 700;
        color: #1a202c;
    }

    .ins-day.is-off .ins-day-date {
        color: #a0aec0;
    }

    .ins-day-shift {
        font-size: 12px;
        color: #4a5568;
        margin-top: 4px;
    }

    .ins-day-pt {
        font-size: 12px;
        font-weight: 600;
        color: #2d3748;
    }

    .ins-day.is-off .ins-day-shift,
    .ins-day.is-off .ins-day-pt {
        color: #a0aec0;
        font-weight: 400;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .ins-metrics-row {
            flex-wrap: wrap;
        }

        .ins-metric-card {
            flex: 1 1 calc(50% - 8px);
        }

        .ins-row {
            flex-direction: column;
        }
    }

    @media (max-width: 600px) {
        .ins-dashboard {
            padding: 16px;
        }

        .ins-metric-card {
            flex: 1 1 100%;
        }

        .ins-slot {
            flex-direction: column;
            gap: 6px;
        }

        .ins-slot-time {
            width: auto;
            padding-top: 0;
            text-align: left;
        }

        .ins-section.ins-scroll-x {
            overflow-x: auto;
        }

        .ins-scroll-x .ins-table-head,
        .ins-scroll-x .ins-table-row {
            min-width: 680px;
        }

        .ins-list-item {
            flex-direction: column;
            align-items: flex-start;
        }

        .ins-heading-row {
            flex-wrap: wrap;
        }
    }
</style>
<div class="ins-dashboard">

    <!-- My day at a glance -->
    <div class="ins-metrics-row">
        <div class="ins-metric-card ins-bg-blue">
            <div class="ins-metric-label">Sessions Today</div>
            <div class="ins-metric-val">4</div>
            <div class="ins-metric-sub">2 done, next at 12:30 PM</div>
        </div>
        <div class="ins-metric-card ins-bg-gray">
            <div class="ins-metric-label">My Clients</div>
            <div class="ins-metric-val">15</div>
            <div class="ins-metric-sub">2 new this week</div>
        </div>
        <div class="ins-metric-card ins-bg-blue">
            <div class="ins-metric-label">Need a Follow-Up</div>
            <div class="ins-metric-val">2</div>
            <div class="ins-metric-sub">Flagged by the system</div>
        </div>
        <div class="ins-metric-card ins-bg-gray">
            <div class="ins-metric-label">Unread Messages</div>
            <div class="ins-metric-val">3</div>
            <div class="ins-metric-sub">Oldest from this morning</div>
        </div>
    </div>


    <!-- Today's schedule + follow-ups -->
    <div class="ins-row">
        <div class="ins-section ins-wide">
            <div class="ins-heading-row">
                <div class="ins-section-title">Today's Schedule</div>
                <span class="ins-heading-note">Monday, 28 September</span>
            </div>

            <div class="ins-timeline">
                <div class="ins-slot">
                    <div class="ins-slot-time">7:00 AM</div>
                    <div class="ins-slot-card is-done">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Nimali Perera</div>
                            <div class="ins-slot-detail">1 hour · Weights area</div>
                        </div>
                        <div class="ins-slot-status ins-text-muted">Done</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">10:00 AM</div>
                    <div class="ins-slot-card is-done">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">Power Yoga class</div>
                            <div class="ins-slot-detail">Studio A · 8 of 12 attended</div>
                        </div>
                        <div class="ins-slot-status ins-text-muted">Done</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">12:30 PM</div>
                    <div class="ins-slot-card is-next">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Kasun Wijesinghe</div>
                            <div class="ins-slot-detail">1 hour · First session, goal is muscle gain</div>
                        </div>
                        <div class="ins-slot-status ins-text-green">Up next</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">2:00 PM</div>
                    <div class="ins-slot-card">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">PT session with Hasini Rathnayake</div>
                            <div class="ins-slot-detail">45 minutes · Weights area</div>
                        </div>
                        <div class="ins-slot-status ins-text-soft">Later</div>
                    </div>
                </div>
                <div class="ins-slot">
                    <div class="ins-slot-time">3:00 PM</div>
                    <div class="ins-slot-card is-duty">
                        <div class="ins-slot-info">
                            <div class="ins-slot-title">Floor duty until 9:00 PM</div>
                            <div class="ins-slot-detail">Cardio area</div>
                        </div>
                        <div class="ins-slot-status ins-text-soft">Later</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ins-section ins-narrow">
            <div class="ins-heading-row">
                <div class="ins-section-title">Clients to Follow Up</div>
            </div>

            <div class="ins-alert">
                <div class="ins-alert-top">
                    <span class="ins-alert-name">Dinithi Ekanayake</span>
                    <span class="ins-alert-date">Flagged 26 Sep</span>
                </div>
                <div class="ins-alert-reason">Completed only 30% of her workout plan over the last 2 weeks.</div>
                <div class="ins-alert-actions">
                    <button type="button" class="ins-btn" onclick="window.location.href='/portal/messages'">Message</button>
                    <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/adherence'">View progress</button>
                </div>
            </div>

            <div class="ins-alert is-warning">
                <div class="ins-alert-top">
                    <span class="ins-alert-name">Madhavi Wickramasinghe</span>
                    <span class="ins-alert-date">Flagged today</span>
                </div>
                <div class="ins-alert-reason">Missed her last 3 booked sessions and hasn't visited since 25 Sep.</div>
                <div class="ins-alert-actions">
                    <button type="button" class="ins-btn" onclick="window.location.href='/portal/messages'">Message</button>
                    <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/adherence'">View progress</button>
                </div>
            </div>

            <div class="ins-alert-footnote">Clients are flagged automatically when they miss 3 sessions in a row, fall below 40% plan adherence, or go 10 days without a visit.</div>
        </div>
    </div>


    <!-- My clients -->
    <div class="ins-section ins-scroll-x">
        <div class="ins-heading-row">
            <div class="ins-section-title">My Clients</div>
            <div class="ins-list-side">
                <a href="/portal/clients" class="ins-link">View all 15</a>
                <button type="button" class="ins-btn" onclick="window.location.href='/portal/clients'">Create workout plan</button>
            </div>
        </div>

        <div class="ins-table-head">
            <div class="ins-col-name">Client</div>
            <div class="ins-col-plan">Membership</div>
            <div class="ins-col-goal">Goal</div>
            <div class="ins-col-visits">Visits (30 days)</div>
            <div class="ins-col-workout">Workout plan</div>
            <div class="ins-col-meals">Meal plan</div>
            <div class="ins-col-last">Last visit</div>
        </div>

        <div class="ins-table-body">
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Nimali Perera</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Weight loss</div>
                <div class="ins-col-visits ins-text-dark">14</div>
                <div class="ins-col-workout ins-text-green">88%</div>
                <div class="ins-col-meals ins-text-green">82%</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Hasini Rathnayake</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Endurance</div>
                <div class="ins-col-visits ins-text-dark">11</div>
                <div class="ins-col-workout ins-text-green">76%</div>
                <div class="ins-col-meals ins-text-amber">70%</div>
                <div class="ins-col-last ins-text-soft">Yesterday</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Kasun Wijesinghe</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Muscle gain</div>
                <div class="ins-col-visits ins-text-dark">1</div>
                <div class="ins-col-workout ins-text-muted">Not assigned</div>
                <div class="ins-col-meals ins-text-muted">Requested</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Madhavi Wickramasinghe</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Flexibility</div>
                <div class="ins-col-visits ins-text-dark">6</div>
                <div class="ins-col-workout ins-text-amber">58%</div>
                <div class="ins-col-meals ins-text-muted">No meal plan</div>
                <div class="ins-col-last ins-text-red">25 Sep</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Dinithi Ekanayake</div>
                <div class="ins-col-plan ins-text-soft">Regular</div>
                <div class="ins-col-goal ins-text-muted">Weight loss</div>
                <div class="ins-col-visits ins-text-dark">8</div>
                <div class="ins-col-workout ins-text-red">30%</div>
                <div class="ins-col-meals ins-text-red">41%</div>
                <div class="ins-col-last ins-text-soft">Yesterday</div>
            </div>
            <div class="ins-table-row">
                <div class="ins-col-name ins-text-dark ins-text-medium">Sachini Herath</div>
                <div class="ins-col-plan ins-text-soft">Day pass</div>
                <div class="ins-col-goal ins-text-muted">General fitness</div>
                <div class="ins-col-visits ins-text-dark">1</div>
                <div class="ins-col-workout ins-text-muted">Not available</div>
                <div class="ins-col-meals ins-text-muted">Not available</div>
                <div class="ins-col-last ins-text-soft">Today</div>
            </div>
        </div>
    </div>


    <!-- Messages + requests -->
    <div class="ins-row">
        <div class="ins-section">
            <div class="ins-heading-row">
                <div class="ins-section-title">Messages</div>
                <a href="/portal/messages" class="ins-link">Open messages</a>
            </div>

            <div class="ins-list">
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Kasun Wijesinghe</span>
                            <span class="ins-msg-time">10:48 AM</span>
                        </span>
                        <span class="ins-msg-preview">Should I eat before our session at 12:30 or after?</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Hasini Rathnayake</span>
                            <span class="ins-msg-time">9:15 AM</span>
                        </span>
                        <span class="ins-msg-preview">My knee felt a bit sore after squats yesterday. Can we swap them today?</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg is-unread">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Nimali Perera</span>
                            <span class="ins-msg-time">8:05 AM</span>
                        </span>
                        <span class="ins-msg-preview">Thanks for this morning! Ticked off everything on today's plan.</span>
                    </span>
                </a>
                <a href="/portal/messages" class="ins-msg">
                    <span class="ins-msg-dot" aria-hidden="true"></span>
                    <span class="ins-msg-body">
                        <span class="ins-msg-top">
                            <span class="ins-msg-name">Dinithi Ekanayake</span>
                            <span class="ins-msg-time">Yesterday</span>
                        </span>
                        <span class="ins-msg-preview">You: How's the new routine going? Let me know if it's too much.</span>
                    </span>
                </a>
            </div>
        </div>

        <div class="ins-section">
            <div class="ins-subheading">New Clients</div>

            <div class="ins-list">
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Kasun Wijesinghe</div>
                        <div class="ins-list-note">Chose you as his instructor</div>
                        <div class="ins-list-detail">Regular · Muscle gain · 26 Sep</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn" onclick="window.location.href='/portal/clients'">Create workout plan</button>
                    </div>
                </div>
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Sachini Herath</div>
                        <div class="ins-list-note">Booked a PT session on her day pass</div>
                        <div class="ins-list-detail">Day pass · Friday 2 Oct, 5:00 PM</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/schedule'">View booking</button>
                    </div>
                </div>
            </div>

            <!-- Meal plan requests: render this block only for certified nutrition instructors -->
            <div class="ins-divider"></div>

            <div class="ins-subheading">Meal Plan Requests</div>

            <div class="ins-list">
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Kasun Wijesinghe</div>
                        <div class="ins-list-note">New meal plan for muscle gain</div>
                        <div class="ins-list-detail">Requested today, 10:30 AM</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn" onclick="window.location.href='/portal/meal-plan-requests'">Create meal plan</button>
                    </div>
                </div>
                <div class="ins-list-item">
                    <div class="ins-list-info">
                        <div class="ins-list-name">Hasini Rathnayake</div>
                        <div class="ins-list-note">Update her current plan, now vegetarian</div>
                        <div class="ins-list-detail">Requested 27 Sep</div>
                    </div>
                    <div class="ins-list-side">
                        <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/meal-plan-requests'">Edit meal plan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- This week -->
    <div class="ins-section">
        <div class="ins-heading-row">
            <div class="ins-section-title">My Week</div>
            <button type="button" class="ins-btn ins-btn-outline" onclick="window.location.href='/portal/schedule'">Manage schedule</button>
        </div>

        <div class="ins-week-scroll">
            <div class="ins-week">
                <div class="ins-day is-today">
                    <span class="ins-day-name">Mon (today)</span>
                    <span class="ins-day-date">28</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">3 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Tue</span>
                    <span class="ins-day-date">29</span>
                    <span class="ins-day-shift">Floor 6 AM–12 PM</span>
                    <span class="ins-day-pt">2 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Wed</span>
                    <span class="ins-day-date">30</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">4 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Thu</span>
                    <span class="ins-day-date">1</span>
                    <span class="ins-day-shift">Floor 6 AM–12 PM</span>
                    <span class="ins-day-pt">1 PT session</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Fri</span>
                    <span class="ins-day-date">2</span>
                    <span class="ins-day-shift">Floor 3–9 PM</span>
                    <span class="ins-day-pt">3 PT sessions</span>
                </div>
                <div class="ins-day">
                    <span class="ins-day-name">Sat</span>
                    <span class="ins-day-date">3</span>
                    <span class="ins-day-shift">Floor 7 AM–1 PM</span>
                    <span class="ins-day-pt">5 PT sessions</span>
                </div>
                <div class="ins-day is-off">
                    <span class="ins-day-name">Sun</span>
                    <span class="ins-day-date">4</span>
                    <span class="ins-day-shift">Day off</span>
                    <span class="ins-day-pt">No sessions</span>
                </div>
            </div>
        </div>
    </div>
</div>