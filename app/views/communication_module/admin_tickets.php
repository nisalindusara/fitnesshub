<style>
#support-board {
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 20px;
  width: 100%;
  height: 832px;
  background: #FFFFFF;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  overflow: hidden;
}

/* Top Navigation Bar */
.top-nav-bar {
  box-sizing: border-box;
  width: 100%;
  padding: 24px 32px 16px 32px;
  border-bottom: 1px solid #F0F2F5;
}

.page-title-group {
  display: flex;
  align-items: center;
  gap: 10px;
}

.icon-support {
  font-size: 18px;
  color: #374151;
  display: inline-flex;
  align-items: center;
}

.page-title-text {
  font-size: 15px;
  font-weight: 600;
  color: #1F2937;
}

/* Filter / Actions Bar */
.controls-bar {
  box-sizing: border-box;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 32px;
}

.filters-group {
  display: flex;
  align-items: center;
  gap: 6px;
}

.filter-label {
  font-size: 13px;
  color: #9CA3AF;
  margin-right: 4px;
}

.filter-btn {
  background: transparent;
  border: none;
  border-radius: 6px;
  padding: 5px 12px;
  font-size: 12px;
  font-weight: 500;
  color: #6B7280;
  cursor: pointer;
}

.filter-btn-active {
  background: #E5E7EB;
  color: #111827;
  font-weight: 600;
}

.actions-group {
  display: flex;
  align-items: center;
  gap: 14px;
}

.stats-text {
  font-size: 12px;
  color: #9CA3AF;
}

.add-ticket-btn {
  background: #E5E7EB;
  border: none;
  border-radius: 6px;
  padding: 6px 14px;
  font-size: 12px;
  font-weight: 600;
  color: #1F2937;
  cursor: pointer;
}

/* Columns Section */
.board-columns-wrapper {
  box-sizing: border-box;
  display: flex;
  gap: 16px;
  width: 100%;
  height: 100%;
  padding: 0 32px 32px 32px;
  overflow-x: auto;
}

.ticket-column {
  flex: 1;
  min-width: 230px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  background: #F8F9FA;
  border-radius: 10px;
  padding: 14px 12px;
}

.column-header {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 0 4px;
}

.col-indicator {
  width: 7px;
  height: 7px;
  border-radius: 50%;
}

.dot-purple { background-color: #8B5CF6; }
.dot-blue { background-color: #3B82F6; }
.dot-amber { background-color: #F59E0B; }
.dot-green { background-color: #10B981; }

.col-title {
  font-size: 13px;
  font-weight: 600;
  color: #374151;
}

.col-badge {
  background: #E5E7EB;
  color: #6B7280;
  border-radius: 10px;
  font-size: 11px;
  font-weight: 600;
  padding: 1px 7px;
}

/* Stack & Cards */
.cards-stack {
  display: flex;
  flex-direction: column;
  gap: 10px;
  overflow-y: auto;
}

.ticket-card {
  box-sizing: border-box;
  background: #FFFFFF;
  border-radius: 8px;
  padding: 12px;
  border: 1px solid #E5E7EB;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.card-meta-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.ticket-id {
  font-size: 11px;
  color: #9CA3AF;
  font-weight: 500;
}

.badge-priority {
  font-size: 10px;
  font-weight: 600;
  padding: 2px 6px;
  border-radius: 4px;
}

.priority-urgent {
  background: #FEE2E2;
  color: #DC2626;
}

.priority-high {
  background: #FFEDD5;
  color: #EA580C;
}

.priority-medium {
  background: #FEF3C7;
  color: #D97706;
}

.priority-low {
  background: #F3F4F6;
  color: #6B7280;
}

.card-title {
  font-size: 12px;
  line-height: 1.4;
  font-weight: 600;
  color: #1F2937;
}

.tag-row {
  display: flex;
  gap: 6px;
}

.category-tag {
  background: #F3F4F6;
  color: #6B7280;
  font-size: 10px;
  font-weight: 500;
  padding: 2px 7px;
  border-radius: 4px;
}

/* Footer / Users */
.card-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 4px;
}

.user-info {
  display: flex;
  align-items: center;
  gap: 6px;
}

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

.avatar-pink { background: #FCE7F3; color: #DB2777; }
.avatar-teal { background: #CCFBF1; color: #0D9488; }
.avatar-purple { background: #EDE9FE; color: #7C3AED; }
.avatar-yellow { background: #FEF3C7; color: #D97706; }
.avatar-indigo { background: #E0E7FF; color: #4F46E5; }
.avatar-orange { background: #FFEDD5; color: #EA580C; }
.avatar-red { background: #FEE2E2; color: #DC2626; }
.avatar-blue { background: #DBEAFE; color: #2563EB; }
.avatar-purple-light { background: #F3E8FF; color: #9333EA; }
.avatar-mint { background: #D1FAE5; color: #059669; }

.user-name {
  font-size: 11px;
  color: #4B5563;
}

.card-stats {
  display: flex;
  align-items: center;
  gap: 4px;
}

.comment-icon {
  font-size: 10px;
  opacity: 0.6;
}

.comment-count {
  font-size: 11px;
  color: #6B7280;
}

.time-ago {
  font-size: 11px;
  color: #9CA3AF;
  margin-left: 3px;
}

.ticket-link {
  color: #1F2937;
  text-decoration: none;
  cursor: pointer;
  display: inline-block;
}

/* Subtle hover feedback */
.ticket-link:hover {
  color: #111827;
  text-decoration: none;
}

/* Retains original capitalization */
.card-title {
  font-size: 12px;
  line-height: 1.4;
  font-weight: 600;
  color: #1F2937;
  text-transform: none;
}
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
            <a href="/admin/ticket_details" class="ticket-link">Cannot access member portal after password reset</a>
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