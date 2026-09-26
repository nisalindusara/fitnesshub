<link rel="stylesheet" href="/assets/css/membership-plans.css">

<section class="mp-page">
    <?php if (!empty($flash)): ?><div class="mp-flash mp-flash--<?= htmlspecialchars($flash['type']) ?>"><?= htmlspecialchars($flash['message']) ?></div><?php endif; ?>
<div class="mp-top-navigation">
        <a href="/membership-plans" class="mp-back-link">
            <span class="mp-back-arrow">←</span>
            Back
        </a>
</div>    <div class="mp-page-head">
        <div><h1><?= htmlspecialchars($plan['plan_name']) ?> Membership</h1><p>View plan details, performance and member usage.</p></div>
        <div class="mp-head-actions">
            <a href="/membership-plans/edit?id=<?= (int) $plan['plan_id'] ?>" class="mp-btn mp-btn--secondary">Edit Plan</a>
            <?php if (strtoupper($plan['status']) === 'ACTIVE'): ?><button type="button" class="mp-btn mp-btn--danger" data-deactivate-open data-plan-id="<?= (int) $plan['plan_id'] ?>" data-plan-name="<?= htmlspecialchars($plan['plan_name'], ENT_QUOTES) ?>" data-plan-price="<?= htmlspecialchars(number_format((float) $plan['price'], 2), ENT_QUOTES) ?>" data-plan-duration="<?= (int) $plan['duration_days'] ?>" data-plan-pt="<?= (int) $plan['included_pt_sessions'] ?>">Deactivate Plan</button><?php endif; ?>
        </div>
    </div>

    <div class="mp-detail-grid">
        <div class="mp-card">
            <div class="mp-card-head"><h2>Plan details</h2></div>
            <div class="mp-detail-list">
                <div><span>Plan Name</span><strong><?= htmlspecialchars($plan['plan_name']) ?></strong></div>
                <div><span>Description</span><strong><?= htmlspecialchars($plan['description'] ?? '—') ?></strong></div>
                <div><span>Duration</span><strong><?= (int) $plan['duration_days'] ?> Days</strong></div>
                <div><span>Price</span><strong>LKR <?= number_format((float) $plan['price'], 2) ?></strong></div>
                <div><span>Included PT Sessions</span><strong><?= (int) $plan['included_pt_sessions'] ?></strong></div>
                <div><span>Status</span><strong><span class="mp-badge <?= strtoupper($plan['status']) === 'ACTIVE' ? 'mp-badge--active' : 'mp-badge--inactive' ?>"><?= ucfirst(strtolower($plan['status'])) ?></span></strong></div>
            </div>
        </div>
        <div class="mp-side-stats">
            <div class="mp-stat-card"><span>Active Members</span><strong><?= $metrics['active_members'] === null ? '—' : (int) $metrics['active_members'] ?></strong></div>
            <div class="mp-stat-card"><span>Total Purchases</span><strong><?= $metrics['total_purchases'] === null ? '—' : (int) $metrics['total_purchases'] ?></strong></div>
        </div>
    </div>

    <div class="mp-panel mp-usage-panel">
        <div class="mp-panel-title">Membership Plan Usage</div>
        <div class="mp-table-wrap"><table class="mp-table"><thead><tr><th>Member</th><th>Start Date</th><th>End Date</th><th>Status</th></tr></thead><tbody>
        <?php if (!$metrics['supported']): ?>
            <tr><td colspan="4" class="mp-empty">Membership usage is not available because the current database does not yet contain the expected memberships table.</td></tr>
        <?php elseif (empty($usage)): ?>
            <tr><td colspan="4" class="mp-empty">No memberships have been purchased for this plan yet.</td></tr>
        <?php else: foreach ($usage as $membership): ?>
            <tr><td><?= htmlspecialchars($membership['member_name'] ?: ('Member #' . $membership['user_id'])) ?></td><td><?= htmlspecialchars($membership['start_date']) ?></td><td><?= htmlspecialchars($membership['end_date']) ?></td><td><span class="mp-badge <?= strtoupper($membership['status']) === 'ACTIVE' ? 'mp-badge--active' : 'mp-badge--inactive' ?>"><?= ucfirst(strtolower($membership['status'])) ?></span></td></tr>
        <?php endforeach; endif; ?>
        </tbody></table></div>
    </div>
</section>

<div class="mp-modal-backdrop" id="deactivateModal" hidden><div class="mp-modal" role="dialog" aria-modal="true"><div class="mp-warning-icon">!</div><h2>Deactivate Membership Plan?</h2><p><span id="modalPlanName"><?= htmlspecialchars($plan['plan_name']) ?></span> will no longer be available for new membership purchases. Existing memberships using this plan will not be affected.</p><div class="mp-modal-summary"><strong id="modalSummaryName"><?= htmlspecialchars($plan['plan_name']) ?></strong><span id="modalSummaryDuration"><?= (int) $plan['duration_days'] ?> Days</span><span id="modalSummaryPrice">LKR <?= number_format((float) $plan['price'], 2) ?></span><span id="modalSummaryPt"><?= (int) $plan['included_pt_sessions'] ?> PT Sessions</span></div><form method="post" action="/membership-plans/deactivate" class="mp-modal-actions"><input type="hidden" name="plan_id" id="modalPlanId" value="<?= (int) $plan['plan_id'] ?>"><button type="button" class="mp-btn mp-btn--secondary" data-deactivate-close>Cancel</button><button type="submit" class="mp-btn mp-btn--danger">Deactivate Plan</button></form></div></div>
<script src="/assets/js/membership-plans.js"></script>

    <!-- rest of your details page -->
</div>