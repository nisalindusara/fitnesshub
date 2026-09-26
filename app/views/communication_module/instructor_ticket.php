<style>
/* Container */
#main-content-container.main-container {
  display: flex;
  flex-direction: column;
  align-items: stretch;
  padding: 0px 28px 24px 28px;
  gap: 20px;
  width: 1068px;
  box-sizing: border-box;
  background: #ffffff;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  color: #111827;
}

/* Breadcrumb Header */
.breadcrumb-bar {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 16px 0 14px 0;
  border-bottom: 1px solid #f0f0f2;
}

.back-nav-btn {
  background: transparent;
  border: none;
  padding: 0;
  margin: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  color: #374151;
}

.nav-arrow-icon {
  width: 16px;
  height: 16px;
}

.breadcrumb-trail {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 13.5px;
}

.crumb-dimmed {
  color: #9ca3af;
  font-weight: 500;
}

.crumb-separator {
  color: #d1d5db;
  font-size: 13px;
}

.crumb-active {
  color: #111827;
  font-weight: 600;
}

/* Sections */
.section-block {
  display: flex;
  flex-direction: column;
  width: 100%;
}

.section-title {
  margin: 0 0 14px 0;
  font-size: 14px;
  font-weight: 700;
  color: #1f2937;
}

/* Form Card Area */
.request-form-card {
  background: #f8fafc;
  border: 1px solid #f1f5f9;
  border-radius: 12px;
  padding: 20px 24px 20px 24px;
  box-sizing: border-box;
}

.request-entry-form {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
  width: 100%;
}

.form-group-sm {
  width: 40%;
}

.form-label {
  font-size: 12px;
  font-weight: 500;
  color: #6b7280;
}

.input-container {
  width: 100%;
}

.text-input,
.text-area-input {
  width: 100%;
  box-sizing: border-box;
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  padding: 9px 12px;
  font-size: 13px;
  color: #1f2937;
  outline: none;
  font-family: inherit;
}

.text-input::placeholder,
.text-area-input::placeholder {
  color: #94a3b8;
  font-size: 13px;
}

.text-area-input {
  resize: vertical;
  min-height: 80px;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
  margin-top: 2px;
}

.btn-submit {
  background-color: #111827;
  color: #ffffff;
  border: none;
  border-radius: 8px;
  padding: 8px 24px;
  font-size: 13px;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.05);
}

/* Requests List Area */
.requests-list-block {
  margin-top: 4px;
}

.request-list-header {
  display: flex;
  align-items: center;
  padding: 0 8px 10px 8px;
  border-bottom: 1px solid #edf2f7;
  color: #9ca3af;
  font-size: 12px;
  font-weight: 500;
}

.header-col.col-main {
  flex: 1;
}

.header-col.col-date {
  width: 190px;
  text-align: right;
  padding-right: 48px;
}

.header-col.col-status {
  width: 110px;
  text-align: right;
}

.request-list-items {
  display: flex;
  flex-direction: column;
}

.request-row-item {
  display: flex;
  align-items: center;
  padding: 13px 8px;
  border-bottom: 1px solid #f1f5f9;
}

.row-left-content {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  flex: 1;
}

.row-expand-arrow {
  color: #9ca3af;
  font-size: 16px;
  line-height: 1.1;
  font-weight: 400;
  user-select: none;
}

.row-info-wrap {
  display: flex;
  flex-direction: column;
  gap: 3px;
}

.row-primary-text {
  font-size: 13px;
  font-weight: 500;
  color: #1e293b;
}

.row-secondary-text {
  font-size: 11.5px;
  color: #94a3b8;
}

.row-date-text {
  width: 190px;
  text-align: right;
  padding-right: 48px;
  font-size: 11.5px;
  color: #94a3b8;
}

.row-badge-wrap {
  width: 110px;
  display: flex;
  justify-content: flex-end;
}

/* Badges */
.badge {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 10px;
  border-radius: 9999px;
  font-size: 11px;
  font-weight: 600;
}

.badge-dot {
  width: 5px;
  height: 5px;
  border-radius: 50%;
}

/* Approved Status */
.badge-approved {
  background-color: #dcfce7;
  color: #15803d;
}

.dot-approved {
  background-color: #22c55e;
}

/* Under Review Status */
.badge-review {
  background-color: #e0f2fe;
  color: #0369a1;
}

.dot-review {
  background-color: #0ea5e9;
}

/* Pending Status */
.badge-pending {
  background-color: #fef9c3;
  color: #a16207;
}

.dot-pending {
  background-color: #eab308;
}
</style>

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
            <input type="text" id="request-type" class="text-input" value="Leave Request" />
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