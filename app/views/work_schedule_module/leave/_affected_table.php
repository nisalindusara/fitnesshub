<?php
/*
 * Affected Sessions card for a pending request, shared by both leave tickets.
 * Shows who would cover each session if the request is approved.
 * Needs $sessions plus the _shared.php helpers.
 */
?>
<section class="lv-card" aria-labelledby="lv-sessions-title">
    <div class="lv-card__head">
        <div>
            <h2 class="lv-card__title" id="lv-sessions-title">Affected Sessions <span class="lv-count"><?= count($sessions) ?></span></h2>
        </div>
        <span class="lv-card__meta">
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="23 4 23 10 17 10" />
                <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10" />
            </svg>
            Updated just now
        </span>
    </div>

    <?php if (!$sessions): ?>
        <p class="lv-empty">No scheduled sessions fall within this leave.</p>
    <?php else: ?>
        <div class="lv-table-wrap">
            <table class="lv-table">
                <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Type</th>
                        <th scope="col">Class / Member</th>
                        <th scope="col">Current instructor</th>
                        <th scope="col">Replacement instructor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $s): ?>
                        <tr>
                            <td class="lv-date"><?= htmlspecialchars($lvDay($s['session_date'])) ?></td>
                            <td class="lv-time"><?= $lvTime($s['start_time'], $s['end_time']) ?></td>
                            <td><?= $lvType($s['session_type']) ?></td>
                            <td><?= $lvClassMember($s['notes']) ?></td>
                            <td>
                                <span class="lv-person"><?= $lvAvatar($s['first_name'], $s['last_name']) ?><?= htmlspecialchars($lvName($s['first_name'], $s['last_name'])) ?></span>
                            </td>
                            <td>
                                <?php if ($s['replacement']): ?>
                                    <span class="lv-person">
                                        <?= $lvAvatar($s['replacement']['first_name'], $s['replacement']['last_name'], 'lv-avatar--green') ?>
                                        <?= htmlspecialchars($lvName($s['replacement']['first_name'], $s['replacement']['last_name'])) ?>
                                    </span>
                                <?php else: ?>
                                    <span class="lv-muted">—</span>
                                    <span class="lv-note">No one available — cancelled if approved</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
