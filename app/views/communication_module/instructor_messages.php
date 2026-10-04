<style>
    /* Instructor messages. Follows the staff-portal look used by My Clients:
       Inter, #1c1c1c text with rgba(28, 28, 28, x) greys, 12px panels, 8px controls. */
    .msg-view {
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
        padding: 24px 28px 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        height: 100vh;
        height: 100dvh;
        box-sizing: border-box;
    }

    .msg-view *,
    .msg-modal * {
        box-sizing: border-box;
    }

    .msg-view [hidden] {
        display: none !important;
    }

    .msg-title {
        font-size: 26px;
        font-weight: 700;
        letter-spacing: -0.02em;
        margin: 0;
    }

    .msg-subtitle {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        margin: 4px 0 0;
    }

    .msg-panel {
        flex: 1;
        min-height: 0;
        display: grid;
        grid-template-columns: 320px minmax(0, 1fr);
        border: 1px solid rgba(28, 28, 28, 0.1);
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
    }

    /* Conversation list */
    .msg-sidebar {
        display: flex;
        flex-direction: column;
        min-height: 0;
        border-right: 1px solid rgba(28, 28, 28, 0.08);
        padding: 18px 12px 12px;
    }

    .msg-search {
        display: flex;
        align-items: center;
        gap: 8px;
        height: 36px;
        margin: 0 6px;
        padding: 0 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
    }

    .msg-search input {
        border: none;
        outline: none;
        background: transparent;
        font-family: inherit;
        font-size: 14px;
        width: 100%;
        color: #1c1c1c;
    }

    .msg-search input::placeholder {
        color: rgba(28, 28, 28, 0.35);
    }

    .msg-filters {
        display: flex;
        gap: 8px;
        margin: 12px 6px;
    }

    .msg-chip {
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

    .msg-chip__count {
        font-size: 11px;
        padding: 1px 6px;
        border-radius: 4px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.6);
    }

    .msg-chip.is-active {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .msg-chip.is-active .msg-chip__count {
        background: rgba(255, 255, 255, 0.18);
        color: #ffffff;
    }

    .conversation-list {
        list-style: none;
        margin: 0;
        padding: 0;
        overflow-y: auto;
        flex: 1;
        min-height: 0;
    }

    .conversation-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.15s ease;
    }

    .conversation-item:hover {
        background: #f7f9fb;
    }

    .conversation-item.active {
        background: rgba(28, 28, 28, 0.05);
    }

    .conversation-item:focus-visible {
        outline: 2px solid #1c1c1c;
        outline-offset: -2px;
    }

    .msg-avatar {
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
        object-fit: cover;
    }

    .conv-meta-wrap {
        flex: 1;
        min-width: 0;
    }

    .conv-top-row,
    .conv-bottom-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }

    .contact-name-txt {
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .conv-time-txt {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.45);
        white-space: nowrap;
    }

    .conv-last-msg {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin-top: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .conversation-item.has-unread .conv-last-msg {
        color: #1c1c1c;
        font-weight: 500;
    }

    .msg-count {
        min-width: 20px;
        height: 20px;
        padding: 0 6px;
        border-radius: 999px;
        background: #1c1c1c;
        color: #ffffff;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .empty-state {
        text-align: center;
        padding: 32px 12px;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    /* Chat column */
    .msg-main {
        display: flex;
        flex-direction: column;
        min-width: 0;
        min-height: 0;
    }

    .chat-placeholder {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        color: rgba(28, 28, 28, 0.5);
        font-size: 14px;
        text-align: center;
        padding: 24px;
    }

    .chat-placeholder p {
        margin: 0;
    }

    .chat-window {
        flex: 1;
        display: flex;
        flex-direction: column;
        min-height: 0;
    }

    .chat-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 20px;
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
    }

    .chat-header__name {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .chat-header__text {
        min-width: 0;
    }

    .chat-header__meta {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        margin: 1px 0 0;
    }

    .msg-icon-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: #1c1c1c;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
        transition: background-color 0.15s ease;
    }

    .msg-icon-btn:hover {
        background: #f7f9fb;
    }

    /* Only shown in the single-column (small screen) layout */
    .msg-icon-btn.msg-back-btn {
        display: none;
    }

    .message-stream {
        flex: 1;
        min-height: 0;
        overflow-y: auto;
        padding: 20px 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .empty-thread {
        margin: auto 0;
        text-align: center;
        font-size: 14px;
        color: rgba(28, 28, 28, 0.5);
    }

    .day-divider {
        align-self: center;
        font-size: 12px;
        padding: 3px 8px;
        border-radius: 6px;
        background: rgba(28, 28, 28, 0.06);
        color: rgba(28, 28, 28, 0.7);
        margin: 4px 0;
    }

    .bubble-wrap {
        display: flex;
        flex-direction: column;
        max-width: min(560px, 75%);
        transition: opacity 0.2s ease, transform 0.2s ease;
    }

    .bubble-wrap.sent {
        align-self: flex-end;
        align-items: flex-end;
    }

    .bubble-wrap.received {
        align-self: flex-start;
        align-items: flex-start;
    }

    .bubble-wrap.deleting {
        opacity: 0;
        transform: scale(0.96);
    }

    .bubble-content-row {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .bubble-wrap.sent .bubble-content-row {
        flex-direction: row-reverse;
    }

    .bubble-pill {
        padding: 10px 14px;
        font-size: 14px;
        line-height: 1.5;
        border-radius: 12px;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
    }

    .bubble-wrap.sent .bubble-pill {
        background: #1c1c1c;
        color: #ffffff;
        border-bottom-right-radius: 4px;
    }

    .bubble-wrap.received .bubble-pill {
        background: #f7f9fb;
        border: 1px solid rgba(28, 28, 28, 0.08);
        border-bottom-left-radius: 4px;
    }

    .bubble-meta-info {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: rgba(28, 28, 28, 0.45);
        margin-top: 4px;
    }

    .read-check {
        font-weight: 600;
    }

    .read-check.is-read {
        color: #1c1c1c;
    }

    .msg-delete-btn {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: rgba(28, 28, 28, 0.55);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        flex-shrink: 0;
        opacity: 0;
        transition: opacity 0.15s ease, background-color 0.15s ease, color 0.15s ease;
    }

    .bubble-wrap.sent:hover .msg-delete-btn,
    .msg-delete-btn:focus-visible {
        opacity: 1;
    }

    .msg-delete-btn:hover {
        background: #fdecec;
        border-color: #f6d5d5;
        color: #b42318;
    }

    /* Composer */
    .msg-composer {
        border-top: 1px solid rgba(28, 28, 28, 0.08);
        padding: 14px 20px 16px;
    }

    .msg-error {
        padding: 10px 14px;
        border-radius: 10px;
        font-size: 14px;
        margin-bottom: 10px;
        background: #fdf0f0;
        border: 1px solid #f6d5d5;
        color: #b42318;
    }

    .message-composer {
        display: flex;
        gap: 8px;
    }

    .message-composer input {
        flex: 1;
        min-width: 0;
        height: 40px;
        padding: 0 14px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-family: inherit;
        font-size: 14px;
        color: #1c1c1c;
        outline: none;
    }

    .message-composer input::placeholder {
        color: rgba(28, 28, 28, 0.35);
    }

    .message-composer input:focus {
        border-color: rgba(28, 28, 28, 0.4);
    }

    .msg-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        height: 40px;
        padding: 0 16px;
        border-radius: 8px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        background: #ffffff;
        color: #1c1c1c;
        font-family: inherit;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        white-space: nowrap;
        transition: background-color 0.15s ease;
    }

    .msg-btn:hover {
        background: #f7f9fb;
    }

    .msg-btn--primary {
        background: #1c1c1c;
        border-color: #1c1c1c;
        color: #ffffff;
    }

    .msg-btn--primary:hover {
        background: #333333;
    }

    .msg-btn--danger {
        background: #b42318;
        border-color: #b42318;
        color: #ffffff;
    }

    .msg-btn--danger:hover {
        background: #912018;
    }

    .msg-btn--small {
        height: 32px;
        padding: 0 12px;
        font-size: 13px;
        margin-left: auto;
        text-decoration: none;
    }

    .msg-btn:disabled {
        opacity: 0.5;
        cursor: default;
    }

    /* Delete confirmation */
    .msg-modal {
        position: fixed;
        inset: 0;
        background: rgba(28, 28, 28, 0.4);
        display: none;
        align-items: center;
        justify-content: center;
        padding: 16px;
        z-index: 1000;
        font-family: 'Inter', sans-serif;
        color: #1c1c1c;
    }

    .msg-modal.open {
        display: flex;
    }

    .msg-modal__box {
        background: #ffffff;
        border-radius: 12px;
        padding: 24px;
        width: 100%;
        max-width: 400px;
    }

    .msg-modal__title {
        font-size: 18px;
        font-weight: 700;
        margin: 0 0 8px;
    }

    .msg-modal__desc {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        margin: 0 0 20px;
    }

    .msg-modal__actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    @media (max-width: 860px) {
        .msg-panel {
            grid-template-columns: minmax(0, 1fr);
        }

        .msg-sidebar {
            border-right: none;
        }

        /* One column: show the list, or the open chat */
        .msg-panel.is-chat-open .msg-sidebar,
        .msg-panel:not(.is-chat-open) .msg-main {
            display: none;
        }

        .msg-icon-btn.msg-back-btn {
            display: inline-flex;
        }
    }

    @media (max-width: 600px) {
        .msg-view {
            padding: 20px 16px;
        }

        .message-stream {
            padding: 16px;
        }

        .bubble-wrap {
            max-width: 85%;
        }
    }
</style>

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
