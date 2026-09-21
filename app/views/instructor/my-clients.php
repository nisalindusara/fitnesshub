<?php
/**
 * Instructor Portal — My Clients View
 */
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$baseUrl = ($scriptDir === '/' || $scriptDir === '.') ? '' : $scriptDir;
?>

<div class="clients-directory-container">
    <div class="clients-directory-header">
        <div class="header-titles">
            <div class="header-top-row">
                <h1 class="directory-title">My Clients</h1>
                <span class="clients-count-badge"><?= count($clients ?? []) ?> Assigned</span>
            </div>
            <p class="directory-subtitle">Monitor assigned members, track workout milestones, and launch direct messaging.</p>
        </div>

        <div class="directory-controls">
            <div class="directory-search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" id="clientDirectorySearch" placeholder="Search by name, email or goal..." aria-label="Search clients">
            </div>
        </div>
    </div>

    <!-- Clients Grid -->
    <div class="clients-grid" id="clientsGrid">
        <?php if (empty($clients)): ?>
            <div class="empty-clients-box">
                <div class="empty-icon">👥</div>
                <h3>No clients found</h3>
                <p>There are no active clients currently assigned to your roster.</p>
            </div>
        <?php else: ?>
            <?php foreach ($clients as $client): 
                $clientId = (int)($client['client_id'] ?? $client['id']);
                $fullName = trim(($client['first_name'] ?? '') . ' ' . ($client['last_name'] ?? ''));
                $initials = strtoupper(substr($client['first_name'] ?? 'C', 0, 1) . substr($client['last_name'] ?? 'L', 0, 1));
                $email = htmlspecialchars($client['email'] ?? '');
                $phone = htmlspecialchars($client['phone_number'] ?? '');
                $goal = htmlspecialchars($client['fitness_goal'] ?? 'General Fitness');
                $nextSession = htmlspecialchars($client['next_session'] ?? 'Upcoming');
                $totalSessions = (int)($client['total_sessions'] ?? 0);
                $growthRate = htmlspecialchars($client['growth_rate'] ?? 'N/A');
                $growthDelta = htmlspecialchars($client['growth_delta'] ?? '+0.0%');
                $lastMsg = !empty($client['last_message']) && $client['last_message'] !== 'No messages yet' 
                    ? htmlspecialchars($client['last_message']) 
                    : 'No conversation history yet';
            ?>
                <div class="client-card" data-client-name="<?= strtolower($fullName) ?>" data-client-email="<?= strtolower($email) ?>" data-client-goal="<?= strtolower($goal) ?>">
                    <div class="client-card-top">
                        <div class="client-card-avatar"><?= $initials ?></div>
                        <div class="client-card-details">
                            <h2 class="client-card-name"><?= htmlspecialchars($fullName) ?></h2>
                            <span class="client-card-email"><?= $email ?></span>
                            <?php if ($phone): ?>
                                <span class="client-card-phone">📞 <?= $phone ?></span>
                            <?php endif; ?>
                        </div>
                        <span class="client-goal-pill"><?= $goal ?></span>
                    </div>

                    <div class="client-stats-row">
                        <div class="client-stat-box">
                            <span class="stat-label">Next Session</span>
                            <span class="stat-value"><?= $nextSession ?></span>
                        </div>
                        <div class="client-stat-box">
                            <span class="stat-label">Total Sessions</span>
                            <span class="stat-value"><?= $totalSessions ?></span>
                        </div>
                        <div class="client-stat-box">
                            <span class="stat-label">Growth</span>
                            <span class="stat-value text-success"><?= $growthRate ?> <small><?= $growthDelta ?></small></span>
                        </div>
                    </div>

                    <div class="client-last-msg-preview">
                        <span class="msg-icon">💬</span>
                        <span class="msg-text"><?= $lastMsg ?></span>
                    </div>

                    <div class="client-card-actions">
                        <a href="<?= $baseUrl ?>/instructor/messages?client_id=<?= $clientId ?>" class="client-btn client-btn-primary">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Chat
                        </a>
                        <a href="<?= $baseUrl ?>/instructor/messages?client_id=<?= $clientId ?>&view=profile" class="client-btn client-btn-outline">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            View Profile
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<style>
.clients-directory-container {
    padding: 24px 32px;
    height: 100%;
    overflow-y: auto;
    background-color: var(--inst-bg);
}

.clients-directory-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 24px;
    padding-bottom: 20px;
    border-bottom: 1px solid var(--inst-border);
    flex-wrap: wrap;
    gap: 16px;
}

.header-top-row {
    display: flex;
    align-items: center;
    gap: 12px;
}

.directory-title {
    font-size: 24px;
    font-weight: 700;
    color: var(--inst-text-main);
    letter-spacing: -0.02em;
}

.clients-count-badge {
    background-color: var(--inst-primary);
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 10px;
    border-radius: 999px;
}

.directory-subtitle {
    font-size: 13.5px;
    color: var(--inst-text-muted);
    margin-top: 4px;
}

.directory-search {
    display: flex;
    align-items: center;
    background-color: #FFFFFF;
    border: 1px solid var(--inst-border);
    border-radius: 8px;
    padding: 8px 14px;
    gap: 10px;
    width: 280px;
    box-shadow: var(--inst-shadow-sm);
    transition: border-color 0.15s;
}

.directory-search:focus-within {
    border-color: var(--inst-primary);
}

.directory-search input {
    border: none;
    outline: none;
    background: transparent;
    font-size: 13px;
    font-family: inherit;
    color: var(--inst-text-main);
    width: 100%;
}

.directory-search input::placeholder {
    color: var(--inst-text-faint);
}

.clients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 20px;
}

.client-card {
    background-color: var(--inst-card-bg);
    border: 1px solid var(--inst-border);
    border-radius: 12px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    box-shadow: var(--inst-shadow-sm);
    transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
}

.client-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--inst-shadow-md);
    border-color: #D4D4D8;
}

.client-card-top {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    position: relative;
    margin-bottom: 16px;
}

.client-card-avatar {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    background: #E2E8F0;
    color: #1E293B;
    font-size: 16px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.client-card-details {
    flex: 1;
    min-width: 0;
}

.client-card-name {
    font-size: 16px;
    font-weight: 700;
    color: var(--inst-text-main);
    margin-bottom: 2px;
}

.client-card-email {
    font-size: 12px;
    color: var(--inst-text-muted);
    display: block;
    word-break: break-all;
}

.client-card-phone {
    font-size: 11.5px;
    color: var(--inst-text-faint);
    display: block;
    margin-top: 2px;
}

.client-goal-pill {
    background-color: var(--inst-accent-blue);
    color: var(--inst-accent-blue-text);
    font-size: 11px;
    font-weight: 600;
    padding: 4px 8px;
    border-radius: 6px;
    align-self: flex-start;
    white-space: nowrap;
}

.client-stats-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    background-color: var(--inst-border-subtle);
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 14px;
}

.client-stat-box {
    display: flex;
    flex-direction: column;
}

.stat-label {
    font-size: 10.5px;
    color: var(--inst-text-faint);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.03em;
}

.stat-value {
    font-size: 12.5px;
    font-weight: 700;
    color: var(--inst-text-main);
    margin-top: 2px;
}

.text-success {
    color: #10B981;
}

.text-success small {
    font-size: 10px;
    font-weight: 600;
}

.client-last-msg-preview {
    font-size: 12px;
    color: var(--inst-text-muted);
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 8px 10px;
    background: #FAFAFA;
    border-radius: 6px;
    margin-bottom: 16px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.client-last-msg-preview .msg-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.client-card-actions {
    display: flex;
    gap: 10px;
    margin-top: auto;
}

.client-btn {
    flex: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 12px;
    border-radius: 8px;
    font-size: 12.5px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.15s ease;
    cursor: pointer;
}

.client-btn-primary {
    background-color: var(--inst-primary);
    color: #FFFFFF;
}

.client-btn-primary:hover {
    background-color: var(--inst-primary-hover);
}

.client-btn-outline {
    background-color: #FFFFFF;
    border: 1px solid var(--inst-border);
    color: var(--inst-text-main);
}

.client-btn-outline:hover {
    background-color: var(--inst-border-subtle);
}

.empty-clients-box {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    background-color: #FFFFFF;
    border: 1px dashed var(--inst-border);
    border-radius: 12px;
    color: var(--inst-text-muted);
}

.empty-icon {
    font-size: 36px;
    margin-bottom: 12px;
}
</style>

<script>
document.getElementById('clientDirectorySearch')?.addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase().trim();
    const cards = document.querySelectorAll('.client-card');

    cards.forEach(card => {
        const name = card.getAttribute('data-client-name') || '';
        const email = card.getAttribute('data-client-email') || '';
        const goal = card.getAttribute('data-client-goal') || '';

        if (!query || name.includes(query) || email.includes(query) || goal.includes(query)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>