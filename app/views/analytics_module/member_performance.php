<?php $pageStyles = ['staff/analytics_module/member_performance']; ?>

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