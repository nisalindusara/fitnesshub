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

    /* Flash */
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
?>

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
        <a class="mc-btn" href="/portal/clients/export<?= htmlspecialchars($listUrl([])) ?>">Export CSV</a>
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
            <form class="mc-search" method="get" action="/portal/clients" role="search" id="mc-search-form">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2" stroke-linecap="round">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" name="q" id="mc-search" value="<?= htmlspecialchars($search) ?>" placeholder="Search by name or email" aria-label="Search clients">
                <?php if ($filter !== 'all'): ?><input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>"><?php endif; ?>
                <?php if ($sort !== 'next'): ?><input type="hidden" name="sort" value="<?= htmlspecialchars($sort) ?>"><?php endif; ?>
            </form>

            <?php foreach (ClientRosterService::FILTERS as $key => $label): ?>
                <a href="/portal/clients<?= htmlspecialchars($listUrl(['filter' => $key])) ?>" class="mc-chip <?= $filter === $key ? 'is-active' : '' ?>" <?= $filter === $key ? 'aria-current="true"' : '' ?>>
                    <?= htmlspecialchars($label) ?>
                    <span class="mc-chip__count"><?= (int) $filterCounts[$key] ?></span>
                </a>
            <?php endforeach; ?>

            <div class="mc-toolbar__right">
                <div class="mc-sort">
                    <button type="button" class="mc-btn" id="mc-sort-btn" aria-haspopup="true" aria-expanded="false">Sort: <?= htmlspecialchars(ClientRosterService::SORTS[$sort]) ?></button>
                    <div class="mc-sort__menu" id="mc-sort-menu" hidden>
                        <?php foreach (ClientRosterService::SORTS as $key => $label): ?>
                            <a href="/portal/clients<?= htmlspecialchars($listUrl(['sort' => $key])) ?>" <?= $sort === $key ? 'aria-current="true"' : '' ?>><?= htmlspecialchars($label) ?></a>
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
                    You don't have any clients yet.
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
                            $href = '/portal/clients/workout-plan?member=' . (int) $client['member_id'];
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
                    <a class="mc-card" href="/portal/clients/workout-plan?member=<?= (int) $client['member_id'] ?>">
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
                <a class="mc-btn" href="/portal/clients<?= htmlspecialchars($listUrl(['page' => $page - 1])) ?>" <?= $page <= 1 ? 'aria-disabled="true" tabindex="-1"' : '' ?>>Previous</a>
                <a class="mc-btn" href="/portal/clients<?= htmlspecialchars($listUrl(['page' => $page + 1])) ?>" <?= $page >= $pages ? 'aria-disabled="true" tabindex="-1"' : '' ?>>Next</a>
            </div>
        </div>
    </section>
</div>

<script>
    (function () {
        const view = document.getElementById('mc-view');

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
    })();
</script>
