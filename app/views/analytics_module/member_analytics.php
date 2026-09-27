<style>
/* Dashboard Main Container */
#main-content-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    width: min(92%, 720px);
    max-height: 100%;
    /* clamps to leftover space, never forces scroll */
    padding: 56px 48px;
    gap: 32px;

    background: #fff;
    border-radius: 28px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
    box-sizing: border-box;
    overflow: hidden;
  }

/* Base Card Style */
.card {
  background: #FFFFFF;
  border-radius: 16px;
  box-sizing: border-box;
}

/* Top Stats Row */
.top-cards-row {
  display: flex;
  width: 100%;
  gap: 14px;
  height: 140px;
}

.stat-card {
  flex: 1;
  padding: 18px 22px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
}

/* Attendance Card Details */
.attendance-card {
  position: relative;
  overflow: hidden;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-inner {
  position: relative;
  z-index: 1;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.stat-header-text {
  font-size: 13px;
  font-weight: 500;
  color: #333333;
}

.attendance-count-wrapper {
  display: flex;
  align-items: baseline;
  gap: 6px;
}

.attendance-number {
  font-size: 20px;
  font-weight: 700;
  color: #111111;
}

.attendance-unit {
  font-size: 12px;
  color: #555555;
}

.badge-growth {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  color: #0c8a52;
  font-size: 12px;
  font-weight: 600;
  margin-top: 6px;
}

.watermark-icon-wrap {
  position: absolute;
  right: 12px;
  bottom: 8px;
  opacity: 0.5;
  pointer-events: none;
}

.watermark-icon {
  width: 60px;
  height: 60px;
}

/* Progress Stat Cards (Workout & Meal Plan) */
.progress-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.progress-info {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.stat-title {
  font-size: 13px;
  font-weight: 500;
  color: #444444;
}

.stat-subtitle {
  font-size: 13px;
  font-weight: 600;
  color: #111111;
}

/* Conic Radial Progress Rings */
.radial-progress-wrapper {
  width: 68px;
  height: 68px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
}

.radial-progress-wrapper::before {
  content: "";
  position: absolute;
  width: 52px;
  height: 52px;
  background: #FFFFFF;
  border-radius: 50%;
}

.ring-green {
  background: conic-gradient(#108752 0% 85%, #E5E7EB 85% 100%);
}

.ring-orange {
  background: conic-gradient(#BF7113 0% 62%, #E5E7EB 62% 100%);
}

.radial-value {
  position: relative;
  z-index: 1;
  font-size: 12px;
  font-weight: 700;
  color: #111111;
}

/* Goal Card */
.goal-card {
  width: 100%;
  padding: 24px 20px;
  display: flex;
  align-items: center;
}

.goal-text {
  font-size: 14px;
  font-weight: 600;
  color: #222222;
}

/* Analytics Header & Week/Month Switcher */
.toggle-radio-input {
  display: none;
}

.analytics-header-row {
  display: flex;
  width: 100%;
  justify-content: space-between;
  align-items: center;
  margin-top: 6px;
  padding: 0 4px;
  box-sizing: border-box;
}

.section-title {
  font-size: 14px;
  font-weight: 600;
  color: #2b2b2b;
}

.toggle-pill-container {
  display: flex;
  background: #FFFFFF;
  border-radius: 20px;
  padding: 3px;
  gap: 2px;
}

.toggle-tab {
  font-size: 12px;
  padding: 5px 16px;
  border-radius: 16px;
  font-weight: 500;
  color: #555555;
  cursor: pointer;
  transition: background 0.2s ease, color 0.2s ease;
}

/* Interactive Pill Tab Highlights (CSS-only) */
#view-week:checked ~ .analytics-header-row .tab-week-label {
  background: #000000;
  color: #FFFFFF;
  font-weight: 600;
}

#view-month:checked ~ .analytics-header-row .tab-month-label {
  background: #000000;
  color: #FFFFFF;
  font-weight: 600;
}

/* Chart Container & Elements */
.chart-card {
  width: 100%;
  flex-grow: 1;
  padding: 24px 28px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.chart-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.chart-title {
  font-size: 13px;
  font-weight: 600;
  color: #222222;
}

.chart-options-menu {
  color: #666666;
  font-size: 16px;
  cursor: pointer;
  letter-spacing: 1px;
}

/* Chart Visual Area */
.chart-visual-area {
  position: relative;
  width: 100%;
  height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
}

.chart-horizontal-gridlines {
  position: absolute;
  top: 10px;
  left: 0;
  width: 100%;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  pointer-events: none;
}

.gridline {
  width: 100%;
  border-bottom: 1px solid #F1F1F1;
}

.chart-columns-container {
  position: relative;
  z-index: 1;
  display: flex;
  justify-content: space-around;
  align-items: flex-end;
  height: 100%;
  width: 100%;
  border-bottom: 1px solid #EBEBEB;
  padding-bottom: 8px;
}

/* Pure CSS Tab Display Toggling */
.view-week-content,
.view-month-content {
  display: none;
}

#view-week:checked ~ .chart-card .view-week-content {
  display: flex;
}

#view-month:checked ~ .chart-card .view-month-content {
  display: flex;
}

/* Chart Bars */
.chart-bar-group {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 12px;
  width: 48px;
  height: 100%;
  justify-content: flex-end;
}

.bar-group-month {
  width: 32px;
}

.bar-track {
  display: flex;
  align-items: flex-end;
  width: 100%;
  height: 200px;
}

.chart-bar {
  width: 100%;
  border-radius: 6px;
}

.bar-black {
  background: #000000;
}

.bar-light-gray {
  background: #E5E5E5;
}

/* Relative Bar Heights */
.bar-h-18 { height: 18%; }
.bar-h-25 { height: 25%; }
.bar-h-28 { height: 28%; }
.bar-h-30 { height: 30%; }
.bar-h-40 { height: 40%; }
.bar-h-45 { height: 45%; }
.bar-h-50 { height: 50%; }
.bar-h-55 { height: 55%; }
.bar-h-60 { height: 60%; }
.bar-h-65 { height: 65%; }
.bar-h-68 { height: 68%; }
.bar-h-70 { height: 70%; }
.bar-h-75 { height: 75%; }
.bar-h-80 { height: 80%; }
.bar-h-82 { height: 82%; }
.bar-h-85 { height: 85%; }
.bar-h-90 { height: 90%; }

.bar-day-label {
  font-size: 11px;
  font-weight: 500;
  color: #777777;
}
</style>

<div id="dashboard-container" class="dashboard-container">
  
  <!-- Top Stat Cards Section -->
  <div class="top-cards-row">
    <!-- Attendance Card -->
    <div class="card stat-card attendance-card">
      <div class="card-inner">
        <div class="stat-header-text">Attendance</div>
        <div class="attendance-count-wrapper">
          <span class="attendance-number">12</span>
          <span class="attendance-unit">visits</span>
        </div>
        <div class="badge-growth">
          <svg class="growth-icon" viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
            <polyline points="17 6 23 6 23 12"></polyline>
          </svg>
          <span class="badge-text">15% vs last week</span>
        </div>
      </div>
      <!-- Background Calendar Icon Decoration -->
      <div class="watermark-icon-wrap">
        <svg class="watermark-icon" viewBox="0 0 24 24" fill="none" stroke="#d5d5d5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
          <line x1="16" y1="2" x2="16" y2="6"></line>
          <line x1="8" y1="2" x2="8" y2="6"></line>
          <line x1="3" y1="10" x2="21" y2="10"></line>
          <polyline points="9 16 11 18 15 14"></polyline>
        </svg>
      </div>
    </div>

    <!-- Workout Completion Card -->
    <div class="card stat-card progress-card">
      <div class="progress-info">
        <div class="stat-title">Workout</div>
        <div class="stat-subtitle">Completion</div>
      </div>
      <div class="radial-progress-wrapper ring-green">
        <span class="radial-value">85%</span>
      </div>
    </div>

    <!-- Meal Plan Completion Card -->
    <div class="card stat-card progress-card">
      <div class="progress-info">
        <div class="stat-title">Meal Plan</div>
        <div class="stat-subtitle">Completion</div>
      </div>
      <div class="radial-progress-wrapper ring-orange">
        <span class="radial-value">62%</span>
      </div>
    </div>
  </div>

  <!-- Goal Banner -->
  <div class="card goal-card">
    <span class="goal-text">Goal: Lose 5kg by Nov</span>
  </div>

  <!-- Hidden Radio Controls for View Toggling (Pure CSS Tab Switching) -->
  <input type="radio" id="view-week" class="toggle-radio-input" name="period-filter" checked>
  <input type="radio" id="view-month" class="toggle-radio-input" name="period-filter">

  <!-- Analytics Header & Toggle Filter -->
  <div class="analytics-header-row">
    <div class="section-title">Analytics</div>
    <div class="toggle-pill-container">
      <label for="view-week" class="toggle-tab tab-week-label">Week</label>
      <label for="view-month" class="toggle-tab tab-month-label">Month</label>
    </div>
  </div>

  <!-- Bar Chart Card -->
  <div class="card chart-card">
    <div class="chart-header">
      <span class="chart-title">Attendance Trend</span>
      <div class="chart-options-menu">•••</div>
    </div>

    <!-- Chart Visual Area -->
    <div class="chart-visual-area">
      <div class="chart-horizontal-gridlines">
        <div class="gridline"></div>
        <div class="gridline"></div>
      </div>

      <!-- 1. Week View Columns (Mon - Sun) -->
      <div class="chart-columns-container view-week-content">
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-50"></div></div>
          <span class="bar-day-label">Mon</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-68"></div></div>
          <span class="bar-day-label">Tue</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-light-gray bar-h-18"></div></div>
          <span class="bar-day-label">Wed</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-82"></div></div>
          <span class="bar-day-label">Thu</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-45"></div></div>
          <span class="bar-day-label">Fri</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-light-gray bar-h-28"></div></div>
          <span class="bar-day-label">Sat</span>
        </div>
        <div class="chart-bar-group">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-65"></div></div>
          <span class="bar-day-label">Sun</span>
        </div>
      </div>

      <!-- 2. Month View Columns (Jan - Dec) -->
      <div class="chart-columns-container view-month-content">
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-40"></div></div>
          <span class="bar-day-label">Jan</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-55"></div></div>
          <span class="bar-day-label">Feb</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-70"></div></div>
          <span class="bar-day-label">Mar</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-light-gray bar-h-25"></div></div>
          <span class="bar-day-label">Apr</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-60"></div></div>
          <span class="bar-day-label">May</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-85"></div></div>
          <span class="bar-day-label">Jun</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-75"></div></div>
          <span class="bar-day-label">Jul</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-90"></div></div>
          <span class="bar-day-label">Aug</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-light-gray bar-h-30"></div></div>
          <span class="bar-day-label">Sep</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-65"></div></div>
          <span class="bar-day-label">Oct</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-50"></div></div>
          <span class="bar-day-label">Nov</span>
        </div>
        <div class="chart-bar-group bar-group-month">
          <div class="bar-track"><div class="chart-bar bar-black bar-h-80"></div></div>
          <span class="bar-day-label">Dec</span>
        </div>
      </div>

    </div>
  </div>

</div>