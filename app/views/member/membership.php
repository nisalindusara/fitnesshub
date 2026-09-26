<style>
  .membership-page {
    width: min(92%, 760px);
    align-self: flex-start;
    max-height: 100%;
    overflow-y: auto;
    padding: 32px 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .membership-title {
    font-size: 22px;
    font-weight: 600;
    color: var(--color-text-primary);
    letter-spacing: -0.01em;
    margin-bottom: 4px;
  }

  .plan-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 16px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 28px;
  }

  .plan-card-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
  }

  .plan-name {
    font-size: 17px;
    font-weight: 600;
    color: var(--color-text-primary);
    margin-bottom: 4px;
  }

  .plan-expiry {
    font-size: 13px;
    color: var(--color-text-muted);
  }

  .status-badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 9999px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.04em;
    text-transform: uppercase;
    color: #FFFFFF;
    background: #15803D;
    white-space: nowrap;
  }

  .status-badge.expired {
    background: #B91C1C;
  }

  .btn-outline {
    align-self: flex-start;
    display: inline-flex;
    align-items: center;
    padding: 10px 20px;
    border: 1px solid #18181B;
    border-radius: 10px;
    background: transparent;
    color: var(--color-text-primary);
    font-family: inherit;
    font-size: 14px;
    font-weight: 500;
    text-decoration: none;
    transition: background-color 0.15s ease;
  }

  .btn-outline:hover {
    background: rgba(0, 0, 0, 0.04);
  }

  .quick-actions {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  .action-card {
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    border-radius: 16px;
    padding: 24px 20px;
    display: flex;
    flex-direction: column;
    text-decoration: none;
    color: inherit;
    transition: box-shadow 0.15s ease, transform 0.15s ease;
  }

  .action-card:hover {
    box-shadow: 0 8px 20px -6px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
  }

  .action-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    background: #F1F2F5;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
  }

  .action-icon svg {
    width: 18px;
    height: 18px;
    fill: var(--color-text-primary);
  }

  .action-title {
    font-size: 16px;
    font-weight: 600;
    color: var(--color-text-primary);
    margin-bottom: 6px;
  }

  .action-desc {
    font-size: 13px;
    color: var(--color-text-muted);
  }

  @media (max-width: 768px) {
    .membership-page {
      padding: 24px 0;
    }

    .quick-actions {
      grid-template-columns: 1fr;
      gap: 12px;
    }

    .action-card {
      padding: 18px;
    }

    .action-icon {
      margin-bottom: 14px;
    }
  }
</style>

<div class="membership-page">
  <h1 class="membership-title">Membership</h1>

  <section class="plan-card" aria-label="Current membership">
    <div class="plan-card-top">
      <div>
        <h2 class="plan-name"><?= htmlspecialchars($membership['plan_name']) ?></h2>
        <p class="plan-expiry">Expire On: <?= htmlspecialchars($membership['expires_on']) ?></p>
      </div>
      <span class="status-badge <?= $membership['is_active'] ? '' : 'expired' ?>">
        <?= $membership['is_active'] ? 'Active' : 'Expired' ?>
      </span>
    </div>

    <a href="/onboarding/membership" class="btn-outline">Upgrade Plan</a>
  </section>

  <section class="quick-actions" aria-label="Quick actions">
    <a href="/membership/workout-schedule" class="action-card">
      <span class="action-icon">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M19 4H18V2H16V4H8V2H6V4H5C3.89 4 3.01 4.9 3.01 6L3 20C3 21.1 3.89 22 5 22H19C20.1 22 21 21.1 21 20V6C21 4.9 20.1 4 19 4ZM19 20H5V10H19V20ZM9 14H7V12H9V14ZM13 14H11V12H13V14ZM17 14H15V12H17V14ZM9 18H7V16H9V18ZM13 18H11V16H13V18ZM17 18H15V16H17V18Z" />
        </svg>
      </span>
      <h3 class="action-title">Workout Schedule</h3>
      <p class="action-desc">View your weekly training plan</p>
    </a>

    <a href="#meal-plan" class="action-card">
      <span class="action-icon">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M11 9H9V2H7V9H5V2H3V9C3 11.12 4.66 12.84 6.75 12.97V22H9.25V12.97C11.34 12.84 13 11.12 13 9V2H11V9ZM16 6V14H18.5V22H21V2C18.24 2 16 4.24 16 6Z" />
        </svg>
      </span>
      <h3 class="action-title">Meal Plan</h3>
      <p class="action-desc">Track your nutrition plan</p>
    </a>

    <a href="#book-session" class="action-card">
      <span class="action-icon">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path d="M15 12C17.21 12 19 10.21 19 8C19 5.79 17.21 4 15 4C12.79 4 11 5.79 11 8C11 10.21 12.79 12 15 12ZM6 10V7H4V10H1V12H4V15H6V12H9V10H6ZM15 14C12.33 14 7 15.34 7 18V20H23V18C23 15.34 17.67 14 15 14Z" />
        </svg>
      </span>
      <h3 class="action-title">Book a Session</h3>
      <p class="action-desc">Schedule time with an instructor</p>
    </a>
  </section>
</div>
