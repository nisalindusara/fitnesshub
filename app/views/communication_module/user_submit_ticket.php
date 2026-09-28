<style>
  /* Help & Support – page content (id/class selectors only)
   Font (Plus Jakarta Sans), page background and chrome come from member-layout.
   Fills the space between the header and the dock with an equal gap above and below,
   so the page never scrolls. Long lists scroll inside the card.

   Icon = request category. Status colour is carried by the icon and the status text
   green  resolved
   amber  in progress
   grey   open, waiting for the team */

  #help-support-container {
    --ink: #18181b;
    --muted: #64748b;
    --line: #ececef;
    --card: #ffffff;
    --track: #f3f4f6;
    --green: #1e8e5a;
    --green-dark: #17744a;
    --green-soft: #e6f4ec;
    --amber: #d08a0b;
    --amber-text: #9a6406;
    --amber-soft: #fdf1dc;

    box-sizing: border-box;
    width: min(100%, 960px);
    display: flex;
    flex-direction: column;
    gap: 16px;
    /* member-layout padding is 108px top / 128px bottom; header 76px, dock ~76px */
    height: calc(100vh - 200px);
    height: calc(100dvh - 200px);
    margin: -8px 0 -28px;
    font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
    color: var(--ink);
  }

  /* ---------- Heading ---------- */
  .support-list-header {
    flex: none;
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 16px;
  }

  .support-main-title {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 700;
    letter-spacing: -0.02em;
  }

  .support-subtitle {
    margin: 4px 0 0;
    font-size: 0.95rem;
    color: var(--muted);
  }

  .support-new-request-btn {
    flex: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    height: 46px;
    padding: 0 20px;
    border-radius: 12px;
    background: var(--green);
    color: #fff;
    font-size: 0.92rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.15s ease;
  }

  .support-new-request-btn:hover {
    background: var(--green-dark);
  }

  .support-new-request-btn:focus-visible {
    outline: 2.5px solid var(--green);
    outline-offset: 3px;
  }

  .support-btn-icon {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.4;
    stroke-linecap: round;
  }

  /* ---------- Card (scrolls inside when long) ---------- */
  .support-card {
    flex: 1;
    min-height: 0;
    padding: 8px 24px;
    border-radius: 20px;
    background: var(--card);
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
    overflow-y: auto;
  }

  .support-card::-webkit-scrollbar {
    width: 6px;
  }

  .support-card::-webkit-scrollbar-thumb {
    border-radius: 999px;
    background: #d6d9df;
  }

  .support-group-title {
    margin: 18px 0 4px;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--muted);
  }

  .support-tickets-list {
    margin: 0 0 8px;
    padding: 0;
    list-style: none;
  }

  /* ---------- Ticket row ---------- */
  .support-ticket-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid var(--line);
  }

  .support-tickets-list .support-ticket-item:last-child {
    border-bottom: 0;
  }

  .ticket-status-icon {
    flex: none;
    width: 44px;
    height: 44px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--track);
  }

  .ticket-status-icon svg {
    width: 20px;
    height: 20px;
    fill: none;
    stroke: var(--muted);
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .ticket-status-icon--resolved {
    background: var(--green-soft);
  }

  .ticket-status-icon--resolved svg {
    stroke: var(--green);
  }

  .ticket-status-icon--progress {
    background: var(--amber-soft);
  }

  .ticket-status-icon--progress svg {
    stroke: var(--amber-text);
  }

  .ticket-content-left {
    flex: 1;
    min-width: 0;
  }

  .ticket-item-title {
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.35;
  }

  .ticket-item-meta {
    margin: 4px 0 0;
    font-size: 0.85rem;
    color: var(--muted);
  }

  .ticket-status {
    flex: none;
    margin: 0;
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--muted);
    text-align: right;
  }

  .ticket-status--resolved {
    color: var(--green);
  }

  .ticket-status--progress {
    color: var(--amber-text);
  }

  /* ---------- Mobile (member-layout header is 64px here) ---------- */
  @media (max-width: 768px) {
    #help-support-container {
      height: calc(100vh - 158px);
      height: calc(100dvh - 158px);
      margin: -28px 0 -50px;
    }
  }

  @media (max-width: 520px) {
    #help-support-container {
      gap: 12px;
      height: calc(100vh - 178px);
      height: calc(100dvh - 178px);
      margin: -28px 0 -30px;
    }

    .support-main-title {
      font-size: 1.35rem;
      white-space: nowrap;
    }

    .support-subtitle {
      font-size: 0.85rem;
    }

    .support-new-request-btn {
      height: 42px;
      padding: 0 14px;
      font-size: 0.85rem;
    }

    .support-card {
      padding: 4px 16px;
      border-radius: 18px;
    }

    .support-ticket-item {
      flex-wrap: wrap;
      gap: 12px;
    }

    .ticket-status-icon {
      width: 38px;
      height: 38px;
    }

    .ticket-content-left {
      flex-basis: calc(100% - 50px);
    }

    .ticket-status {
      width: 100%;
      margin-top: -8px;
      padding-left: 50px;
      text-align: left;
    }
  }

  @media (prefers-reduced-motion: reduce) {
    .support-new-request-btn {
      transition: none;
    }
  }
</style>

<div id="help-support-container">

  <!-- Heading -->
  <header class="support-list-header">
    <div>
      <h1 class="support-main-title">Help &amp; Support</h1>
      <p class="support-subtitle">3 requests waiting on the team</p>
    </div>
    <a href="/communication/user-ticketForm" class="support-new-request-btn">
      <svg class="support-btn-icon" viewBox="0 0 24 24" aria-hidden="true">
        <path d="M12 5v14M5 12h14"></path>
      </svg>
      New request
    </a>
  </header>

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