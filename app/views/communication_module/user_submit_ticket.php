<?php $pageStyles = ['member/communication_module/user_submit_ticket']; ?>

<div id="help-support-container">

  <!-- Heading -->
  <header class="support-list-header">
    <div>
      <h1 class="support-main-title">Help &amp; Support</h1>
      <p class="support-subtitle">3 requests waiting on the team</p>
    </div>
    <a href="/member/support/new" class="support-new-request-btn">
      <svg class="support-btn-icon" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 5v14M5 12h14"></path>
      </svg>
      New request
    </a>
  </header>

  <?php if (!empty($submitted)): ?>
    <p class="support-submitted" role="status">Your request was sent. The team usually replies within a day.</p>
  <?php endif; ?>

  <!-- Requests -->
  <section class="support-card" aria-label="Your support requests">

    <h2 class="support-group-title">Active</h2>
    <ul class="support-tickets-list">
      <li class="support-ticket-item">
        <span class="ticket-status-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M6 20V9m12 11V9M4 9h16M9 9V5h6v4"></path>
          </svg>
        </span>
        <div class="ticket-content-left">
          <h3 class="ticket-item-title">Treadmill #4 belt is slipping</h3>
          <p class="ticket-item-meta">Equipment, submitted 15 September 2026</p>
        </div>
        <p class="ticket-status">Open</p>
      </li>

      <li class="support-ticket-item">
        <span class="ticket-status-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="16" rx="2"></rect>
            <path d="M16 3v4M8 3v4M3 10h18"></path>
          </svg>
        </span>
        <div class="ticket-content-left">
          <h3 class="ticket-item-title">Spin class was not reflected in my bookings</h3>
          <p class="ticket-item-meta">Class booking, submitted 14 September 2026</p>
        </div>
        <p class="ticket-status">Open</p>
      </li>

      <li class="support-ticket-item">
        <span class="ticket-status-icon ticket-status-icon--progress" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <rect x="3" y="5" width="18" height="14" rx="2"></rect>
            <path d="M3 10h18M7 15h4"></path>
          </svg>
        </span>
        <div class="ticket-content-left">
          <h3 class="ticket-item-title">Incorrect charge on my September invoice</h3>
          <p class="ticket-item-meta">Billing, submitted 12 September 2026</p>
        </div>
        <p class="ticket-status ticket-status--progress">In progress</p>
      </li>
    </ul>

    <h2 class="support-group-title">Resolved</h2>
    <ul class="support-tickets-list">
      <li class="support-ticket-item">
        <span class="ticket-status-icon ticket-status-icon--resolved" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M5 21V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v17M3 21h18"></path>
            <path d="M14 12h.01"></path>
          </svg>
        </span>
        <div class="ticket-content-left">
          <h3 class="ticket-item-title">Unable to access locker room after 9pm</h3>
          <p class="ticket-item-meta">Facility, submitted 10 September 2026</p>
        </div>
        <p class="ticket-status ticket-status--resolved">Resolved</p>
      </li>
    </ul>

  </section>

</div>