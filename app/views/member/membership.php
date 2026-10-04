<?php $pageStyles = ['member/member/_primary-button', 'member/member/membership']; ?>

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