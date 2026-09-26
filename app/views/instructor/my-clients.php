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

<div class="mc-view">
    <div class="mc-head">
        <div>
            <h1 class="mc-title">My Clients</h1>
            <p class="mc-subtitle"><?= (int) $stats[0]['value'] ?> active clients. <?= (int) $stats[3]['value'] ?> need a plan review this week.</p>
        </div>
        <div class="mc-actions">
            <button type="button" class="mc-btn">Export list</button>
            <button type="button" class="mc-btn">Invite client</button>
            <button type="button" class="mc-btn mc-btn--primary">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add client
            </button>
        </div>
    </div>

    <section class="mc-stats">
        <?php foreach ($stats as $stat): ?>
            <div class="mc-stat <?= !empty($stat['alert']) ? 'mc-stat--alert' : '' ?>">
                <p class="mc-stat__label"><?= htmlspecialchars($stat['label']) ?></p>
                <p class="mc-stat__value"><?= htmlspecialchars($stat['value']) ?></p>
                <p class="mc-stat__meta"><?= htmlspecialchars($stat['meta']) ?></p>
            </div>
        <?php endforeach; ?>
    </section>

    <section class="mc-panel">
        <div class="mc-toolbar">
            <label class="mc-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2" stroke-linecap="round">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="mc-search" placeholder="Search by name or email" aria-label="Search clients">
            </label>

            <?php foreach ($filters as $i => $filter): ?>
                <button type="button" class="mc-chip <?= $i === 0 ? 'is-active' : '' ?>" data-filter="<?= htmlspecialchars($filter['key']) ?>">
                    <?= htmlspecialchars($filter['label']) ?>
                    <span class="mc-chip__count"><?= (int) $filter['count'] ?></span>
                </button>
            <?php endforeach; ?>

            <div class="mc-toolbar__right">
                <button type="button" class="mc-btn">Sort: Next session</button>
                <button type="button" class="mc-btn mc-btn--square" aria-label="Grid view">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                    </svg>
                </button>
            </div>
        </div>

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
                <tbody id="mc-rows">
                    <?php foreach ($clients as $client): ?>
                        <?php [$statusLabel, $statusClass] = $statusTags[$client['status']]; ?>
                        <tr data-type="<?= htmlspecialchars(strtolower($client['type'])) ?>"
                            data-status="<?= htmlspecialchars($client['status']) ?>"
                            data-search="<?= htmlspecialchars(strtolower($client['name'] . ' ' . $client['email'])) ?>"
                            data-href="/my-clients/client?member=<?= (int) $client['id'] ?>">
                            <td>
                                <div class="mc-client">
                                    <span class="mc-avatar"><?= htmlspecialchars($initials($client['name'])) ?></span>
                                    <div>
                                        <a class="mc-primary mc-client-link" href="/my-clients/client?member=<?= (int) $client['id'] ?>"><?= htmlspecialchars($client['name']) ?></a>
                                        <p class="mc-secondary"><?= htmlspecialchars($client['email']) ?></p>
                                    </div>
                                </div>
                            </td>
                            <td><span class="mc-tag"><?= htmlspecialchars($client['type']) ?></span></td>
                            <td>
                                <p class="mc-program"><?= htmlspecialchars($client['program']) ?></p>
                                <p class="mc-secondary"><?= htmlspecialchars($client['program_meta']) ?></p>
                            </td>
                            <td>
                                <div class="mc-adherence">
                                    <div class="mc-bar">
                                        <?php if ($client['adherence'] !== null): ?>
                                            <div class="mc-bar__fill <?= $client['adherence'] < 60 ? 'mc-bar__fill--low' : '' ?>" style="width: <?= (int) $client['adherence'] ?>%"></div>
                                        <?php endif; ?>
                                    </div>
                                    <span>
                                        <?php if ($client['adherence'] !== null): ?>
                                            <?= (int) $client['adherence'] ?>%
                                        <?php else: ?>
                                            <?= $client['status'] === 'new' ? 'New' : '—' ?>
                                        <?php endif; ?>
                                    </span>
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
            <p class="mc-empty" id="mc-empty" hidden>No clients match your search.</p>
        </div>

        <div class="mc-footer">
            <span id="mc-showing">Showing <?= count($clients) ?> of <?= (int) $totalClients ?> clients</span>
            <div class="mc-pager">
                <button type="button" class="mc-btn" disabled>Previous</button>
                <button type="button" class="mc-btn">Next</button>
            </div>
        </div>
    </section>
</div>

<script>
    // UI only — filtering happens on the rows already on the page
    (function () {
        const rows = [...document.querySelectorAll('#mc-rows tr')];
        const search = document.getElementById('mc-search');
        const chips = document.querySelectorAll('.mc-chip');
        const showing = document.getElementById('mc-showing');
        const empty = document.getElementById('mc-empty');
        const total = <?= (int) $totalClients ?>;
        let activeFilter = 'all';

        function matchesFilter(row) {
            if (activeFilter === 'all') return true;
            if (activeFilter === 'needs_review') return row.dataset.status === 'needs_review';
            return row.dataset.type === activeFilter;
        }

        function apply() {
            const term = search.value.trim().toLowerCase();
            let visible = 0;
            rows.forEach(row => {
                const show = matchesFilter(row) && row.dataset.search.includes(term);
                row.hidden = !show;
                if (show) visible++;
            });
            empty.hidden = visible > 0;
            showing.textContent = `Showing ${visible} of ${total} clients`;
        }

        search.addEventListener('input', apply);
        chips.forEach(chip => chip.addEventListener('click', () => {
            chips.forEach(c => c.classList.remove('is-active'));
            chip.classList.add('is-active');
            activeFilter = chip.dataset.filter;
            apply();
        }));

        // Whole row opens the client
        rows.forEach(row => row.addEventListener('click', e => {
            if (e.target.closest('a, button')) return;
            window.location.href = row.dataset.href;
        }));
    })();
</script>
