<style>
  /* Layout Root Container */
 #main-content {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    width: 100%;
    max-width: 100%;
    box-sizing: border-box;
    padding: 24px 32px;
    gap: 20px;
    background: #FFFFFF;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    color: #1F2937;
  }

  /* Top Navigation Bar */
  .top-nav-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    box-sizing: border-box;
  }

  .nav-left-section {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
  }

  .nav-icon {
    font-size: 15px;
    color: #6B7280;
    cursor: pointer;
  }

  .nav-breadcrumb-inactive {
    color: #9CA3AF;
  }

  .nav-breadcrumb-divider {
    color: #D1D5DB;
  }

  .nav-breadcrumb-active {
    color: #111827;
    font-weight: 500;
  }

  .nav-right-section {
    display: flex;
    align-items: center;
    gap: 16px;
  }

  .search-input-box {
    display: flex;
    align-items: center;
    background-color: #F3F4F6;
    padding: 6px 12px;
    border-radius: 8px;
    gap: 8px;
    font-size: 13px;
    color: #9CA3AF;
    width: 170px;
  }

  .search-shortcut {
    margin-left: auto;
    font-size: 11px;
    color: #9CA3AF;
  }

  .nav-action-icon {
    color: #6B7280;
    font-size: 15px;
    cursor: pointer;
  }

  /* Profile Header Card */
  .profile-header-card {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    width: 100%;
    box-sizing: border-box;
    padding-top: 4px;
  }

  .profile-left-details {
    display: flex;
    align-items: center;
    gap: 20px;
  }

 .profile-avatar-circle {
    width: 76px;
    height: 76px;
    border-radius: 50%;
    background-color: #F1F5F9;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    border: 1px solid #E2E8F0;
  } 
  
  .avatar-initials {
    font-size: 24px;
    font-weight: 700;
    color: #475569;
    letter-spacing: 0.5px;
    user-select: none;
  }

  .profile-meta-info {
    display: flex;
    flex-direction: column;
    gap: 6px;
  }

  .profile-user-name {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
  }

  .profile-contact-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
    font-size: 13px;
    color: #6B7280;
  }

  .detail-bold-value {
    color: #111827;
    font-weight: 700;
    margin-left: 4px;
  }

  .detail-inline-item {
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .profile-member-date {
    font-size: 12px;
    color: #9CA3AF;
  }

  .profile-actions-column {
    display: flex;
    flex-direction: column;
    gap: 8px;
  }

  .primary-btn-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background-color: #1F2937;
    color: #FFFFFF;
    border: none;
    padding: 8px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    min-width: 110px;
  }

  .secondary-btn-action {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    background-color: #FFFFFF;
    color: #374151;
    border: 1px solid #E5E7EB;
    padding: 7px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    min-width: 110px;
  }

  /* Divider */
  .divider-line {
    width: 100%;
    height: 1px;
    background-color: #E5E7EB;
    margin: 4px 0px;
  }

  /* Headings */
  .section-title-heading {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
  }

  /* Stat Cards Grid */
  .stat-metrics-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    width: 100%;
    box-sizing: border-box;
  }

  .stat-card {
    border-radius: 12px;
    padding: 22px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 115px;
    box-sizing: border-box;
  }

  .card-accent-blue {
    background-color: #EBF5FF;
  }

  .card-neutral-light {
    background-color: #F8FAFC;
  }

  .card-growth-light {
    background-color: #EEF2F6;
  }

  .stat-card-title {
    font-size: 13px;
    font-weight: 600;
    color: #374151;
  }

  .stat-card-value {
    font-size: 22px;
    font-weight: 700;
    color: #111827;
  }

  .growth-row-wrapper {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 8px;
  }

  .growth-badge {
    font-size: 11px;
    font-weight: 600;
    color: #374151;
  }

  /* Attendance Card & Bar Chart */
  .attendance-card-container {
    width: 100%;
    background-color: #F8FAFC;
    border-radius: 14px;
    padding: 24px 28px;
    display: flex;
    flex-direction: column;
    gap: 20px;
    box-sizing: border-box;
  }

  .attendance-card-header {
    font-size: 14px;
    font-weight: 600;
    color: #1F2937;
  }

  .chart-main-body {
    display: flex;
    height: 190px;
    width: 100%;
    position: relative;
    box-sizing: border-box;
  }

  .chart-y-axis-labels {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-bottom: 24px;
    padding-right: 14px;
    font-size: 11px;
    color: #9CA3AF;
    text-align: right;
    box-sizing: border-box;
  }

  .chart-columns-wrapper {
    display: flex;
    flex: 1;
    justify-content: space-around;
    align-items: flex-end;
    border-bottom: 1px solid #E2E8F0;
    padding-bottom: 24px;
    position: relative;
  }

  .chart-bar-column {
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100%;
    justify-content: flex-end;
    position: relative;
    width: 36px;
  }

  .bar-fill-track {
    display: flex;
    align-items: flex-end;
    height: 100%;
    width: 100%;
    justify-content: center;
  }

  .bar-pillar {
    width: 16px;
    border-radius: 3px;
  }

  .x-tick-label {
    position: absolute;
    bottom: -22px;
    font-size: 11px;
    color: #9CA3AF;
  }

  /* Bar Heights matching chart distribution */
  .bar-height-25 { height: 25%; }
  .bar-height-65 { height: 62%; }
  .bar-height-75 { height: 75%; }
  .bar-height-80 { height: 80%; }
  .bar-height-87 { height: 87%; }
  .bar-height-95 { height: 95%; }

  /* Bar Colors from mockup */
  .bar-color-purple { background-color: #93A5FE; }
  .bar-color-green  { background-color: #B2F0B8; }
  .bar-color-black  { background-color: #1F2937; }
  .bar-color-sky    { background-color: #A7E4FF; }
  .bar-color-slate  { background-color: #ADC3D1; }
  .bar-color-mint   { background-color: #97E9C4; }
</style>

<div id="main-content" class="main-container">
  <!-- Top Navigation / Breadcrumbs Bar -->
  <div class="top-nav-bar">
    <div class="nav-left-section">
      <span class="nav-icon">&#9638;</span>
      <span class="nav-icon">&#9734;</span>
      <span class="nav-breadcrumb-inactive">Messages</span>
      <span class="nav-breadcrumb-divider">/</span>
      <span class="nav-breadcrumb-active">Nisal's Profile</span>
    </div>
    <div class="nav-right-section">
      <div class="search-input-box">
        <span class="search-icon">&#128269;</span>
        <span class="search-placeholder">Search</span>
        <span class="search-shortcut">&#8984;/</span>
      </div>
      <span class="nav-action-icon">&#9788;</span>
      <span class="nav-action-icon">&#9881;</span>
      <span class="nav-action-icon">&#128276;</span>
      <span class="nav-action-icon">&#9639;</span>
    </div>
  </div>

  <!-- Profile Header Card -->
  <div class="profile-header-card">
    <div class="profile-left-details">
      <div class="profile-avatar-circle">
        <span class="avatar-initials">NI</span>
      </div>
      <div class="profile-meta-info">
        <div class="profile-user-name">Nisal Indusara</div>
        <div class="profile-contact-row">
          <span class="detail-label">Fitness Goal :</span>
          <span class="detail-bold-value">Endurance</span>
          <span class="detail-inline-item">
            <span class="detail-icon">&#9993;</span>
            <span class="detail-text">sarah.j@example.com</span>
          </span>
          <span class="detail-inline-item">
            <span class="detail-icon">&#9742;</span>
            <span class="detail-text">(555) 123-4567</span>
          </span>
        </div>
        <div class="profile-member-date">Member Since: 2024, Jul 08</div>
      </div>
    </div>
    <div class="profile-actions-column">
      <a href="/portal/messages" id="btn-message" class="primary-btn-action">
        <span class="btn-icon">&#9993;</span>
        <span class="btn-text">Message</span>
    </a>
        <span class="btn-icon">&#9993;</span>
        <span class="btn-text">Message</span>
      </button>
      <button id="btn-report" class="secondary-btn-action">
        <span class="btn-icon">&#9888;</span>
        <span class="btn-text">Report</span>
      </button>
    </div>
  </div>

  <div class="divider-line"></div>

  <!-- Session Details Heading -->
  <div class="section-title-heading">Session Details</div>

  <!-- Metric Stat Cards Grid (Projections vs Actuals omitted) -->
  <div class="stat-metrics-grid">
    <div class="stat-card card-accent-blue">
      <div class="stat-card-title">Next Session</div>
      <div class="stat-card-value">Tomorrow</div>
    </div>
    <div class="stat-card card-neutral-light">
      <div class="stat-card-title">Last Session</div>
      <div class="stat-card-value">7 days ago</div>
    </div>
    <div class="stat-card card-neutral-light">
      <div class="stat-card-title">Total Sessions</div>
      <div class="stat-card-value">695</div>
    </div>
    <div class="stat-card card-growth-light">
      <div class="stat-card-title">Growth</div>
      <div class="growth-row-wrapper">
        <span class="stat-card-value">30.1%</span>
        <span class="growth-badge">+6.08% &#10548;</span>
      </div>
    </div>
  </div>

  <!-- Attendance Chart Card -->
  <div class="attendance-card-container">
    <div class="attendance-card-header">Attendance</div>
    <div class="chart-main-body">
      <!-- Y-Axis Scale -->
      <div class="chart-y-axis-labels">
        <span class="y-tick-label">8</span>
        <span class="y-tick-label">4</span>
        <span class="y-tick-label">2</span>
        <span class="y-tick-label">0</span>
      </div>

      <!-- Bars Container with baseline grid line -->
      <div class="chart-columns-wrapper">
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-purple bar-height-25"></div>
          </div>
          <span class="x-tick-label">Jan</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-green bar-height-87"></div>
          </div>
          <span class="x-tick-label">Feb</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-black bar-height-80"></div>
          </div>
          <span class="x-tick-label">Mar</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-sky bar-height-95"></div>
          </div>
          <span class="x-tick-label">Apr</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-slate bar-height-65"></div>
          </div>
          <span class="x-tick-label">May</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-mint bar-height-87"></div>
          </div>
          <span class="x-tick-label">Jun</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-purple bar-height-75"></div>
          </div>
          <span class="x-tick-label">Jul</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-green bar-height-87"></div>
          </div>
          <span class="x-tick-label">Aug</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-black bar-height-80"></div>
          </div>
          <span class="x-tick-label">Sep</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-sky bar-height-95"></div>
          </div>
          <span class="x-tick-label">Oct</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-slate bar-height-65"></div>
          </div>
          <span class="x-tick-label">Nov</span>
        </div>
        <div class="chart-bar-column">
          <div class="bar-fill-track">
            <div class="bar-pillar bar-color-mint bar-height-87"></div>
          </div>
          <span class="x-tick-label">Dec</span>
        </div>
      </div>
    </div>
  </div>
</div>