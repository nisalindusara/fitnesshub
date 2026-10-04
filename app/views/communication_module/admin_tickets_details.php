<?php $pageStyles = ['staff/communication_module/_tickets']; ?>
<style>
#ticket-detail-view {
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 0px;
  width: 100%;
  height: 832px;
  background: #FFFFFF;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  overflow: hidden;
}

/* Header & Breadcrumb */
.detail-header-bar {
  flex-shrink: 0;
  box-sizing: border-box;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 20px 32px;
  border-bottom: 1px solid #F0F2F5;
}

.breadcrumb-group {
  display: flex;
  align-items: center;
  gap: 10px;
}

.nav-back-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
  color: #6B7280;
  font-size: 13px;
  font-weight: 500;
  cursor: pointer;
}

.nav-back-link:hover {
  color: #1F2937;
}

.back-arrow {
  font-size: 15px;
}

.breadcrumb-divider {
  color: #D1D5DB;
  font-size: 13px;
}

.detail-ticket-id {
  font-size: 13px;
  font-weight: 600;
  color: #111827;
}

.header-action-group {
  display: flex;
  align-items: center;
  gap: 10px;
}

.btn-action-secondary {
  background: #FFFFFF;
  border: 1px solid #E5E7EB;
  border-radius: 6px;
  padding: 7px 14px;
  font-size: 12px;
  font-weight: 600;
  color: #374151;
  cursor: pointer;
}

.btn-action-secondary:hover {
  background: #F9FAFB;
}

.btn-action-primary {
  background: #111827;
  border: 1px solid #111827;
  border-radius: 6px;
  padding: 7px 14px;
  font-size: 12px;
  font-weight: 600;
  color: #FFFFFF;
  cursor: pointer;
}

.btn-action-primary:hover {
  background: #1F2937;
}

/* Two-column Layout */
.detail-body-wrapper {
  box-sizing: border-box;
  display: flex;
  width: 100%;
  height: 100%;
  overflow: hidden;
}

.detail-main-content {
  flex: 1;
  box-sizing: border-box;
  padding: 24px 32px;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.detail-sidebar {
  display: none;
}

/* Primary Content Header & Body */
.ticket-header-card {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.status-tags-row {
  display: flex;
  align-items: center;
  gap: 8px;
}

.badge-priority {
  font-size: 10px;
  font-weight: 600;
  padding: 2px 7px;
  border-radius: 4px;
}

.badge-status {
  font-size: 10px;
  font-weight: 600;
  padding: 2px 7px;
  border-radius: 4px;
}

.status-new {
  background: #EDE9FE;
  color: #7C3AED;
}

.ticket-heading-text {
  font-size: 20px;
  font-weight: 700;
  color: #111827;
  line-height: 1.3;
}

.ticket-metadata-line {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  color: #6B7280;
}

.user-inline-name {
  font-weight: 600;
  color: #374151;
}

.ticket-section-block {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.section-heading {
  font-size: 13px;
  font-weight: 600;
  color: #374151;
  text-transform: uppercase;
  letter-spacing: 0.03em;
}

.description-text {
  font-size: 13px;
  line-height: 1.6;
  color: #4B5563;
  background: #FAFAFA;
  border: 1px solid #F0F2F5;
  border-radius: 8px;
  padding: 16px;
}

/* Discussion & Comments */
.timeline-thread {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.timeline-item {
  background: #FFFFFF;
  border: 1px solid #E5E7EB;
  border-radius: 8px;
  padding: 14px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.comment-author-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.user-inline-group {
  display: flex;
  align-items: center;
  gap: 8px;
}

.author-name {
  font-size: 12px;
  font-weight: 600;
  color: #374151;
}

.comment-timestamp {
  font-size: 11px;
  color: #9CA3AF;
}

.comment-body {
  font-size: 13px;
  line-height: 1.5;
  color: #4B5563;
}

.reply-input-box {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: 8px;
}

.reply-textarea {
  width: 100%;
  box-sizing: border-box;
  min-height: 80px;
  border: 1px solid #D1D5DB;
  border-radius: 6px;
  padding: 10px;
  font-size: 13px;
  font-family: inherit;
  resize: vertical;
  outline: none;
}

.reply-textarea:focus {
  border-color: #3B82F6;
}

.reply-actions-row {
  display: flex;
  justify-content: flex-end;
}

/* Sidebar Styling */
.sidebar-box {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.sidebar-section-title {
  font-size: 12px;
  font-weight: 700;
  text-transform: uppercase;
  color: #6B7280;
  letter-spacing: 0.04em;
}

.property-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 12px;
}

.property-label {
  color: #6B7280;
}

.property-value {
  color: #1F2937;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.sidebar-divider {
  height: 1px;
  background-color: #E5E7EB;
  margin: 4px 0;
}

.indicator-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
}

[cite: 1]

.avatar {
  width: 22px;
  height: 22px;
  border-radius: 50%;
  font-size: 10px;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}
</style>

<div id="ticket-detail-view" class="ticket-view-container">
  <!-- Top Navigation / Breadcrumb Bar -->
  <div class="detail-header-bar">
    <div class="breadcrumb-group">
      <a href="/portal/support-tickets" class="nav-back-link">
        <span class="back-arrow">&larr;</span>
        <span class="back-text">Back to Tickets</span>
      </a>
      <span class="breadcrumb-divider">/</span>
      <span class="detail-ticket-id">TKT-001</span>[cite: 1]
    </div>
    <div class="header-action-group">
      <button class="btn-action-secondary">Share</button>
      <button class="btn-action-primary">Resolve Ticket</button>
    </div>
  </div>

  <!-- Main View Split -->
  <div class="detail-body-wrapper">
    <!-- Left Column: Primary Content & Activity -->
    <div class="detail-main-content">
      <div class="ticket-header-card">
        <div class="status-tags-row">
          <span class="badge-priority priority-urgent">Urgent</span>[cite: 1]
          <span class="badge-status status-new">New</span>[cite: 1]
          <span class="category-tag">Account Access</span>[cite: 1]
        </div>
        <div class="ticket-heading-text">Cannot access member portal after password reset</div>[cite: 1]
        <div class="ticket-metadata-line">
          <span class="meta-label">Submitted by</span>
          <span class="user-inline-name">Sarah Chen</span>[cite: 1]
          <span class="meta-label">&middot;</span>
          <span class="meta-label">2 hours ago</span>[cite: 1]
        </div>
      </div>

      <!-- Description Block -->
      <div class="ticket-section-block">
        <div class="section-heading">Description</div>
        <div class="description-text">
          Member reports receiving the password reset email and completing the reset flow successfully. However, upon redirecting to the login screen and entering the newly set credentials, an "Invalid token session / 401 Unauthorized" error displays and locks the entry. Clearing browser cookies and trying in incognito mode produced the same error.
        </div>
      </div>

      <!-- Activity & Thread Section -->
      <div class="ticket-section-block">
        <div class="section-heading">Discussion & Activity (3)</div>[cite: 1]
        <div class="timeline-thread">
          <!-- Comment 1 -->
          <div class="timeline-item">
            <div class="comment-author-row">
              <div class="user-inline-group">
                <span class="avatar avatar-pink">SC</span>[cite: 1]
                <span class="author-name">Sarah Chen</span>[cite: 1]
              </div>
              <span class="comment-timestamp">2h ago</span>[cite: 1]
            </div>
            <div class="comment-body">
              Attaching screenshot of the error modal on Chrome desktop. Can this be unlocked before my 5 PM training session today?
            </div>
          </div>

          <!-- Comment 2 -->
          <div class="timeline-item">
            <div class="comment-author-row">
              <div class="user-inline-group">
                <span class="avatar avatar-blue">LP</span>[cite: 1]
                <span class="author-name">Liam Petrov (Support)</span>
              </div>
              <span class="comment-timestamp">1h ago</span>
            </div>
            <div class="comment-body">
              Hi Sarah, I've manually cleared the stale auth session tokens on the database side. Could you try logging in one more time via the main portal?
            </div>
          </div>
        </div>

        <!-- Add Reply Form Box -->
        <div class="reply-input-box">
          <textarea class="reply-textarea" placeholder="Type your reply or internal note here..."></textarea>
          <div class="reply-actions-row">
            <button class="btn-action-primary">Send Response</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Sidebar Attributes -->
    <div class="detail-sidebar">
      <div class="sidebar-box">
        <div class="sidebar-section-title">Ticket Properties</div>

        <div class="property-row">
          <span class="property-label">Status</span>
          <span class="property-value">
            <span class="indicator-dot dot-purple"></span>[cite: 1]
            New[cite: 1]
          </span>
        </div>

        <div class="property-row">
          <span class="property-label">Priority</span>
          <span class="badge-priority priority-urgent">Urgent</span>[cite: 1]
        </div>

        <div class="property-row">
          <span class="property-label">Category</span>
          <span class="category-tag">Account Access</span>[cite: 1]
        </div>

        <div class="property-row">
          <span class="property-label">Assignee</span>
          <div class="user-inline-group">
            <span class="avatar avatar-yellow">JL</span>[cite: 1]
            <span class="property-value">Jordan Lee</span>[cite: 1]
          </div>
        </div>

        <div class="sidebar-divider"></div>

        <div class="sidebar-section-title">Customer Details</div>
        
        <div class="property-row">
          <span class="property-label">Name</span>
          <span class="property-value">Sarah Chen</span>[cite: 1]
        </div>

        <div class="property-row">
          <span class="property-label">Member ID</span>
          <span class="property-value">#MBR-9482</span>
        </div>

        <div class="property-row">
          <span class="property-label">Plan</span>
          <span class="property-value">Premium Annual</span>
        </div>
      </div>
    </div>
  </div>
</div>