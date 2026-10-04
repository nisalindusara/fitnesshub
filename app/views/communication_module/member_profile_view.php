<?php $pageStyles = ['staff/communication_module/member_profile_view']; ?>

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