<?php $pageStyles = ['member/member/_primary-button']; ?>
<style>
  /* Membership screen – page content (id/class selectors only)
   Font (Plus Jakarta Sans), page background and chrome spacing come from member-layout
   Colour meaning: green = active, red = expired (same as the other member screens) */

  #membership-page {
    --ink: #18181b;
    --muted: #64748b;
    --line: #ececef;
    --card: #ffffff;

    --green: #1e8e5a;
    --green-dark: #17744a;
    --green-soft: #e6f4ec;
    --red: #c62828;

    box-sizing: border-box;
    width: min(100%, 960px);
    align-self: flex-start;
    display: flex;
    flex-direction: column;
    gap: 48px;
    font-family: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;
    color: var(--ink);
  }

  /* ---------- Page heading ---------- */

  .page-head__subtitle {
    margin: 6px 0 0;
    font-size: 0.95rem;
    color: var(--muted);
  }

  /* ---------- Section block ---------- */
  .block {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  /* ---------- Card ---------- */
  .card {
    box-sizing: border-box;
    padding: 24px;
    border-radius: 20px;
    background: var(--card);
    box-shadow: 0 1px 3px rgba(16, 24, 40, 0.04);
  }

  /* ---------- Current plan ---------- */
  .plan {
    display: flex;
    align-items: center;
    gap: 18px;
  }

  .plan__icon,
  .action__icon {
    flex: none;
    width: 48px;
    height: 48px;
    display: grid;
    place-items: center;
    border-radius: 50%;
    background: var(--green-soft);
  }

  .plan__icon svg,
  .action__icon svg {
    width: 22px;
    height: 22px;
    fill: none;
    stroke: var(--green);
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .plan__text {
    flex: 1;
    min-width: 0;
  }

  .plan__name {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
  }

  .plan__meta {
    margin: 4px 0 0;
    font-size: 0.9rem;
    color: var(--muted);
  }

  .plan__state {
    font-weight: 700;
  }

  .plan__state--active {
    color: var(--green);
  }

  .plan__state--expired {
    color: var(--red);
  }

  /* ---------- Button ---------- */
  .btn {
    box-sizing: border-box;
    flex: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 46px;
    padding: 0 22px;
    border-radius: 12px;
    font-size: 0.92rem;
    font-weight: 600;
    text-decoration: none;
    transition: background-color 0.15s ease;
  }

  /* ---------- Included with your plan ---------- */
  .actions {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
  }

  .action {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 18px;
    color: inherit;
    text-decoration: none;
    transition: background-color 0.15s ease;
  }

  .action:hover {
    background: #fbfbfc;
  }

  .action__text {
    display: flex;
    flex-direction: column;
    gap: 6px;
    flex: 1;
  }

  .action__title {
    font-size: 1rem;
    font-weight: 700;
  }

  .action__desc {
    font-size: 0.86rem;
    line-height: 1.5;
    color: var(--muted);
  }

  .action__arrow {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--green);
  }

  .action__cta {
    font-size: 0.88rem;
    font-weight: 600;
  }

  .action__arrow svg {
    width: 18px;
    height: 18px;
    fill: none;
    stroke: currentColor;
    stroke-width: 2.2;
    stroke-linecap: round;
    stroke-linejoin: round;
  }

  .action:hover .action__title {
    color: var(--green-dark);
  }

  /* Keyboard focus */
  .btn:focus-visible,
  .action:focus-visible {
    outline: 2.5px solid var(--green);
    outline-offset: 3px;
  }

  /* ---------- Mobile: plan stacks, actions become rows ---------- */
  @media (max-width: 640px) {
    #membership-page {
      gap: 40px;
    }

    .card {
      padding: 18px 16px;
      border-radius: 18px;
    }

    .plan {
      flex-wrap: wrap;
      gap: 14px;
    }

    .plan__text {
      flex-basis: calc(100% - 62px);
    }

    .plan .btn {
      width: 100%;
    }

    .actions {
      grid-template-columns: 1fr;
      gap: 12px;
    }

    .action {
      flex-direction: row;
      align-items: center;
      gap: 14px;
    }

    .action__icon {
      width: 42px;
      height: 42px;
    }

    .action__desc {
      font-size: 0.8rem;
    }

    .action__cta {
      display: none;
    }
  }

  @media (prefers-reduced-motion: reduce) {

    .btn,
    .action {
      transition: none;
    }
  }
</style>

<!-- Membership screen: page content only (header + bottom nav come from member-layout) -->
<div id="membership-page" class="membership">

  <!-- Page heading -->
  <header class="page-head">
    <h1 class="page-head__title">Membership</h1>
    <p class="page-head__subtitle">Your plan and everything that comes with it</p>
  </header>

  <!-- Current plan -->
  <section class="block" aria-labelledby="plan-title">
    <div class="block__head">
      <h2 id="plan-title" class="block__title">Current plan</h2>
    </div>

    <div class="card plan">
      <span class="plan__icon" aria-hidden="true">
        <svg viewBox="0 0 24 24">
          <rect x="3" y="5" width="18" height="14" rx="2"></rect>
          <path d="M3 10h18M7 15h4"></path>
        </svg>
      </span>

      <div class="plan__text">
        <p class="plan__name"><?= htmlspecialchars($membership['plan_name']) ?></p>
        <?php if ($membership['is_active']): ?>
          <p class="plan__meta"><span class="plan__state plan__state--active">Active</span> until <?= htmlspecialchars($membership['expires_on']) ?></p>
        <?php else: ?>
          <p class="plan__meta"><span class="plan__state plan__state--expired">Expired</span> on <?= htmlspecialchars($membership['expires_on']) ?></p>
        <?php endif; ?>
      </div>

      <a href="/onboarding/membership" class="btn btn--primary">
        <?= $membership['is_active'] ? 'Upgrade plan' : 'Renew plan' ?>
      </a>
    </div>
  </section>

  <!-- Included with your plan -->
  <section class="block" aria-labelledby="included-title">
    <div class="block__head">
      <h2 id="included-title" class="block__title">Included with your plan</h2>
      <p class="block__caption">Your training, meals and sessions in one place</p>
    </div>

    <div class="actions">
      <a href="/member/membership/workout-schedule" class="card action">
        <span class="action__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M6 7v10M18 7v10M3 10v4M21 10v4M6 12h12"></path>
          </svg>
        </span>
        <span class="action__text">
          <span class="action__title">Workout schedule</span>
          <span class="action__desc">See what to train each day and the exercises in every session</span>
        </span>
        <span class="action__arrow" aria-hidden="true">
          <span class="action__cta">View schedule</span>
          <svg viewBox="0 0 24 24">
            <path d="M9 6l6 6-6 6"></path>
          </svg>
        </span>
      </a>

      <a href="/member/membership/meal-plan" class="card action">
        <span class="action__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <path d="M4 3v8a3 3 0 0 0 3 3v7M7 3v8M10 3v8a3 3 0 0 1-3 3"></path>
            <path d="M17 21V3c-2 1.5-3 4-3 7 0 2 1 3 3 3"></path>
          </svg>
        </span>
        <span class="action__text">
          <span class="action__title">Meal plan</span>
          <span class="action__desc">Pick your breakfast, lunch and dinner from your plan</span>
        </span>
        <span class="action__arrow" aria-hidden="true">
          <span class="action__cta">Pick meals</span>
          <svg viewBox="0 0 24 24">
            <path d="M9 6l6 6-6 6"></path>
          </svg>
        </span>
      </a>

      <!-- TODO: set the booking route -->
      <a href="/member/membership/pt-sessions" class="card action">
        <span class="action__icon" aria-hidden="true">
          <svg viewBox="0 0 24 24">
            <circle cx="9" cy="8" r="4"></circle>
            <path d="M2 21c0-4 3-6 7-6s7 2 7 6"></path>
            <path d="M19 8v6M16 11h6"></path>
          </svg>
        </span>
        <span class="action__text">
          <span class="action__title">Book a session</span>
          <span class="action__desc">Schedule personal training with an instructor</span>
        </span>
        <span class="action__arrow" aria-hidden="true">
          <span class="action__cta">Book a time</span>
          <svg viewBox="0 0 24 24">
            <path d="M9 6l6 6-6 6"></path>
          </svg>
        </span>
      </a>
    </div>
  </section>

</div>