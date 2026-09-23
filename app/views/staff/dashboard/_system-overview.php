<style>
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

    .sys-chart-panel,
    .sys-table-panel {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
    }

    .sys-panel-heading {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 32px;
    }

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
        top: 0;
        bottom: 30px;
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
        top: 7px;
        bottom: 30px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1;
    }

    .sys-grid-line {
        border-bottom: 1px dashed #e2e8f0;
        width: 100%;
        height: 1px;
    }

    .sys-grid-line-solid {
        border-bottom: 1px solid #e2e8f0;
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

    /* Approximate heights based on visual inspection of 0-160 scale */
    .sys-h-53 {
        height: 53%;
    }

    /* ~85 */
    .sys-h-62 {
        height: 62.5%;
    }

    /* ~100 */
    .sys-h-56 {
        height: 56%;
    }

    /* ~90 */
    .sys-h-73 {
        height: 73.7%;
    }

    /* ~118 */
    .sys-h-81 {
        height: 81.2%;
    }

    /* ~130 */
    .sys-h-100 {
        height: 100%;
    }

    /* 160 */
    .sys-h-43 {
        height: 43.7%;
    }

    /* ~70 */

    .sys-x-label {
        position: absolute;
        bottom: -28px;
        font-size: 12px;
        color: #a0aec0;
    }

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
        width: 25%;
    }

    .sys-col-spec {
        width: 30%;
    }

    .sys-col-classes {
        width: 20%;
    }

    .sys-col-rating {
        width: 15%;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .sys-col-status {
        width: 10%;
    }

    .sys-text-dark {
        color: #2d3748;
    }

    .sys-text-muted {
        color: #a0aec0;
    }

    .sys-text-medium {
        font-weight: 500;
    }

    .sys-text-green {
        color: #38a169;
        font-weight: 500;
        font-size: 12px;
    }

    .sys-star {
        font-size: 11px;
    }
</style>

<div class="sys-metrics-row">
    <div class="sys-metric-card sys-bg-blue">
        <div class="sys-metric-label">Total Members</div>
        <div class="sys-metric-val">1247</div>
    </div>
    <div class="sys-metric-card sys-bg-gray">
        <div class="sys-metric-label">Active Instructors</div>
        <div class="sys-metric-val">5</div>
    </div>
    <div class="sys-metric-card sys-bg-blue">
        <div class="sys-metric-label">Weekly Attendance</div>
        <div class="sys-metric-val">762</div>
    </div>
    <div class="sys-metric-card sys-bg-gray">
        <div class="sys-metric-label">Avg Daily Visits</div>
        <div class="sys-metric-val">109</div>
    </div>
</div>

<div class="sys-chart-panel">
    <div class="sys-panel-heading">Attendance Trends</div>

    <div class="sys-bar-chart-container">
        <div class="sys-y-axis">
            <div class="sys-y-label">160</div>
            <div class="sys-y-label">120</div>
            <div class="sys-y-label">80</div>
            <div class="sys-y-label">40</div>
            <div class="sys-y-label">0</div>
        </div>

        <div class="sys-chart-grid">
            <div class="sys-grid-line"></div>
            <div class="sys-grid-line"></div>
            <div class="sys-grid-line"></div>
            <div class="sys-grid-line"></div>
            <div class="sys-grid-line sys-grid-line-solid"></div>
        </div>

        <div class="sys-bars-wrapper">
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-53"></div>
                <div class="sys-x-label">Mon</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-62"></div>
                <div class="sys-x-label">Tue</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-56"></div>
                <div class="sys-x-label">Wed</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-73"></div>
                <div class="sys-x-label">Thu</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-81"></div>
                <div class="sys-x-label">Fri</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-100"></div>
                <div class="sys-x-label">Sat</div>
            </div>
            <div class="sys-bar-column">
                <div class="sys-bar-fill sys-h-43"></div>
                <div class="sys-x-label">Sun</div>
            </div>
        </div>
    </div>
</div>

<div class="sys-table-panel">
    <div class="sys-panel-heading">Active Instructors</div>

    <div class="sys-table-head">
        <div class="sys-col-name">Name</div>
        <div class="sys-col-spec">Specialty</div>
        <div class="sys-col-classes">Classes Today</div>
        <div class="sys-col-rating">Rating</div>
        <div class="sys-col-status">Status</div>
    </div>

    <div class="sys-table-body">
        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Dana Lee</div>
            <div class="sys-col-spec sys-text-muted">Yoga / Pilates</div>
            <div class="sys-col-classes sys-text-dark">4</div>
            <div class="sys-col-rating sys-text-dark"><span class="sys-star">⭐</span> 4.9</div>
            <div class="sys-col-status sys-text-green">Active</div>
        </div>

        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Marco Rivera</div>
            <div class="sys-col-spec sys-text-muted">Zumba / Dance</div>
            <div class="sys-col-classes sys-text-dark">3</div>
            <div class="sys-col-rating sys-text-dark"><span class="sys-star">⭐</span> 4.8</div>
            <div class="sys-col-status sys-text-green">Active</div>
        </div>

        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Nina Patel</div>
            <div class="sys-col-spec sys-text-muted">Core / HIIT</div>
            <div class="sys-col-classes sys-text-dark">5</div>
            <div class="sys-col-rating sys-text-dark"><span class="sys-star">⭐</span> 4.7</div>
            <div class="sys-col-status sys-text-green">Active</div>
        </div>

        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Tom Blake</div>
            <div class="sys-col-spec sys-text-muted">Cycling / Cardio</div>
            <div class="sys-col-classes sys-text-dark">3</div>
            <div class="sys-col-rating sys-text-dark"><span class="sys-star">⭐</span> 4.6</div>
            <div class="sys-col-status sys-text-green">Active</div>
        </div>

        <div class="sys-table-row">
            <div class="sys-col-name sys-text-dark sys-text-medium">Anya Smith</div>
            <div class="sys-col-spec sys-text-muted">Strength / CrossFit</div>
            <div class="sys-col-classes sys-text-dark">2</div>
            <div class="sys-col-rating sys-text-dark"><span class="sys-star">⭐</span> 4.9</div>
            <div class="sys-col-status sys-text-green">Active</div>
        </div>
    </div>
</div>