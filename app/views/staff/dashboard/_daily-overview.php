<?php $pageStyles[] = 'staff/staff/dashboard/_daily-overview'; ?>


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
        <a href="/portal/attendance" class="section-link">View all</a>
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
            <a href="/portal/members" class="section-link">View all</a>
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