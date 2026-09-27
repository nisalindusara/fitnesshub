<style>
    .mc-view {
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
        padding: 24px 28px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        box-sizing: border-box;
    }

    .crumb-muted {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.4);
        text-decoration: none;
    }

    .crumb-sep {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.2);
    }

    .mc-head {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 16px;
        flex-wrap: wrap;
    }

    .mc-title {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin: 0;
    }

    .mc-subtitle {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        margin: 4px 0 0;
    }

    .mc-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .mc-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 36px;
        padding: 0 16px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: #1c1c1c;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
        transition: background-color 0.15s ease;
    }

    .mc-btn:hover {
        background: #f7f9fb;
    }

    .mc-btn--primary {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .mc-btn--primary:hover {
        background: #333333;
    }

    .mc-btn--square {
        width: 36px;
        padding: 0;
        justify-content: center;
    }

    /* Stat cards */
    .mc-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
    }

    .mc-stat {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        padding: 18px 18px 16px;
    }

    .mc-stat--alert {
        background: #fdf0f0;
        border-color: #f6d5d5;
    }

    .mc-stat__label {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.55);
        margin: 0;
    }

    .mc-stat__value {
        font-size: 26px;
        font-weight: 700;
        margin: 8px 0 10px;
        letter-spacing: -0.02em;
    }

    .mc-stat__meta {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.5);
        margin: 0;
    }

    .mc-stat--alert .mc-stat__label,
    .mc-stat--alert .mc-stat__value {
        color: #b42318;
    }

    /* Table card */
    .mc-panel {
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        padding: 18px;
    }

    .mc-toolbar {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 8px;
    }

    .mc-search {
        display: flex;
        align-items: center;
        gap: 8px;
        height: 36px;
        width: 300px;
        max-width: 100%;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        box-sizing: border-box;
    }

    .mc-search input {
        border: none;
        outline: none;
        background: transparent;
        font-family: inherit;
        font-size: 14px;
        width: 100%;
        color: #1c1c1c;
    }

    .mc-search input::placeholder {
        color: rgba(28, 28, 28, 0.35);
    }

    .mc-chip {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 32px;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        background: #ffffff;
        font-family: inherit;
        font-size: 13px;
        color: #1c1c1c;
        cursor: pointer;
    }

    .mc-chip__count {
        font-size: 11px;
        padding: 1px 6px;
        border-radius: 4px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.6);
    }

    .mc-chip.is-active {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .mc-chip.is-active .mc-chip__count {
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
    }

    .mc-toolbar__right {
        margin-left: auto;
        display: flex;
        gap: 8px;
    }

    .mc-table-wrap {
        overflow-x: auto;
    }

    .mc-table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
        text-align: left;
    }

    .mc-table th {
        font-size: 13px;
        font-weight: 400;
        color: rgba(28, 28, 28, 0.5);
        padding: 12px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
    }

    .mc-table td {
        padding: 12px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.06);
        vertical-align: middle;
        font-size: 14px;
    }

    .mc-table tbody tr {
        cursor: pointer;
    }

    .mc-client-link {
        display: block;
        text-decoration: none;
    }


    .mc-client {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .mc-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #eeeeef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 600;
        color: rgba(28, 28, 28, 0.45);
        flex-shrink: 0;
    }

    .mc-primary {
        font-weight: 600;
        margin: 0;
        color: #1c1c1c;
    }

    .mc-secondary {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin: 1px 0 0;
    }

    .mc-program {
        margin: 0;
    }

    .mc-tag {
        display: inline-block;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 6px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.7);
        white-space: nowrap;
    }

    .mc-tag--danger {
        background: #fdecec;
        color: #b42318;
    }

    .mc-adherence {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .mc-bar {
        width: 90px;
        height: 5px;
        border-radius: 999px;
        background: rgba(28, 28, 28, 0.07);
        overflow: hidden;
    }

    .mc-bar__fill {
        height: 100%;
        border-radius: 999px;
        background: #1c1c1c;
    }

    .mc-bar__fill--low {
        background: #e5484d;
    }



    .mc-empty {
        text-align: center;
        padding: 32px 0;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    .mc-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 20px;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
    }

    .mc-pager {
        display: flex;
        gap: 8px;
    }

    @media (max-width: 1100px) {
        .mc-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .mc-view {
            padding: 20px 16px;
        }

        .mc-stats {
            grid-template-columns: 1fr;
        }

        .mc-toolbar__right {
            margin-left: 0;
        }
    }

    /* Flash + toast */
    .mc-flash {
        padding: 12px 16px;
        border-radius: 10px;
        font-size: 14px;
        border: 1px solid transparent;
    }

    .mc-flash--success {
        background: #ecfdf3;
        border-color: #c6f0d6;
        color: #146c3a;
    }

    .mc-flash--error {
        background: #fdf0f0;
        border-color: #f6d5d5;
        color: #b42318;
    }

    .mc-toast {
        position: fixed;
        right: 24px;
        bottom: 24px;
        z-index: 60;
        padding: 12px 16px;
        border-radius: 10px;
        background: #1c1c1c;
        color: #ffffff;
        font-size: 14px;
        box-shadow: 0 10px 24px -8px rgba(0, 0, 0, 0.3);
    }

    /* Sort menu */
    .mc-sort {
        position: relative;
    }

    .mc-sort__menu {
        position: absolute;
        right: 0;
        top: 42px;
        z-index: 20;
        min-width: 180px;
        padding: 6px;
        background: #ffffff;
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 10px;
        box-shadow: 0 10px 24px -8px rgba(0, 0, 0, 0.15);
    }

    .mc-sort__menu a {
        display: block;
        padding: 8px 10px;
        border-radius: 6px;
        font-size: 13px;
        color: #1c1c1c;
        text-decoration: none;
    }

    .mc-sort__menu a:hover,
    .mc-sort__menu a[aria-current="true"] {
        background: #f7f9fb;
    }

    .mc-sort__menu a[aria-current="true"] {
        font-weight: 600;
    }

    .mc-btn.is-active {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    a.mc-chip {
        text-decoration: none;
    }

    /* Grid view */
    .mc-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 12px;
        padding-top: 8px;
    }

    .mc-card {
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 16px;
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        color: inherit;
        text-decoration: none;
    }

    .mc-card__row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 8px;
    }

    .mc-view[data-view="grid"] .mc-table-wrap,
    .mc-view[data-view="table"] .mc-cards {
        display: none;
    }

    .mc-pager a.mc-btn[aria-disabled="true"] {
        opacity: 0.4;
        pointer-events: none;
    }

    /* Add client dialog */
    .mc-modal {
        position: fixed;
        inset: 0;
        z-index: 50;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
        background: rgba(15, 15, 20, 0.4);
    }

    .mc-modal[hidden] {
        display: none;
    }

    .mc-modal__box {
        width: min(460px, 100%);
        max-height: 90vh;
        overflow-y: auto;
        padding: 22px;
        border-radius: 14px;
        background: #ffffff;
        box-shadow: 0 24px 48px -12px rgba(0, 0, 0, 0.25);
        box-sizing: border-box;
    }

    .mc-modal__title {
        font-size: 17px;
        font-weight: 600;
        margin: 0 0 4px;
    }

    .mc-modal__text {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.55);
        margin: 0 0 16px;
    }

    .mc-modal .mc-search {
        width: 100%;
    }

    .mc-results {
        margin: 10px 0 16px;
        max-height: 240px;
        overflow-y: auto;
    }

    .mc-result {
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        padding: 10px;
        border: 1px solid transparent;
        border-radius: 8px;
        background: none;
        font-family: inherit;
        text-align: left;
        cursor: pointer;
    }

    .mc-result:hover {
        background: #f7f9fb;
    }

    .mc-result.is-selected {
        border-color: #1c1c1c;
        background: #f7f9fb;
    }

    .mc-results__empty {
        padding: 12px 4px;
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin: 0;
    }

    .mc-field-label {
        display: block;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.55);
        margin-bottom: 6px;
    }

    .mc-segment {
        display: flex;
        gap: 8px;
        margin-bottom: 20px;
    }

    .mc-segment label {
        cursor: pointer;
    }

    .mc-segment input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .mc-segment span {
        display: inline-flex;
        align-items: center;
        height: 34px;
        padding: 0 14px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-size: 13px;
    }

    .mc-segment input:checked + span {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .mc-segment input:focus-visible + span {
        outline: 2px solid #1c1c1c;
        outline-offset: 2px;
    }

    .mc-modal__actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    .mc-btn:disabled {
        opacity: 0.45;
        cursor: not-allowed;
    }
</style>

<?php
$statusTags = [
    'active' => ['Active', ''],
    'needs_review' => ['Needs review', 'mc-tag--danger'],
    'paused' => ['Paused', ''],
    'new' => ['New', ''],
];

$initials = function (string $name): string {
    $parts = preg_split('/\s+/', trim($name));
    return mb_strtoupper(mb_substr($parts[0], 0, 1) . mb_substr(end($parts), 0, 1));
};

// Builds list links that keep the current search / filter / sort (defaults are left out of the URL)
$listUrl = function (array $changes) use ($search, $filter, $sort): string {
    $params = array_merge(['q' => $search, 'filter' => $filter, 'sort' => $sort], $changes);
    $params = array_filter($params, fn($value, $key) => !in_array([$key, $value], [['q', ''], ['filter', 'all'], ['sort', 'next'], ['page', 1]], true), ARRAY_FILTER_USE_BOTH);
    return $params ? '?' . http_build_query($params) : '';
};

$adherenceText = fn(array $c) => $c['adherence'] !== null ? $c['adherence'] . '%' : ($c['status'] === 'new' ? 'New' : '—');
$inviteLink = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http') . '://' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/onboarding';
?>

<div class="page-header">
    <button class="icon-btn" type="button" aria-label="Toggle sidebar">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="9" y1="3" x2="9" y2="21"></line>
        </svg>
    </button>
    <button class="icon-btn" type="button" aria-label="Add to favorites">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1C1C1C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
        </svg>
    </button>
    <span class="page-title">My Clients</span>
</div>

<div class="mc-view" data-view="table" id="mc-view">
    <?php if ($flash): ?>
        <div class="mc-flash mc-flash--<?= $flash['type'] ?>" role="<?= $flash['type'] === 'error' ? 'alert' : 'status' ?>">
            <?= htmlspecialchars($flash['message']) ?>
        </div>
    <?php endif; ?>

    <div class="mc-head">
        <div>
            <h1 class="mc-title">My Clients</h1>
            <p class="mc-subtitle">
                <?= (int) $stats['active'] ?> active <?= $stats['active'] === 1 ? 'client' : 'clients' ?>.
                <?php if ($stats['needs_review'] > 0): ?>
                    <?= (int) $stats['needs_review'] ?> <?= $stats['needs_review'] === 1 ? 'needs' : 'need' ?> a plan review.
                <?php else: ?>
                    Everyone is on track.
                <?php endif; ?>
            </p>
        </div>
        <div class="mc-actions">
            <a href="/my-clients/export<?= htmlspecialchars($listUrl([])) ?>" class="mc-btn">Export list</a>
            <button type="button" class="mc-btn" id="mc-invite" data-link="<?= htmlspecialchars($inviteLink) ?>">Invite client</button>
            <button type="button" class="mc-btn mc-btn--primary" id="mc-add-open">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add client
            </button>
        </div>
    </div>

    <section class="mc-stats">
        <div class="mc-stat">
            <p class="mc-stat__label">Active clients</p>
            <p class="mc-stat__value"><?= (int) $stats['active'] ?></p>
            <p class="mc-stat__meta">+<?= (int) $stats['new_this_week'] ?> this week</p>
        </div>
        <div class="mc-stat">
            <p class="mc-stat__label">Workouts today</p>
            <p class="mc-stat__value"><?= (int) $stats['today'] ?></p>
            <p class="mc-stat__meta"><?= (int) $stats['today_done'] ?> completed, <?= (int) ($stats['today'] - $stats['today_done']) ?> to go</p>
        </div>
        <div class="mc-stat">
            <p class="mc-stat__label">Average adherence</p>
            <p class="mc-stat__value"><?= $stats['avg_adherence'] !== null ? (int) $stats['avg_adherence'] . '%' : '—' ?></p>
            <p class="mc-stat__meta">Last 30 days</p>
        </div>
        <div class="mc-stat <?= $stats['needs_review'] > 0 ? 'mc-stat--alert' : '' ?>">
            <p class="mc-stat__label">Needs review</p>
            <p class="mc-stat__value"><?= (int) $stats['needs_review'] ?></p>
            <p class="mc-stat__meta">Below <?= ClientRosterService::NEEDS_REVIEW_BELOW ?>% adherence</p>
        </div>
    </section>

    <section class="mc-panel">
        <div class="mc-toolbar">
            <form class="mc-search" method="get" action="/my-clients" role="search" id="mc-search-form">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2" stroke-linecap="round">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" name="q" id="mc-search" value="<?= htmlspecialchars($search) ?>" placeholder="Search by name or email" aria-label="Search clients">
                <?php if ($filter !== 'all'): ?><input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>"><?php endif; ?>
                <?php if ($sort !== 'next'): ?><input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>"><?php endif; ?>
            </form>

            <?php foreach (ClientRosterService::FILTERS as $key => $label): ?>
                <a href="/my-clients<?= htmlspecialchars($listUrl(['filter' => $key])) ?>" class="mc-chip <?= $filter === $key ? 'is-active' : '' ?>" <?= $filter === $key ? 'aria-current="true"' : '' ?>>
                    <?= htmlspecialchars($label) ?>
                    <span class="mc-chip__count"><?= (int) $filterCounts[$key] ?></span>
                </a>
            <?php endforeach; ?>

            <div class="mc-toolbar__right">
                <div class="mc-sort">
                    <button type="button" class="mc-btn" id="mc-sort-btn" aria-haspopup="true" aria-expanded="false">Sort: <?= htmlspecialchars(ClientRosterService::SORTS[$sort]) ?></button>
                    <div class="mc-sort__menu" id="mc-sort-menu" hidden>
                        <?php foreach (ClientRosterService::SORTS as $key => $label): ?>
                            <a href="/my-clients<?= htmlspecialchars($listUrl(['sort' => $key])) ?>" <?= $sort === $key ? 'aria-current="true"' : '' ?>><?= htmlspecialchars($label) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button type="button" class="mc-btn mc-btn--square" id="mc-view-toggle" aria-label="Switch to grid view" aria-pressed="false">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                    </svg>
                </button>
            </div>
        </div>

        <?php if (empty($clients)): ?>
            <p class="mc-empty">
                <?php if ($totalClients === 0): ?>
                    You don't have any clients yet. Use <strong>Add client</strong> to assign a member.
                <?php else: ?>
                    No clients match your search.
                <?php endif; ?>
            </p>
        <?php else: ?>
            <div class="mc-table-wrap">
                <table class="mc-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Type</th>
                            <th>Program</th>
                            <th>Adherence</th>
                            <th>Next session</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                            <?php
                            [$statusLabel, $statusClass] = $statusTags[$client['status']];
                            $href = '/my-clients/client?member=' . (int) $client['member_id'];
                            ?>
                            <tr data-href="<?= htmlspecialchars($href) ?>">
                                <td>
                                    <div class="mc-client">
                                        <span class="mc-avatar"><?= htmlspecialchars($initials($client['name'])) ?></span>
                                        <div>
                                            <a class="mc-primary mc-client-link" href="<?= htmlspecialchars($href) ?>"><?= htmlspecialchars($client['name']) ?></a>
                                            <p class="mc-secondary"><?= htmlspecialchars($client['email']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="mc-tag"><?= htmlspecialchars($client['type_label']) ?></span></td>
                                <td>
                                    <p class="mc-program"><?= htmlspecialchars($client['program']) ?></p>
                                    <p class="mc-secondary"><?= htmlspecialchars($client['program_meta']) ?></p>
                                </td>
                                <td>
                                    <div class="mc-adherence">
                                        <div class="mc-bar">
                                            <?php if ($client['adherence'] !== null): ?>
                                                <div class="mc-bar__fill <?= $client['adherence'] < ClientRosterService::NEEDS_REVIEW_BELOW ? 'mc-bar__fill--low' : '' ?>" style="width: <?= (int) $client['adherence'] ?>%"></div>
                                            <?php endif; ?>
                                        </div>
                                        <span><?= htmlspecialchars($adherenceText($client)) ?></span>
                                    </div>
                                </td>
                                <td>
                                    <p class="mc-program"><?= htmlspecialchars($client['next_session']) ?></p>
                                    <p class="mc-secondary"><?= htmlspecialchars($client['next_session_meta']) ?></p>
                                </td>
                                <td><span class="mc-tag <?= $statusClass ?>"><?= $statusLabel ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mc-cards">
                <?php foreach ($clients as $client): ?>
                    <?php [$statusLabel, $statusClass] = $statusTags[$client['status']]; ?>
                    <a class="mc-card" href="/my-clients/client?member=<?= (int) $client['member_id'] ?>">
                        <div class="mc-client">
                            <span class="mc-avatar"><?= htmlspecialchars($initials($client['name'])) ?></span>
                            <div>
                                <p class="mc-primary"><?= htmlspecialchars($client['name']) ?></p>
                                <p class="mc-secondary"><?= htmlspecialchars($client['email']) ?></p>
                            </div>
                        </div>
                        <div>
                            <p class="mc-program"><?= htmlspecialchars($client['program']) ?></p>
                            <p class="mc-secondary"><?= htmlspecialchars($client['program_meta']) ?></p>
                        </div>
                        <div class="mc-adherence">
                            <div class="mc-bar" style="flex: 1">
                                <?php if ($client['adherence'] !== null): ?>
                                    <div class="mc-bar__fill <?= $client['adherence'] < ClientRosterService::NEEDS_REVIEW_BELOW ? 'mc-bar__fill--low' : '' ?>" style="width: <?= (int) $client['adherence'] ?>%"></div>
                                <?php endif; ?>
                            </div>
                            <span><?= htmlspecialchars($adherenceText($client)) ?></span>
                        </div>
                        <div class="mc-card__row">
                            <span class="mc-secondary"><?= htmlspecialchars($client['next_session']) ?></span>
                            <span class="mc-tag <?= $statusClass ?>"><?= $statusLabel ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="mc-footer">
            <span>
                Showing <?= count($clients) ?> of <?= (int) $matchCount ?> <?= $matchCount === $totalClients ? 'clients' : 'matching clients' ?>
                <?php if ($pages > 1): ?>· page <?= (int) $page ?> of <?= (int) $pages ?><?php endif; ?>
            </span>
            <div class="mc-pager">
                <a class="mc-btn" href="/my-clients<?= htmlspecialchars($listUrl(['page' => $page - 1])) ?>" <?= $page <= 1 ? 'aria-disabled="true" tabindex="-1"' : '' ?>>Previous</a>
                <a class="mc-btn" href="/my-clients<?= htmlspecialchars($listUrl(['page' => $page + 1])) ?>" <?= $page >= $pages ? 'aria-disabled="true" tabindex="-1"' : '' ?>>Next</a>
            </div>
        </div>
    </section>
</div>

<!-- Add client -->
<div class="mc-modal" id="mc-add-modal" hidden>
    <form class="mc-modal__box" method="post" action="/my-clients/add" role="dialog" aria-modal="true" aria-labelledby="mc-add-title">
        <h2 class="mc-modal__title" id="mc-add-title">Add client</h2>
        <p class="mc-modal__text">Search gym members and assign one to yourself. You'll build their workout plan next.</p>

        <label class="mc-search">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2" stroke-linecap="round">
                <circle cx="11" cy="11" r="7"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="search" id="mc-member-search" placeholder="Member name or email" autocomplete="off" aria-label="Search members">
        </label>
        <div class="mc-results" id="mc-member-results" role="listbox" aria-label="Members">
            <p class="mc-results__empty">Type at least 2 letters to search.</p>
        </div>
        <input type="hidden" name="member_id" id="mc-member-id">

        <span class="mc-field-label">Client type</span>
        <div class="mc-segment">
            <?php foreach (ClientRosterService::TYPES as $value => $label): ?>
                <label>
                    <input type="radio" name="client_type" value="<?= htmlspecialchars($value) ?>" <?= $value === '1-on-1' ? 'checked' : '' ?>>
                    <span><?= htmlspecialchars($label) ?></span>
                </label>
            <?php endforeach; ?>
        </div>

        <div class="mc-modal__actions">
            <button type="button" class="mc-btn" data-close>Cancel</button>
            <button type="submit" class="mc-btn mc-btn--primary" id="mc-add-submit" disabled>Add client</button>
        </div>
    </form>
</div>

<div class="mc-toast" id="mc-toast" role="status" hidden></div>

<script>
    (function () {
        const view = document.getElementById('mc-view');

        function toast(message) {
            const el = document.getElementById('mc-toast');
            el.textContent = message;
            el.hidden = false;
            clearTimeout(toast.timer);
            toast.timer = setTimeout(() => { el.hidden = true; }, 3500);
        }

        // Whole row opens the client's workout plan
        document.querySelectorAll('.mc-table tbody tr[data-href]').forEach(row => row.addEventListener('click', e => {
            if (e.target.closest('a, button')) return;
            window.location.href = row.dataset.href;
        }));

        // Search runs on the server once typing pauses
        const search = document.getElementById('mc-search');
        const searchForm = document.getElementById('mc-search-form');
        let searchTimer;
        search.addEventListener('input', () => {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => searchForm.submit(), 500);
        });
        if (search.value) {
            search.focus();
            search.setSelectionRange(search.value.length, search.value.length);
        }

        // Sort menu
        const sortBtn = document.getElementById('mc-sort-btn');
        const sortMenu = document.getElementById('mc-sort-menu');
        sortBtn.addEventListener('click', () => {
            sortMenu.hidden = !sortMenu.hidden;
            sortBtn.setAttribute('aria-expanded', String(!sortMenu.hidden));
        });
        document.addEventListener('click', e => {
            if (!e.target.closest('.mc-sort')) {
                sortMenu.hidden = true;
                sortBtn.setAttribute('aria-expanded', 'false');
            }
        });

        // Table / grid view, remembered in this browser
        const viewToggle = document.getElementById('mc-view-toggle');
        function setView(mode) {
            view.dataset.view = mode;
            viewToggle.classList.toggle('is-active', mode === 'grid');
            viewToggle.setAttribute('aria-pressed', String(mode === 'grid'));
            viewToggle.setAttribute('aria-label', mode === 'grid' ? 'Switch to table view' : 'Switch to grid view');
            try { localStorage.setItem('mc-view', mode); } catch (e) {}
        }
        try { if (localStorage.getItem('mc-view') === 'grid') setView('grid'); } catch (e) {}
        viewToggle.addEventListener('click', () => setView(view.dataset.view === 'grid' ? 'table' : 'grid'));

        // Invite client → copy the member sign-up link
        document.getElementById('mc-invite').addEventListener('click', async e => {
            const link = e.currentTarget.dataset.link;
            try {
                await navigator.clipboard.writeText(link);
                toast('Sign-up link copied. Send it to your client, then add them once they have joined.');
            } catch (err) {
                toast('Sign-up link: ' + link);
            }
        });

        // Add client dialog
        const modal = document.getElementById('mc-add-modal');
        const memberSearch = document.getElementById('mc-member-search');
        const results = document.getElementById('mc-member-results');
        const memberId = document.getElementById('mc-member-id');
        const submit = document.getElementById('mc-add-submit');
        let lookupTimer;
        let lookupSeq = 0;

        function closeModal() {
            modal.hidden = true;
        }

        function message(text) {
            results.innerHTML = '';
            const p = document.createElement('p');
            p.className = 'mc-results__empty';
            p.textContent = text;
            results.appendChild(p);
        }

        document.getElementById('mc-add-open').addEventListener('click', () => {
            modal.hidden = false;
            memberSearch.focus();
        });
        modal.querySelector('[data-close]').addEventListener('click', closeModal);
        modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
        document.addEventListener('keydown', e => { if (e.key === 'Escape' && !modal.hidden) closeModal(); });

        memberSearch.addEventListener('input', () => {
            memberId.value = '';
            submit.disabled = true;
            clearTimeout(lookupTimer);

            const term = memberSearch.value.trim();
            if (term.length < 2) {
                message('Type at least 2 letters to search.');
                return;
            }

            lookupTimer = setTimeout(async () => {
                const seq = ++lookupSeq;
                try {
                    const response = await fetch('/my-clients/members/search?q=' + encodeURIComponent(term));
                    const members = await response.json();
                    if (seq !== lookupSeq) return;

                    if (!members.length) {
                        message('No members found who are not already your clients.');
                        return;
                    }

                    results.innerHTML = '';
                    members.forEach(member => {
                        const button = document.createElement('button');
                        button.type = 'button';
                        button.className = 'mc-result';
                        button.setAttribute('role', 'option');
                        button.setAttribute('aria-selected', 'false');
                        button.innerHTML = '<span class="mc-avatar"></span><span><span class="mc-primary" style="display:block"></span><span class="mc-secondary" style="display:block"></span></span>';

                        const parts = member.name.trim().split(/\s+/);
                        button.querySelector('.mc-avatar').textContent = (parts[0][0] + (parts.length > 1 ? parts[parts.length - 1][0] : '')).toUpperCase();
                        button.querySelector('.mc-primary').textContent = member.name;
                        button.querySelector('.mc-secondary').textContent = member.email;

                        button.addEventListener('click', () => {
                            results.querySelectorAll('.mc-result').forEach(b => {
                                b.classList.remove('is-selected');
                                b.setAttribute('aria-selected', 'false');
                            });
                            button.classList.add('is-selected');
                            button.setAttribute('aria-selected', 'true');
                            memberId.value = member.id;
                            submit.disabled = false;
                        });
                        results.appendChild(button);
                    });
                } catch (err) {
                    message('Search failed. Check your connection and try again.');
                }
            }, 250);
        });
    })();
</script>
