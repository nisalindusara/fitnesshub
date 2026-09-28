<style>
    /* ---------- Metrics ---------- */
    .metrics-row {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .metric-card {
        flex: 1;
        padding: 24px;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .bg-light-blue {
        background-color: #e6f3ff;
    }

    .bg-light-gray {
        background-color: #eef2f6;
    }

    .metric-label {
        font-size: 13px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }

    .metric-value {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
    }

    .metric-sub {
        font-size: 12px;
        color: #718096;
        margin-top: 6px;
    }

    /* ---------- Shared section / panel ---------- */
    .table-section {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
    }

    .section-heading {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 24px;
    }

    .section-heading-row {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-bottom: 24px;
    }

    .section-heading-row .section-heading {
        margin-bottom: 0;
    }

    .section-link {
        font-size: 12px;
        font-weight: 600;
        color: #4a5568;
        text-decoration: none;
    }

    .section-link:hover {
        text-decoration: underline;
    }

    .panels-row {
        display: flex;
        gap: 24px;
        margin-bottom: 24px;
    }

    .panel-left,
    .panel-right {
        flex: 1;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        box-sizing: border-box;
    }

    .panel-wide {
        flex: 3;
    }

    .panel-narrow {
        flex: 2;
    }

    /* ---------- Buttons ---------- */
    .btn-dark {
        background-color: #1a202c;
        color: #ffffff;
        font-family: inherit;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        white-space: nowrap;
    }

    .btn-dark:hover {
        background-color: #2d3748;
    }

    .btn-dark:focus-visible,
    .action-tile:focus-visible,
    .lookup-input:focus-visible,
    .section-link:focus-visible {
        outline: 2px solid #3182ce;
        outline-offset: 2px;
    }

    /* ---------- Member lookup ---------- */
    .lookup-bar {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
    }

    .lookup-input {
        flex: 1;
        font-family: inherit;
        font-size: 14px;
        color: #2d3748;
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 12px 14px;
        box-sizing: border-box;
    }

    .lookup-input::placeholder {
        color: #a0aec0;
    }

    .lookup-bar .btn-dark {
        font-size: 13px;
        padding: 0 18px;
        border-radius: 8px;
    }

    .lookup-result {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        border-left: 4px solid #38a169;
    }

    .lookup-result.is-expired {
        border-left-color: #f56565;
    }

    .lookup-main {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .lookup-name {
        font-size: 16px;
        font-weight: 700;
        color: #1a202c;
    }

    .lookup-meta {
        font-size: 12px;
        color: #a0aec0;
    }

    .lookup-facts {
        display: flex;
        gap: 28px;
    }

    .fact {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .fact-label {
        font-size: 12px;
        color: #a0aec0;
    }

    .fact-value {
        font-size: 13px;
        font-weight: 600;
        color: #2d3748;
    }

    .lookup-hint {
        font-size: 12px;
        color: #a0aec0;
        margin-top: 12px;
    }

    /* ---------- Quick actions ---------- */
    .actions-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
    }

    .action-tile {
        display: flex;
        flex-direction: column;
        gap: 6px;
        text-align: left;
        font-family: inherit;
        background-color: #ffffff;
        border: 1px solid #edf2f7;
        border-radius: 12px;
        padding: 16px;
        cursor: pointer;
    }

    .action-tile:hover {
        border-color: #cbd5e0;
    }

    .action-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .action-desc {
        font-size: 12px;
        color: #a0aec0;
    }

    /* ---------- Check-in table ---------- */
    .table-header-row {
        display: flex;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        color: #a0aec0;
        font-weight: 500;
    }

    .table-row {
        display: flex;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        align-items: center;
    }

    .table-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .col-id {
        width: 15%;
    }

    .col-name {
        width: 30%;
    }

    .col-type {
        width: 20%;
    }

    .col-time {
        width: 15%;
    }

    .col-method {
        width: 20%;
    }

    /* ---------- Text helpers ---------- */
    .text-mono {
        font-family: monospace;
        color: #a0aec0;
    }

    .text-bold {
        font-weight: 600;
        color: #2d3748;
    }

    .text-muted {
        color: #718096;
    }

    .text-green {
        color: #38a169;
        font-weight: 500;
    }

    .text-red {
        color: #f56565;
    }

    .text-amber {
        color: #c05621;
        font-weight: 500;
    }

    /* ---------- Generic list rows (classes, floor duty, payments, expiring) ---------- */
    .item-list {
        display: flex;
        flex-direction: column;
    }

    .list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .list-item:first-child {
        padding-top: 0;
    }

    .list-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .item-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .item-name {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .item-details {
        font-size: 12px;
        color: #a0aec0;
    }

    .item-side {
        text-align: right;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .item-side-row {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .time-text {
        font-size: 12px;
        color: #a0aec0;
    }

    .slots-text {
        font-size: 13px;
        font-weight: 700;
        color: #4a5568;
    }

    .amount-text {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        white-space: nowrap;
    }

    .duty-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #38a169;
        flex-shrink: 0;
    }

    .duty-dot.is-upcoming {
        background-color: #cbd5e0;
    }

    .duty-name-row {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .metrics-row {
            flex-wrap: wrap;
        }

        .metric-card {
            flex: 1 1 calc(50% - 8px);
        }

        .panels-row {
            flex-direction: column;
        }

        .lookup-result {
            flex-direction: column;
            align-items: flex-start;
        }

        .lookup-facts {
            flex-wrap: wrap;
            gap: 16px 28px;
        }
    }

    @media (max-width: 600px) {
        .metric-card {
            flex: 1 1 100%;
        }

        .table-section {
            overflow-x: auto;
        }

        .table-header-row,
        .table-row {
            min-width: 560px;
        }

        .actions-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<!-- Today at a glance -->
<div class="metrics-row">
    <div class="metric-card bg-light-blue">
        <div class="metric-label">Checked In Today</div>
        <div class="metric-value">61</div>
        <div class="metric-sub">48 members, 13 day passes</div>
    </div>
    <div class="metric-card bg-light-gray">
        <div class="metric-label">In the Gym Now</div>
        <div class="metric-value">23</div>
        <div class="metric-sub">Busiest hour so far: 6–7 AM</div>
    </div>
    <div class="metric-card bg-light-blue">
        <div class="metric-label">Day Passes Issued</div>
        <div class="metric-value">14</div>
        <div class="metric-sub">1 not checked in yet</div>
    </div>
    <div class="metric-card bg-light-gray">
        <div class="metric-label">Cash Collected</div>
        <div class="metric-value">LKR 18,500</div>
        <div class="metric-sub">9 payments today</div>
    </div>
</div>


<!-- Member lookup + quick actions -->
<div class="panels-row">
    <div class="panel-left panel-wide">
        <div class="section-heading">Find a Member</div>

        <div class="lookup-bar">
            <input
                type="search"
                id="memberLookup"
                class="lookup-input"
                placeholder="Search by name, phone number or member ID"
                aria-label="Search members">
            <button type="button" class="btn-dark">Search</button>
        </div>

        <div class="lookup-result">
            <div class="lookup-main">
                <div class="lookup-name">Nimali Perera</div>
                <div class="lookup-meta">M-0042 · 071 234 5678</div>
            </div>
            <div class="lookup-facts">
                <div class="fact">
                    <div class="fact-label">Membership</div>
                    <div class="fact-value">Regular</div>
                </div>
                <div class="fact">
                    <div class="fact-label">Valid until</div>
                    <div class="fact-value">31 Oct 2026</div>
                </div>
                <div class="fact">
                    <div class="fact-label">Payment</div>
                    <div class="fact-value text-green">Paid</div>
                </div>
            </div>
            <button type="button" class="btn-dark">Check in</button>
        </div>

        <div class="lookup-hint">Members with an expired or unpaid membership show a red edge and cannot be checked in until they pay.</div>
    </div>

    <div class="panel-right panel-narrow">
        <div class="section-heading">Quick Actions</div>

        <div class="actions-grid">
            <button type="button" class="action-tile">
                <span class="action-title">Check in member</span>
                <span class="action-desc">When QR scan fails</span>
            </button>
            <button type="button" class="action-tile">
                <span class="action-title">Register walk-in</span>
                <span class="action-desc">Create a new account</span>
            </button>
            <button type="button" class="action-tile">
                <span class="action-title">Issue day pass</span>
                <span class="action-desc">Single-day access</span>
            </button>
            <button type="button" class="action-tile">
                <span class="action-title">Record cash payment</span>
                <span class="action-desc">Membership, pass or PT</span>
            </button>
        </div>
    </div>
</div>


<!-- Today's check-ins -->
<div class="table-section">
    <div class="section-heading-row">
        <div class="section-heading">Today's Check-Ins</div>
        <a href="#" class="section-link">View all</a>
    </div>

    <div class="table-header-row">
        <div class="col-id">Member ID</div>
        <div class="col-name">Name</div>
        <div class="col-type">Membership</div>
        <div class="col-time">Time</div>
        <div class="col-method">Method</div>
    </div>

    <div class="table-body">
        <div class="table-row">
            <div class="col-id text-mono">M-0119</div>
            <div class="col-name text-bold">Kasun Wijesinghe</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">09:45 AM</div>
            <div class="col-method text-green">QR scan</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">D-0214</div>
            <div class="col-name text-bold">Sachini Herath</div>
            <div class="col-type text-muted">Day Pass</div>
            <div class="col-time text-muted">09:22 AM</div>
            <div class="col-method text-amber">Front desk</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0091</div>
            <div class="col-name text-bold">Tharindu Bandara</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">09:05 AM</div>
            <div class="col-method text-green">QR scan</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0078</div>
            <div class="col-name text-bold">Ishara Senanayake</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">08:51 AM</div>
            <div class="col-method text-amber">Front desk</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0034</div>
            <div class="col-name text-bold">Ruwan Dissanayake</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">08:30 AM</div>
            <div class="col-method text-green">QR scan</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0012</div>
            <div class="col-name text-bold">Hasini Rathnayake</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">08:14 AM</div>
            <div class="col-method text-green">QR scan</div>
        </div>
    </div>
</div>


<!-- Classes + floor duty -->
<div class="panels-row">
    <div class="panel-left">
        <div class="section-heading">Today's Classes</div>

        <div class="item-list">
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Power Yoga</div>
                    <div class="item-details">Dilini Jayasekara · Studio A</div>
                </div>
                <div class="item-side">
                    <div class="time-text">10:00 AM</div>
                    <div class="slots-text">8/12 slots</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Zumba</div>
                    <div class="item-details">Chamari Silva · Main Hall</div>
                </div>
                <div class="item-side">
                    <div class="time-text">11:30 AM</div>
                    <div class="slots-text">14/16 slots</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Core Blast</div>
                    <div class="item-details">Amal Fernando · Studio B</div>
                </div>
                <div class="item-side">
                    <div class="time-text">5:00 PM</div>
                    <div class="slots-text">5/10 slots</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Spin Cycle</div>
                    <div class="item-details">Nuwan Karunaratne · Cycle Room</div>
                </div>
                <div class="item-side">
                    <div class="time-text">6:30 PM</div>
                    <div class="slots-text text-red">10/10 slots</div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-right">
        <div class="section-heading">Instructors on Floor Duty</div>

        <div class="item-list">
            <div class="list-item">
                <div class="duty-name-row">
                    <span class="duty-dot" aria-hidden="true"></span>
                    <div class="item-info">
                        <div class="item-name">Amal Fernando</div>
                        <div class="item-details">Weights area</div>
                    </div>
                </div>
                <div class="item-side">
                    <div class="time-text">On duty until 12:00 PM</div>
                </div>
            </div>
            <div class="list-item">
                <div class="duty-name-row">
                    <span class="duty-dot" aria-hidden="true"></span>
                    <div class="item-info">
                        <div class="item-name">Chamari Silva</div>
                        <div class="item-details">Cardio area</div>
                    </div>
                </div>
                <div class="item-side">
                    <div class="time-text">On duty until 11:00 AM</div>
                </div>
            </div>
            <div class="list-item">
                <div class="duty-name-row">
                    <span class="duty-dot is-upcoming" aria-hidden="true"></span>
                    <div class="item-info">
                        <div class="item-name">Nuwan Karunaratne</div>
                        <div class="item-details">Weights area</div>
                    </div>
                </div>
                <div class="item-side">
                    <div class="time-text">Starts at 12:00 PM</div>
                </div>
            </div>
            <div class="list-item">
                <div class="duty-name-row">
                    <span class="duty-dot is-upcoming" aria-hidden="true"></span>
                    <div class="item-info">
                        <div class="item-name">Dilini Jayasekara</div>
                        <div class="item-details">Cardio area</div>
                    </div>
                </div>
                <div class="item-side">
                    <div class="time-text">Starts at 3:00 PM</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Pay at desk + expiring memberships -->
<div class="panels-row">
    <div class="panel-left">
        <div class="section-heading">Waiting to Pay at the Desk</div>

        <div class="item-list">
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Ruwan Dissanayake</div>
                    <div class="item-details">PT session with Amal Fernando · Today 4:00 PM</div>
                </div>
                <div class="item-side-row">
                    <div class="amount-text">LKR 2,500</div>
                    <button type="button" class="btn-dark">Record payment</button>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Sachini Herath</div>
                    <div class="item-details">Day pass · Booked online</div>
                </div>
                <div class="item-side-row">
                    <div class="amount-text">LKR 800</div>
                    <button type="button" class="btn-dark">Record payment</button>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Pasan Gunasekara</div>
                    <div class="item-details">Regular membership renewal · 1 month</div>
                </div>
                <div class="item-side-row">
                    <div class="amount-text">LKR 5,000</div>
                    <button type="button" class="btn-dark">Record payment</button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-right">
        <div class="section-heading-row">
            <div class="section-heading">Memberships Expiring This Week</div>
            <a href="#" class="section-link">View all</a>
        </div>

        <div class="item-list">
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Tharindu Bandara</div>
                    <div class="item-details">M-0091 · Regular</div>
                </div>
                <div class="item-side">
                    <div class="slots-text text-red">Expires today</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Hasini Rathnayake</div>
                    <div class="item-details">M-0012 · Regular</div>
                </div>
                <div class="item-side">
                    <div class="slots-text text-amber">Expires tomorrow</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Kavindu Abeysekara</div>
                    <div class="item-details">M-0067 · Regular</div>
                </div>
                <div class="item-side">
                    <div class="slots-text">2 Oct 2026</div>
                </div>
            </div>
            <div class="list-item">
                <div class="item-info">
                    <div class="item-name">Madhavi Wickramasinghe</div>
                    <div class="item-details">M-0103 · Regular</div>
                </div>
                <div class="item-side">
                    <div class="slots-text">3 Oct 2026</div>
                </div>
            </div>
        </div>
    </div>
</div>