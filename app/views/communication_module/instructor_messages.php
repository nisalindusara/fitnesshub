<?php $pageStyles = ['staff/communication_module/instructor_messages']; ?>

<div class="msg-view">
    <div>
        <h1 class="msg-title">Messages</h1>
        <p class="msg-subtitle">Chat with your clients.</p>
    </div>

    <section class="msg-panel" id="msgPanel">
        <!-- Conversation list -->
        <aside class="msg-sidebar" aria-label="Conversations">
            <div class="msg-search" role="search">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.4)" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="search" id="searchInput" placeholder="Search clients" autocomplete="off" aria-label="Search conversations">
            </div>

            <div class="msg-filters">
                <button type="button" class="msg-chip tab-btn is-active" data-filter="all" aria-pressed="true">All</button>
                <button type="button" class="msg-chip tab-btn" data-filter="unread" aria-pressed="false">
                    Unread <span id="totalUnreadBadge" class="msg-chip__count">0</span>
                </button>
            </div>

            <ul id="conversationList" class="conversation-list">
                <li class="empty-state">Loading conversations…</li>
            </ul>
        </aside>

        <!-- Active chat -->
        <main class="msg-main">
            <div id="chatPlaceholder" class="chat-placeholder">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="rgba(28,28,28,0.3)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <p>Select a conversation to start messaging</p>
            </div>

            <div id="chatWindow" class="chat-window" hidden>
                <header class="chat-header">
                    <button type="button" class="msg-icon-btn msg-back-btn" id="backToListBtn" aria-label="Back to conversations">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    </button>
                    <img id="chatAvatarImg" class="msg-avatar" src="" alt="" hidden>
                    <span id="chatAvatar" class="msg-avatar" hidden></span>
                    <div class="chat-header__text">
                        <p id="chatName" class="chat-header__name"></p>
                        <p class="chat-header__meta">Client</p>
                    </div>
                    <?php if (Gate::allows('view_own_clients')): ?>
                        <a id="chatProfileLink" class="msg-btn msg-btn--small" href="/portal/clients/profile">View profile</a>
                    <?php endif; ?>
                </header>

                <div id="messageList" class="message-stream" aria-live="polite"></div>

                <div class="msg-composer">
                    <div id="messageError" class="msg-error" role="alert" hidden></div>
                    <form id="sendForm" class="message-composer">
                        <input type="text" id="messageInput" placeholder="Type a message…" autocomplete="off" maxlength="2000" aria-label="Message">
                        <button type="submit" class="msg-btn msg-btn--primary" id="sendBtn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </section>
</div>

<!-- Delete confirmation -->
<div id="deleteModal" class="msg-modal" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
    <div class="msg-modal__box">
        <h2 class="msg-modal__title" id="deleteModalTitle">Delete message?</h2>
        <p class="msg-modal__desc">This message will be removed from the conversation for both of you. This can't be undone.</p>
        <div class="msg-modal__actions">
            <button type="button" id="cancelDeleteBtn" class="msg-btn">Cancel</button>
            <button type="button" id="confirmDeleteBtn" class="msg-btn msg-btn--danger">Delete</button>
        </div>
    </div>
</div>

<script>
    const CURRENT_USER_ID = <?= (int) $currentUserId ?>;
</script>
<script src="/assets/js/instructor-messages.js?v=<?= filemtime(__DIR__ . '/../../../public/assets/js/instructor-messages.js') ?>"></script>
