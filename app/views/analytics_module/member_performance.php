<style>
/* Container Viewport-Fit Lock */
#member-profile-main.main-content-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 1.2vh 2.5vw;
  gap: 1.2vh;
  width: 100vw;
  max-width: 100%;
  height: 100vh;
  max-height: 100vh;
  overflow: hidden;
  background: #FFFFFF;
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  color: #1E293B;
  user-select: none;
}

/* Breadcrumb Navigation */
.breadcrumb-bar {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  color: #8C9BAB;
  flex-shrink: 0;
}

.breadcrumb-back-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.nav-chevron-svg {
  width: 13px;
  height: 13px;
  stroke: #64748B;
}

.breadcrumb-link {
  color: #8C9BAB;
  font-weight: 500;
  cursor: pointer;
}

.breadcrumb-divider {
  color: #CBD5E1;
}

.breadcrumb-current {
  color: #1E293B;
  font-weight: 700;
}

/* Header Banner Card */
.member-header-banner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  height: 78px;
  flex-shrink: 0;
  background: linear-gradient(135deg, #A8E4BA 0%, #B4E8C4 100%);
  border-radius: 14px;
  padding: 10px 24px;
  box-sizing: border-box;
}

.member-identity-section {
  display: flex;
  align-items: center;
  gap: 14px;
}

.member-avatar-wrapper {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  overflow: hidden;
  background: #E2E8F0;
  flex-shrink: 0;
}

.member-avatar-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.member-profile-details {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.member-name-heading {
  font-size: 16px;
  font-weight: 700;
  color: #0F172A;
  line-height: 1.1;
}

.member-id-text {
  font-size: 10.5px;
  color: #475569;
  font-weight: 500;
}

.member-contact-info {
  font-size: 11.5px;
  color: #334155;
  font-weight: 500;
}

.member-meta-columns {
  display: flex;
  align-items: center;
  gap: 20px;
}

.meta-item-box {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.meta-border-left {
  border-left: 1px solid rgba(0, 0, 0, 0.08);
  padding-left: 20px;
}

.meta-label {
  font-size: 10.5px;
  color: #64748B;
  font-weight: 500;
}

.meta-val-bold {
  font-size: 12.5px;
  color: #0F172A;
  font-weight: 700;
}

.meta-val-regular {
  font-size: 12.5px;
  color: #1E293B;
  font-weight: 600;
}

/* Quick KPI Row */
.kpi-summary-strip {
  display: flex;
  width: 100%;
  justify-content: space-around;
  padding: 4px 0 6px 0;
  flex-shrink: 0;
}

.kpi-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 3px;
}

.kpi-label {
  font-size: 11.5px;
  color: #64748B;
  font-weight: 500;
}

.kpi-value {
  font-size: 24px;
  font-weight: 700;
  color: #0F172A;
  line-height: 1;
}

/* 2x2 Auto-Fitting Layout Grid */
.analytics-grid-layout {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-template-rows: 1fr 1.3fr;
  gap: 14px;
  width: 100%;
  flex: 1 1 0;
  min-height: 0;
}

/* Base Card Style */
.panel-card {
  background: #F8F9FA;
  border-radius: 14px;
  padding: 16px 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  min-height: 0;
  overflow: hidden;
}

.panel-card-title {
  font-size: 13.5px;
  font-weight: 700;
  color: #1E293B;
  margin-bottom: 6px;
  flex-shrink: 0;
}

/* Attendance Card */
.chart-legend-row {
  display: flex;
  gap: 14px;
  margin-bottom: 10px;
  flex-shrink: 0;
}

.legend-indicator-item {
  display: flex;
  align-items: center;
  gap: 6px;
}

.legend-circle-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
}

.dot-actual {
  background: #818CF8;
}

.dot-target {
  background: #E2E8F0;
}

.legend-text {
  font-size: 10.5px;
  color: #64748B;
  font-weight: 500;
}

.attendance-barchart-wrapper {
  display: flex;
  align-items: flex-end;
  gap: 10px;
  flex: 1 1 0;
  min-height: 0;
  padding-bottom: 2px;
}

.axis-scale-column {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: calc(100% - 20px);
  margin-bottom: 20px;
}

.axis-scale-label {
  font-size: 10.5px;
  color: #94A3B8;
  font-weight: 500;
  line-height: 1;
}

.chart-bars-horizontal-flow {
  display: flex;
  flex: 1;
  justify-content: space-between;
  align-items: flex-end;
  height: 100%;
}

.bar-day-slot {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 6px;
  height: 100%;
  justify-content: flex-end;
}

.bar-pair-track {
  position: relative;
  width: 22px;
  flex: 1 1 0;
  min-height: 0;
  display: flex;
  align-items: flex-end;
  justify-content: center;
}

.bar-target-bg {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #E5E7EB;
  border-radius: 4px;
}

.bar-actual-fill {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: #818CF8;
  border-radius: 4px;
}

.bar-h-target-3 { height: 60%; }
.bar-h-actual-2 { height: 40%; }
.bar-h-actual-1 { height: 20%; }

.slot-week-label {
  font-size: 10.5px;
  color: #94A3B8;
  font-weight: 500;
  line-height: 1;
}

/* Workout Schedule Completion Card */
.schedule-stats-container {
  display: flex;
  align-items: center;
  gap: 24px;
  flex: 1;
}

/* Radial Donut Charts */
.donut-circle-chart {
  width: 76px;
  height: 76px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  flex-shrink: 0;
}

.donut-circle-chart::before {
  content: "";
  position: absolute;
  width: 60px;
  height: 60px;
  background: #F8F9FA;
  border-radius: 50%;
}

.ring-blue-58 {
  background: conic-gradient(#818CF8 0% 58%, #E2E8F0 58% 100%);
}

.ring-teal-61 {
  background: conic-gradient(#86D3B6 0% 61%, #E2E8F0 61% 100%);
}

.donut-center-value {
  position: relative;
  z-index: 1;
  font-size: 13px;
  font-weight: 700;
  color: #818CF8;
}

.color-teal {
  color: #4FB08E;
}

.completion-linear-bars {
  display: flex;
  flex-direction: column;
  gap: 12px;
  flex: 1;
}

.progress-linear-item {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.progress-bar-legend {
  display: flex;
  justify-content: space-between;
  font-size: 11.5px;
  color: #475569;
  font-weight: 500;
}

.progress-bar-pct {
  font-weight: 700;
  color: #1E293B;
}

.progress-track-bg {
  width: 100%;
  height: 6px;
  background: #E2E8F0;
  border-radius: 4px;
  overflow: hidden;
}

.progress-fill-bar {
  height: 100%;
  border-radius: 4px;
}

.bar-fill-completed {
  background: #818CF8;
}

.bar-fill-missed {
  background: #94A3B8;
}

.bar-w-58 { width: 58%; }
.bar-w-42 { width: 42%; }

/* Meal Plan Adherence Card */
.meal-top-summary {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-top: 2px;
  margin-bottom: 8px;
  flex-shrink: 0;
}

.adherence-details-column {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.subtext-muted {
  font-size: 10.5px;
  color: #64748B;
  font-weight: 500;
}

.adherence-bold-value {
  font-size: 17px;
  font-weight: 700;
  color: #0F172A;
  line-height: 1.1;
}

.status-warning-badge {
  font-size: 10.5px;
  color: #C26138;
  font-weight: 600;
}

.weekly-adherence-list {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex: 1 1 0;
  min-height: 0;
}

.week-stat-row {
  display: flex;
  align-items: center;
  gap: 8px;
}

.week-row-label {
  font-size: 10.5px;
  color: #8C9BAB;
  width: 20px;
  font-weight: 500;
}

.week-line-track {
  flex: 1;
  height: 4.5px;
  background: #E8ECEF;
  border-radius: 3px;
  overflow: hidden;
}

.week-line-fill {
  height: 100%;
  border-radius: 3px;
}

.fill-yellow { background: #F6C142; }
.fill-pink { background: #F87171; }

.fill-p-64 { width: 64%; }
.fill-p-54 { width: 54%; }
.fill-p-57 { width: 57%; }
.fill-p-67 { width: 67%; }
.fill-p-73 { width: 73%; }
.fill-p-62 { width: 62%; }
.fill-p-52 { width: 52%; }
.fill-p-58 { width: 58%; }

.week-row-pct {
  font-size: 10.5px;
  color: #8C9BAB;
  width: 26px;
  text-align: right;
  font-weight: 500;
}

/* Personal Training Sessions Card */
.pt-top-stats-row {
  display: flex;
  gap: 28px;
  margin-top: 2px;
  margin-bottom: 8px;
  flex-shrink: 0;
}

.pt-metric-cell {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.pt-meta-subhead {
  font-size: 10.5px;
  color: #64748B;
  font-weight: 500;
}

.pt-meta-highlight {
  font-size: 12.5px;
  font-weight: 700;
  color: #0F172A;
}

.session-items-list {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  flex: 1 1 0;
  min-height: 0;
}

.session-entry-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 4px 0;
  border-bottom: 1px solid #EDEDED;
}

.session-last {
  border-bottom: none;
  padding-bottom: 0;
}

.session-main-info {
  display: flex;
  flex-direction: column;
  gap: 1px;
}

.session-name {
  font-size: 12px;
  font-weight: 600;
  color: #1E293B;
  line-height: 1.1;
}

.session-time {
  font-size: 10px;
  color: #94A3B8;
  font-weight: 500;
}

/* Status Badges */
.pill-status {
  padding: 2px 10px;
  border-radius: 10px;
  font-size: 10px;
  font-weight: 600;
}

.pill-completed {
  background: #E4F7EC;
  color: #108752;
}

.pill-upcoming {
  background: #E8F2FF;
  color: #2F7CE5;
}

.pill-noshow {
  background: #FEECEB;
  color: #E24949;
}
</style>

<div id="member-profile-main" class="main-content-container">

  <!-- Top Breadcrumb Navigation -->
  <div class="breadcrumb-bar">
    <div class="breadcrumb-back-icon">
      <svg class="nav-chevron-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </div>
    <span class="breadcrumb-link">Members</span>
    <span class="breadcrumb-divider">/</span>
    <span class="breadcrumb-current">Sarah Mitchell</span>
  </div>

  <!-- Member Banner Card -->
  <div class="member-header-banner">
    <div class="member-identity-section">
      <div class="member-avatar-wrapper">
        <img class="member-avatar-img" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=160&q=80" alt="Sarah Mitchell" />
      </div>
      <div class="member-profile-details">
        <div class="member-name-heading">Sarah Mitchell</div>
        <div class="member-id-text">M-0012</div>
        <div class="member-contact-info">sarah.m@email.com • +1 555 0101</div>
      </div>
    </div>

    <div class="member-meta-columns">
      <div class="meta-item-box">
        <span class="meta-label">Plan</span>
        <span class="meta-val-bold">Yoga Class</span>
      </div>
      <div class="meta-item-box meta-border-left">
        <span class="meta-label">Member since</span>
        <span class="meta-val-regular">Jan 12, 2025</span>
      </div>
      <div class="meta-item-box meta-border-left">
        <span class="meta-label">Last visit</span>
        <span class="meta-val-regular">Sep 25, 2026</span>
      </div>
      <div class="meta-item-box meta-border-left">
        <span class="meta-label">Trainer</span>
        <span class="meta-val-regular">Dana Lee</span>
      </div>
    </div>
  </div>

  <!-- Quick High-Level KPI Summary -->
  <div class="kpi-summary-strip">
    <div class="kpi-block">
      <div class="kpi-label">Avg visits / week</div>
      <div class="kpi-value">1.8</div>
    </div>
    <div class="kpi-block">
      <div class="kpi-label">Workout completion</div>
      <div class="kpi-value">58%</div>
    </div>
    <div class="kpi-block">
      <div class="kpi-label">Meal plan adherence</div>
      <div class="kpi-value">61%</div>
    </div>
    <div class="kpi-block">
      <div class="kpi-label">Check-in streak</div>
      <div class="kpi-value">8 days</div>
    </div>
  </div>

  <!-- Dashboard 2x2 Grid Section -->
  <div class="analytics-grid-layout">

    <!-- Card 1: Attendance Chart -->
    <div class="panel-card">
      <div class="panel-card-title">Attendance</div>
      <div class="chart-legend-row">
        <div class="legend-indicator-item">
          <span class="legend-circle-dot dot-actual"></span>
          <span class="legend-text">Actual</span>
        </div>
        <div class="legend-indicator-item">
          <span class="legend-circle-dot dot-target"></span>
          <span class="legend-text">Target</span>
        </div>
      </div>

      <div class="attendance-barchart-wrapper">
        <div class="axis-scale-column">
          <span class="axis-scale-label">5</span>
          <span class="axis-scale-label">4</span>
          <span class="axis-scale-label">2</span>
          <span class="axis-scale-label">0</span>
        </div>

        <div class="chart-bars-horizontal-flow">
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W1</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W2</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-1"></div>
            </div>
            <span class="slot-week-label">W3</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W4</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W5</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W6</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-2"></div>
            </div>
            <span class="slot-week-label">W7</span>
          </div>
          <div class="bar-day-slot">
            <div class="bar-pair-track">
              <div class="bar-target-bg bar-h-target-3"></div>
              <div class="bar-actual-fill bar-h-actual-1"></div>
            </div>
            <span class="slot-week-label">W8</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 2: Workout Schedule Completion -->
    <div class="panel-card">
      <div class="panel-card-title">Workout Schedule Completion</div>
      <div class="schedule-stats-container">
        <div class="donut-circle-chart ring-blue-58">
          <span class="donut-center-value">58%</span>
        </div>

        <div class="completion-linear-bars">
          <div class="progress-linear-item">
            <div class="progress-bar-legend">
              <span class="progress-bar-title">Completed</span>
              <span class="progress-bar-pct">58%</span>
            </div>
            <div class="progress-track-bg">
              <div class="progress-fill-bar bar-fill-completed bar-w-58"></div>
            </div>
          </div>

          <div class="progress-linear-item">
            <div class="progress-bar-legend">
              <span class="progress-bar-title">Missed</span>
              <span class="progress-bar-pct">42%</span>
            </div>
            <div class="progress-track-bg">
              <div class="progress-fill-bar bar-fill-missed bar-w-42"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Card 3: Meal Plan Adherence -->
    <div class="panel-card">
      <div class="panel-card-title">Meal Plan Adherence</div>
      <div class="meal-top-summary">
        <div class="donut-circle-chart ring-teal-61">
          <span class="donut-center-value color-teal">61%</span>
        </div>
        <div class="adherence-details-column">
          <span class="subtext-muted">8-week average</span>
          <span class="adherence-bold-value">61%</span>
          <span class="status-warning-badge">Needs attention</span>
        </div>
      </div>

      <!-- Weekly Progress Rows -->
      <div class="weekly-adherence-list">
        <div class="week-stat-row">
          <span class="week-row-label">W1</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-64"></div></div>
          <span class="week-row-pct">64%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W2</span>
          <div class="week-line-track"><div class="week-line-fill fill-pink fill-p-54"></div></div>
          <span class="week-row-pct">54%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W3</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-57"></div></div>
          <span class="week-row-pct">57%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W4</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-67"></div></div>
          <span class="week-row-pct">67%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W5</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-73"></div></div>
          <span class="week-row-pct">73%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W6</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-62"></div></div>
          <span class="week-row-pct">62%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W7</span>
          <div class="week-line-track"><div class="week-line-fill fill-pink fill-p-52"></div></div>
          <span class="week-row-pct">52%</span>
        </div>
        <div class="week-stat-row">
          <span class="week-row-label">W8</span>
          <div class="week-line-track"><div class="week-line-fill fill-yellow fill-p-58"></div></div>
          <span class="week-row-pct">58%</span>
        </div>
      </div>
    </div>

    <!-- Card 4: Personal Training Sessions -->
    <div class="panel-card">
      <div class="panel-card-title">Personal Training Sessions</div>
      <div class="pt-top-stats-row">
        <div class="pt-metric-cell">
          <span class="pt-meta-subhead">Trainer</span>
          <span class="pt-meta-highlight">Dana Lee</span>
        </div>
        <div class="pt-metric-cell">
          <span class="pt-meta-subhead">Sessions done</span>
          <span class="pt-meta-highlight">3 / 5</span>
        </div>
        <div class="pt-metric-cell">
          <span class="pt-meta-subhead">Completion</span>
          <span class="pt-meta-highlight">60%</span>
        </div>
      </div>

      <div class="session-items-list">
        <div class="session-entry-row">
          <div class="session-main-info">
            <span class="session-name">Strength foundations</span>
            <span class="session-time">Sep 22, 2026 • 60 min</span>
          </div>
          <div class="pill-status pill-completed">Completed</div>
        </div>

        <div class="session-entry-row">
          <div class="session-main-info">
            <span class="session-name">HIIT & conditioning</span>
            <span class="session-time">Sep 15, 2026 • 45 min</span>
          </div>
          <div class="pill-status pill-completed">Completed</div>
        </div>

        <div class="session-entry-row">
          <div class="session-main-info">
            <span class="session-name">Mobility & recovery</span>
            <span class="session-time">Sep 8, 2026 • 60 min</span>
          </div>
          <div class="pill-status pill-completed">Completed</div>
        </div>

        <div class="session-entry-row">
          <div class="session-main-info">
            <span class="session-name">Progressive overload</span>
            <span class="session-time">Oct 1, 2026 • 60 min</span>
          </div>
          <div class="pill-status pill-upcoming">Upcoming</div>
        </div>

        <div class="session-entry-row session-last">
          <div class="session-main-info">
            <span class="session-name">Initial assessment</span>
            <span class="session-time">Sep 1, 2026 • 30 min</span>
          </div>
          <div class="pill-status pill-noshow">No-Show</div>
        </div>
      </div>
    </div>

  </div>

</div>