<style>
/* Outer Body matching Figma frame constraints */
#help-support-container {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: flex-start;
  width: 100%;
  max-width: 900px;
  min-height: 814px;
  padding: 16px;
  gap: 10px;
  box-sizing: border-box;
  background-color: #e8e8e8;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  margin: 0 auto;
}

/* Header row */
.support-list-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 24px 20px 18px 20px;
  box-sizing: border-box;
}

.support-main-title {
  font-size: 22px;
  font-weight: 700;
  color: #111111;
  margin: 0;
}

/* Navigatable "New Request" Pill Button */
.support-new-request-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: #111111;
  color: #ffffff;
  padding: 10px 22px;
  border-radius: 9999px;
  font-size: 13.5px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.15s ease, transform 0.1s ease;
}

.support-new-request-btn:hover {
  background-color: #2b2b2b;
  transform: translateY(-1px);
}

.support-new-request-btn:active {
  transform: translateY(0);
}

/* List feed */
.support-tickets-list {
  display: flex;
  flex-direction: column;
  width: 100%;
  gap: 16px;
  box-sizing: border-box;
  padding: 0 16px 24px 16px;
}

/* Ticket Card */
.support-ticket-item {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  background-color: #ffffff;
  border-radius: 18px;
  padding: 22px 28px;
  box-sizing: border-box;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.03);
  text-decoration: none;
  color: inherit;
  transition: transform 0.15s ease, box-shadow 0.15s ease;
}

.support-ticket-item:hover {
  transform: translateY(-1px);
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
}

/* Ticket Content */
.ticket-content-left {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.ticket-item-title {
  font-size: 15.5px;
  font-weight: 700;
  color: #1a1a1a;
  margin: 0;
  line-height: 1.3;
}

.ticket-item-category {
  font-size: 13px;
  color: #71717a;
  margin: 0;
}

.ticket-item-date {
  font-size: 12px;
  color: #a1a1aa;
  margin-top: 4px;
}

/* Status Badges */
.ticket-badge-pill {
  font-size: 12px;
  font-weight: 600;
  padding: 5px 12px;
  border-radius: 9999px;
  white-space: nowrap;
}

.ticket-badge-resolved {
  background-color: #f0fdf4;
  color: #22c55e;
}

.ticket-badge-progress {
  background-color: #fffbeb;
  color: #f59e0b;
}

.ticket-badge-open {
  background-color: #eff6ff;
  color: #3b82f6;
}
</style>

<div id="help-support-container">
  
  <!-- Header Bar -->
  <div class="support-list-header">
    <h1 class="support-main-title">Help & Support</h1>
    <a href="/communication/user-ticketForm" class="support-new-request-btn" title="Create New Support Request">
      New Request
    </a>
  </div>

  <!-- Tickets Feed -->
  <div class="support-tickets-list">
    
    <!-- Ticket 1: Resolved -->
    <div class="support-ticket-item">
      <div class="ticket-content-left">
        <h2 class="ticket-item-title">Unable to access locker room after 9pm</h2>
        <span class="ticket-item-category">Facility</span>
        <span class="ticket-item-date">Submitted Sep 10, 2026</span>
      </div>
      <span class="ticket-badge-pill ticket-badge-resolved">Resolved</span>
    </div>

    <!-- Ticket 2: In Progress -->
    <div class="support-ticket-item">
      <div class="ticket-content-left">
        <h2 class="ticket-item-title">Incorrect charge on my September invoice</h2>
        <span class="ticket-item-category">Billing</span>
        <span class="ticket-item-date">Submitted Sep 12, 2026</span>
      </div>
      <span class="ticket-badge-pill ticket-badge-progress">In Progress</span>
    </div>

    <!-- Ticket 3: Open -->
    <div class="support-ticket-item">
      <div class="ticket-content-left">
        <h2 class="ticket-item-title">Spin class was not reflected in my bookings</h2>
        <span class="ticket-item-category">Class Booking</span>
        <span class="ticket-item-date">Submitted Sep 14, 2026</span>
      </div>
      <span class="ticket-badge-pill ticket-badge-open">Open</span>
    </div>

    <!-- Ticket 4: Open -->
    <div class="support-ticket-item">
      <div class="ticket-content-left">
        <h2 class="ticket-item-title">Treadmill #4 belt is slipping</h2>
        <span class="ticket-item-category">Equipment</span>
        <span class="ticket-item-date">Submitted Sep 15, 2026</span>
      </div>
      <span class="ticket-badge-pill ticket-badge-open">Open</span>
    </div>

  </div>

</div>