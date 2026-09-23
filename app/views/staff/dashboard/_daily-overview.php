<style>
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
        width: 20%;
    }

    .col-status {
        width: 15%;
    }

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

    .panels-row {
        display: flex;
        gap: 24px;
    }

    .panel-left,
    .panel-right {
        flex: 1;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        box-sizing: border-box;
    }

    .class-list,
    .verification-list {
        display: flex;
        flex-direction: column;
    }

    .class-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .class-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .class-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .class-name {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .class-details {
        font-size: 12px;
        color: #a0aec0;
    }

    .class-timing {
        text-align: right;
        display: flex;
        flex-direction: column;
        gap: 4px;
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

    .text-red {
        color: #f56565;
    }

    .verification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .verification-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .v-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .v-name {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .v-details {
        font-size: 12px;
        color: #a0aec0;
    }

    .v-action {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .v-amount {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
    }

    .btn-verify {
        background-color: #1a202c;
        color: #ffffff;
        font-size: 12px;
        font-weight: 500;
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
    }
</style>


<div class="metrics-row">
    <div class="metric-card bg-light-blue">
        <div class="metric-label">New Check-Ins</div>
        <div class="metric-value">61</div>
    </div>
    <div class="metric-card bg-light-gray">
        <div class="metric-label">Classes Today</div>
        <div class="metric-value">8</div>
    </div>
    <div class="metric-card bg-light-blue">
        <div class="metric-label">Pending Slips</div>
        <div class="metric-value">3</div>
    </div>
    <div class="metric-card bg-light-gray">
        <div class="metric-label">Day Pass Sales</div>
        <div class="metric-value">14</div>
    </div>
</div>

<div class="table-section">
    <div class="section-heading">Today's Member Check-Ins</div>

    <div class="table-header-row">
        <div class="col-id">Member ID</div>
        <div class="col-name">Name</div>
        <div class="col-type">Type</div>
        <div class="col-time">Time</div>
        <div class="col-status">Status</div>
    </div>

    <div class="table-body">
        <div class="table-row">
            <div class="col-id text-mono">M-0012</div>
            <div class="col-name text-bold">Sarah Mitchell</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">08:14 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0034</div>
            <div class="col-name text-bold">James Torres</div>
            <div class="col-type text-muted">Yoga Class</div>
            <div class="col-time text-muted">08:30 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0078</div>
            <div class="col-name text-bold">Priya Nair</div>
            <div class="col-type text-muted">Day Pass</div>
            <div class="col-time text-muted">08:51 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0091</div>
            <div class="col-name text-bold">Lucas Ferreira</div>
            <div class="col-type text-muted">Zumba Class</div>
            <div class="col-time text-muted">09:05 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0105</div>
            <div class="col-name text-bold">Emily Zhao</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">09:22 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
        <div class="table-row">
            <div class="col-id text-mono">M-0119</div>
            <div class="col-name text-bold">Omar Hassan</div>
            <div class="col-type text-muted">Regular</div>
            <div class="col-time text-muted">09:45 AM</div>
            <div class="col-status text-green">Checked In</div>
        </div>
    </div>
</div>

<div class="panels-row">
    <div class="panel-left">
        <div class="section-heading">Upcoming Classes</div>

        <div class="class-list">
            <div class="class-item">
                <div class="class-info">
                    <div class="class-name">Power Yoga</div>
                    <div class="class-details">Dana Lee · Studio A</div>
                </div>
                <div class="class-timing">
                    <div class="time-text">10:00 AM</div>
                    <div class="slots-text">8/12 slots</div>
                </div>
            </div>

            <div class="class-item">
                <div class="class-info">
                    <div class="class-name">Zumba Fusion</div>
                    <div class="class-details">Marco Rivera · Main Hall</div>
                </div>
                <div class="class-timing">
                    <div class="time-text">11:30 AM</div>
                    <div class="slots-text">14/16 slots</div>
                </div>
            </div>

            <div class="class-item">
                <div class="class-info">
                    <div class="class-name">Core Blast</div>
                    <div class="class-details">Nina Patel · Studio B</div>
                </div>
                <div class="class-timing">
                    <div class="time-text">1:00 PM</div>
                    <div class="slots-text">5/10 slots</div>
                </div>
            </div>

            <div class="class-item">
                <div class="class-info">
                    <div class="class-name">Spin Cycle</div>
                    <div class="class-details">Tom Blake · Cycle Room</div>
                </div>
                <div class="class-timing">
                    <div class="time-text">3:00 PM</div>
                    <div class="slots-text text-red">10/10 slots</div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-right">
        <div class="section-heading">Pending Bank Slip Verifications</div>

        <div class="verification-list">
            <div class="verification-item">
                <div class="v-info">
                    <div class="v-name">Rachel Green</div>
                    <div class="v-details">BS-7721 · Monthly · 23 Sep 2026</div>
                </div>
                <div class="v-action">
                    <div class="v-amount">$89.00</div>
                    <div class="btn-verify">Verify</div>
                </div>
            </div>

            <div class="verification-item">
                <div class="v-info">
                    <div class="v-name">David Park</div>
                    <div class="v-details">BS-7722 · Quarterly · 23 Sep 2026</div>
                </div>
                <div class="v-action">
                    <div class="v-amount">$249.00</div>
                    <div class="btn-verify">Verify</div>
                </div>
            </div>

            <div class="verification-item">
                <div class="v-info">
                    <div class="v-name">Fatima Al-Rashid</div>
                    <div class="v-details">BS-7723 · Monthly · 22 Sep 2026</div>
                </div>
                <div class="v-action">
                    <div class="v-amount">$89.00</div>
                    <div class="btn-verify">Verify</div>
                </div>
            </div>
        </div>
    </div>
</div>