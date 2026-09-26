<style>
  .schedule-page {
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

  .page-subtitle {
    font-size: 12px;
    color: var(--color-text-muted);
    margin-top: 2px;
  }

  .schedule-card {
    background: #FFFFFF;
    border-radius: 20px;
    padding: 24px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
  }

  .exercise-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
  }

  .exercise-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 14px 16px;
    border: 1px solid #E5E7EB;
    border-radius: 10px;
    background: #FFFFFF;
    cursor: pointer;
    user-select: none;
    transition: background-color 0.15s ease, border-color 0.15s ease;
  }

  .exercise-item:hover {
    border-color: #D1D5DB;
  }

  .exercise-item.done {
    background: #EDEEF1;
    border-color: #EDEEF1;
  }

  .exercise-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 1px solid #E5E7EB;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .exercise-icon svg {
    width: 16px;
    height: 16px;
    fill: var(--color-text-primary);
  }

  .exercise-info {
    flex: 1;
    min-width: 0;
  }

  .exercise-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--color-text-primary);
  }

  .exercise-meta {
    font-size: 12px;
    color: var(--color-text-muted);
    margin-top: 2px;
  }

  .exercise-check {
    appearance: none;
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border: 1.5px solid #18181B;
    border-radius: 50%;
    margin: 0;
    flex-shrink: 0;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: background-color 0.15s ease, border-color 0.15s ease;
  }

  .exercise-check:checked {
    background: #15803D;
    border-color: #15803D;
  }

  .exercise-check:checked::after {
    content: "";
    width: 5px;
    height: 9px;
    border: solid #FFFFFF;
    border-width: 0 2px 2px 0;
    transform: translateY(-1px) rotate(45deg);
  }

  .exercise-check:focus-visible {
    outline: 2px solid #15803D;
    outline-offset: 2px;
  }

  .progress-section {
    margin-top: 24px;
    padding-top: 20px;
    border-top: 1px solid #F1F2F5;
  }

  .progress-labels {
    display: flex;
    justify-content: space-between;
    font-size: 12px;
    color: var(--color-text-primary);
    margin-bottom: 8px;
  }

  .progress-percent {
    color: #15803D;
    font-weight: 600;
  }

  .progress-track {
    height: 6px;
    background: #EDEEF1;
    border-radius: 9999px;
    overflow: hidden;
  }

  .progress-fill {
    height: 100%;
    background: #15803D;
    border-radius: 9999px;
    transition: width 0.25s ease;
  }

  @media (max-width: 768px) {
    .schedule-card {
      padding: 16px;
    }

    .exercise-grid {
      grid-template-columns: 1fr;
      gap: 10px;
    }
  }
</style>

<?php
$total = count($exercises);
$completed = count(array_filter($exercises, fn($e) => $e['done']));
$percent = $total > 0 ? round($completed / $total * 100) : 0;
?>

<div class="schedule-page">
  <div class="page-header">
    <a href="/membership" class="back-btn" aria-label="Back to membership">
      <svg viewBox="0 0 24 24" aria-hidden="true">
        <path d="M15.41 7.41L14 6L8 12L14 18L15.41 16.59L10.83 12L15.41 7.41Z" />
      </svg>
    </a>
    <div>
      <h1 class="page-title">Workout Schedule</h1>
      <p class="page-subtitle"><?= htmlspecialchars($planDate) ?> • Today's Plan</p>
    </div>
  </div>

  <section class="schedule-card" aria-label="Today's exercises">
    <div class="exercise-grid">
      <?php foreach ($exercises as $i => $exercise): ?>
        <label class="exercise-item <?= $exercise['done'] ? 'done' : '' ?>" for="exercise-<?= $i ?>">
          <span class="exercise-icon">
            <svg viewBox="0 0 24 24" aria-hidden="true">
              <path d="M20.57 14.86L22 13.43L20.57 12L17 15.57L8.43 7L12 3.43L10.57 2L9.14 3.43L7.71 2L5.57 4.14L4.14 2.71L2.71 4.14L4.14 5.57L2 7.71L3.43 9.14L2 10.57L3.43 12L7 8.43L15.57 17L12 20.57L13.43 22L14.86 20.57L16.29 22L18.43 19.86L19.86 21.29L21.29 19.86L19.86 18.43L22 16.29L20.57 14.86Z" />
            </svg>
          </span>
          <span class="exercise-info">
            <span class="exercise-name" style="display:block"><?= htmlspecialchars($exercise['name']) ?></span>
            <span class="exercise-meta" style="display:block"><?= htmlspecialchars($exercise['detail']) ?></span>
          </span>
          <input type="checkbox" class="exercise-check" id="exercise-<?= $i ?>" <?= $exercise['done'] ? 'checked' : '' ?>>
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
    </div>
  </section>
</div>

<script>
  // UI only — progress updates locally, nothing is saved yet
  (function () {
    const checks = document.querySelectorAll('.exercise-check');
    const text = document.getElementById('progress-text');
    const percentEl = document.getElementById('progress-percent');
    const fill = document.getElementById('progress-fill');
    const track = fill.parentElement;

    function update() {
      const done = [...checks].filter(c => c.checked).length;
      const percent = checks.length ? Math.round(done / checks.length * 100) : 0;
      text.textContent = `${done} of ${checks.length} exercises completed today`;
      percentEl.textContent = `${percent}%`;
      fill.style.width = `${percent}%`;
      track.setAttribute('aria-valuenow', percent);
    }

    checks.forEach(check => check.addEventListener('change', () => {
      check.closest('.exercise-item').classList.toggle('done', check.checked);
      update();
    }));
  })();
</script>
