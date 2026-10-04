<?php $pageStyles = ['staff/communication_module/_tickets', 'staff/communication_module/manager_tickets']; ?>

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