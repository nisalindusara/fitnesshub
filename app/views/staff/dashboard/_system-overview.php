<style>
    /* ---------- Metrics ---------- */
    .sys-metrics-row {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .sys-metric-card {
        flex: 1;
        padding: 24px;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .sys-bg-blue {
        background-color: #e6f3ff;
    }

    .sys-bg-gray {
        background-color: #eef2f6;
    }

    .sys-metric-label {
        font-size: 13px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }

    .sys-metric-val {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
    }

    .sys-metric-sub {
        font-size: 12px;
        color: #718096;
        margin-top: 6px;
    }

    /* ---------- Panels ---------- */
    .sys-chart-panel,
    .sys-table-panel {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
    }

    .sys-panels-row {
        display: flex;
        gap: 24px;
        margin-bottom: 24px;
    }

    .sys-panels-row .sys-chart-panel,
    .sys-panels-row .sys-table-panel {
        flex: 1;
        margin-bottom: 0;
        min-width: 0;
    }

    .sys-panels-row .sys-panel-wide {
        flex: 3;
    }

    .sys-panels-row .sys-panel-narrow {
        flex: 2;
    }

    .sys-panel-heading {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 24px;
    }

    .sys-heading-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
    }

    .sys-heading-row .sys-panel-heading {
        margin-bottom: 0;
    }

    .sys-heading-note {
        font-size: 12px;
        color: #a0aec0;
    }

    .sys-link {
        font-size: 12px;
        font-weight: 600;
        color: #4a5568;
        text-decoration: none;
        white-space: nowrap;
    }

    .sys-link:hover {
        text-decoration: underline;
    }

    /* ---------- Buttons ---------- */
    .sys-btn {
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

    .sys-btn:hover {
        background-color: #2d3748;
        border-color: #2d3748;
    }

    .sys-btn-outline {
        background-color: transparent;
        color: #2d3748;
        border-color: #cbd5e0;
    }

    .sys-btn-outline:hover {
        background-color: #edf2f7;
        border-color: #cbd5e0;
    }

    .sys-btn:focus-visible,
    .sys-link:focus-visible {
        outline: 2px solid #3182ce;
        outline-offset: 2px;
    }

    /* ---------- Text helpers ---------- */
    .sys-text-dark {
        color: #2d3748;
    }

    .sys-text-muted {
        color: #a0aec0;
    }

    .sys-text-soft {
        color: #718096;
    }

    .sys-text-medium {
        font-weight: 500;
    }

    .sys-text-green {
        color: #38a169;
        font-weight: 500;
    }

    .sys-text-red {
        color: #e53e3e;
        font-weight: 500;
    }

    .sys-text-amber {
        color: #dd6b20;
        font-weight: 500;
    }

    .sys-text-blue {
        color: #3182ce;
        font-weight: 500;
    }

    /* ---------- Generic list rows ---------- */
    .sys-list {
        display: flex;
        flex-direction: column;
    }

    .sys-list-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .sys-list-row:first-child {
        padding-top: 0;
    }

    .sys-list-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sys-list-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .sys-list-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .sys-list-sub {
        font-size: 12px;
        color: #a0aec0;
    }

    .sys-list-note {
        font-size: 12px;
        color: #4a5568;
    }

    .sys-list-side {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-shrink: 0;
    }

    .sys-list-figures {
        text-align: right;
        display: flex;
        flex-direction: column;
        gap: 4px;
        font-size: 12px;
    }

    .sys-amount {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        white-space: nowrap;
    }

    .sys-slots {
        font-size: 13px;
        font-weight: 700;
        color: #4a5568;
    }

    /* ---------- Feedback ---------- */
    .sys-feedback-text {
        font-size: 13px;
        color: #2d3748;
        line-height: 1.5;
    }

    /* ---------- Attendance bar chart ---------- */
    .sys-bar-chart-container {
        position: relative;
        height: 220px;
        display: flex;
        padding-left: 40px;
        padding-bottom: 30px;
        box-sizing: border-box;
    }

    .sys-y-axis {
        position: absolute;
        left: 0;
        top: -6px;
        bottom: 24px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 30px;
        text-align: right;
        font-size: 12px;
        color: #a0aec0;
    }

    .sys-chart-grid {
        position: absolute;
        left: 40px;
        right: 0;
        top: 0;
        bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1;
    }

    .sys-grid-line {
        border-bottom: 1px dashed #e2e8f0;
        width: 100%;
        height: 0;
    }

    .sys-grid-line-solid {
        border-bottom-style: solid;
    }

    .sys-bars-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 2;
        padding: 0 10px;
        box-sizing: border-box;
    }

    .sys-bar-column {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        height: 100%;
        width: 11%;
        position: relative;
    }

    .sys-bar-fill {
        width: 100%;
        background-color: #90a4ff;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    .sys-bar-fill.is-today {
        background-color: #c9d5ff;
    }

    .sys-bar-value {
        font-size: 11px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 6px;
    }

    .sys-x-label {
        position: absolute;
        bottom: -26px;
        font-size: 12px;
        color: #a0aec0;
        white-space: nowrap;
    }

    .sys-x-label.is-today {
        color: #2d3748;
        font-weight: 600;
    }

    /* ---------- Equipment ---------- */
    .sys-equip-counts {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
    }

    .sys-equip-count {
        flex: 1;
        background-color: #ffffff;
        border-radius: 12px;
        padding: 14px 16px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .sys-equip-num {
        font-size: 22px;
        font-weight: 700;
    }

    .sys-equip-label {
        font-size: 12px;
        color: #718096;
    }

    /* ---------- Instructor table ---------- */
    .sys-table-head {
        display: flex;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        color: #a0aec0;
        font-weight: 500;
    }

    .sys-table-row {
        display: flex;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        align-items: center;
    }

    .sys-table-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sys-col-name {
        width: 22%;
    }

    .sys-col-spec {
        width: 22%;
    }

    .sys-col-duty {
        width: 20%;
    }

    .sys-col-pt {
        width: 12%;
    }

    .sys-col-clients {
        width: 10%;
    }

    .sys-col-status {
        width: 14%;
    }

    /* ---------- Activity log ---------- */
    .sys-activity-time {
        font-size: 12px;
        color: #a0aec0;
        white-space: nowrap;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .sys-metrics-row {
            flex-wrap: wrap;
        }

        .sys-metric-card {
            flex: 1 1 calc(50% - 8px);
        }

        .sys-panels-row {
            flex-direction: column;
        }
    }

    @media (max-width: 600px) {
        .sys-metric-card {
            flex: 1 1 100%;
        }

        .sys-table-panel.sys-scroll-x {
            overflow-x: auto;
        }

        .sys-scroll-x .sys-table-head,
        .sys-scroll-x .sys-table-row {
            min-width: 620px;
        }

        .sys-list-row {
            flex-direction: column;
            align-items: flex-start;
        }

        .sys-list-side {
            width: 100%;
            justify-content: space-between;
        }

        .sys-list-figures {
            text-align: left;
        }

        .sys-bar-value {
            display: none;
        }
    }
</style>


<!-- Operations at a glance -->
<div class="sys-metrics-row">
    <div class="sys-metric-card sys-bg-blue">
        <div class="sys-metric-label">Active Members</div>
        <div class="sys-metric-val">1,247</div>
        <div class="sys-metric-sub">38 joined this month</div>
    </div>
    <div class="sys-metric-card sys-bg-gray">
        <div class="sys-metric-label">Checked In Today</div>
        <div class="sys-metric-val">61</div>
        <div class="sys-metric-sub">23 in the gym now</div>
    </div>
    <div class="sys-metric-card sys-bg-blue">
        <div class="sys-metric-label">Bank Slips to Verify</div>
        <div class="sys-metric-val">3</div>
        <div class="sys-metric-sub">Oldest uploaded 23 Sep</div>
    </div>
    <div class="sys-metric-card sys-bg-gray">
        <div class="sys-metric-label">Open Tickets</div>
        <div class="sys-metric-val">5</div>
        <div class="sys-metric-sub">2 open for over 48 hours</div>
    </div>
</div>


<!-- Approval queues -->
<div class="sys-panels-row">
    <div class="sys-table-panel">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Bank Slips to Verify</div>
            <a href="#" class="sys-link">View all</a>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Pasan Gunasekara</div>
                    <div class="sys-list-sub">BS-7721 · Regular membership, 1 month</div>
                    <div class="sys-list-note">Uploaded 23 Sep 2026</div>
                </div>
                <div class="sys-list-side">
                    <div class="sys-amount">LKR 5,000</div>
                    <button type="button" class="sys-btn">Review</button>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Kavindu Abeysekara</div>
                    <div class="sys-list-sub">BS-7722 · 4 PT sessions with Amal Fernando</div>
                    <div class="sys-list-note">Uploaded 26 Sep 2026</div>
                </div>
                <div class="sys-list-side">
                    <div class="sys-amount">LKR 10,000</div>
                    <button type="button" class="sys-btn">Review</button>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Madhavi Wickramasinghe</div>
                    <div class="sys-list-sub">BS-7723 · Store order ORD-4497</div>
                    <div class="sys-list-note">Uploaded today, 09:10 AM</div>
                </div>
                <div class="sys-list-side">
                    <div class="sys-amount">LKR 12,300</div>
                    <button type="button" class="sys-btn">Review</button>
                </div>
            </div>
        </div>
    </div>

    <div class="sys-table-panel">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Open Support Tickets</div>
            <a href="#" class="sys-link">View all</a>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Leg press seat won't lock</div>
                    <div class="sys-list-sub">Equipment fault · Ishara Senanayake</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-amber">Open</div>
                    <div class="sys-text-red">3 days old</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Charged twice for a PT session</div>
                    <div class="sys-list-sub">Billing · Ruwan Dissanayake</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-blue">In progress</div>
                    <div class="sys-text-red">2 days old</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Meal plan checklist not saving</div>
                    <div class="sys-list-sub">App issue · Hasini Rathnayake</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-amber">Open</div>
                    <div class="sys-text-soft">5 hours old</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Changing room tap leaking</div>
                    <div class="sys-list-sub">Facility · Coach Chamari Silva</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-amber">Open</div>
                    <div class="sys-text-soft">1 hour old</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- At-risk members + feedback -->
<div class="sys-panels-row">
    <div class="sys-table-panel sys-panel-wide">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Members at Risk of Leaving</div>
            <span class="sys-heading-note">Flagged automatically</span>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Ravi Kumarasinghe</div>
                    <div class="sys-list-note">Missed 4 sessions in a row</div>
                    <div class="sys-list-sub">Instructor: Amal Fernando · Flagged 25 Sep</div>
                </div>
                <div class="sys-list-side">
                    <button type="button" class="sys-btn sys-btn-outline">Mark handled</button>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Dinithi Ekanayake</div>
                    <div class="sys-list-note">Workout plan adherence down to 30%</div>
                    <div class="sys-list-sub">Instructor: Dilini Jayasekara · Flagged 26 Sep</div>
                </div>
                <div class="sys-list-side">
                    <button type="button" class="sys-btn sys-btn-outline">Mark handled</button>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Lahiru Madushanka</div>
                    <div class="sys-list-note">No visits in 12 days</div>
                    <div class="sys-list-sub">Instructor: Nuwan Karunaratne · Flagged 27 Sep</div>
                </div>
                <div class="sys-list-side">
                    <button type="button" class="sys-btn sys-btn-outline">Mark handled</button>
                </div>
            </div>
        </div>
    </div>

    <div class="sys-table-panel sys-panel-narrow">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">New Feedback</div>
            <a href="#" class="sys-link">View all</a>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-feedback-text">Evening Spin Cycle fills up too fast. Could we get a second session?</div>
                    <div class="sys-list-sub">Tharindu Bandara · Today</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-feedback-text">Coach Dilini's meal plans have been really easy to follow.</div>
                    <div class="sys-list-sub">Nimali Perera · Yesterday</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-feedback-text">The weights area gets very crowded around 6 PM.</div>
                    <div class="sys-list-sub">Sachini Herath · 26 Sep</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Attendance + equipment -->
<div class="sys-panels-row">
    <div class="sys-chart-panel sys-panel-wide">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Check-Ins, Last 7 Days</div>
            <span class="sys-heading-note">729 total</span>
        </div>

        <div class="sys-bar-chart-container" role="img" aria-label="Daily check-ins: Tuesday 100, Wednesday 90, Thursday 118, Friday 130, Saturday 160, Sunday 70, today 61 so far">
            <div class="sys-y-axis" aria-hidden="true">
                <div>160</div>
                <div>120</div>
                <div>80</div>
                <div>40</div>
                <div>0</div>
            </div>

            <div class="sys-chart-grid" aria-hidden="true">
                <div class="sys-grid-line"></div>
                <div class="sys-grid-line"></div>
                <div class="sys-grid-line"></div>
                <div class="sys-grid-line"></div>
                <div class="sys-grid-line sys-grid-line-solid"></div>
            </div>

            <div class="sys-bars-wrapper" aria-hidden="true">
                <div class="sys-bar-column">
                    <div class="sys-bar-value">100</div>
                    <div class="sys-bar-fill" style="height: 62.5%;"></div>
                    <div class="sys-x-label">Tue</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">90</div>
                    <div class="sys-bar-fill" style="height: 56.25%;"></div>
                    <div class="sys-x-label">Wed</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">118</div>
                    <div class="sys-bar-fill" style="height: 73.75%;"></div>
                    <div class="sys-x-label">Thu</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">130</div>
                    <div class="sys-bar-fill" style="height: 81.25%;"></div>
                    <div class="sys-x-label">Fri</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">160</div>
                    <div class="sys-bar-fill" style="height: 100%;"></div>
                    <div class="sys-x-label">Sat</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">70</div>
                    <div class="sys-bar-fill" style="height: 43.75%;"></div>
                    <div class="sys-x-label">Sun</div>
                </div>
                <div class="sys-bar-column">
                    <div class="sys-bar-value">61</div>
                    <div class="sys-bar-fill is-today" style="height: 38.1%;"></div>
                    <div class="sys-x-label is-today">Today</div>
                </div>
            </div>
        </div>
    </div>

    <div class="sys-chart-panel sys-panel-narrow">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Equipment Status</div>
            <button type="button" class="sys-btn sys-btn-outline">Add equipment</button>
        </div>

        <div class="sys-equip-counts">
            <div class="sys-equip-count">
                <span class="sys-equip-num sys-text-green">42</span>
                <span class="sys-equip-label">Available</span>
            </div>
            <div class="sys-equip-count">
                <span class="sys-equip-num sys-text-red">2</span>
                <span class="sys-equip-label">Faulty</span>
            </div>
            <div class="sys-equip-count">
                <span class="sys-equip-num sys-text-amber">1</span>
                <span class="sys-equip-label">Maintenance</span>
            </div>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Leg Press</div>
                    <div class="sys-list-sub">Weights area · Since 25 Sep</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-red">Faulty</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Treadmill 2</div>
                    <div class="sys-list-sub">Cardio area · Since 27 Sep</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-red">Faulty</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Cable Crossover</div>
                    <div class="sys-list-sub">Weights area · Back on 30 Sep</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-amber">Maintenance</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Instructors today -->
<div class="sys-table-panel sys-scroll-x">
    <div class="sys-heading-row">
        <div class="sys-panel-heading">Instructors Today</div>
        <button type="button" class="sys-btn sys-btn-outline">Register staff</button>
    </div>

    <div class="sys-table-head">
        <div class="sys-col-name">Name</div>
        <div class="sys-col-spec">Specialty</div>
        <div class="sys-col-duty">Floor duty</div>
        <div class="sys-col-pt">PT sessions</div>
        <div class="sys-col-clients">Clients</div>
        <div class="sys-col-status">Status</div>
    </div>

    <div class="sys-table-body">
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Amal Fernando</div>
            <div class="sys-col-spec sys-text-muted">Strength / Core</div>
            <div class="sys-col-duty sys-text-soft">6:00 AM – 12:00 PM</div>
            <div class="sys-col-pt sys-text-dark">3</div>
            <div class="sys-col-clients sys-text-dark">18</div>
            <div class="sys-col-status sys-text-green">On duty</div>
        </div>
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Chamari Silva</div>
            <div class="sys-col-spec sys-text-muted">Zumba / Cardio</div>
            <div class="sys-col-duty sys-text-soft">6:00 AM – 11:00 AM</div>
            <div class="sys-col-pt sys-text-dark">1</div>
            <div class="sys-col-clients sys-text-dark">11</div>
            <div class="sys-col-status sys-text-green">On duty</div>
        </div>
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Dilini Jayasekara</div>
            <div class="sys-col-spec sys-text-muted">Yoga / Nutrition</div>
            <div class="sys-col-duty sys-text-soft">3:00 PM – 9:00 PM</div>
            <div class="sys-col-pt sys-text-dark">2</div>
            <div class="sys-col-clients sys-text-dark">15</div>
            <div class="sys-col-status sys-text-soft">Starts 3:00 PM</div>
        </div>
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Nuwan Karunaratne</div>
            <div class="sys-col-spec sys-text-muted">Cycling / HIIT</div>
            <div class="sys-col-duty sys-text-soft">12:00 PM – 6:00 PM</div>
            <div class="sys-col-pt sys-text-dark">2</div>
            <div class="sys-col-clients sys-text-dark">9</div>
            <div class="sys-col-status sys-text-soft">Starts 12:00 PM</div>
        </div>
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Sanjaya Wijeratne</div>
            <div class="sys-col-spec sys-text-muted">Strength / CrossFit</div>
            <div class="sys-col-duty sys-text-muted">None</div>
            <div class="sys-col-pt sys-text-muted">0</div>
            <div class="sys-col-clients sys-text-dark">12</div>
            <div class="sys-col-status sys-text-amber">On leave</div>
        </div>
    </div>
</div>


<!-- Classes + activity -->
<div class="sys-panels-row">
    <div class="sys-table-panel">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Today's Classes</div>
            <button type="button" class="sys-btn sys-btn-outline">Create class</button>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Power Yoga</div>
                    <div class="sys-list-sub">Dilini Jayasekara · Studio A</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-muted">10:00 AM</div>
                    <div class="sys-slots">8/12 slots</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Zumba</div>
                    <div class="sys-list-sub">Chamari Silva · Main Hall</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-muted">11:30 AM</div>
                    <div class="sys-slots">14/16 slots</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Core Blast</div>
                    <div class="sys-list-sub">Amal Fernando · Studio B</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-muted">5:00 PM</div>
                    <div class="sys-slots">5/10 slots</div>
                </div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Spin Cycle</div>
                    <div class="sys-list-sub">Nuwan Karunaratne · Cycle Room</div>
                </div>
                <div class="sys-list-figures">
                    <div class="sys-text-muted">6:30 PM</div>
                    <div class="sys-slots sys-text-red">10/10 slots</div>
                </div>
            </div>
        </div>
    </div>

    <div class="sys-table-panel">
        <div class="sys-heading-row">
            <div class="sys-panel-heading">Recent Activity</div>
            <a href="#" class="sys-link">Full log</a>
        </div>

        <div class="sys-list">
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Kasun Wijesinghe registered</div>
                    <div class="sys-list-sub">New member account</div>
                </div>
                <div class="sys-activity-time">10:42 AM</div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Card payment confirmed</div>
                    <div class="sys-list-sub">Nimali Perera · Regular membership, LKR 5,000</div>
                </div>
                <div class="sys-activity-time">10:15 AM</div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">PT session reassigned</div>
                    <div class="sys-list-sub">Sanjaya Wijeratne on leave, moved to Amal Fernando</div>
                </div>
                <div class="sys-activity-time">09:30 AM</div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Treadmill 2 marked faulty</div>
                    <div class="sys-list-sub">Updated from support ticket</div>
                </div>
                <div class="sys-activity-time">Yesterday</div>
            </div>
            <div class="sys-list-row">
                <div class="sys-list-info">
                    <div class="sys-list-title">Membership cancelled</div>
                    <div class="sys-list-sub">Gayan Rodrigo · Regular</div>
                </div>
                <div class="sys-activity-time">Yesterday</div>
            </div>
        </div>
    </div>
</div>