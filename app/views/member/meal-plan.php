<style>
  .meal-page {
    width: min(92%, 760px);
    align-self: flex-start;
    max-height: 100%;
    overflow-y: auto;
    padding: 24px 0;
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .page-header {
    display: flex;
    align-items: center;
    gap: 12px;
  }

  .back-btn {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-text-primary);
    transition: background-color 0.15s ease;
  }

  .back-btn:hover {
    background: rgba(0, 0, 0, 0.05);
  }

  .back-btn svg {
    width: 20px;
    height: 20px;
    fill: currentColor;
  }

  .page-title {
    font-size: 22px;
    font-weight: 600;
    color: var(--color-text-primary);
    letter-spacing: -0.01em;
  }

  .meal-card {
    background: #FFFFFF;
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
  }

  .day-tabs {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 10px;
    margin-bottom: 20px;
  }

  .day-tab {
    height: 34px;
    border: 1px solid #18181B;
    border-radius: 9999px;
    background: #FFFFFF;
    font-family: inherit;
    font-size: 13px;
    font-weight: 500;
    color: var(--color-text-primary);
    cursor: pointer;
    transition: background-color 0.15s ease, color 0.15s ease;
  }

  .day-tab:hover {
    background: rgba(0, 0, 0, 0.04);
  }

  .day-tab.is-active {
    background: #18181B;
    color: #FFFFFF;
  }

  .day-tab.is-outside {
    border-color: #D1D5DB;
    color: var(--color-text-muted);
  }

  .day-tab.is-today:not(.is-active) {
    border-width: 2px;
    font-weight: 700;
  }

  /* Month / year / week navigation */
  .cal-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    flex-wrap: wrap;
    margin-bottom: 16px;
  }

  .cal-picker {
    display: flex;
    gap: 8px;
  }

  .cal-select {
    height: 34px;
    padding: 0 30px 0 12px;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    background: #FFFFFF url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%2318181B' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 10px center;
    appearance: none;
    -webkit-appearance: none;
    font-family: inherit;
    font-size: 14px;
    font-weight: 600;
    color: var(--color-text-primary);
    cursor: pointer;
  }

  .cal-select:focus-visible {
    outline: 2px solid #18181B;
    outline-offset: 2px;
  }

  .week-btns {
    display: flex;
    gap: 6px;
    padding: 4px;
    border-radius: 12px;
    background: #F4F5F7;
  }

  .week-btn {
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    color: var(--color-text-muted);
    text-decoration: none;
    white-space: nowrap;
  }

  .week-btn:hover {
    color: var(--color-text-primary);
  }

  .week-btn.is-active {
    background: #FFFFFF;
    color: var(--color-text-primary);
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
  }

  .day-tab:focus-visible {
    outline: 2px solid #18181B;
    outline-offset: 2px;
  }

  .day-hint {
    font-size: 12px;
    color: var(--color-text-muted);
    margin: -8px 0 16px;
  }

  .meal-section + .meal-section {
    margin-top: 24px;
  }

  .meal-section__head {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 12px;
  }

  .meal-section__title {
    font-size: 14px;
    font-weight: 600;
    color: var(--color-text-primary);
  }

  .meal-section__hint {
    font-size: 12px;
    color: var(--color-text-muted);
  }

  .meal-list {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .meal-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 14px 16px;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    background: #FFFFFF;
  }

  .meal-item.is-editable {
    cursor: pointer;
    user-select: none;
  }

  .meal-item.is-editable:hover {
    border-color: #D1D5DB;
  }

  .meal-item.is-picked {
    border-color: #15803D;
    background: #F3FBF6;
  }

  .meal-item.is-saving {
    opacity: 0.6;
    pointer-events: none;
  }

  .meal-info {
    flex: 1;
    min-width: 0;
  }

  .meal-name {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: var(--color-text-primary);
  }

  .meal-desc {
    display: block;
    font-size: 12px;
    color: var(--color-text-muted);
    margin-top: 2px;
  }

  .meal-meta {
    display: block;
    font-size: 11px;
    color: var(--color-text-primary);
    margin-top: 8px;
  }

  .meal-check {
    appearance: none;
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border: 1.5px solid #D1D5DB;
    border-radius: 50%;
    margin: 2px 0 0;
    flex-shrink: 0;
    display: grid;
    place-items: center;
    background: #FFFFFF;
    transition: background-color 0.15s ease, border-color 0.15s ease;
  }

  .meal-item.is-editable .meal-check {
    border-color: #9CA3AF;
    cursor: pointer;
  }

  .meal-check:checked {
    background: #15803D;
    border-color: #15803D !important;
  }

  .meal-check:checked::after {
    content: "";
    width: 4px;
    height: 8px;
    border: solid #FFFFFF;
    border-width: 0 2px 2px 0;
    transform: translateY(-1px) rotate(45deg);
  }

  .meal-check:focus-visible {
    outline: 2px solid #15803D;
    outline-offset: 2px;
  }

  .meal-empty {
    text-align: center;
    padding: 40px 16px;
  }

  .meal-empty__title {
    font-size: 17px;
    font-weight: 600;
    color: var(--color-text-primary);
    margin-bottom: 6px;
  }

  .meal-empty__text {
    font-size: 14px;
    color: var(--color-text-muted);
  }

  .meal-error {
    margin-top: 12px;
    font-size: 13px;
    color: #B91C1C;
  }

  @media (max-width: 768px) {
    .meal-card {
      padding: 16px;
    }

    .day-tabs {
      grid-template-columns: repeat(7, minmax(48px, 1fr));
      gap: 6px;
      overflow-x: auto;
    }

    .day-tab {
      font-size: 12px;
    }

    .week-btns {
      width: 100%;
      overflow-x: auto;
    }

    .week-btn {
      flex: 1;
      text-align: center;
    }
  }
</style>

<?php
$selected = $mealPlan['selected'];
$todayYmd = (new DateTimeImmutable('today'))->format('Y-m-d');

$describe = function (array $meal): string {
    $parts = [];
    if ($meal['calories'] !== null) {
        $parts[] = (int) $meal['calories'] . ' kcal';
    }
    if ($meal['protein_g'] !== null) {
        $parts[] = (int) $meal['protein_g'] . 'g protein';
    }
    return implode(' · ', $parts);
};
?>

<div class="meal-page">
  <div class="page-header">
    <a href="/member/membership" class="back-btn" aria-label="Back to membership">
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M15.41 7.41L14 6L8 12L14 18L15.41 16.59L10.83 12L15.41 7.41Z" />
      </svg>
    </a>
    <h1 class="page-title">Meal Plan</h1>
  </div>

  <section class="meal-card" aria-label="Weekly meal plan">
    <?php if (!$mealPlan['hasPlan']): ?>
      <div class="meal-empty">
        <p class="meal-empty__title">No meal plan yet</p>
        <p class="meal-empty__text">Your instructor hasn't set up a meal plan for you. It will show up here as soon as they do.</p>
      </div>

    <?php else: ?>
      <div class="cal-bar">
        <form class="cal-picker" method="get" action="/member/membership/meal-plan" id="cal-picker">
          <select class="cal-select" name="month" aria-label="Month">
            <?php for ($m = 1; $m <= 12; $m++): ?>
              <option value="<?= $m ?>" <?= $m === $mealPlan['month'] ? 'selected' : '' ?>><?= date('F', mktime(0, 0, 0, $m, 1)) ?></option>
            <?php endfor; ?>
          </select>
          <select class="cal-select" name="year" aria-label="Year">
            <?php foreach ($mealPlan['years'] as $y): ?>
              <option value="<?= $y ?>" <?= $y === $mealPlan['year'] ? 'selected' : '' ?>><?= $y ?></option>
            <?php endforeach; ?>
          </select>
          <noscript><button type="submit" class="week-btn">Go</button></noscript>
        </form>

        <nav class="week-btns" aria-label="Weeks of <?= date('F Y', mktime(0, 0, 0, $mealPlan['month'], 1, $mealPlan['year'])) ?>">
          <?php foreach ($mealPlan['weeks'] as $i => $monday): ?>
            <?php $n = $i + 1; ?>
            <a class="week-btn <?= $n === $mealPlan['week'] ? 'is-active' : '' ?>"
              href="/member/membership/meal-plan?<?= http_build_query(['year' => $mealPlan['year'], 'month' => $mealPlan['month'], 'week' => $n]) ?>"
              title="<?= htmlspecialchars($monday->format('M j') . ' – ' . $monday->modify('+6 days')->format('M j')) ?>"
              <?= $n === $mealPlan['week'] ? 'aria-current="page"' : '' ?>>Week <?= $n ?></a>
          <?php endforeach; ?>
        </nav>
      </div>

      <div class="day-tabs" role="tablist" aria-label="Days of the week">
        <?php foreach ($mealPlan['days'] as $dow => $day): ?>
          <?php
          $classes = ['day-tab'];
          if ($dow === $selected) $classes[] = 'is-active';
          if (!$day['inMonth']) $classes[] = 'is-outside';
          if ($day['date']->format('Y-m-d') === $todayYmd) $classes[] = 'is-today';
          ?>
          <button type="button" role="tab" class="<?= implode(' ', $classes) ?>"
            id="meal-tab-<?= $dow ?>" data-day="<?= $dow ?>" aria-controls="meal-day-<?= $dow ?>"
            aria-label="<?= htmlspecialchars($day['date']->format('l, F j')) ?>"
            aria-selected="<?= $dow === $selected ? 'true' : 'false' ?>" tabindex="<?= $dow === $selected ? '0' : '-1' ?>">
            <?= htmlspecialchars($dayNames[$dow]['short'] . ' ' . $day['date']->format('j')) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php foreach ($mealPlan['days'] as $dow => $day): ?>
        <?php $editable = $day['editable']; ?>
        <div class="meal-day" id="meal-day-<?= $dow ?>" role="tabpanel" aria-labelledby="meal-tab-<?= $dow ?>" <?= $dow === $selected ? '' : 'hidden' ?>>
          <?php if (!empty($day['meals'])): ?>
            <p class="day-hint">
              <?php if ($day['date']->format('Y-m-d') === $todayYmd): ?>
                Today, <?= htmlspecialchars($day['date']->format('F j')) ?> · Pick what you eat today.
              <?php else: ?>
                <?= htmlspecialchars($day['date']->format('l, F j, Y')) ?> ·
                <?= $editable ? 'Pick what you ate that day, or change your pick.' : 'You can pick these on the day.' ?>
              <?php endif; ?>
            </p>
          <?php endif; ?>

          <?php if (empty($day['meals'])): ?>
            <div class="meal-empty">
              <p class="meal-empty__title">No meals planned</p>
              <p class="meal-empty__text">Nothing is planned for <?= htmlspecialchars($dayNames[$dow]['long']) ?>.</p>
            </div>
          <?php endif; ?>

          <?php foreach ($mealTypes as $type => $label): ?>
            <?php if (empty($day['meals'][$type])) continue; ?>
            <?php $options = $day['meals'][$type]; ?>
            <div class="meal-section">
              <div class="meal-section__head">
                <h2 class="meal-section__title" id="meal-<?= $dow ?>-<?= $type ?>"><?= htmlspecialchars($label) ?></h2>
                <?php if (count($options) > 1): ?>
                  <span class="meal-section__hint">Pick 1 of <?= count($options) ?></span>
                <?php endif; ?>
              </div>
              <div class="meal-list" role="group" aria-labelledby="meal-<?= $dow ?>-<?= $type ?>">
                <?php foreach ($options as $meal): ?>
                  <?php $inputId = 'meal-' . (int) $meal['id']; ?>
                  <label class="meal-item <?= $editable ? 'is-editable' : '' ?> <?= $meal['done'] ? 'is-picked' : '' ?>" for="<?= $inputId ?>">
                    <span class="meal-info">
                      <span class="meal-name"><?= htmlspecialchars($meal['name']) ?></span>
                      <?php if ($meal['description']): ?>
                        <span class="meal-desc"><?= htmlspecialchars($meal['description']) ?></span>
                      <?php endif; ?>
                      <?php if ($describe($meal) !== ''): ?>
                        <span class="meal-meta"><?= htmlspecialchars($describe($meal)) ?></span>
                      <?php endif; ?>
                    </span>
                    <input type="checkbox" class="meal-check" id="<?= $inputId ?>" data-meal-item-id="<?= (int) $meal['id'] ?>"
                      data-date="<?= $day['date']->format('Y-m-d') ?>"
                      aria-label="Pick <?= htmlspecialchars($meal['name']) ?> for <?= htmlspecialchars(mb_strtolower($label)) ?>"
                      <?= $meal['done'] ? 'checked' : '' ?> <?= $editable ? '' : 'disabled' ?>>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <p class="meal-error" id="meal-error" role="alert" hidden></p>
    <?php endif; ?>
  </section>
</div>

<?php if ($mealPlan['hasPlan']): ?>
  <script>
    (function () {
      const tabs = [...document.querySelectorAll('.day-tab')];
      const error = document.getElementById('meal-error');

      // Changing the month or year loads that month straight away
      const picker = document.getElementById('cal-picker');
      picker.querySelectorAll('select').forEach(select => select.addEventListener('change', () => picker.submit()));

      function selectDay(tab) {
        tabs.forEach(t => {
          const on = t === tab;
          t.classList.toggle('is-active', on);
          t.setAttribute('aria-selected', on ? 'true' : 'false');
          t.tabIndex = on ? 0 : -1;
          document.getElementById(t.getAttribute('aria-controls')).hidden = !on;
        });
        error.hidden = true;
      }

      tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => selectDay(tab));
        tab.addEventListener('keydown', e => {
          const step = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
          if (!step) return;
          const next = tabs[(i + step + tabs.length) % tabs.length];
          selectDay(next);
          next.focus();
        });
      });

      function showPicked(list) {
        list.querySelectorAll('.meal-check').forEach(c => c.closest('.meal-item').classList.toggle('is-picked', c.checked));
      }

      // Each pick is saved straight away; picking one option unpicks the others for that meal,
      // and the page puts the previous pick back if the save fails
      document.querySelectorAll('.meal-check:not(:disabled)').forEach(check => check.addEventListener('change', async () => {
        const item = check.closest('.meal-item');
        const list = check.closest('.meal-list');
        const siblings = [...list.querySelectorAll('.meal-check')].filter(c => c !== check);
        const previous = siblings.find(c => c.checked) || null;

        if (check.checked) siblings.forEach(c => { c.checked = false; });
        showPicked(list);
        item.classList.add('is-saving');
        error.hidden = true;

        const body = new URLSearchParams({
          meal_item_id: check.dataset.mealItemId,
          date: check.dataset.date,
          done: check.checked ? '1' : '0',
        });

        try {
          const response = await fetch('/api/member/meals/done', { method: 'POST', body });
          const result = await response.json();
          if (!response.ok) throw new Error(result.error || 'Could not save.');
        } catch (e) {
          check.checked = !check.checked;
          if (previous) previous.checked = true;
          showPicked(list);
          error.textContent = e.message || 'Could not save. Check your connection and try again.';
          error.hidden = false;
        } finally {
          item.classList.remove('is-saving');
        }
      }));
    })();
  </script>
<?php endif; ?>
