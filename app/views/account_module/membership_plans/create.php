<link rel="stylesheet" href="/assets/css/membership-plans.css">

<section class="mp-page">
    <div class="mp-breadcrumb">Membership Management <span>/</span> Membership Plans <span>/</span> Add Plan</div>

    <div class="mp-page-head mp-page-head--compact">
        <div>
            <h1>Add Membership Plan</h1>
            <p>Create a new membership option for customers.</p>
        </div>
    </div>

    <?php if (!empty($errors['general'])): ?><div class="mp-flash mp-flash--error"><?= htmlspecialchars($errors['general']) ?></div><?php endif; ?>

    <div class="mp-form-layout">
        <div class="mp-card">
            <div class="mp-card-head"><h2>Plan details</h2><p>Set the core details, pricing, and availability for this plan.</p></div>
            <form method="post" action="/membership-plans/store" id="membershipPlanForm" novalidate>
                <div class="mp-field">
                    <label for="plan_name">Plan Name *</label>
                    <input class="<?= isset($errors['plan_name']) ? 'is-invalid' : '' ?>" id="plan_name" name="plan_name" type="text" value="<?= htmlspecialchars($old['plan_name'] ?? '') ?>" placeholder="e.g. Premium Monthly">
                    <?php if (isset($errors['plan_name'])): ?><small class="mp-error"><?= htmlspecialchars($errors['plan_name']) ?></small><?php endif; ?>
                </div>

                <div class="mp-field">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Describe what this membership includes..."><?= htmlspecialchars($old['description'] ?? '') ?></textarea>
                </div>

                <div class="mp-grid-2">
                    <div class="mp-field">
                        <label for="duration">Duration *</label>
                        <input class="<?= isset($errors['duration']) ? 'is-invalid' : '' ?>" id="duration" name="duration" type="number" min="1" value="<?= htmlspecialchars($old['duration'] ?? 30) ?>">
                        <?php if (isset($errors['duration'])): ?><small class="mp-error"><?= htmlspecialchars($errors['duration']) ?></small><?php endif; ?>
                    </div>
                    <div class="mp-field">
                        <label for="duration_unit">Duration Unit</label>
                        <select id="duration_unit" name="duration_unit">
                            <option value="days" <?= ($old['duration_unit'] ?? 'days') === 'days' ? 'selected' : '' ?>>Days</option>
                            <option value="months" <?= ($old['duration_unit'] ?? '') === 'months' ? 'selected' : '' ?>>Months</option>
                        </select>
                    </div>
                </div>

                <div class="mp-grid-2">
                    <div class="mp-field">
                        <label for="price">Price (LKR) *</label>
                        <input class="<?= isset($errors['price']) ? 'is-invalid' : '' ?>" id="price" name="price" type="number" min="0.01" step="0.01" value="<?= htmlspecialchars($old['price'] ?? '') ?>" placeholder="8500">
                        <?php if (isset($errors['price'])): ?><small class="mp-error"><?= htmlspecialchars($errors['price']) ?></small><?php endif; ?>
                    </div>
                    <div class="mp-field">
                        <label for="included_pt_sessions">Included PT Sessions</label>
                        <input class="<?= isset($errors['included_pt_sessions']) ? 'is-invalid' : '' ?>" id="included_pt_sessions" name="included_pt_sessions" type="number" min="0" value="<?= htmlspecialchars($old['included_pt_sessions'] ?? 0) ?>">
                        <?php if (isset($errors['included_pt_sessions'])): ?><small class="mp-error"><?= htmlspecialchars($errors['included_pt_sessions']) ?></small><?php else: ?><small>Must be 0 or more.</small><?php endif; ?>
                    </div>
                </div>

                <div class="mp-field">
                    <label>Status</label>
                    <div class="mp-segmented">
                        <label><input type="radio" name="status" value="ACTIVE" <?= strtoupper($old['status'] ?? 'ACTIVE') === 'ACTIVE' ? 'checked' : '' ?>><span>Active</span></label>
                        <label><input type="radio" name="status" value="INACTIVE" <?= strtoupper($old['status'] ?? '') === 'INACTIVE' ? 'checked' : '' ?>><span>Inactive</span></label>
                    </div>
                </div>

                <div class="mp-form-actions">
                    <a href="/membership-plans" class="mp-btn mp-btn--secondary">Cancel</a>
                    <button type="submit" class="mp-btn mp-btn--primary">Create Plan</button>
                </div>
            </form>
        </div>

        <aside class="mp-card mp-summary-card">
            <div class="mp-card-head"><h2>Plan Summary</h2><p>A quick preview of the membership plan.</p></div>
            <dl class="mp-summary-list">
                <div><dt>Plan Name</dt><dd id="summaryPlanName">Not set</dd></div>
                <div><dt>Duration</dt><dd id="summaryDuration">30 Days</dd></div>
                <div><dt>Price</dt><dd id="summaryPrice">LKR 0.00</dd></div>
                <div><dt>Included PT Sessions</dt><dd id="summaryPt">0</dd></div>
                <div><dt>Status</dt><dd><span class="mp-badge mp-badge--active" id="summaryStatus">Active</span></dd></div>
            </dl>
        </aside>
    </div>
</section>

<script src="/assets/js/membership-plans.js"></script>
