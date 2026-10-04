<?php $pageStyles = ['staff/communication_module/instructor_ticket']; ?>

<div id="main-content-container" class="main-container">
  <!-- Top Navigation / Breadcrumb Header -->
  <div class="breadcrumb-bar">
    <button type="button" class="back-nav-btn" aria-label="Back">
      <svg class="nav-arrow-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="15 18 9 12 15 6"></polyline>
      </svg>
    </button>
    <div class="breadcrumb-trail">
      <span class="crumb-dimmed">Dashboard</span>
      <span class="crumb-separator">/</span>
      <span class="crumb-active">Leave &amp; Requests</span>
    </div>
  </div>

  <!-- Form Section -->
  <section class="section-block">
    <h2 class="section-title">New Request</h2>
    <div class="request-form-card">
      <form class="request-entry-form" onsubmit="return false;">
        <div class="form-group form-group-sm">
          <label class="form-label" for="request-type">Type</label>
          <div class="input-container">
            <select id="request-type" name="request_type" class="text-input custom-select-input">
              <option value="Leave Request" selected>Immediate Leave Request</option>
              <option value="Account Access">Leave Request</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="request-subject">Subject</label>
          <div class="input-container">
            <input type="text" id="request-subject" class="text-input" placeholder="Brief title of your request" />
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="request-description">Description</label>
          <div class="input-container">
            <textarea id="request-description" class="text-area-input" rows="3" placeholder="Describe the situation or reason in detail..."></textarea>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" id="btn-submit-request" class="btn-submit">Submit</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Requests List Section -->
  <section class="section-block requests-list-block">
    <h2 class="section-title">My Requests</h2>

    <!-- Table Header -->
    <div class="request-list-header">
      <div class="header-col col-main">Subject</div>
      <div class="header-col col-date">Submitted</div>
      <div class="header-col col-status">Status</div>
    </div>

    <!-- Rows -->
    <div class="request-list-items">
      <!-- Item 1 -->
      <div class="request-row-item">
        <div class="row-left-content">
          <span class="row-expand-arrow">›</span>
          <div class="row-info-wrap">
            <div class="row-primary-text">Sick leave – fever and fatigue</div>
            <div class="row-secondary-text">Leave Request · REQ-0041</div>
          </div>
        </div>
        <div class="row-date-text">Sep 20, 2026 · 9:14 AM</div>
        <div class="row-badge-wrap">
          <span class="badge badge-approved">
            <span class="badge-dot dot-approved"></span>
            Approved
          </span>
        </div>
      </div>

      <!-- Item 2 -->
      <div class="request-row-item">
        <div class="row-left-content">
          <span class="row-expand-arrow">›</span>
          <div class="row-info-wrap">
            <div class="row-primary-text">Swap Saturday 6PM Spin class to Sunday 8AM</div>
            <div class="row-secondary-text">Schedule Change · REQ-0039</div>
          </div>
        </div>
        <div class="row-date-text">Sep 14, 2026 · 11:02 AM</div>
        <div class="row-badge-wrap">
          <span class="badge badge-approved">
            <span class="badge-dot dot-approved"></span>
            Approved
          </span>
        </div>
      </div>

      <!-- Item 3 -->
      <div class="request-row-item">
        <div class="row-left-content">
          <span class="row-expand-arrow">›</span>
          <div class="row-info-wrap">
            <div class="row-primary-text">Spin room bike #4 brake calibration needed</div>
            <div class="row-secondary-text">Facility Concern · REQ-0037</div>
          </div>
        </div>
        <div class="row-date-text">Sep 10, 2026 · 6:30 PM</div>
        <div class="row-badge-wrap">
          <span class="badge badge-review">
            <span class="badge-dot dot-review"></span>
            Under Review
          </span>
        </div>
      </div>

      <!-- Item 4 -->
      <div class="request-row-item">
        <div class="row-left-content">
          <span class="row-expand-arrow">›</span>
          <div class="row-info-wrap">
            <div class="row-primary-text">Request for updated class registration forms</div>
            <div class="row-secondary-text">General Matter · REQ-0035</div>
          </div>
        </div>
        <div class="row-date-text">Sep 3, 2026 · 10:45 AM</div>
        <div class="row-badge-wrap">
          <span class="badge badge-pending">
            <span class="badge-dot dot-pending"></span>
            Pending
          </span>
        </div>
      </div>
    </div>
  </section>
</div>