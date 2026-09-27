// =========================================================
// public/assets/js/instructor-messages.js
// Instructor Messaging Module - Full CRUD & Reactive UI
// =========================================================

const basePath = window.location.pathname.includes('/fitnesshub/public') ? '/fitnesshub/public' : '';

// 1. API Endpoints matching FitnessHub Router routes
const ENDPOINTS = {
    conversations: { url: `${basePath}/api/conversations`, method: 'GET' },
    messages:      { url: `${basePath}/api/messages`,      method: 'GET' },
    read:          { url: `${basePath}/api/messages/read`,   method: 'POST' },
    send:          { url: `${basePath}/api/messages/send`,   method: 'POST' },
    delete:        { url: `${basePath}/api/messages/delete`, method: 'POST' },
};

let activeContactId = null;
let conversations = [];
let currentFilter = 'all';
let isInitialLoad = true;
let pendingDeleteId = null;
let pendingDeleteElement = null;

// 2. Select HTML elements
const el = {
    list: document.getElementById('conversationList'),
    placeholder: document.getElementById('chatPlaceholder'),
    chatWindow: document.getElementById('chatWindow'),
    chatName: document.getElementById('chatName'),
    chatAvatar: document.getElementById('chatAvatar'),
    chatAvatarImg: document.getElementById('chatAvatarImg'),
    activityUserName: document.getElementById('activityUserName'),
    messageList: document.getElementById('messageList'),
    sendForm: document.getElementById('sendForm'),
    messageInput: document.getElementById('messageInput'),
    searchInput: document.getElementById('searchInput'),
    totalUnreadBadge: document.getElementById('totalUnreadBadge'),
    deleteModal: document.getElementById('deleteModal'),
    cancelDeleteBtn: document.getElementById('cancelDeleteBtn'),
    confirmDeleteBtn: document.getElementById('confirmDeleteBtn'),
    activitiesSidebar: document.getElementById('activitiesSidebar'),
    toggleActivitiesBtn: document.getElementById('toggleActivitiesBtn'),
    closeActivitiesBtn: document.getElementById('closeActivitiesBtn'),
};

// 3. Helper to make AJAX fetch requests
async function api(action, { method = null, params = {}, body = null } = {}) {
    const config = ENDPOINTS[action];
    if (!config) throw new Error(`Unknown action: ${action}`);

    const httpMethod = method || config.method;
    const query = new URLSearchParams(params).toString();
    const url = query ? `${config.url}?${query}` : config.url;

    const options = {
        method: httpMethod,
        headers: {
            'Accept': 'application/json',
            ...(body ? { 'Content-Type': 'application/json' } : {})
        },
        body: body ? JSON.stringify(body) : undefined,
    };

    const res = await fetch(url, options);
    const json = await res.json();
    if (!json.success) {
        throw new Error(json.error || 'Request failed');
    }
    return json.data;
}

// 4. Time Formatting Helpers
function formatConversationTime(sqlDatetime) {
    if (!sqlDatetime) return '';
    const date = new Date(sqlDatetime.replace(' ', 'T'));
    if (isNaN(date.getTime())) return '';

    const now = new Date();
    const isToday = date.toDateString() === now.toDateString();

    const yesterday = new Date(now);
    yesterday.setDate(now.getDate() - 1);
    const isYesterday = date.toDateString() === yesterday.toDateString();

    if (isToday) {
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }
    if (isYesterday) {
        return 'Yesterday';
    }
    const sameYear = date.getFullYear() === now.getFullYear();
    if (sameYear) {
        return date.toLocaleDateString([], { month: 'short', day: 'numeric' });
    }
    return date.toLocaleDateString([], { month: 'short', day: 'numeric', year: 'numeric' });
}

function formatMessageTime(sqlDatetime) {
    if (!sqlDatetime) return '';
    const date = new Date(sqlDatetime.replace(' ', 'T'));
    if (isNaN(date.getTime())) return '';
    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function formatDayDivider(sqlDatetime) {
    if (!sqlDatetime) return 'Today';
    const date = new Date(sqlDatetime.replace(' ', 'T'));
    if (isNaN(date.getTime())) return 'Today';

    const now = new Date();
    if (date.toDateString() === now.toDateString()) {
        return 'Today';
    }
    const yesterday = new Date(now);
    yesterday.setDate(now.getDate() - 1);
    if (date.toDateString() === yesterday.toDateString()) {
        return 'Yesterday';
    }
    return date.toLocaleDateString([], { month: 'long', day: 'numeric', year: 'numeric' });
}

function escapeHtml(str) {
    if (str === null || str === undefined) return '';
    const div = document.createElement('div');
    div.textContent = String(str);
    return div.innerHTML;
}

// 5. Load and Render Conversations
async function loadConversations(autoSelectFirst = false) {
    try {
        const data = await api('conversations');
        conversations = data || [];
        updateUnreadCountBadge();
        renderConversationList();

        // On first load, automatically select the first contact (matching UI mockup)
        if (autoSelectFirst && !activeContactId && conversations.length > 0) {
            const first = conversations[0];
            openConversation(first.id, first);
        }
    } catch (err) {
        console.error('Failed to load conversations:', err);
    }
}

// Update the badge next to the 'Unread' tab
function updateUnreadCountBadge() {
    const totalUnread = conversations.reduce((acc, c) => acc + parseInt(c.unread_count || 0, 10), 0);
    if (el.totalUnreadBadge) {
        el.totalUnreadBadge.textContent = totalUnread;
        el.totalUnreadBadge.style.display = totalUnread > 0 ? 'inline-block' : 'none';
    }
}

// Render conversation list items in sidebar
function renderConversationList() {
    if (!el.list) return;

    const query = (el.searchInput ? el.searchInput.value : '').trim().toLowerCase();
    let filtered = conversations.filter(c => (c.name || '').toLowerCase().includes(query));

    // Handle 'Unread' tab filter (keep active contact visible so it doesn't jump)
    if (currentFilter === 'unread') {
        filtered = filtered.filter(c => parseInt(c.unread_count || 0, 10) > 0 || c.id === activeContactId);
    }

    if (filtered.length === 0) {
        el.list.innerHTML = `<li class="empty-state">${query ? 'No matching contacts' : (currentFilter === 'unread' ? 'No unread messages' : 'No conversations yet')}</li>`;
        return;
    }

    el.list.innerHTML = '';
    filtered.forEach(c => {
        const li = document.createElement('li');
        li.className = 'conversation-item' + (c.id === activeContactId ? ' active' : '');
        li.dataset.id = c.id;

        const initials = (c.name || 'User')
            .split(' ')
            .filter(Boolean)
            .map(w => w[0])
            .slice(0, 2)
            .join('')
            .toUpperCase() || 'U';

        const unreadCount = parseInt(c.unread_count || 0, 10);
        const hasUnread = unreadCount > 0;
        const color = c.avatar_color || '#4A90D9';
        const formattedTime = formatConversationTime(c.last_time);
        const lastSnippet = c.last_message ? escapeHtml(c.last_message) : 'No messages yet';

        // Avatar: Image if available, else styled colored initials circle
        let avatarHtml = '';
        if (c.profile_image) {
            avatarHtml = `<img class="avatar-circle-img" src="/${c.profile_image.replace(/^\/+/, '')}" alt="${escapeHtml(c.name)}">`;
        } else {
            avatarHtml = `<span class="avatar-circle" style="background:${color}">${initials}</span>`;
        }

        li.innerHTML = `
            <div class="avatar-container">
                ${avatarHtml}
            </div>
            <div class="conv-meta-wrap">
                <div class="conv-top-row">
                    <span class="contact-name-txt">${escapeHtml(c.name)}</span>
                    <span class="conv-time-txt">${formattedTime}</span>
                </div>
                <div class="conv-bottom-row">
                    <span class="conv-last-msg">${lastSnippet}</span>
                    ${hasUnread ? `<span class="unread-dot" title="${unreadCount} unread"></span>` : ''}
                </div>
            </div>
        `;

        li.addEventListener('click', () => openConversation(c.id, c));
        el.list.appendChild(li);
    });
}

// 6. Open a conversation thread (READ & UPDATE unread count)
async function openConversation(contactId, contactData = null) {
    contactId = parseInt(contactId, 10);
    activeContactId = contactId;

    // Retrieve or find contact record
    const contact = contactData || conversations.find(c => c.id === contactId) || { id: contactId, name: 'User' };

    // Update UI headers
    if (el.placeholder) el.placeholder.style.display = 'none';
    if (el.chatWindow) el.chatWindow.style.display = 'flex';
    if (el.chatName) el.chatName.textContent = contact.name || 'Chat';

    // Update right activities sidebar user title
    if (el.activityUserName) {
        const firstName = (contact.name || 'User').split(' ')[0];
        el.activityUserName.textContent = firstName;
    }

    // Update Chat Header Avatar
    const initials = (contact.name || 'U')
        .split(' ')
        .filter(Boolean)
        .map(w => w[0])
        .slice(0, 2)
        .join('')
        .toUpperCase();

    if (contact.profile_image && el.chatAvatarImg) {
        el.chatAvatarImg.src = `/${contact.profile_image.replace(/^\/+/, '')}`;
        el.chatAvatarImg.style.display = 'block';
        if (el.chatAvatar) el.chatAvatar.style.display = 'none';
    } else if (el.chatAvatar) {
        el.chatAvatar.textContent = initials;
        el.chatAvatar.style.background = contact.avatar_color || '#4A90D9';
        el.chatAvatar.style.display = 'flex';
        if (el.chatAvatarImg) el.chatAvatarImg.style.display = 'none';
    }

    highlightActive(contactId);

    // Optimistically clear unread count for this conversation in UI
    const convIndex = conversations.findIndex(c => c.id === contactId);
    let hadUnread = false;
    if (convIndex !== -1 && parseInt(conversations[convIndex].unread_count || 0, 10) > 0) {
        conversations[convIndex].unread_count = 0;
        hadUnread = true;
        updateUnreadCountBadge();
        // Remove unread dot in list item immediately
        const activeLi = document.querySelector(`.conversation-item[data-id="${contactId}"]`);
        if (activeLi) {
            const dot = activeLi.querySelector('.unread-dot');
            if (dot) dot.remove();
        }
    }

    // Load message stream
    await loadMessages(contactId);

    // Focus composer input
    if (el.messageInput) {
        el.messageInput.focus();
    }

    // UPDATE: Mark messages as read in database
    if (hadUnread) {
        try {
            await api('read', { body: { contact_id: contactId } });
        } catch (err) {
            console.warn('Could not mark as read on server:', err);
        }
    }
}

function highlightActive(contactId) {
    document.querySelectorAll('.conversation-item').forEach(item => {
        item.classList.toggle('active', parseInt(item.dataset.id, 10) === contactId);
    });
}

// 7. Load and Render Messages for Active Contact (READ)
async function loadMessages(contactId, retainScroll = false) {
    try {
        const messages = await api('messages', { params: { contact_id: contactId } });
        renderMessages(messages || [], retainScroll);
    } catch (err) {
        console.error('Failed to load messages:', err);
    }
}

function renderMessages(messages, retainScroll = false) {
    if (!el.messageList) return;

    const previousScrollHeight = el.messageList.scrollHeight;
    const previousScrollTop = el.messageList.scrollTop;
    const isAtBottom = previousScrollHeight - el.messageList.clientHeight <= previousScrollTop + 60;

    el.messageList.innerHTML = '';

    if (messages.length === 0) {
        el.messageList.innerHTML = `
            <div style="text-align: center; color: #94a3b8; font-size: 13px; margin: auto 0;">
                No messages yet. Send a message below to start the conversation!
            </div>
        `;
        return;
    }

    let lastDay = null;

    messages.forEach(m => {
        const dayKey = (m.created_at || '').substring(0, 10);
        if (dayKey && dayKey !== lastDay) {
            const divider = document.createElement('div');
            divider.className = 'day-divider';
            divider.textContent = formatDayDivider(m.created_at);
            el.messageList.appendChild(divider);
            lastDay = dayKey;
        }
        el.messageList.appendChild(buildBubble(m));
    });

    if (retainScroll && !isAtBottom) {
        el.messageList.scrollTop = previousScrollTop;
    } else {
        el.messageList.scrollTop = el.messageList.scrollHeight;
    }
}

// 8. Build Message Bubble (with DELETE button for own sent messages)
function buildBubble(m) {
    const isMine = parseInt(m.sender_id, 10) === CURRENT_USER_ID;
    const row = document.createElement('div');
    row.className = 'bubble-wrap ' + (isMine ? 'sent' : 'received');
    row.dataset.id = m.id;

    const timeStr = formatMessageTime(m.created_at);

    // Delete button (only rendered for messages sent by the logged-in coach)
    const deleteBtnHtml = isMine ? `
        <button type="button" class="msg-delete-btn" title="Delete message" aria-label="Delete message">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"></polyline>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
            </svg>
        </button>
    ` : '';

    const readReceiptHtml = isMine ? `<span class="read-check" title="${m.is_read ? 'Read' : 'Sent'}">✓✓</span>` : '';

    row.innerHTML = `
        <div class="bubble-content-row">
            <div class="bubble-pill">${escapeHtml(m.message)}</div>
            ${deleteBtnHtml}
        </div>
        <div class="bubble-meta-info">
            <span>${timeStr}</span>
            ${readReceiptHtml}
        </div>
    `;

    // Attach click handler to delete button
    if (isMine) {
        const btn = row.querySelector('.msg-delete-btn');
        if (btn) {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                openDeleteModal(parseInt(m.id, 10), row);
            });
        }
    }

    return row;
}

// 9. CREATE: Send Message
if (el.sendForm) {
    el.sendForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const text = (el.messageInput ? el.messageInput.value : '').trim();
        if (!text || !activeContactId) return;

        el.messageInput.value = '';

        try {
            const saved = await api('send', {
                body: { receiver_id: activeContactId, message: text },
            });

            // If empty placeholder text exists, clear it
            if (el.messageList && el.messageList.querySelector('.day-divider') === null) {
                el.messageList.innerHTML = '';
            }

            // Append today divider if not present
            const nowDayKey = new Date().toISOString().substring(0, 10);
            const dividers = el.messageList.querySelectorAll('.day-divider');
            let hasToday = false;
            if (dividers.length > 0) {
                const lastDiv = dividers[dividers.length - 1];
                if (lastDiv.textContent === 'Today') hasToday = true;
            }
            if (!hasToday) {
                const divider = document.createElement('div');
                divider.className = 'day-divider';
                divider.textContent = 'Today';
                el.messageList.appendChild(divider);
            }

            el.messageList.appendChild(buildBubble(saved));
            el.messageList.scrollTop = el.messageList.scrollHeight;

            // Refresh conversations so the left sidebar moves active contact to top
            await loadConversations();
            highlightActive(activeContactId);
        } catch (err) {
            alert('Failed to send message: ' + err.message);
            el.messageInput.value = text;
        }
    });
}

// 10. DELETE: Delete own message
function openDeleteModal(messageId, element) {
    pendingDeleteId = messageId;
    pendingDeleteElement = element;
    if (el.deleteModal) {
        el.deleteModal.classList.add('open');
    }
}

function closeDeleteModal() {
    pendingDeleteId = null;
    pendingDeleteElement = null;
    if (el.deleteModal) {
        el.deleteModal.classList.remove('open');
    }
}

if (el.cancelDeleteBtn) {
    el.cancelDeleteBtn.addEventListener('click', closeDeleteModal);
}

if (el.deleteModal) {
    el.deleteModal.addEventListener('click', (e) => {
        if (e.target === el.deleteModal) closeDeleteModal();
    });
}

if (el.confirmDeleteBtn) {
    el.confirmDeleteBtn.addEventListener('click', async () => {
        if (!pendingDeleteId) return;
        const msgId = pendingDeleteId;
        const targetElement = pendingDeleteElement;
        closeDeleteModal();

        try {
            await api('delete', { body: { id: msgId } });

            if (targetElement) {
                targetElement.classList.add('deleting');
                setTimeout(() => {
                    targetElement.remove();
                    // If no more bubbles left in messageList
                    if (el.messageList && el.messageList.querySelectorAll('.bubble-wrap').length === 0) {
                        el.messageList.innerHTML = `
                            <div style="text-align: center; color: #94a3b8; font-size: 13px; margin: auto 0;">
                                No messages yet. Send a message below to start the conversation!
                            </div>
                        `;
                    }
                }, 220);
            }

            // Update conversations sidebar (to update preview if this was the latest message)
            await loadConversations();
            highlightActive(activeContactId);
        } catch (err) {
            alert('Could not delete message: ' + err.message);
        }
    });
}

// 11. Filter tabs ("All" vs "Unread")
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        currentFilter = btn.dataset.filter;
        renderConversationList();
    });
});

// 12. Search input filtering
if (el.searchInput) {
    el.searchInput.addEventListener('input', () => {
        renderConversationList();
    });
}

// 13. Activities sidebar drawer toggle for reduced screen sizes
if (el.toggleActivitiesBtn && el.activitiesSidebar) {
    el.toggleActivitiesBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        el.activitiesSidebar.classList.toggle('force-open');
    });
}

if (el.closeActivitiesBtn && el.activitiesSidebar) {
    el.closeActivitiesBtn.addEventListener('click', () => {
        el.activitiesSidebar.classList.remove('force-open');
    });
}

// Close drawer if user clicks outside of activities sidebar when open
document.addEventListener('click', (e) => {
    if (el.activitiesSidebar && el.activitiesSidebar.classList.contains('force-open')) {
        if (!el.activitiesSidebar.contains(e.target) && (!el.toggleActivitiesBtn || !el.toggleActivitiesBtn.contains(e.target))) {
            el.activitiesSidebar.classList.remove('force-open');
        }
    }
});

// 14. Initialize on page load
loadConversations(true);

// 15. Background polling for live sync (every 6 seconds)
setInterval(() => {
    loadConversations(false);
    if (activeContactId) {
        loadMessages(activeContactId, true);
    }
}, 6000);