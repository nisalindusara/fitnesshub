<?php $pageStyles = ['staff/communication_module/_tickets']; ?>
<style>
/* Top Navigation Bar */

.icon-support {
  font-size: 18px;
  color: #374151;
  display: inline-flex;
  align-items: center;
}

/* Filter / Actions Bar */

.filter-label {
  font-size: 13px;
  color: #9CA3AF;
  margin-right: 4px;
}

/* Columns Section */

/* Stack & Cards */

.badge-priority {
  font-size: 10px;
  font-weight: 600;
  padding: 2px 6px;
  border-radius: 4px;
}

/* Footer / Users */

.avatar {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  font-size: 9px;
  font-weight: 700;
  display: inline-flex;
  align-items: center;
  justify-content: center;
}

/* Subtle hover feedback */

/* Retains original capitalization */
</style>

<div id="support-board" class="board-container">
  <!-- Header Bar -->
  <div class="top-nav-bar">
    <div class="page-title-group">
      <span class="icon-support">◫</span>
      <span class="page-title-text">Support</span>
    </div>
  </div>

  <!-- Controls / Filter Bar -->
  <div class="controls-bar">
    <div class="filters-group">
      <span class="filter-label">Filter:</span>
      <button class="filter-btn filter-btn-active">All Tickets</button>
      <button class="filter-btn">Urgent</button>
      <button class="filter-btn">High</button>
      <button class="filter-btn">Medium</button>
      <button class="filter-btn">Low</button>
    </div>
    <div class="actions-group">
      <span class="stats-text">11 total &middot; 6 open</span>
      <button class="add-ticket-btn">+ New ticket</button>
    </div>
  </div>

  <!-- Columns Board -->
  <div class="board-columns-wrapper">
    
    <!-- Column: New -->
    <div class="ticket-column">
      <div class="column-header">
        <span class="col-indicator dot-purple"></span>
        <span class="col-title">New</span>
        <span class="col-badge">3</span>
      </div>
      <div class="cards-stack">
        <!-- Card 1 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-001</span>
            <span class="badge-priority priority-urgent">Urgent</span>
          </div>
          <div class="card-title">
            <a href="/portal/support-tickets/view" class="ticket-link">Cannot access member portal after password reset</a>
         </div>
          <div class="tag-row">
            <span class="category-tag">Account Access</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-pink">SC</span>
              <span class="user-name">Sarah Chen</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">3</span>
              <span class="time-ago">2h ago</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-002</span>
            <span class="badge-priority priority-high">High</span>
          </div>
          <div class="card-title">Billing charge not matching membership plan</div>
          <div class="tag-row">
            <span class="category-tag">Billing</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-teal">MW</span>
              <span class="user-name">Marcus Webb</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">1</span>
              <span class="time-ago">4h ago</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-003</span>
            <span class="badge-priority priority-medium">Medium</span>
          </div>
          <div class="card-title">Class booking shows unavailable slots</div>
          <div class="tag-row">
            <span class="category-tag">Bookings</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-purple">PN</span>
              <span class="user-name">Priya Nair</span>
            </div>
            <div class="card-stats">
              <span class="time-ago">6h ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Column: Open -->
    <div class="ticket-column">
      <div class="column-header">
        <span class="col-indicator dot-blue"></span>
        <span class="col-title">Open</span>
        <span class="col-badge">3</span>
      </div>
      <div class="cards-stack">
        <!-- Card 1 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-004</span>
            <span class="badge-priority priority-high">High</span>
          </div>
          <div class="card-title">App crashes when viewing attendance history</div>
          <div class="tag-row">
            <span class="category-tag">Technical</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-yellow">JL</span>
              <span class="user-name">Jordan Lee</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">5</span>
              <span class="time-ago">1d ago</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-005</span>
            <span class="badge-priority priority-low">Low</span>
          </div>
          <div class="card-title">Unable to update emergency contact info</div>
          <div class="tag-row">
            <span class="category-tag">Profile</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-indigo">AT</span>
              <span class="user-name">Amelia Torres</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">2</span>
              <span class="time-ago">1d ago</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-006</span>
            <span class="badge-priority priority-medium">Medium</span>
          </div>
          <div class="card-title">Locker assignment not showing on member card</div>
          <div class="tag-row">
            <span class="category-tag">Facility</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-orange">EB</span>
              <span class="user-name">Ethan Brooks</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">4</span>
              <span class="time-ago">2d ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Column: In Progress -->
    <div class="ticket-column">
      <div class="column-header">
        <span class="col-indicator dot-amber"></span>
        <span class="col-title">In Progress</span>
        <span class="col-badge">3</span>
      </div>
      <div class="cards-stack">
        <!-- Card 1 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-007</span>
            <span class="badge-priority priority-urgent">Urgent</span>
          </div>
          <div class="card-title">Duplicate charge for November membership</div>
          <div class="tag-row">
            <span class="category-tag">Billing</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-red">NO</span>
              <span class="user-name">Nina Okafor</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">8</span>
              <span class="time-ago">3d ago</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-008</span>
            <span class="badge-priority priority-high">High</span>
          </div>
          <div class="card-title">QR code for gym entry not scanning</div>
          <div class="tag-row">
            <span class="category-tag">Access</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-blue">LP</span>
              <span class="user-name">Liam Petrov</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">6</span>
              <span class="time-ago">3d ago</span>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-009</span>
            <span class="badge-priority priority-low">Low</span>
          </div>
          <div class="card-title">Trainer session notes not visible in app</div>
          <div class="tag-row">
            <span class="category-tag">Classes</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-purple-light">ZK</span>
              <span class="user-name">Zoe Kim</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">2</span>
              <span class="time-ago">4d ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Column: Resolved -->
    <div class="ticket-column">
      <div class="column-header">
        <span class="col-indicator dot-green"></span>
        <span class="col-title">Resolved</span>
        <span class="col-badge">2</span>
      </div>
      <div class="cards-stack">
        <!-- Card 1 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-010</span>
            <span class="badge-priority priority-medium">Medium</span>
          </div>
          <div class="card-title">Referral discount not applied to account</div>
          <div class="tag-row">
            <span class="category-tag">Billing</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-teal">RM</span>
              <span class="user-name">Raj Mehta</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">4</span>
              <span class="time-ago">5d ago</span>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="ticket-card">
          <div class="card-meta-row">
            <span class="ticket-id">TKT-011</span>
            <span class="badge-priority priority-low">Low</span>
          </div>
          <div class="card-title">Forgot to cancel before trial ended</div>
          <div class="tag-row">
            <span class="category-tag">Membership</span>
          </div>
          <div class="card-footer">
            <div class="user-info">
              <span class="avatar avatar-mint">CM</span>
              <span class="user-name">Chloe Martin</span>
            </div>
            <div class="card-stats">
              <span class="comment-icon">💬</span>
              <span class="comment-count">3</span>
              <span class="time-ago">6d ago</span>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>