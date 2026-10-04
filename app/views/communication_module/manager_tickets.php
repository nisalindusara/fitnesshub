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

/* Filter Controls Layout */
.filter-controls-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding: 12px 0;
  box-sizing: border-box;
}

.filter-dropdowns-group {
  display: flex;
  align-items: center;
  gap: 20px;
}

.dropdown-wrapper {
  display: flex;
  align-items: center;
  gap: 8px;
}

.filter-label {
  font-size: 13px;
  font-weight: 500;
  color: #64748b;
}

.custom-filter-select {
  appearance: none;
  -webkit-appearance: none;
  background-color: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 8px;
  padding: 6px 32px 6px 12px;
  font-size: 13px;
  font-weight: 500;
  color: #1e293b;
  cursor: pointer;
  outline: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2364748b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 10px center;
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}

.custom-filter-select:hover {
  border-color: #cbd5e1;
}

.custom-filter-select:focus {
  border-color: #3b82f6;
  box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
}

.filter-summary-actions {
  display: flex;
  align-items: center;
  gap: 16px;
}

.ticket-count-summary {
  font-size: 13px;
  color: #94a3b8;
}

.btn-create-ticket {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background-color: #1e293b;
  color: #ffffff;
  border: none;
  border-radius: 8px;
  padding: 8px 14px;
  font-size: 13px;
  font-weight: 500;
  cursor: pointer;
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
  <!-- Top Filter Bar with Dropdowns -->
<div class="filter-controls-bar">
    <div class="filter-dropdowns-group">
        <!-- Priority Filter Dropdown -->
        <div class="dropdown-wrapper">
        <label for="filter-priority" class="filter-label">Priority:</label>
        <select id="filter-priority" class="custom-filter-select">
            <option value="all">All Priorities</option>
            <option value="urgent">Urgent</option>
            <option value="high">High</option>
            <option value="medium">Medium</option>
            <option value="low">Low</option>
        </select>
        </div>

        <!-- Category / Type Filter Dropdown -->
        <div class="dropdown-wrapper">
        <label for="filter-type" class="filter-label">Type:</label>
        <select id="filter-type" class="custom-filter-select">
            <option value="all">All Types</option>
            <option value="leave">Leave Request</option>
            <option value="account">Immediate Leave Request</option>
        </select>
        </div>
    </div>

    <div class="filter-summary-actions">
        <span class="ticket-count-summary">11 total &bull; 3 open</span>
        <button id="btn-new-ticket" class="btn-create-ticket">
        <span class="btn-plus-icon">&#43;</span>
        <span class="btn-label-text">New ticket</span>
        </button>
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
            <a href="/portal/leave-requests/review?id=2" class="ticket-link">Sudden medical emergency - Class coverage neede for today</a>
         </div>
          <div class="tag-row">
            <span class="category-tag">Immediate Leave</span>
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
          <div class="card-title">Sick leave request (2 days) with doctor prescription attached</div>
          <div class="tag-row">
            <span class="category-tag">Leave request</span>
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
          <div class="card-title">Annual personal vacation leave request</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
          <div class="card-title">One day leave request for doctor appointment</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
          <div class="card-title">Mutual shift swap request with Coach Sarah</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
          <div class="card-title">Casual leave application for upcoming religious holliday</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
          <div class="card-title">Scheduled knee arthroscopy and post-op recovery</div>
          <div class="tag-row">
            <span class="category-tag">Immediate Leave</span>
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
          <div class="card-title">Personal emergency leave request for Friday afternoon slot</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
          <div class="card-title">Duty leave request</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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
            <span class="badge-priority priority-urgent">Urgent</span>
          </div>
          <div class="card-title">Family bereavement leave request</div>
          <div class="tag-row">
            <span class="category-tag">Immediate Leave</span>
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
          <div class="card-title">recertification training leave request</div>
          <div class="tag-row">
            <span class="category-tag">Leave Request</span>
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