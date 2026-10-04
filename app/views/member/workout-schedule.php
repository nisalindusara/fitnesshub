<?php $pageStyles = ['member/member/_plan-header', 'member/member/workout-schedule']; ?>

<?php
$state = $workout['state'];
$exercises = $workout['exercises'] ?? [];
$total = count($exercises);
$completed = count(array_filter($exercises, fn($e) => $e['done']));
$percent = $total > 0 ? round($completed / $total * 100) : 0;

$subtitle = $workout['date']->format('l, M j') . ' • ' . ($state === 'train' && $workout['focus'] ? $workout['focus'] : "Today's Plan");

$describe = function (array $exercise): string {
    $text = $exercise['sets'] . ' sets x ' . $exercise['reps'] . ' reps';
    return $exercise['load'] ? $text . ' • ' . $exercise['load'] : $text;
};
?>

<div class="schedule-page">
  <div class="page-header">
    <a href="/member/membership" class="back-btn" aria-label="Back to membership">
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M15.41 7.41L14 6L8 12L14 18L15.41 16.59L10.83 12L15.41 7.41Z" />
      </svg>
    </a>
    <div>
      <h1 class="page-title">Workout Schedule</h1>
      <p class="page-subtitle"><?= htmlspecialchars($subtitle) ?></p>
    </div>
  </div>

  <section class="schedule-card" aria-label="Today's exercises">
    <?php if ($state === 'no_plan'): ?>
      <div class="schedule-empty">
        <p class="schedule-empty__title">No workout plan yet</p>
        <p class="schedule-empty__text">Your instructor hasn't published a plan for you. It will show up here as soon as they do.</p>
      </div>

    <?php elseif ($state === 'not_started'): ?>
      <div class="schedule-empty">
        <p class="schedule-empty__title"><?= htmlspecialchars($workout['plan']['name']) ?> starts soon</p>
        <p class="schedule-empty__text">Your plan begins on <?= htmlspecialchars($workout['starts']->format('l, M j')) ?>.</p>
      </div>

    <?php elseif ($state === 'rest'): ?>
      <div class="schedule-empty">
        <p class="schedule-empty__title">Rest day</p>
        <p class="schedule-empty__text">
          Nothing planned today.
          <?php if ($workout['next']): ?>
            Next workout: <?= htmlspecialchars($workout['next']['date']->format('l')) ?><?= $workout['next']['focus'] ? ' • ' . htmlspecialchars($workout['next']['focus']) : '' ?>.
          <?php endif; ?>
        </p>
      </div>

    <?php else: ?>
      <?php if ($workout['note']): ?>
        <p class="schedule-note"><?= htmlspecialchars($workout['note']) ?></p>
      <?php endif; ?>

      <div class="exercise-grid">
        <?php foreach ($exercises as $exercise): ?>
          <?php $inputId = 'exercise-' . $exercise['plan_exercise_id']; ?>
          <label class="exercise-item <?= $exercise['done'] ? 'done' : '' ?>" for="<?= $inputId ?>">
            <span class="exercise-icon">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M20.57 14.86L22 13.43L20.57 12L17 15.57L8.43 7L12 3.43L10.57 2L9.14 3.43L7.71 2L5.57 4.14L4.14 2.71L2.71 4.14L4.14 5.57L2 7.71L3.43 9.14L2 10.57L3.43 12L7 8.43L15.57 17L12 20.57L13.43 22L14.86 20.57L16.29 22L18.43 19.86L19.86 21.29L21.29 19.86L19.86 18.43L22 16.29L20.57 14.86Z" />
              </svg>
            </span>
            <span class="exercise-info">
              <span class="exercise-name" style="display:block"><?= htmlspecialchars($exercise['name']) ?></span>
              <span class="exercise-meta" style="display:block"><?= htmlspecialchars($describe($exercise)) ?></span>
            </span>
            <input type="checkbox" class="exercise-check" id="<?= $inputId ?>"
              data-plan-exercise-id="<?= (int) $exercise['plan_exercise_id'] ?>" <?= $exercise['done'] ? 'checked' : '' ?>>
          </label>
        <?php endforeach; ?>
      </div>

      <div class="progress-section">
        <div class="progress-labels">
          <span id="progress-text"><?= $completed ?> of <?= $total ?> exercises completed today</span>
          <span class="progress-percent" id="progress-percent"><?= $percent ?>%</span>
        </div>
        <div class="progress-track" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?= $percent ?>">
          <div class="progress-fill" id="progress-fill" style="width: <?= $percent ?>%"></div>
        </div>
        <p class="schedule-error" id="schedule-error" role="alert" hidden></p>
      </div>
    <?php endif; ?>
  </section>
</div>

<?php if ($state === 'train'): ?>
  <script>
    // Each tick is saved straight away; the page rolls the tick back if the save fails
    (function () {
      const text = document.getElementById('progress-text');
      const percentEl = document.getElementById('progress-percent');
      const fill = document.getElementById('progress-fill');
      const track = fill.parentElement;
      const error = document.getElementById('schedule-error');

      function showProgress(done, total) {
        const percent = total ? Math.round(done / total * 100) : 0;
        text.textContent = `${done} of ${total} exercises completed today`;
        percentEl.textContent = `${percent}%`;
        fill.style.width = `${percent}%`;
        track.setAttribute('aria-valuenow', percent);
      }

      document.querySelectorAll('.exercise-check').forEach(check => check.addEventListener('change', async () => {
        const item = check.closest('.exercise-item');
        item.classList.toggle('done', check.checked);
        item.classList.add('is-saving');
        error.hidden = true;

        const body = new URLSearchParams({
          plan_exercise_id: check.dataset.planExerciseId,
          done: check.checked ? '1' : '0',
        });

        try {
          const response = await fetch('/api/member/workouts/done', { method: 'POST', body });
          const result = await response.json();
          if (!response.ok) throw new Error(result.error || 'Could not save.');
          showProgress(result.completed, result.total);
        } catch (e) {
          check.checked = !check.checked;
          item.classList.toggle('done', check.checked);
          error.textContent = e.message || 'Could not save. Check your connection and try again.';
          error.hidden = false;
        } finally {
          item.classList.remove('is-saving');
        }
      }));
    })();
  </script>
<?php endif; ?>
