<style>
    .kpi-row {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .kpi-card {
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

    .kpi-title {
        font-size: 13px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }

    .kpi-value {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
    }

    .chart-section {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
    }

    .section-title {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 24px;
    }

    .chart-wrapper {
        position: relative;
        height: 200px;
        display: flex;
        padding-left: 32px;
        padding-bottom: 24px;
        box-sizing: border-box;
    }

    .y-axis {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 24px;
        font-size: 12px;
        color: #a0aec0;
    }

    .grid-lines {
        position: absolute;
        left: 32px;
        right: 0;
        top: 6px;
        bottom: 24px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .grid-line {
        border-bottom: 1px dashed #e2e8f0;
        width: 100%;
        height: 1px;
    }

    .bars-container {
        display: flex;
        justify-content: space-around;
        align-items: flex-end;
        width: 100%;
        height: 100%;
        position: relative;
        z-index: 1;
    }

    .bar-month {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        position: relative;
        width: 60px;
    }

    .bar-group {
        display: flex;
        align-items: flex-end;
        gap: 0;
        height: 100%;
        width: 100%;
    }

    .bar {
        flex: 1;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }

    .bar-joined {
        background-color: #90a4ff;
    }

    .bar-left {
        background-color: #e6e9f0;
    }

    .h-25 {
        height: 25%;
    }

    .h-30 {
        height: 30%;
    }

    .h-35 {
        height: 35%;
    }

    .h-50 {
        height: 50%;
    }

    .h-60 {
        height: 60%;
    }

    .h-70 {
        height: 70%;
    }

    .h-75 {
        height: 75%;
    }

    .h-80 {
        height: 80%;
    }

    .h-90 {
        height: 90%;
    }

    .x-label {
        position: absolute;
        bottom: -24px;
        font-size: 12px;
        color: #a0aec0;
    }

    .chart-legend {
        display: flex;
        justify-content: center;
        gap: 16px;
        margin-top: 16px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 2px;
    }

    .bg-joined {
        background-color: #90a4ff;
    }

    .bg-left {
        background-color: #e6e9f0;
    }

    .legend-text {
        font-size: 12px;
        color: #a0aec0;
    }

    .bottom-row {
        display: flex;
        gap: 24px;
    }

    .at-risk-section,
    .distribution-section {
        flex: 1;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        box-sizing: border-box;
    }

    .risk-summary-boxes {
        display: flex;
        gap: 12px;
        margin-bottom: 24px;
    }

    .risk-box {
        flex: 1;
        padding: 16px;
        border-radius: 8px;
        text-align: center;
        box-sizing: border-box;
    }

    .box-critical {
        background-color: #fff0f0;
    }

    .box-high {
        background-color: #fffaf0;
    }

    .box-medium {
        background-color: #fffff0;
    }

    .risk-number {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 4px;
    }

    .risk-label {
        font-size: 12px;
    }

    .text-critical {
        color: #f56565;
    }

    .text-high {
        color: #ed8936;
    }

    .text-medium {
        color: #ecc94b;
    }

    .risk-list {
        display: flex;
        flex-direction: column;
    }

    .risk-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .risk-list-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .risk-member-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .risk-member-name {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
    }

    .risk-member-detail {
        font-size: 12px;
        color: #a0aec0;
    }

    .risk-status {
        font-size: 12px;
        font-weight: 700;
    }

    .donut-content {
        display: flex;
        align-items: center;
        gap: 32px;
        margin-top: 16px;
    }

    .donut-chart-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
    }

    .donut-chart {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: conic-gradient(#1a202c 0% 38.6%,
                #bbf7d0 38.6% 61.1%,
                #90a4ff 61.1% 91.9%,
                #93c5fd 91.9% 100%);
    }

    .donut-hole {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90px;
        height: 90px;
        background-color: #f7f9fc;
        border-radius: 50%;
    }

    .donut-legend-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        flex: 1;
    }

    .d-legend-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #4a5568;
    }

    .d-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    .d-regular {
        background-color: #1a202c;
    }

    .d-zumba {
        background-color: #bbf7d0;
    }

    .d-yoga {
        background-color: #90a4ff;
    }

    .d-daypass {
        background-color: #93c5fd;
    }

    .d-label {
        flex: 1;
    }

    .d-value {
        font-weight: 700;
        color: #2d3748;
    }
</style>



<div class="kpi-row">
    <div class="kpi-card bg-light-blue">
        <div class="kpi-title">Net New Members</div>
        <div class="kpi-value">+49</div>
    </div>
    <div class="kpi-card bg-light-gray">
        <div class="kpi-title">Churned Members</div>
        <div class="kpi-value">22</div>
    </div>
    <div class="kpi-card bg-light-blue">
        <div class="kpi-title">Retention Rate</div>
        <div class="kpi-value">94.2%</div>
    </div>
    <div class="kpi-card bg-light-gray">
        <div class="kpi-title">At-Risk Members</div>
        <div class="kpi-value">5</div>
    </div>
</div>

<div class="chart-section">
    <div class="section-title">Member Turnover Analytics (6 months)</div>
    <div class="chart-wrapper">
        <div class="y-axis">
            <div class="y-label">80</div>
            <div class="y-label">60</div>
            <div class="y-label">40</div>
            <div class="y-label">20</div>
            <div class="y-label">0</div>
        </div>
        <div class="grid-lines">
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
            <div class="grid-line"></div>
        </div>
        <div class="bars-container">
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-50"></div>
                    <div class="bar bar-left h-25"></div>
                </div>
                <div class="x-label">Apr</div>
            </div>
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-70"></div>
                    <div class="bar bar-left h-30"></div>
                </div>
                <div class="x-label">May</div>
            </div>
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-60"></div>
                    <div class="bar bar-left h-35"></div>
                </div>
                <div class="x-label">Jun</div>
            </div>
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-80"></div>
                    <div class="bar bar-left h-25"></div>
                </div>
                <div class="x-label">Jul</div>
            </div>
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-75"></div>
                    <div class="bar bar-left h-35"></div>
                </div>
                <div class="x-label">Aug</div>
            </div>
            <div class="bar-month">
                <div class="bar-group">
                    <div class="bar bar-joined h-90"></div>
                    <div class="bar bar-left h-25"></div>
                </div>
                <div class="x-label">Sep</div>
            </div>
        </div>
    </div>
    <div class="chart-legend">
        <div class="legend-item">
            <div class="legend-color bg-joined"></div>
            <span class="legend-text">Joined</span>
        </div>
        <div class="legend-item">
            <div class="legend-color bg-left"></div>
            <span class="legend-text">Left</span>
        </div>
    </div>
</div>

<div class="bottom-row">
    <div class="at-risk-section">
        <div class="section-title">At-Risk Members</div>

        <div class="risk-summary-boxes">
            <div class="risk-box box-critical">
                <div class="risk-number text-critical">1</div>
                <div class="risk-label text-critical">Critical</div>
            </div>
            <div class="risk-box box-high">
                <div class="risk-number text-high">2</div>
                <div class="risk-label text-high">High Risk</div>
            </div>
            <div class="risk-box box-medium">
                <div class="risk-number text-medium">2</div>
                <div class="risk-label text-medium">Medium</div>
            </div>
        </div>

        <div class="risk-list">
            <div class="risk-list-item">
                <div class="risk-member-info">
                    <div class="risk-member-name">David Park</div>
                    <div class="risk-member-detail">Last visit: 18 Sep 2026 - 5d inactive</div>
                </div>
                <div class="risk-status text-medium">Medium</div>
            </div>
            <div class="risk-list-item">
                <div class="risk-member-info">
                    <div class="risk-member-name">Carla Ruiz</div>
                    <div class="risk-member-detail">Last visit: 10 Sep 2026 - 13d inactive</div>
                </div>
                <div class="risk-status text-high">High</div>
            </div>
            <div class="risk-list-item">
                <div class="risk-member-info">
                    <div class="risk-member-name">John Mercer</div>
                    <div class="risk-member-detail">Last visit: 5 Sep 2026 - 18d inactive</div>
                </div>
                <div class="risk-status text-high">High</div>
            </div>
            <div class="risk-list-item">
                <div class="risk-member-info">
                    <div class="risk-member-name">Aisha Kamara</div>
                    <div class="risk-member-detail">Last visit: 15 Sep 2026 - 8d inactive</div>
                </div>
                <div class="risk-status text-medium">Medium</div>
            </div>
            <div class="risk-list-item">
                <div class="risk-member-info">
                    <div class="risk-member-name">Ryan Walsh</div>
                    <div class="risk-member-detail">Last visit: 1 Sep 2026 - 22d inactive</div>
                </div>
                <div class="risk-status text-critical">Critical</div>
            </div>
        </div>
    </div>

    <div class="distribution-section">
        <div class="section-title">Membership Distribution</div>
        <div class="donut-content">
            <div class="donut-chart-wrapper">
                <div class="donut-chart"></div>
                <div class="donut-hole"></div>
            </div>
            <div class="donut-legend-list">
                <div class="d-legend-row">
                    <div class="d-indicator d-regular"></div>
                    <div class="d-label">Regular Users</div>
                    <div class="d-value">38.6%</div>
                </div>
                <div class="d-legend-row">
                    <div class="d-indicator d-zumba"></div>
                    <div class="d-label">Zumba Class Users</div>
                    <div class="d-value">22.5%</div>
                </div>
                <div class="d-legend-row">
                    <div class="d-indicator d-yoga"></div>
                    <div class="d-label">Yoga Class Users</div>
                    <div class="d-value">30.8%</div>
                </div>
                <div class="d-legend-row">
                    <div class="d-indicator d-daypass"></div>
                    <div class="d-label">Day Pass Users</div>
                    <div class="d-value">8.1%</div>
                </div>
            </div>
        </div>
    </div>
</div>