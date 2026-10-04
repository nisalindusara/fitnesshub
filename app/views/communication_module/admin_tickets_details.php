<?php $pageStyles = ['staff/communication_module/_tickets', 'staff/communication_module/admin_tickets_details']; ?>

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