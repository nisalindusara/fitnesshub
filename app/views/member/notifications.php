<?php $pageStyles = ['member/member/notifications']; ?>

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
