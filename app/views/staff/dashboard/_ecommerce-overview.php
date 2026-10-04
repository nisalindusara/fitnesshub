<?php $pageStyles[] = 'staff/staff/dashboard/_ecommerce-overview'; ?>


<!-- Store at a glance -->
<div class="ecom-metrics-container">
    <div class="ecom-metric-box ecom-bg-light-blue">
        <div class="ecom-metric-title">Orders Today</div>
        <div class="ecom-metric-data">12</div>
        <div class="ecom-metric-sub">LKR 46,300 in sales</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-gray">
        <div class="ecom-metric-title">Revenue This Month</div>
        <div class="ecom-metric-data">LKR 598,000</div>
        <div class="ecom-metric-sub">12% more than August</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-blue">
        <div class="ecom-metric-title">Awaiting Dispatch</div>
        <div class="ecom-metric-data">5</div>
        <div class="ecom-metric-sub">2 paid over 24 hours ago</div>
    </div>
    <div class="ecom-metric-box ecom-bg-light-gray">
        <div class="ecom-metric-title">Low Stock</div>
        <div class="ecom-metric-data">4</div>
        <div class="ecom-metric-sub">1 product out of stock</div>
    </div>
</div>


<!-- Order pipeline -->
<div class="ecom-table-section">
    <div class="ecom-heading-row">
        <div class="ecom-section-heading">Order Pipeline</div>
        <div class="ecom-heading-actions">
            <button type="button" class="ecom-btn ecom-btn-outline" onclick="window.location.href='/portal/categories'">Add category</button>
            <button type="button" class="ecom-btn" onclick="window.location.href='/portal/products/create'">Add product</button>
        </div>
    </div>

    <div class="ecom-pipeline">
        <a href="/portal/orders" class="ecom-stage">
            <span class="ecom-stage-name">Pending</span>
            <span class="ecom-stage-count ecom-count-pending">3</span>
            <span class="ecom-stage-hint">Waiting for payment</span>
        </a>
        <div class="ecom-stage-link" aria-hidden="true">
            <div class="ecom-stage-link-line"></div>
        </div>
        <a href="/portal/orders" class="ecom-stage">
            <span class="ecom-stage-name">Confirmed</span>
            <span class="ecom-stage-count ecom-count-confirmed">5</span>
            <span class="ecom-stage-hint">Paid, ready to dispatch</span>
        </a>
        <div class="ecom-stage-link" aria-hidden="true">
            <div class="ecom-stage-link-line"></div>
        </div>
        <a href="/portal/orders" class="ecom-stage">
            <span class="ecom-stage-name">Dispatched</span>
            <span class="ecom-stage-count ecom-count-dispatched">8</span>
            <span class="ecom-stage-hint">With the courier</span>
        </a>
        <div class="ecom-stage-link" aria-hidden="true">
            <div class="ecom-stage-link-line"></div>
        </div>
        <a href="/portal/orders" class="ecom-stage">
            <span class="ecom-stage-name">Completed</span>
            <span class="ecom-stage-count ecom-count-completed">142</span>
            <span class="ecom-stage-hint">This month</span>
        </a>
    </div>
</div>


<!-- Orders awaiting dispatch -->
<div class="ecom-table-section">
    <div class="ecom-heading-row">
        <div class="ecom-section-heading">Ready to Dispatch</div>
        <a href="/portal/orders" class="ecom-link">View all orders</a>
    </div>

    <div class="ecom-table-head">
        <div class="ecom-col-id">Order ID</div>
        <div class="ecom-col-product">Items</div>
        <div class="ecom-col-customer">Customer</div>
        <div class="ecom-col-paid">Paid</div>
        <div class="ecom-col-amount">Amount</div>
        <div class="ecom-col-action"></div>
    </div>

    <div class="ecom-table-body">
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4486</div>
            <div class="ecom-col-product ecom-text-bold">Whey Protein 2kg <span class="ecom-item-extra">+ 1 more</span></div>
            <div class="ecom-col-customer ecom-text-muted">Kasun Wijesinghe</div>
            <div class="ecom-col-paid ecom-text-red">Yesterday</div>
            <div class="ecom-col-amount ecom-text-bold">LKR 21,400</div>
            <div class="ecom-col-action"><button type="button" class="ecom-btn">Add tracking</button></div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4488</div>
            <div class="ecom-col-product ecom-text-bold">Resistance Bands Set</div>
            <div class="ecom-col-customer ecom-text-muted">Nimali Perera</div>
            <div class="ecom-col-paid ecom-text-red">Yesterday</div>
            <div class="ecom-col-amount ecom-text-bold">LKR 4,800</div>
            <div class="ecom-col-action"><button type="button" class="ecom-btn">Add tracking</button></div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4491</div>
            <div class="ecom-col-product ecom-text-bold">Creatine 500g</div>
            <div class="ecom-col-customer ecom-text-muted">Tharindu Bandara</div>
            <div class="ecom-col-paid ecom-text-muted">08:40 AM</div>
            <div class="ecom-col-amount ecom-text-bold">LKR 7,900</div>
            <div class="ecom-col-action"><button type="button" class="ecom-btn">Add tracking</button></div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4493</div>
            <div class="ecom-col-product ecom-text-bold">Gym Gloves Pro <span class="ecom-item-extra">+ 2 more</span></div>
            <div class="ecom-col-customer ecom-text-muted">Sachini Herath</div>
            <div class="ecom-col-paid ecom-text-muted">10:15 AM</div>
            <div class="ecom-col-amount ecom-text-bold">LKR 6,350</div>
            <div class="ecom-col-action"><button type="button" class="ecom-btn">Add tracking</button></div>
        </div>
        <div class="ecom-table-row">
            <div class="ecom-col-id ecom-text-faded ecom-mono">ORD-4495</div>
            <div class="ecom-col-product ecom-text-bold">Shaker Bottle 700ml</div>
            <div class="ecom-col-customer ecom-text-muted">Ruwan Dissanayake</div>
            <div class="ecom-col-paid ecom-text-muted">11:02 AM</div>
            <div class="ecom-col-amount ecom-text-bold">LKR 1,950</div>
            <div class="ecom-col-action"><button type="button" class="ecom-btn">Add tracking</button></div>
        </div>
    </div>
</div>


<!-- Returns + stock -->
<div class="ecom-panels-container">
    <div class="ecom-panel-left">
        <div class="ecom-heading-row">
            <div class="ecom-section-heading">Returns and Cancellations</div>
            <span class="ecom-heading-note">3 waiting</span>
        </div>

        <div class="ecom-list">
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Hasini Rathnayake</div>
                    <div class="ecom-list-sub">ORD-4462 · Return · Pre-Workout Powder</div>
                    <div class="ecom-list-reason">Seal was broken on arrival</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-amount">LKR 8,500</div>
                    <div class="ecom-btn-group">
                        <button type="button" class="ecom-btn ecom-btn-outline">Reject</button>
                        <button type="button" class="ecom-btn">Approve</button>
                    </div>
                </div>
            </div>
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Ishara Senanayake</div>
                    <div class="ecom-list-sub">ORD-4479 · Return · Gym T-Shirt (M)</div>
                    <div class="ecom-list-reason">Wrong size delivered</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-amount">LKR 2,900</div>
                    <div class="ecom-btn-group">
                        <button type="button" class="ecom-btn ecom-btn-outline">Reject</button>
                        <button type="button" class="ecom-btn">Approve</button>
                    </div>
                </div>
            </div>
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Pasan Gunasekara</div>
                    <div class="ecom-list-sub">ORD-4490 · Cancellation · Foam Roller</div>
                    <div class="ecom-list-reason">Ordered by mistake</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-amount">LKR 3,600</div>
                    <div class="ecom-btn-group">
                        <button type="button" class="ecom-btn ecom-btn-outline">Reject</button>
                        <button type="button" class="ecom-btn">Approve</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ecom-panel-right">
        <div class="ecom-heading-row">
            <div class="ecom-section-heading">Running Low on Stock</div>
            <a href="/portal/products" class="ecom-link">Inventory</a>
        </div>

        <div class="ecom-list">
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Foam Roller Pro</div>
                    <div class="ecom-list-sub">FR-PRO-60</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-stock-figures">
                        <div class="ecom-stock-count ecom-text-red">Out of stock</div>
                        <div class="ecom-stock-reorder">Reorder at 6</div>
                    </div>
                    <button type="button" class="ecom-btn">Restock</button>
                </div>
            </div>
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Pre-Workout Powder</div>
                    <div class="ecom-list-sub">PW-400G-OG</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-stock-figures">
                        <div class="ecom-stock-count ecom-text-amber">2 left</div>
                        <div class="ecom-stock-reorder">Reorder at 8</div>
                    </div>
                    <button type="button" class="ecom-btn">Restock</button>
                </div>
            </div>
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Whey Protein 2kg</div>
                    <div class="ecom-list-sub">WP-2KG-VNL</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-stock-figures">
                        <div class="ecom-stock-count ecom-text-amber">3 left</div>
                        <div class="ecom-stock-reorder">Reorder at 10</div>
                    </div>
                    <button type="button" class="ecom-btn">Restock</button>
                </div>
            </div>
            <div class="ecom-list-row">
                <div class="ecom-list-info">
                    <div class="ecom-list-title">Gym Towel Set</div>
                    <div class="ecom-list-sub">GT-SET-BLK</div>
                </div>
                <div class="ecom-list-side">
                    <div class="ecom-stock-figures">
                        <div class="ecom-stock-count ecom-text-amber">5 left</div>
                        <div class="ecom-stock-reorder">Reorder at 20</div>
                    </div>
                    <button type="button" class="ecom-btn">Restock</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Sales + top products -->
<div class="ecom-panels-container">
    <div class="ecom-panel-left ecom-panel-wide">
        <div class="ecom-heading-row">
            <div class="ecom-section-heading">Sales, Last 30 Days</div>
            <span class="ecom-heading-note">LKR 639,000 total</span>
        </div>

        <div class="ecom-chart-layout">
            <div class="ecom-chart-y-axis" aria-hidden="true">
                <div>40k</div>
                <div>30k</div>
                <div>20k</div>
                <div>10k</div>
                <div>0</div>
            </div>

            <div class="ecom-chart-graph-area">
                <svg class="ecom-chart-svg" viewBox="0 0 600 200" preserveAspectRatio="none" role="img" aria-label="Daily store sales over the last 30 days, rising from about LKR 12,000 to LKR 35,000 per day">
                    <line class="ecom-chart-grid" x1="0" y1="0" x2="600" y2="0" vector-effect="non-scaling-stroke" />
                    <line class="ecom-chart-grid" x1="0" y1="50" x2="600" y2="50" vector-effect="non-scaling-stroke" />
                    <line class="ecom-chart-grid" x1="0" y1="100" x2="600" y2="100" vector-effect="non-scaling-stroke" />
                    <line class="ecom-chart-grid" x1="0" y1="150" x2="600" y2="150" vector-effect="non-scaling-stroke" />
                    <line class="ecom-chart-grid" x1="0" y1="200" x2="600" y2="200" vector-effect="non-scaling-stroke" />

                    <polygon class="ecom-chart-area" points="0.0,140.0 20.7,125.0 41.4,155.0 62.1,110.0 82.8,90.0 103.4,130.0 124.1,145.0 144.8,120.0 165.5,100.0 186.2,75.0 206.9,105.0 227.6,135.0 248.3,115.0 269.0,95.0 289.7,60.0 310.3,80.0 331.0,125.0 351.7,110.0 372.4,90.0 393.1,70.0 413.8,50.0 434.5,85.0 455.2,105.0 475.9,75.0 496.6,55.0 517.2,35.0 537.9,65.0 558.6,90.0 579.3,45.0 600.0,25.0 600,200 0,200" />

                    <polyline class="ecom-chart-line" vector-effect="non-scaling-stroke" points="0.0,140.0 20.7,125.0 41.4,155.0 62.1,110.0 82.8,90.0 103.4,130.0 124.1,145.0 144.8,120.0 165.5,100.0 186.2,75.0 206.9,105.0 227.6,135.0 248.3,115.0 269.0,95.0 289.7,60.0 310.3,80.0 331.0,125.0 351.7,110.0 372.4,90.0 393.1,70.0 413.8,50.0 434.5,85.0 455.2,105.0 475.9,75.0 496.6,55.0 517.2,35.0 537.9,65.0 558.6,90.0 579.3,45.0 600.0,25.0" />
                </svg>

                <div class="ecom-chart-x-axis" aria-hidden="true">
                    <div>30 Aug</div>
                    <div>6 Sep</div>
                    <div>13 Sep</div>
                    <div>20 Sep</div>
                    <div>28 Sep</div>
                </div>
            </div>
        </div>

        <div class="ecom-category">
            <div class="ecom-category-title">Sales by category</div>
            <div class="ecom-split-bar" role="img" aria-label="Supplements 62 percent, accessories 21 percent, apparel 11 percent, equipment 6 percent">
                <div class="ecom-cat-supplements" style="width: 62%;"></div>
                <div class="ecom-cat-accessories" style="width: 21%;"></div>
                <div class="ecom-cat-apparel" style="width: 11%;"></div>
                <div class="ecom-cat-equipment" style="width: 6%;"></div>
            </div>
            <div class="ecom-split-legend">
                <div class="ecom-legend-item"><span class="ecom-swatch ecom-cat-supplements"></span>Supplements <span class="ecom-legend-value">62%</span></div>
                <div class="ecom-legend-item"><span class="ecom-swatch ecom-cat-accessories"></span>Accessories <span class="ecom-legend-value">21%</span></div>
                <div class="ecom-legend-item"><span class="ecom-swatch ecom-cat-apparel"></span>Apparel <span class="ecom-legend-value">11%</span></div>
                <div class="ecom-legend-item"><span class="ecom-swatch ecom-cat-equipment"></span>Equipment <span class="ecom-legend-value">6%</span></div>
            </div>
        </div>
    </div>

    <div class="ecom-panel-right ecom-panel-narrow">
        <div class="ecom-heading-row">
            <div class="ecom-section-heading">Top Sellers This Month</div>
        </div>

        <div class="ecom-bar-list">
            <div class="ecom-bar-item">
                <div class="ecom-bar-label-row">
                    <span class="ecom-bar-name">Whey Protein 2kg</span>
                    <span class="ecom-bar-value">LKR 142,000</span>
                </div>
                <div class="ecom-bar-track">
                    <div class="ecom-bar-fill" style="width: 100%;"></div>
                </div>
            </div>
            <div class="ecom-bar-item">
                <div class="ecom-bar-label-row">
                    <span class="ecom-bar-name">Creatine 500g</span>
                    <span class="ecom-bar-value">LKR 88,500</span>
                </div>
                <div class="ecom-bar-track">
                    <div class="ecom-bar-fill" style="width: 62%;"></div>
                </div>
            </div>
            <div class="ecom-bar-item">
                <div class="ecom-bar-label-row">
                    <span class="ecom-bar-name">Pre-Workout Powder</span>
                    <span class="ecom-bar-value">LKR 64,000</span>
                </div>
                <div class="ecom-bar-track">
                    <div class="ecom-bar-fill" style="width: 45%;"></div>
                </div>
            </div>
            <div class="ecom-bar-item">
                <div class="ecom-bar-label-row">
                    <span class="ecom-bar-name">Shaker Bottle 700ml</span>
                    <span class="ecom-bar-value">LKR 31,200</span>
                </div>
                <div class="ecom-bar-track">
                    <div class="ecom-bar-fill" style="width: 22%;"></div>
                </div>
            </div>
            <div class="ecom-bar-item">
                <div class="ecom-bar-label-row">
                    <span class="ecom-bar-name">Gym Gloves Pro</span>
                    <span class="ecom-bar-value">LKR 27,000</span>
                </div>
                <div class="ecom-bar-track">
                    <div class="ecom-bar-fill" style="width: 19%;"></div>
                </div>
            </div>
        </div>
    </div>
</div>