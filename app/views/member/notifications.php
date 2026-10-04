<style>
    .mn-page {
        width: 100%;
        display: flex;
        justify-content: center;
        box-sizing: border-box;
    }

    .mn-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    .mn-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        margin-bottom: 24px;
    }

    .mn-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .mn-settings {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        text-decoration: none;
    }

    .mn-settings:hover {
        text-decoration: underline;
    }

    .mn-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .mn-item {
        display: flex;
        gap: 14px;
        padding: 18px 20px;
        background-color: #F3F4F6;
        border-radius: 14px;
        color: inherit;
        text-decoration: none;
    }

    a.mn-item:hover {
        background-color: #E5E7EB;
    }

    .mn-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: transparent;
        margin-top: 6px;
        flex-shrink: 0;
    }

    .mn-item.is-unread .mn-dot {
        background: #111827;
    }

    .mn-body {
        flex: 1;
        min-width: 0;
    }

    .mn-item-title {
        margin: 0;
        font-size: 14px;
        font-weight: 600;
        color: #111827;
    }

    .mn-item.is-unread .mn-item-title {
        font-weight: 700;
    }

    .mn-item-text {
        margin: 4px 0 0;
        font-size: 13px;
        color: #6B7280;
    }

    .mn-time {
        font-size: 12px;
        color: #9CA3AF;
        white-space: nowrap;
    }

    @media (max-width: 600px) {
        .mn-card {
            padding: 28px 20px;
        }
    }
</style>

<div class="mn-page">
    <div class="mn-card">
        <div class="mn-header">
            <h1 class="mn-title">Notifications</h1>
            <a class="mn-settings" href="/member/profile/notification-settings">Settings</a>
        </div>

        <ul class="mn-list">
            <?php foreach ($notifications as $n): ?>
                <li>
                    <?php $tag = $n['href'] ? 'a href="' . htmlspecialchars($n['href']) . '"' : 'div'; ?>
                    <<?= $tag ?> class="mn-item<?= $n['unread'] ? ' is-unread' : '' ?>">
                        <span class="mn-dot" aria-hidden="true"></span>
                        <div class="mn-body">
                            <p class="mn-item-title"><?= htmlspecialchars($n['title']) ?></p>
                            <p class="mn-item-text"><?= htmlspecialchars($n['body']) ?></p>
                        </div>
                        <span class="mn-time"><?= htmlspecialchars($n['time']) ?></span>
                    </<?= $n['href'] ? 'a' : 'div' ?>>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
