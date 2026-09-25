<link rel="stylesheet" href="/assets/css/membership-plans.css">

<section class="mp-page">
    <div class="mp-breadcrumb">Membership Management <span>/</span> Membership Plans</div>

    <?php if (!empty($flash)): ?>
        <div class="mp-flash mp-flash--<?= htmlspecialchars($flash['type']) ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <div class="mp-page-head">
        <div>
            <h1>Membership Plans</h1>
            <p>Manage membership packages, pricing, duration and included PT sessions.</p>
        </div>
        <a href="/membership-plans/create" class="mp-btn mp-btn--primary">+ Add Membership Plan</a>
    </div>

    <div class="mp-stats">
        <div class="mp-stat-card"><span>Total Plans</span><strong><?= (int) $summary['total_plans'] ?></strong></div>
        <div class="mp-stat-card"><span>Active Plans</span><strong><?= (int) $summary['active_plans'] ?></strong></div>
        <div class="mp-stat-card"><span>Inactive Plans</span><strong><?= (int) $summary['inactive_plans'] ?></strong></div>
        <div class="mp-stat-card"><span>Active Memberships</span><strong><?= $summary['active_memberships'] === null ? '—' : (int) $summary['active_memberships'] ?></strong></div>
    </div>

    <div class="mp-panel">
        <form method="get" action="/membership-plans" class="mp-toolbar">
            <input class="mp-search" type="search" name="search" value="<?= htmlspecialchars($search) ?>" placeholder="Search membership plans...">
            <select class="mp-select" name="status" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="ACTIVE" <?= $statusFilter === 'ACTIVE' ? 'selected' : '' ?>>Active</option>
                <option value="INACTIVE" <?= $statusFilter === 'INACTIVE' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </form>

        <div class="mp-table-wrap">
            <table class="mp-table">
                <thead>
                <tr>
                    <th>Plan Name</th><th>Description</th><th>Duration</th><th>Price</th><th>PT Sessions</th><th>Status</th><th class="mp-actions-col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if (empty($plans)): ?>
                    <tr><td colspan="7" class="mp-empty">No membership plans found.</td></tr>
                <?php else: ?>
                    <?php foreach ($plans as $plan): ?>
                        <tr>
                            <td><strong><?= htmlspecialchars($plan['plan_name']) ?></strong></td>
                            <td class="mp-desc-cell"><?= htmlspecialchars($plan['description'] ?? '') ?></td>
                            <td><?= (int) $plan['duration_days'] ?> Days</td>
                            <td>LKR <?= number_format((float) $plan['price'], 2) ?></td>
                            <td><?= (int) $plan['included_pt_sessions'] ?></td>
                            <td><span class="mp-badge <?= strtoupper($plan['status']) === 'ACTIVE' ? 'mp-badge--active' : 'mp-badge--inactive' ?>"><?= ucfirst(strtolower($plan['status'])) ?></span></td>
                            <td class="mp-actions-col">
                                <div class="mp-menu-wrap">
                                    <button type="button" class="mp-kebab" data-menu-button aria-label="Plan actions">•••</button>
                                    <div class="mp-menu" data-menu>
                                        <a href="/membership-plans/show?id=<?= (int) $plan['plan_id'] ?>">View</a>
                                        <a href="/membership-plans/edit?id=<?= (int) $plan['plan_id'] ?>">Edit</a>
                                        <?php if (strtoupper($plan['status']) === 'ACTIVE'): ?>
                                            <button type="button" class="mp-menu-danger" data-deactivate-open data-plan-id="<?= (int) $plan['plan_id'] ?>" data-plan-name="<?= htmlspecialchars($plan['plan_name'], ENT_QUOTES) ?>" data-plan-price="<?= htmlspecialchars(number_format((float) $plan['price'], 2), ENT_QUOTES) ?>" data-plan-duration="<?= (int) $plan['duration_days'] ?>" data-plan-pt="<?= (int) $plan['included_pt_sessions'] ?>">Deactivate</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="mp-table-footer">Showing <?= count($plans) ?> plan<?= count($plans) === 1 ? '' : 's' ?></div>
    </div>
</section>

<div class="mp-modal-backdrop" id="deactivateModal" hidden>
    <div class="mp-modal" role="dialog" aria-modal="true" aria-labelledby="deactivateTitle">
        <div class="mp-warning-icon">!</div>
        <h2 id="deactivateTitle">Deactivate Membership Plan?</h2>
        <p><span id="modalPlanName">This plan</span> will no longer be available for new membership purchases. Existing memberships using this plan will not be affected.</p>
        <div class="mp-modal-summary">
            <strong id="modalSummaryName">Plan</strong>
            <span id="modalSummaryDuration">0 Days</span>
            <span id="modalSummaryPrice">LKR 0.00</span>
            <span id="modalSummaryPt">0 PT Sessions</span>
        </div>
        <form method="post" action="/membership-plans/deactivate" class="mp-modal-actions">
            <input type="hidden" name="plan_id" id="modalPlanId" value="">
            <button type="button" class="mp-btn mp-btn--secondary" data-deactivate-close>Cancel</button>
            <button type="submit" class="mp-btn mp-btn--danger">Deactivate Plan</button>
        </form>
    </div>
</div>

<script src="/assets/js/membership-plans.js"></script>
