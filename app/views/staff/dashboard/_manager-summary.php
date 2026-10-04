<?php $pageStyles[] = 'staff/staff/dashboard/_manager-summary'; ?>


<!-- Period + report actions -->
<div class="mgr-toolbar">
    <div class="mgr-period">
        <label for="mgrPeriod" class="mgr-period-label">Showing</label>
        <select id="mgrPeriod" class="mgr-select">
            <option selected>September 2026</option>
            <option>August 2026</option>
            <option>July 2026</option>
            <option>Last 6 months</option>
        </select>
    </div>
    <div class="mgr-toolbar-actions">
        <button type="button" class="mgr-btn">Generate report</button>
    </div>
</div>


<!-- Business health -->
<div class="mgr-kpi-row">
    <div class="mgr-kpi-card mgr-bg-blue">
        <div class="mgr-kpi-title">Revenue This Month</div>
        <div class="mgr-kpi-value">LKR 1.82M</div>
        <div class="mgr-kpi-sub">8.5% more than August</div>
    </div>
    <div class="mgr-kpi-card mgr-bg-gray">
        <div class="mgr-kpi-title">Active Members</div>
        <div class="mgr-kpi-value">1,247</div>
        <div class="mgr-kpi-sub">+49 net this month</div>
    </div>
    <div class="mgr-kpi-card mgr-bg-blue">
        <div class="mgr-kpi-title">Turnover Rate</div>
        <div class="mgr-kpi-value">1.8%</div>
        <div class="mgr-kpi-sub">22 left, down from 2.3% in August</div>
    </div>
    <div class="mgr-kpi-card mgr-bg-gray">
        <div class="mgr-kpi-title">Avg Weekly Visits</div>
        <div class="mgr-kpi-value">3.1</div>
        <div class="mgr-kpi-sub">Per member, up from 2.9</div>
    </div>
</div>


<!-- Revenue + membership mix -->
<div class="mgr-row">
    <div class="mgr-section mgr-wide">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Revenue by Source</div>
            <span class="mgr-heading-note">Last 6 months, LKR</span>
        </div>

        <div class="mgr-chart-wrapper" role="img" aria-label="Monthly revenue from April to September rising from LKR 1.34 million to LKR 1.82 million, with memberships the largest share each month">
            <div class="mgr-y-axis" aria-hidden="true">
                <div>2M</div>
                <div>1.5M</div>
                <div>1M</div>
                <div>500k</div>
                <div>0</div>
            </div>
            <div class="mgr-grid-lines" aria-hidden="true">
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line mgr-grid-line-solid"></div>
            </div>
            <div class="mgr-bars" aria-hidden="true">
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 19%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 7%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 41%;"></div>
                    </div>
                    <div class="mgr-x-label">Apr</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 21%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 7.5%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 43%;"></div>
                    </div>
                    <div class="mgr-x-label">May</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 22.75%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 8.25%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 42%;"></div>
                    </div>
                    <div class="mgr-x-label">Jun</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 23.5%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 9%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 45.5%;"></div>
                    </div>
                    <div class="mgr-x-label">Jul</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 26.75%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 9.5%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 47.5%;"></div>
                    </div>
                    <div class="mgr-x-label">Aug</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-stack">
                        <div class="mgr-seg mgr-c-store" style="height: 29.9%;"></div>
                        <div class="mgr-seg mgr-c-pt" style="height: 10.5%;"></div>
                        <div class="mgr-seg mgr-c-memberships" style="height: 50.5%;"></div>
                    </div>
                    <div class="mgr-x-label is-current">Sep</div>
                </div>
            </div>
        </div>

        <div class="mgr-split-row">
            <div class="mgr-split-item">
                <span class="mgr-split-label"><span class="mgr-swatch mgr-c-memberships"></span>Memberships</span>
                <span class="mgr-split-value">LKR 1,010,000</span>
            </div>
            <div class="mgr-split-item">
                <span class="mgr-split-label"><span class="mgr-swatch mgr-c-pt"></span>PT sessions</span>
                <span class="mgr-split-value">LKR 210,000</span>
            </div>
            <div class="mgr-split-item">
                <span class="mgr-split-label"><span class="mgr-swatch mgr-c-store"></span>Store</span>
                <span class="mgr-split-value">LKR 598,000</span>
            </div>
        </div>
    </div>

    <div class="mgr-section mgr-narrow">
        <div class="mgr-section-title">Members by Plan</div>

        <div class="mgr-donut-content">
            <div class="mgr-donut-wrapper" role="img" aria-label="Monthly plans 58.1 percent, quarterly 26.4 percent, annual 15.5 percent">
                <div class="mgr-donut"></div>
                <div class="mgr-donut-hole">
                    <span class="mgr-donut-total">1,247</span>
                    <span class="mgr-donut-caption">members</span>
                </div>
            </div>
            <div class="mgr-donut-legend">
                <div class="mgr-d-row">
                    <span class="mgr-d-dot mgr-c-memberships"></span>
                    <span class="mgr-d-label">Regular, monthly</span>
                    <span class="mgr-d-value">58.1%</span>
                </div>
                <div class="mgr-d-row">
                    <span class="mgr-d-dot mgr-c-pt"></span>
                    <span class="mgr-d-label">Regular, quarterly</span>
                    <span class="mgr-d-value">26.4%</span>
                </div>
                <div class="mgr-d-row">
                    <span class="mgr-d-dot mgr-c-store"></span>
                    <span class="mgr-d-label">Regular, annual</span>
                    <span class="mgr-d-value">15.5%</span>
                </div>
            </div>
        </div>

        <div class="mgr-donut-note">214 day passes sold this month, 17 of them converted to a regular membership.</div>
    </div>
</div>


<!-- Turnover + flagged members -->
<div class="mgr-row">
    <div class="mgr-section mgr-wide">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Members Joined and Left</div>
            <span class="mgr-heading-note">Last 6 months</span>
        </div>

        <div class="mgr-chart-wrapper" role="img" aria-label="Members joined versus left per month. April 40 and 20, May 56 and 24, June 48 and 28, July 64 and 20, August 60 and 28, September 71 and 22">
            <div class="mgr-y-axis" aria-hidden="true">
                <div>80</div>
                <div>60</div>
                <div>40</div>
                <div>20</div>
                <div>0</div>
            </div>
            <div class="mgr-grid-lines" aria-hidden="true">
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line"></div>
                <div class="mgr-grid-line mgr-grid-line-solid"></div>
            </div>
            <div class="mgr-bars" aria-hidden="true">
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 50%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 25%;"></div>
                    </div>
                    <div class="mgr-x-label">Apr</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 70%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 30%;"></div>
                    </div>
                    <div class="mgr-x-label">May</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 60%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 35%;"></div>
                    </div>
                    <div class="mgr-x-label">Jun</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 80%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 25%;"></div>
                    </div>
                    <div class="mgr-x-label">Jul</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 75%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 35%;"></div>
                    </div>
                    <div class="mgr-x-label">Aug</div>
                </div>
                <div class="mgr-bar-month">
                    <div class="mgr-bar-group">
                        <div class="mgr-bar mgr-c-joined" style="height: 88.75%;"></div>
                        <div class="mgr-bar mgr-c-left" style="height: 27.5%;"></div>
                    </div>
                    <div class="mgr-x-label is-current">Sep</div>
                </div>
            </div>
        </div>

        <div class="mgr-legend">
            <div class="mgr-legend-item"><span class="mgr-swatch mgr-c-joined"></span>Joined</div>
            <div class="mgr-legend-item"><span class="mgr-swatch mgr-c-left"></span>Left</div>
        </div>
    </div>

    <div class="mgr-section mgr-narrow">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Flagged Members</div>
            <a href="/portal/reports/at-risk" class="mgr-link">View all</a>
        </div>

        <div class="mgr-flag-boxes">
            <div class="mgr-flag-box">
                <div class="mgr-flag-number">3</div>
                <div class="mgr-flag-label">Missed sessions</div>
            </div>
            <div class="mgr-flag-box">
                <div class="mgr-flag-number">2</div>
                <div class="mgr-flag-label">Low plan adherence</div>
            </div>
            <div class="mgr-flag-box">
                <div class="mgr-flag-number">2</div>
                <div class="mgr-flag-label">No visits in 10+ days</div>
            </div>
        </div>

        <div class="mgr-list">
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Lahiru Madushanka</div>
                    <div class="mgr-list-detail">Last visit 16 Sep · Nuwan Karunaratne</div>
                </div>
                <div class="mgr-list-side mgr-text-red">12 days inactive</div>
            </div>
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Ravi Kumarasinghe</div>
                    <div class="mgr-list-detail">Missed 4 sessions · Amal Fernando</div>
                </div>
                <div class="mgr-list-side mgr-text-amber">7 days inactive</div>
            </div>
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Dinithi Ekanayake</div>
                    <div class="mgr-list-detail">Adherence 30% · Dilini Jayasekara</div>
                </div>
                <div class="mgr-list-side mgr-text-soft">Visited yesterday</div>
            </div>
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Gihan Samarasinghe</div>
                    <div class="mgr-list-detail">Missed 3 sessions · Sanjaya Wijeratne</div>
                </div>
                <div class="mgr-list-side mgr-text-amber">5 days inactive</div>
            </div>
        </div>
    </div>
</div>


<!-- Peak times -->
<div class="mgr-section">
    <div class="mgr-heading-row">
        <div class="mgr-section-title">When Members Visit</div>
        <span class="mgr-heading-note">Average check-ins by day and time, September</span>
    </div>

    <div class="mgr-heat-scroll">
        <div class="mgr-heatmap" role="img" aria-label="Busiest times are weekday early mornings from 5 to 7 AM and evenings from 5 to 9 PM, and Saturday mornings. Quietest are weekday afternoons and Sunday evenings.">
            <div></div>
            <div class="mgr-heat-hour">5 AM</div>
            <div class="mgr-heat-hour">7 AM</div>
            <div class="mgr-heat-hour">9 AM</div>
            <div class="mgr-heat-hour">11 AM</div>
            <div class="mgr-heat-hour">1 PM</div>
            <div class="mgr-heat-hour">3 PM</div>
            <div class="mgr-heat-hour">5 PM</div>
            <div class="mgr-heat-hour">7 PM</div>
            <div class="mgr-heat-hour">9 PM</div>
            <div class="mgr-heat-day">Mon</div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-day">Tue</div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-0"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-day">Wed</div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-day">Thu</div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-day">Fri</div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-day">Sat</div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-4"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-day">Sun</div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-3"></div>
            <div class="mgr-heat-cell mgr-lvl-2"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-1"></div>
            <div class="mgr-heat-cell mgr-lvl-0"></div>
        </div>
    </div>

    <div class="mgr-heat-legend" aria-hidden="true">
        <span>Quieter</span>
        <span class="mgr-swatch mgr-lvl-0"></span>
        <span class="mgr-swatch mgr-lvl-1"></span>
        <span class="mgr-swatch mgr-lvl-2"></span>
        <span class="mgr-swatch mgr-lvl-3"></span>
        <span class="mgr-swatch mgr-lvl-4"></span>
        <span>Busier</span>
    </div>
</div>


<!-- Instructor performance -->
<div class="mgr-section mgr-scroll-x">
    <div class="mgr-heading-row">
        <div class="mgr-section-title">Instructor Performance</div>
        <span class="mgr-heading-note">This month</span>
    </div>

    <div class="mgr-table-head">
        <div class="mgr-col-name">Name</div>
        <div class="mgr-col-spec">Specialty</div>
        <div class="mgr-col-clients">Clients</div>
        <div class="mgr-col-pt">PT sessions</div>
        <div class="mgr-col-adherence">Client adherence</div>
        <div class="mgr-col-flagged">Flagged clients</div>
    </div>

    <div class="mgr-table-body">
        <div class="mgr-table-row">
            <div class="mgr-col-name mgr-text-dark mgr-text-medium">Dilini Jayasekara</div>
            <div class="mgr-col-spec mgr-text-muted">Yoga / Nutrition</div>
            <div class="mgr-col-clients mgr-text-dark">15</div>
            <div class="mgr-col-pt mgr-text-dark">30</div>
            <div class="mgr-col-adherence mgr-text-green">86%</div>
            <div class="mgr-col-flagged mgr-text-dark">1</div>
        </div>
        <div class="mgr-table-row">
            <div class="mgr-col-name mgr-text-dark mgr-text-medium">Amal Fernando</div>
            <div class="mgr-col-spec mgr-text-muted">Strength / Core</div>
            <div class="mgr-col-clients mgr-text-dark">18</div>
            <div class="mgr-col-pt mgr-text-dark">42</div>
            <div class="mgr-col-adherence mgr-text-green">81%</div>
            <div class="mgr-col-flagged mgr-text-dark">1</div>
        </div>
        <div class="mgr-table-row">
            <div class="mgr-col-name mgr-text-dark mgr-text-medium">Chamari Silva</div>
            <div class="mgr-col-spec mgr-text-muted">Zumba / Cardio</div>
            <div class="mgr-col-clients mgr-text-dark">11</div>
            <div class="mgr-col-pt mgr-text-dark">18</div>
            <div class="mgr-col-adherence mgr-text-amber">72%</div>
            <div class="mgr-col-flagged mgr-text-dark">0</div>
        </div>
        <div class="mgr-table-row">
            <div class="mgr-col-name mgr-text-dark mgr-text-medium">Nuwan Karunaratne</div>
            <div class="mgr-col-spec mgr-text-muted">Cycling / HIIT</div>
            <div class="mgr-col-clients mgr-text-dark">9</div>
            <div class="mgr-col-pt mgr-text-dark">24</div>
            <div class="mgr-col-adherence mgr-text-amber">64%</div>
            <div class="mgr-col-flagged mgr-text-red">2</div>
        </div>
        <div class="mgr-table-row">
            <div class="mgr-col-name mgr-text-dark mgr-text-medium">Sanjaya Wijeratne</div>
            <div class="mgr-col-spec mgr-text-muted">Strength / CrossFit</div>
            <div class="mgr-col-clients mgr-text-dark">12</div>
            <div class="mgr-col-pt mgr-text-dark">20</div>
            <div class="mgr-col-adherence mgr-text-red">48%</div>
            <div class="mgr-col-flagged mgr-text-red">3</div>
        </div>
    </div>
</div>


<!-- Classes + plan adherence -->
<div class="mgr-row">
    <div class="mgr-section">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Class Popularity</div>
            <span class="mgr-heading-note">Average fill rate</span>
        </div>

        <div class="mgr-hbar-list">
            <div class="mgr-hbar-item">
                <div class="mgr-hbar-labels">
                    <span class="mgr-hbar-name">Spin Cycle</span>
                    <span class="mgr-hbar-value">96% · 9.6 of 10</span>
                </div>
                <div class="mgr-hbar-track">
                    <div class="mgr-hbar-fill" style="width: 96%;"></div>
                </div>
            </div>
            <div class="mgr-hbar-item">
                <div class="mgr-hbar-labels">
                    <span class="mgr-hbar-name">Zumba</span>
                    <span class="mgr-hbar-value">88% · 14.1 of 16</span>
                </div>
                <div class="mgr-hbar-track">
                    <div class="mgr-hbar-fill" style="width: 88%;"></div>
                </div>
            </div>
            <div class="mgr-hbar-item">
                <div class="mgr-hbar-labels">
                    <span class="mgr-hbar-name">Power Yoga</span>
                    <span class="mgr-hbar-value">71% · 8.5 of 12</span>
                </div>
                <div class="mgr-hbar-track">
                    <div class="mgr-hbar-fill" style="width: 71%;"></div>
                </div>
            </div>
            <div class="mgr-hbar-item">
                <div class="mgr-hbar-labels">
                    <span class="mgr-hbar-name">Core Blast</span>
                    <span class="mgr-hbar-value">54% · 5.4 of 10</span>
                </div>
                <div class="mgr-hbar-track">
                    <div class="mgr-hbar-fill" style="width: 54%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mgr-section">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Plan Adherence</div>
            <span class="mgr-heading-note">All members, last 6 months</span>
        </div>

        <div class="mgr-adh-stats">
            <div class="mgr-adh-stat">
                <span class="mgr-adh-label"><span class="mgr-swatch mgr-c-workout"></span>Workout plans</span>
                <span class="mgr-adh-value">77%</span>
                <span class="mgr-adh-change">Up 3 points from August</span>
            </div>
            <div class="mgr-adh-stat">
                <span class="mgr-adh-label"><span class="mgr-swatch mgr-c-meal"></span>Meal plans</span>
                <span class="mgr-adh-value">66%</span>
                <span class="mgr-adh-change">Up 3 points from August</span>
            </div>
        </div>

        <div class="mgr-line-chart">
            <div class="mgr-line-y" aria-hidden="true">
                <div>100%</div>
                <div>70%</div>
                <div>40%</div>
            </div>
            <div class="mgr-line-area">
                <svg class="mgr-line-svg" viewBox="0 0 600 200" preserveAspectRatio="none" role="img" aria-label="Workout plan adherence rose from 68 to 77 percent and meal plan adherence from 55 to 66 percent between April and September">
                    <line class="mgr-svg-grid" x1="0" y1="0" x2="600" y2="0" vector-effect="non-scaling-stroke" />
                    <line class="mgr-svg-grid" x1="0" y1="100" x2="600" y2="100" vector-effect="non-scaling-stroke" />
                    <line class="mgr-svg-grid" x1="0" y1="200" x2="600" y2="200" vector-effect="non-scaling-stroke" />
                    <polyline class="mgr-svg-workout" vector-effect="non-scaling-stroke" points="0,106.7 120,100.0 240,103.3 360,90.0 480,86.7 600,76.7" />
                    <polyline class="mgr-svg-meal" vector-effect="non-scaling-stroke" points="0,150.0 120,143.3 240,133.3 360,136.7 480,123.3 600,113.3" />
                </svg>
                <div class="mgr-line-x" aria-hidden="true">
                    <div>Apr</div>
                    <div>May</div>
                    <div>Jun</div>
                    <div>Jul</div>
                    <div>Aug</div>
                    <div>Sep</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Operations oversight + admin accounts -->
<div class="mgr-row">
    <div class="mgr-section mgr-wide">
        <div class="mgr-section-title">Operations Summary</div>

        <div class="mgr-ops-group">
            <div class="mgr-ops-head">
                <span class="mgr-ops-title">Support</span>
                <a href="/portal/support-tickets" class="mgr-link">Ticket history</a>
            </div>
            <div class="mgr-ops-stats">
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">5</span>
                    <span class="mgr-ops-label">Open tickets</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">34</span>
                    <span class="mgr-ops-label">Resolved this month</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">1.6 days</span>
                    <span class="mgr-ops-label">Average time to resolve</span>
                </div>
            </div>
        </div>

        <div class="mgr-ops-group">
            <div class="mgr-ops-head">
                <span class="mgr-ops-title">Store</span>
                <a href="/portal/orders" class="mgr-link">Store reports</a>
            </div>
            <div class="mgr-ops-stats">
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">164</span>
                    <span class="mgr-ops-label">Orders this month</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">LKR 3,650</span>
                    <span class="mgr-ops-label">Average order value</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value">Whey 2kg</span>
                    <span class="mgr-ops-label">Top seller</span>
                </div>
            </div>
        </div>

        <div class="mgr-ops-group">
            <div class="mgr-ops-head">
                <span class="mgr-ops-title">Equipment</span>
                <a href="/portal/facility-map" class="mgr-link">Facility map</a>
            </div>
            <div class="mgr-ops-stats">
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value mgr-text-green">42</span>
                    <span class="mgr-ops-label">Available</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value mgr-text-red">2</span>
                    <span class="mgr-ops-label">Faulty</span>
                </div>
                <div class="mgr-ops-stat">
                    <span class="mgr-ops-value mgr-text-amber">1</span>
                    <span class="mgr-ops-label">Under maintenance</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mgr-section mgr-narrow">
        <div class="mgr-heading-row">
            <div class="mgr-section-title">Admin Accounts</div>
            <button type="button" class="mgr-btn mgr-btn-outline">Register admin</button>
        </div>

        <div class="mgr-list">
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Nadeesha Perera</div>
                    <div class="mgr-list-detail">Super Admin · Since Jun 2026</div>
                </div>
                <div class="mgr-list-side mgr-text-green">Active now</div>
            </div>
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Chathura Weerasinghe</div>
                    <div class="mgr-list-detail">Super Admin · Since Aug 2026</div>
                </div>
                <div class="mgr-list-side mgr-text-soft">Last seen 2 hours ago</div>
            </div>
            <div class="mgr-list-item">
                <div class="mgr-list-info">
                    <div class="mgr-list-name">Isuru Jayawardena</div>
                    <div class="mgr-list-detail">E-commerce Admin · Since Jul 2026</div>
                </div>
                <div class="mgr-list-side mgr-text-soft">Last seen yesterday</div>
            </div>
        </div>
    </div>
</div>