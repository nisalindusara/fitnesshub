<?php $pageStyles = ['member/member/_plan-header', 'member/member/meal-plan']; ?>

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
