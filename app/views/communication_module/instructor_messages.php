<style>
/* Container 3-Column Layout */
.chat-dashboard {
    display: flex;
    height: calc(100vh - 85px);
    margin: 10px 15px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
    border: 1px solid #f0f2f5;
    overflow: hidden;
    position: relative;
    container-type: inline-size;
    container-name: chatDashboard;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

/* 1. LEFT SIDEBAR */
.chat-sidebar {
    width: 320px;
    min-width: 300px;
    max-width: 340px;
    border-right: 1px solid #f0f2f5;
    display: flex;
    flex-direction: column;
    padding: 20px 16px 16px;
    background: #ffffff;
}

.chat-sidebar-title {
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    margin: 0 0 16px 4px;
    letter-spacing: -0.3px;
}

.search-bar-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    background: #f4f5f7;
    border-radius: 10px;
    padding: 7px 12px;
    margin-bottom: 14px;
}

.search-bar-wrapper .search-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    margin-right: 8px;
}

.search-bar-wrapper input {
    border: none;
    background: transparent;
    outline: none;
    font-size: 13.5px;
    width: 100%;
    color: #1f2937;
}

.search-bar-wrapper input::placeholder {
    color: #9ca3af;
}

.kbd-shortcut {
    font-size: 11px;
    color: #9ca3af;
    background: #ffffff;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
    padding: 2px 6px;
    font-family: inherit;
    font-weight: 500;
    user-select: none;
}

.filter-tabs {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 12px;
    padding: 0 4px 6px;
    border-bottom: 1px solid #f8fafc;
}

.tab-btn {
    border: none;
    background: none;
    font-size: 13.5px;
    font-weight: 600;
    color: #6b7280;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 4px 0;
    transition: color 0.15s ease;
}

.tab-btn:hover {
    color: #111827;
}

.tab-btn.active {
    color: #111827;
    font-weight: 700;
}

.filter-pill {
    background: #111827;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    border-radius: 10px;
    padding: 1px 7px;
    line-height: 16px;
}

.conversation-list {
    list-style: none;
    overflow-y: auto;
    flex: 1;
    margin: 0;
    padding: 0;
}

.conversation-list::-webkit-scrollbar {
    width: 4px;
}
.conversation-list::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 4px;
}

.empty-state {
    text-align: center;
    color: #9ca3af;
    font-size: 13px;
    padding: 30px 10px;
}

.conversation-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 12px;
    border-radius: 12px;
    cursor: pointer;
    transition: background 0.15s ease;
    margin-bottom: 4px;
    position: relative;
    user-select: none;
}

.conversation-item:hover {
    background: #f8fafc;
}

.conversation-item.active {
    background: #f1f5f9;
}

.conversation-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 18%;
    bottom: 18%;
    width: 3.5px;
    background: #111827;
    border-radius: 0 4px 4px 0;
}

.avatar-container {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 50%;
    position: relative;
    flex-shrink: 0;
}

.avatar-circle {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 50%;
    color: #ffffff;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    text-transform: uppercase;
}

.avatar-circle-img {
    width: 44px;
    height: 44px;
    min-width: 44px;
    border-radius: 50%;
    object-fit: cover;
    display: block;
}

.conv-meta-wrap {
    flex: 1;
    min-width: 0;
}

.conv-top-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 3px;
}

.contact-name-txt {
    font-size: 13.5px;
    font-weight: 600;
    color: #1e293b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-right: 6px;
}

.conv-time-txt {
    font-size: 11px;
    color: #94a3b8;
    flex-shrink: 0;
}

.conv-bottom-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.conv-last-msg {
    font-size: 12.5px;
    color: #64748b;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    line-height: 1.4;
}

.unread-dot {
    width: 8px;
    height: 8px;
    min-width: 8px;
    border-radius: 50%;
    background: #111827;
    margin-left: 8px;
    flex-shrink: 0;
}

/* 2. CENTER CHAT MAIN */
.chat-main {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #ffffff;
    border-right: 1px solid #f0f2f5;
    position: relative;
    min-width: 0;
}

.chat-placeholder {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #9ca3af;
    font-size: 14px;
    gap: 12px;
}

.chat-window {
    flex: 1;
    display: flex;
    flex-direction: column;
    height: 100%;
    min-width: 0;
}

.chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 24px;
    border-bottom: 1px solid #f1f3f5;
    background: #ffffff;
}

.active-contact-info {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
    flex: 1;
}

.header-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    flex-shrink: 0;
}

.header-avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    color: #ffffff;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    flex-shrink: 0;
}

.active-contact-name {
    font-size: 15px;
    font-weight: 700;
    color: #0f172a;
    letter-spacing: -0.2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 8px;
    flex-shrink: 0;
}

.icon-btn {
    border: none;
    background: none;
    color: #64748b;
    cursor: pointer;
    padding: 6px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.15s ease, color 0.15s ease;
}

.icon-btn:hover {
    background: #f1f5f9;
    color: #1e293b;
}

/* Message Stream & Bubbles */
.message-stream {
    flex: 1;
    overflow-y: auto;
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 16px;
    background: #ffffff;
}

.message-stream::-webkit-scrollbar {
    width: 4px;
}
.message-stream::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 4px;
}

.day-divider {
    align-self: center;
    background: #f1f3f5;
    color: #64748b;
    font-size: 11px;
    font-weight: 600;
    padding: 4px 14px;
    border-radius: 12px;
    margin: 4px 0 8px;
    user-select: none;
}

.bubble-wrap {
    display: flex;
    flex-direction: column;
    max-width: 60%;
    position: relative;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

.bubble-wrap.deleting {
    opacity: 0;
    transform: scale(0.92);
}

.bubble-wrap.received {
    align-self: flex-start;
    align-items: flex-start;
}

.bubble-wrap.sent {
    align-self: flex-end;
    align-items: flex-end;
}

.bubble-content-row {
    display: flex;
    align-items: center;
    gap: 8px;
    max-width: 100%;
}

.bubble-wrap.sent .bubble-content-row {
    flex-direction: row-reverse;
}

.bubble-pill {
    padding: 12px 18px;
    border-radius: 16px;
    font-size: 13.5px;
    line-height: 1.45;
    word-break: break-word;
}

.bubble-wrap.received .bubble-pill {
    background: #eff1f4;
    color: #1e293b;
    border-top-left-radius: 4px;
}

.bubble-wrap.sent .bubble-pill {
    background: #dce8f7;
    color: #0f172a;
    border-top-right-radius: 4px;
}

.bubble-meta-info {
    font-size: 11px;
    color: #94a3b8;
    margin-top: 4px;
    display: flex;
    align-items: center;
    gap: 4px;
}

.read-check {
    color: #0284c7;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    display: inline-flex;
    align-items: center;
}

/* Delete Message Action Button */
.msg-delete-btn {
    opacity: 0;
    visibility: hidden;
    background: #fee2e2;
    color: #ef4444;
    border: none;
    border-radius: 50%;
    width: 26px;
    height: 26px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: opacity 0.15s ease, background 0.15s ease, transform 0.1s ease;
    flex-shrink: 0;
    padding: 0;
}

.bubble-wrap.sent:hover .msg-delete-btn {
    opacity: 1;
    visibility: visible;
}

.msg-delete-btn:hover {
    background: #fecaca;
    color: #b91c1c;
    transform: scale(1.08);
}

/* Message Composer Bottom */
.message-composer {
    display: flex;
    align-items: center;
    margin: 12px 24px 18px;
    padding: 8px 16px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    gap: 10px;
}

.message-composer input {
    flex: 1;
    border: none;
    background: transparent;
    outline: none;
    font-size: 13.5px;
    color: #1e293b;
    padding: 6px 0;
}

.message-composer input::placeholder {
    color: #94a3b8;
}

.composer-send-btn {
    border: none;
    background: none;
    color: #64748b;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 6px;
    border-radius: 8px;
    transition: color 0.15s ease, transform 0.1s ease;
}

.composer-send-btn:hover {
    color: #2563eb;
    transform: scale(1.05);
}

/* 3. RIGHT ACTIVITIES SIDEBAR */
.activities-sidebar {
    width: 290px;
    min-width: 260px;
    max-width: 310px;
    padding: 24px 20px;
    background: #ffffff;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
}

.activities-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 0 0 24px 0;
}

.activities-title {
    font-size: 14px;
    font-weight: 700;
    color: #0f172a;
    margin: 0;
    letter-spacing: -0.2px;
}

.activities-close-btn {
    display: none;
    border: none;
    background: #f1f5f9;
    color: #64748b;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 14px;
    font-weight: 700;
    align-items: center;
    justify-content: center;
    transition: background 0.15s ease, color 0.15s ease;
}

.activities-close-btn:hover {
    background: #e2e8f0;
    color: #0f172a;
}

.activities-list {
    position: relative;
    display: flex;
    flex-direction: column;
    gap: 22px;
}

.activities-list::before {
    content: '';
    position: absolute;
    top: 16px;
    bottom: 16px;
    left: 15px;
    width: 2px;
    background: #e2e8f0;
    z-index: 0;
}

.activity-item {
    position: relative;
    display: flex;
    align-items: flex-start;
    gap: 12px;
    z-index: 1;
}

.activity-avatar {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    color: #ffffff;
    font-size: 11px;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #ffffff;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    flex-shrink: 0;
}

.activity-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.activity-content {
    display: flex;
    flex-direction: column;
    gap: 2px;
}

.activity-text {
    font-size: 12.5px;
    font-weight: 500;
    color: #1e293b;
    margin: 0;
    line-height: 1.35;
}

.activity-time {
    font-size: 11px;
    color: #94a3b8;
}

/* Custom Delete Confirmation Modal */
.custom-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(15, 23, 42, 0.4);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.2s ease, visibility 0.2s ease;
    backdrop-filter: blur(2px);
}

.custom-modal-backdrop.open {
    opacity: 1;
    visibility: visible;
}

.custom-modal-box {
    background: #ffffff;
    border-radius: 14px;
    width: 90%;
    max-width: 380px;
    padding: 24px;
    box-shadow: 0 12px 32px rgba(0, 0, 0, 0.15);
    transform: translateY(12px) scale(0.97);
    transition: transform 0.2s cubic-bezier(0.16, 1, 0.3, 1);
}

.custom-modal-backdrop.open .custom-modal-box {
    transform: translateY(0) scale(1);
}

.custom-modal-title {
    font-size: 16px;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 8px 0;
}

.custom-modal-desc {
    font-size: 13.5px;
    color: #64748b;
    margin: 0 0 20px 0;
    line-height: 1.45;
}

.custom-modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.modal-btn {
    border: none;
    border-radius: 8px;
    padding: 8px 16px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.15s ease;
}

.modal-btn-cancel {
    background: #f1f5f9;
    color: #475569;
}
.modal-btn-cancel:hover {
    background: #e2e8f0;
}

.modal-btn-danger {
    background: #ef4444;
    color: #ffffff;
}
.modal-btn-danger:hover {
    background: #dc2626;
}

/* Responsive Layout - Hide activities bar when screen/container size is reduced */
@media (max-width: 1250px) {
    .activities-sidebar {
        display: none !important;
    }
    .activities-sidebar.force-open {
        display: flex !important;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: 60;
        background: #ffffff;
        box-shadow: -6px 0 28px rgba(0, 0, 0, 0.14);
        border-left: 1px solid #e2e8f0;
        width: 300px;
        max-width: 85%;
    }
    .activities-sidebar.force-open .activities-close-btn {
        display: flex;
    }
    .chat-main {
        border-right: none;
    }
}

@container chatDashboard (max-width: 980px) {
    .activities-sidebar {
        display: none !important;
    }
    .activities-sidebar.force-open {
        display: flex !important;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        z-index: 60;
        background: #ffffff;
        box-shadow: -6px 0 28px rgba(0, 0, 0, 0.14);
        border-left: 1px solid #e2e8f0;
        width: 300px;
        max-width: 85%;
    }
    .activities-sidebar.force-open .activities-close-btn {
        display: flex;
    }
    .chat-main {
        border-right: none;
    }
}

@media (max-width: 900px) {
    .chat-sidebar {
        width: 260px;
        min-width: 240px;
    }
}
</style>

<div class="chat-dashboard">
    <!-- 1. LEFT CONVERSATIONS COLUMN -->
    <aside class="chat-sidebar">
        <h2 class="chat-sidebar-title">Messages</h2>

        <div class="search-bar-wrapper">
            <span class="search-icon">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </span>
            <input type="text" id="searchInput" placeholder="Search" autocomplete="off">
            <kbd class="kbd-shortcut">⌘/</kbd>
        </div>

        <div class="filter-tabs">
            <button type="button" class="tab-btn active" data-filter="all">All</button>
            <button type="button" class="tab-btn" data-filter="unread">
                Unread <span id="totalUnreadBadge" class="filter-pill" style="display: none;">0</span>
            </button>
        </div>

        <ul id="conversationList" class="conversation-list">
            <li class="empty-state">Loading conversations…</li>
        </ul>
    </aside>

    <!-- 2. CENTER ACTIVE CHAT COLUMN -->
    <main class="chat-main">
        <div id="chatPlaceholder" class="chat-placeholder">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
            </svg>
            <p>Select a conversation to start messaging</p>
        </div>

        <div id="chatWindow" class="chat-window" style="display: none;">
            <!-- Chat Header -->
            <header class="chat-header">
                <div class="active-contact-info">
                    <!-- Wrap avatars in an anchor tag -->
                    <a id="chatProfileLink" href="#" class="profile-link" target="_blank" rel="noopener noreferrer">
                        <img id="chatAvatarImg" class="header-avatar" src="" alt="Avatar" style="display:none;">
                        <span id="chatAvatar" class="header-avatar-circle" style="display:none;"></span>
                    </a>
                    <span id="chatName" class="active-contact-name"></span>
                </div>
                <div class="header-actions">
                    <button type="button" class="icon-btn" id="toggleActivitiesBtn" title="Information / Activities" aria-label="Toggle Activities">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Message Bubble Stream -->
            <div id="messageList" class="message-stream"></div>

            <!-- Chat Bottom Input -->
            <form id="sendForm" class="message-composer">
                <input type="text" id="messageInput" placeholder="Type a message…" autocomplete="off" maxlength="2000">
                <button type="submit" class="composer-send-btn" aria-label="Send Message" title="Send">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
        </div>
    </main>

    <!-- 3. RIGHT ACTIVITIES COLUMN -->
    <aside class="activities-sidebar" id="activitiesSidebar">
        <div class="activities-header">
            <h3 class="activities-title"><span id="activityUserName">Nisal</span>'s Activities</h3>
            <button type="button" class="activities-close-btn" id="closeActivitiesBtn" title="Close Activities" aria-label="Close Activities">✕</button>
        </div>
        <div class="activities-list">
            <div class="activity-item">
                <span class="activity-avatar" style="background:#84cc16;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <div class="activity-content">
                    <p class="activity-text">You have a bug that needs.</p>
                    <span class="activity-time">Just now</span>
                </div>
            </div>
            <div class="activity-item">
                <span class="activity-avatar" style="background:#f97316;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <div class="activity-content">
                    <p class="activity-text">Released a new version</p>
                    <span class="activity-time">59 minutes ago</span>
                </div>
            </div>
            <div class="activity-item">
                <span class="activity-avatar" style="background:#06b6d4;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <div class="activity-content">
                    <p class="activity-text">Submitted a bug</p>
                    <span class="activity-time">12 hours ago</span>
                </div>
            </div>
            <div class="activity-item">
                <span class="activity-avatar" style="background:#1e293b;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <div class="activity-content">
                    <p class="activity-text">Modified A data in Page X</p>
                    <span class="activity-time">Today, 11:59 AM</span>
                </div>
            </div>
            <div class="activity-item">
                <span class="activity-avatar" style="background:#334155;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </span>
                <div class="activity-content">
                    <p class="activity-text">Deleted a page in Project X</p>
                    <span class="activity-time">Feb 2, 2023</span>
                </div>
            </div>
        </div>
    </aside>
</div>

<!-- Modal Dialog for Delete Confirmation -->
<div id="deleteModal" class="custom-modal-backdrop">
    <div class="custom-modal-box">
        <h4 class="custom-modal-title">Delete Message?</h4>
        <p class="custom-modal-desc">Are you sure you want to delete this message? This action cannot be undone.</p>
        <div class="custom-modal-actions">
            <button type="button" id="cancelDeleteBtn" class="modal-btn modal-btn-cancel">Cancel</button>
            <button type="button" id="confirmDeleteBtn" class="modal-btn modal-btn-danger">Delete</button>
        </div>
    </div>
</div>

<?php
$assetPrefix = strpos($_SERVER['REQUEST_URI'] ?? '', '/fitnesshub/public') !== false ? '/fitnesshub/public' : '';
?>
<script>
    const CURRENT_USER_ID = <?= (int)($currentUserId ?? 12) ?>;
</script>
<script src="<?= $assetPrefix ?>/assets/js/instructor-messages.js"></script>