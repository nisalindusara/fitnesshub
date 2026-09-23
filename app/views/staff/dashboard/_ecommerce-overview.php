<style>
    .ecom-metrics-container {
        display: flex;
        gap: 16px;
        margin-bottom: 24px;
    }

    .ecom-metric-box {
        flex: 1;
        padding: 24px;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .ecom-bg-light-blue {
        background-color: #e6f3ff;
    }

    .ecom-bg-light-gray {
        background-color: #eef2f6;
    }

    .ecom-metric-title {
        font-size: 13px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 12px;
    }

    .ecom-metric-data {
        font-size: 28px;
        font-weight: 700;
        color: #1a202c;
    }

    .ecom-table-section {
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        margin-bottom: 24px;
        box-sizing: border-box;
    }

    .ecom-section-heading {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 24px;
    }

    .ecom-table-head {
        display: flex;
        padding-bottom: 12px;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        color: #a0aec0;
        font-weight: 500;
    }

    .ecom-table-row {
        display: flex;
        padding: 16px 0;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
        align-items: center;
    }

    .ecom-table-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ecom-col-id {
        width: 15%;
    }

    .ecom-col-product {
        width: 35%;
    }

    .ecom-col-customer {
        width: 25%;
    }

    .ecom-col-amount {
        width: 15%;
    }

    .ecom-col-status {
        width: 10%;
    }

    .ecom-mono {
        font-family: monospace;
        font-size: 12px;
    }

    .ecom-text-bold {
        font-weight: 600;
        color: #2d3748;
    }

    .ecom-text-faded {
        color: #a0aec0;
    }

    .ecom-status-orange {
        color: #dd6b20;
        font-weight: 500;
    }

    .ecom-status-blue {
        color: #3182ce;
        font-weight: 500;
    }

    .ecom-status-green {
        color: #38a169;
        font-weight: 500;
    }

    .ecom-panels-container {
        display: flex;
        gap: 24px;
    }

    .ecom-panel-left,
    .ecom-panel-right {
        flex: 1;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        box-sizing: border-box;
    }

    .ecom-alerts-list {
        display: flex;
        flex-direction: column;
    }

    .ecom-alert-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14.5px 0;
        border-bottom: 1px dashed #e2e8f0;
    }

    .ecom-alert-row:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .ecom-alert-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .ecom-alert-title {
        font-size: 14px;
        font-weight: 600;
        color: #2d3748;
    }

    .ecom-alert-sku {
        font-size: 12px;
        color: #a0aec0;
    }

    .ecom-alert-action {
        text-align: right;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .ecom-alert-count {
        font-size: 14px;
        font-weight: 700;
        color: #e53e3e;
    }

    .ecom-alert-reorder {
        font-size: 12px;
        color: #a0aec0;
    }

    .ecom-chart-layout {
        display: flex;
        height: 220px;
        position: relative;
        box-sizing: border-box;
    }

    .ecom-chart-y-axis {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding-right: 16px;
        padding-bottom: 24px;
        color: #a0aec0;
        font-size: 11px;
        width: 50px;
        text-align: right;
        box-sizing: border-box;
    }

    .ecom-chart-graph-area {
        flex: 1;
        position: relative;
        height: calc(100% - 24px);
    }

    .ecom-chart-grids {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        z-index: 1;
    }

    .ecom-grid-horizontal {
        border-bottom: 1px dashed #e2e8f0;
        width: 100%;
        height: 1px;
    }

    .ecom-area-fill-green {
        position: absolute;
        inset: 0;
        background-color: #daebd7;
        clip-path: polygon(0% 37.5%, 20% 25%, 40% 25%, 60% 12.5%, 80% 20.8%, 100% 4%, 100% 100%, 0% 100%);
        z-index: 2;
        opacity: 0.6;
    }

    .ecom-area-fill-blue {
        position: absolute;
        inset: 0;
        background-color: #c9d5ff;
        clip-path: polygon(0% 50%, 20% 46%, 40% 42%, 60% 34%, 80% 37.5%, 100% 30%, 100% 100%, 0% 100%);
        z-index: 3;
        opacity: 0.8;
    }

    .ecom-chart-x-axis {
        position: absolute;
        bottom: -24px;
        left: 0;
        right: 0;
        display: flex;
        justify-content: space-between;
        color: #a0aec0;
        font-size: 11px;
        z-index: 4;
    }

    .ecom-x-tick {
        width: 30px;
        text-align: center;
    }
</style>

<div class="ecom-metrics-container">
    <div class="ecom-metric-box ecom-bg-light-blue">
        <div class="ecom-metric-title">Today's Revenue</div>
        <div class="ecom-metric-data">$4,218</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-gray">
        <div class="ecom-metric-title">Orders Today</div>
        <div class="ecom-metric-data">5</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-blue">
        <div class="ecom-metric-title">Avg Order Value</div>
        <div class="ecom-metric-data">$42.18</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-gray">
        <div class="ecom-metric-title">Low Stock Alerts</div>
        <div class="ecom-metric-data">4</div>
    </div>
</div>

<div class="ecom-table-section">
    <div class="ecom-section-heading">Today's Orders</div>

    <div class="ecom-table-head">
        <div class="ecom-col-id">Order ID</div>
        <div class="ecom-col-product">Product</div>
        <div class="ecom-col-customer">Customer</div>
        <div class="ecom-col-amount">Amount</div>
        <div class="ecom-col-status">Status</div>
    </div>

    <div class="ecom-table-body">
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4491</div>
            <div class="ecom-col-product ecom-text-bold">Whey Protein 2kg</div>
            <div class="ecom-col-customer ecom-text-faded">Jake Morrison</div>
            <div class="ecom-col-amount ecom-text-bold">$74.99</div>
            <div class="ecom-col-status ecom-status-orange">Processing</div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4492</div>
            <div class="ecom-col-product ecom-text-bold">Gym Gloves Pro</div>
            <div class="ecom-col-customer ecom-text-faded">Yuki Tanaka</div>
            <div class="ecom-col-amount ecom-text-bold">$29.99</div>
            <div class="ecom-col-status ecom-status-blue">Shipped</div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4493</div>
            <div class="ecom-col-product ecom-text-bold">Resistance Bands Set</div>
            <div class="ecom-col-customer ecom-text-faded">Sara Osei</div>
            <div class="ecom-col-amount ecom-text-bold">$44.99</div>
            <div class="ecom-col-status ecom-status-green">Delivered</div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4494</div>
            <div class="ecom-col-product ecom-text-bold">Creatine 500g</div>
            <div class="ecom-col-customer ecom-text-faded">Ben Larson</div>
            <div class="ecom-col-amount ecom-text-bold">$39.99</div>
            <div class="ecom-col-status ecom-status-orange">Processing</div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4495</div>
            <div class="ecom-col-product ecom-text-bold">Water Bottle Elite</div>
            <div class="ecom-col-customer ecom-text-faded">Mei Lin</div>
            <div class="ecom-col-amount ecom-text-bold">$19.99</div>
            <div class="ecom-col-status ecom-status-blue">Shipped</div>
        </div>
    </div>
</div>

<div class="ecom-panels-container">
    <div class="ecom-panel-left">
        <div class="ecom-section-heading">Low Stock Alerts</div>

        <div class="ecom-alerts-list">
            <div class="ecom-alert-row">
                <div class="ecom-alert-details">
                    <div class="ecom-alert-title">Whey Protein 2kg</div>
                    <div class="ecom-alert-sku">WP-2KG-VNL</div>
                </div>
                <div class="ecom-alert-action">
                    <div class="ecom-alert-count">3 left</div>
                    <div class="ecom-alert-reorder">reorder at 10</div>
                </div>
            </div>

            <div class="ecom-alert-row">
                <div class="ecom-alert-details">
                    <div class="ecom-alert-title">Pre-Workout Powder</div>
                    <div class="ecom-alert-sku">PW-400G-OG</div>
                </div>
                <div class="ecom-alert-action">
                    <div class="ecom-alert-count">2 left</div>
                    <div class="ecom-alert-reorder">reorder at 8</div>
                </div>
            </div>

            <div class="ecom-alert-row">
                <div class="ecom-alert-details">
                    <div class="ecom-alert-title">Gym Towel Set</div>
                    <div class="ecom-alert-sku">GT-SET-BLK</div>
                </div>
                <div class="ecom-alert-action">
                    <div class="ecom-alert-count">5 left</div>
                    <div class="ecom-alert-reorder">reorder at 20</div>
                </div>
            </div>

            <div class="ecom-alert-row">
                <div class="ecom-alert-details">
                    <div class="ecom-alert-title">Foam Roller Pro</div>
                    <div class="ecom-alert-sku">FR-PRO-60</div>
                </div>
                <div class="ecom-alert-action">
                    <div class="ecom-alert-count">1 left</div>
                    <div class="ecom-alert-reorder">reorder at 6</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ecom-panel-right">
        <div class="ecom-section-heading">Revenue Report (6 months)</div>

        <div class="ecom-chart-layout">
            <div class="ecom-chart-y-axis">
                <div class="ecom-y-tick">24000</div>
                <div class="ecom-y-tick">18000</div>
                <div class="ecom-y-tick">12000</div>
                <div class="ecom-y-tick">6000</div>
                <div class="ecom-y-tick">0</div>
            </div>

            <div class="ecom-chart-graph-area">
                <div class="ecom-chart-grids">
                    <div class="ecom-grid-horizontal"></div>
                    <div class="ecom-grid-horizontal"></div>
                    <div class="ecom-grid-horizontal"></div>
                    <div class="ecom-grid-horizontal"></div>
                    <div class="ecom-grid-horizontal"></div>
                </div>

                <div class="ecom-area-fill-green"></div>
                <div class="ecom-area-fill-blue"></div>

                <div class="ecom-chart-x-axis">
                    <div class="ecom-x-tick">Apr</div>
                    <div class="ecom-x-tick">May</div>
                    <div class="ecom-x-tick">Jun</div>
                    <div class="ecom-x-tick">Jul</div>
                    <div class="ecom-x-tick">Aug</div>
                    <div class="ecom-x-tick">Sep</div>
                </div>
            </div>
        </div>
    </div>
</div>