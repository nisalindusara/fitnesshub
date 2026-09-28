// =========================================================
// public/assets/js/instructor-messages.js
// Instructor Messaging Module - Full CRUD & Reactive UI
//   Create: send a message        Read:   conversations + thread
//   Update: mark thread as read   Delete: remove own message
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
let isSending = false;
let pendingDeleteId = null;
let pendingDeleteElement = null;

// 2. Select HTML elements
const el = {
    panel: document.getElementById('msgPanel'),
    list: document.getElementById('conversationList'),
    placeholder: document.getElementById('chatPlaceholder'),
    chatWindow: document.getElementById('chatWindow'),
    chatName: document.getElementById('chatName'),
    chatAvatar: document.getElementById('chatAvatar'),
    chatAvatarImg: document.getElementById('chatAvatarImg'),
    backBtn: document.getElementById('backToListBtn'),
    messageList: document.getElementById('messageList'),
    messageError: document.getElementById('messageError'),
    sendForm: document.getElementById('sendForm'),
    sendBtn: document.getElementById('sendBtn'),
    messageInput: document.getElementById('messageInput'),
    searchInput: document.getElementById('searchInput'),
    totalUnreadBadge: document.getElementById('totalUnreadBadge'),
    deleteModal: document.getElementById('deleteModal'),
    cancelDeleteBtn: document.getElementById('cancelDeleteBtn'),
    confirmDeleteBtn: document.getElementById('confirmDeleteBtn'),
};

// Inline error above the composer (replaces browser alert() popups)
function showError(message) {
    if (!el.messageError) return;
    el.messageError.textContent = message;
    el.messageError.hidden = false;
}

function clearError() {
    if (el.messageError) el.messageError.hidden = true;
}

// 3. Helper to make AJAX fetch requests
async function api(action, { method = null, params = {}, body = null } = {}) {
    const config = ENDPOINTS[action];
    if (!config) throw new Error(`Unknown action: ${action}`);

    const httpMethod = method || config.method;
    const query = new URLSearchParams(params).toString();
    const url = query ? `${config.url}?${query}` : config.url;

    const res = await fetch(url, {
        method: httpMethod,
        headers: {
            'Accept': 'application/json',
            ...(body ? { 'Content-Type': 'application/json' } : {})
        },
        body: body ? JSON.stringify(body) : undefined,
    });

    let json;
    try {
        json = await res.json();
    } catch (e) {
        throw new Error(`Unexpected server response (${res.status})`);
    }
    if (!json.success) {
        throw new Error(json.error || 'Request failed');
    }
    return json.data;
}

// 4. Time Formatting Helpers
function parseSqlDate(sqlDatetime) {
    if (!sqlDatetime) return null;
    const date = new Date(String(sqlDatetime).replace(' ', 'T'));
    return isNaN(date.getTime()) ? null : date;
}

function formatConversationTime(sqlDatetime) {
    const date = parseSqlDate(sqlDatetime);
    if (!date) return '';

    const now = new Date();
    if (date.toDateString() === now.toDateString()) {
        return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }
    const yesterday = new Date(now);
    yesterday.setDate(now.getDate() - 1);
    if (date.toDateString() === yesterday.toDateString()) {
        return 'Yesterday';
    }
    if (date.getFullYear() === now.getFullYear()) {
        return date.toLocaleDateString([], { month: 'short', day: 'numeric' });
    }
    return date.toLocaleDateString([], { month: 'short', day: 'numeric', year: 'numeric' });
}

function formatMessageTime(sqlDatetime) {
    const date = parseSqlDate(sqlDatetime);
    return date ? date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) : '';
}

function formatDayDivider(sqlDatetime) {
    const date = parseSqlDate(sqlDatetime);
    if (!date) return 'Today';

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

// Avatar helpers
function initialsOf(name) {
    return (name || 'U')
        .split(' ')
        .filter(Boolean)
        .map(w => w[0])
        .slice(0, 2)
        .join('')
        .toUpperCase() || 'U';
}

function imageUrl(path) {
    return `${basePath}/${String(path).replace(/^\/+/, '')}`;
}

// 5. Load and Render Conversations (READ)
// No conversation is opened automatically: opening one marks it as read, so the
// instructor would never get to see the unread counts.
async function loadConversations() {
    try {
        const data = await api('conversations');
        conversations = (data && data.conversations) || [];
        conversations.forEach(c => { c.id = parseInt(c.id, 10); });
        updateUnreadCountBadge(data ? data.unread_total : null);
        renderConversationList();
    } catch (err) {
        console.error('Failed to load conversations:', err);
        if (isInitialLoad && el.list) {
            el.list.innerHTML = '<li class="empty-state">Could not load conversations</li>';
        }
    } finally {
        isInitialLoad = false;
    }
}

// Update the count on the 'Unread' filter chip
function updateUnreadCountBadge(total = null) {
    const totalUnread = total !== null && total !== undefined
        ? parseInt(total, 10) || 0
        : conversations.reduce((acc, c) => acc + (parseInt(c.unread_count, 10) || 0), 0);
    if (el.totalUnreadBadge) {
        el.totalUnreadBadge.textContent = totalUnread;
    }
}

function avatarHtml(contact) {
    return contact.profile_image
        ? `<img class="msg-avatar" src="${escapeHtml(imageUrl(contact.profile_image))}" alt="">`
        : `<span class="msg-avatar" aria-hidden="true">${escapeHtml(initialsOf(contact.name))}</span>`;
}

// Render conversation list items in sidebar
function renderConversationList() {
    if (!el.list) return;

    const query = (el.searchInput ? el.searchInput.value : '').trim().toLowerCase();
    let filtered = conversations.filter(c => (c.name || '').toLowerCase().includes(query));

    // Handle 'Unread' filter (keep active contact visible so it doesn't jump)
    if (currentFilter === 'unread') {
        filtered = filtered.filter(c => parseInt(c.unread_count || 0, 10) > 0 || c.id === activeContactId);
    }

    if (filtered.length === 0) {
        el.list.innerHTML = `<li class="empty-state">${query ? 'No matching clients' : (currentFilter === 'unread' ? 'No unread messages' : 'No conversations yet')}</li>`;
        return;
    }

    el.list.innerHTML = '';
    filtered.forEach(c => {
        const unreadCount = parseInt(c.unread_count || 0, 10);
        const hasUnread = unreadCount > 0;

        const li = document.createElement('li');
        li.className = 'conversation-item'
            + (c.id === activeContactId ? ' active' : '')
            + (hasUnread ? ' has-unread' : '');
        li.dataset.id = c.id;
        li.tabIndex = 0;
        li.setAttribute('role', 'button');
        li.setAttribute('aria-label', `${c.name}${hasUnread ? `, ${unreadCount} unread` : ''}`);

        let lastSnippet = 'No messages yet';
        if (c.last_message) {
            const prefix = parseInt(c.last_sender_id, 10) === CURRENT_USER_ID ? 'You: ' : '';
            lastSnippet = escapeHtml(prefix + c.last_message);
        }

        li.innerHTML = `
            ${avatarHtml(c)}
            <div class="conv-meta-wrap">
                <div class="conv-top-row">
                    <span class="contact-name-txt">${escapeHtml(c.name)}</span>
                    <span class="conv-time-txt">${formatConversationTime(c.last_time)}</span>
                </div>
                <div class="conv-bottom-row">
                    <span class="conv-last-msg">${lastSnippet}</span>
                    ${hasUnread ? `<span class="msg-count">${unreadCount}</span>` : ''}
                </div>
            </div>
        `;

        li.addEventListener('click', () => openConversation(c.id));
        li.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                openConversation(c.id);
            }
        });
        el.list.appendChild(li);
    });
}

// 6. Open a conversation thread (READ + UPDATE unread count)
async function openConversation(contactId) {
    contactId = parseInt(contactId, 10);
    activeContactId = contactId;

    const contact = conversations.find(c => c.id === contactId) || { id: contactId, name: 'User' };

    if (el.placeholder) el.placeholder.hidden = true;
    if (el.chatWindow) el.chatWindow.hidden = false;
    if (el.panel) el.panel.classList.add('is-chat-open');
    if (el.chatName) el.chatName.textContent = contact.name || 'Chat';
    clearError();

    // Chat header avatar: photo if there is one, otherwise initials
    if (contact.profile_image && el.chatAvatarImg) {
        el.chatAvatarImg.src = imageUrl(contact.profile_image);
        el.chatAvatarImg.hidden = false;
        if (el.chatAvatar) el.chatAvatar.hidden = true;
    } else if (el.chatAvatar) {
        el.chatAvatar.textContent = initialsOf(contact.name);
        el.chatAvatar.hidden = false;
        if (el.chatAvatarImg) el.chatAvatarImg.hidden = true;
    }

    highlightActive(contactId);
    if (el.messageList) el.messageList.innerHTML = '';

    // loadMessages also marks the thread as read in the database
    await loadMessages(contactId);

    if (el.messageInput) el.messageInput.focus();
}

// Small screens: go back from the chat to the conversation list
function closeConversation() {
    activeContactId = null;
    if (el.panel) el.panel.classList.remove('is-chat-open');
    if (el.chatWindow) el.chatWindow.hidden = true;
    if (el.placeholder) el.placeholder.hidden = false;
    renderConversationList();
}

if (el.backBtn) {
    el.backBtn.addEventListener('click', closeConversation);
}

function highlightActive(contactId) {
    document.querySelectorAll('.conversation-item').forEach(item => {
        item.classList.toggle('active', parseInt(item.dataset.id, 10) === contactId);
    });
}

// 7. Load and Render Messages for Active Contact (READ)
async function loadMessages(contactId, retainScroll = false) {
    try {
        const messages = (await api('messages', { params: { contact_id: contactId } })) || [];
        // The user may have switched to another conversation while this was loading
        if (contactId !== activeContactId) return;
        renderMessages(messages, retainScroll);

        const hasUnread = messages.some(m =>
            parseInt(m.receiver_id, 10) === CURRENT_USER_ID && !parseInt(m.is_read, 10));
        if (hasUnread) {
            await markConversationRead(contactId);
        }
    } catch (err) {
        console.error('Failed to load messages:', err);
    }
}

// UPDATE: mark every message from this contact as read, then refresh the unread counts
async function markConversationRead(contactId) {
    try {
        const result = await api('read', { body: { contact_id: contactId } });
        const conv = conversations.find(c => c.id === contactId);
        if (conv) conv.unread_count = 0;
        updateUnreadCountBadge(result ? result.unread_total : null);
        renderConversationList();
    } catch (err) {
        console.warn('Could not mark as read on server:', err);
    }
}

function emptyThreadHtml() {
    return `
        <p class="empty-thread">No messages yet. Send a message below to start the conversation.</p>
    `;
}

function renderMessages(messages, retainScroll = false) {
    if (!el.messageList) return;

    const previousScrollHeight = el.messageList.scrollHeight;
    const previousScrollTop = el.messageList.scrollTop;
    const isAtBottom = previousScrollHeight - el.messageList.clientHeight <= previousScrollTop + 60;

    el.messageList.innerHTML = '';

    if (messages.length === 0) {
        el.messageList.innerHTML = emptyThreadHtml();
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
    const isRead = !!parseInt(m.is_read, 10);
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

    // One tick = sent, two ticks = read by the member
    const readReceiptHtml = isMine
        ? `<span class="read-check${isRead ? ' is-read' : ''}" title="${isRead ? 'Read' : 'Sent'}">${isRead ? '✓✓' : '✓'}</span>`
        : '';

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
        if (!text || !activeContactId || isSending) return;

        const contactId = activeContactId;
        const sendBtn = el.sendBtn;
        isSending = true;
        clearError();
        if (sendBtn) sendBtn.disabled = true;
        el.messageInput.value = '';

        try {
            await api('send', { body: { receiver_id: contactId, message: text } });

            // Re-read the thread and sidebar from the database so both stay in sync
            await Promise.all([loadMessages(contactId), loadConversations()]);
            highlightActive(activeContactId);
        } catch (err) {
            showError('Message not sent: ' + err.message);
            el.messageInput.value = text;
        } finally {
            isSending = false;
            if (sendBtn) sendBtn.disabled = false;
            el.messageInput.focus();
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
        const contactId = activeContactId;
        closeDeleteModal();

        clearError();
        try {
            await api('delete', { body: { id: msgId } });

            if (targetElement) {
                targetElement.classList.add('deleting');
            }
            // Let the fade-out play, then re-render from the database (keeps day dividers and previews right)
            setTimeout(async () => {
                if (contactId === activeContactId) {
                    await loadMessages(contactId, true);
                }
                await loadConversations();
                highlightActive(activeContactId);
            }, 220);
        } catch (err) {
            showError('Could not delete message: ' + err.message);
        }
    });
}

// 11. Filter chips ("All" vs "Unread")
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.toggle('is-active', b === btn);
            b.setAttribute('aria-pressed', b === btn ? 'true' : 'false');
        });
        currentFilter = btn.dataset.filter;
        renderConversationList();
    });
});

// 12. Search input filtering
if (el.searchInput) {
    el.searchInput.addEventListener('input', renderConversationList);
}

// 13. Close the delete dialog with Escape
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && el.deleteModal && el.deleteModal.classList.contains('open')) {
        closeDeleteModal();
    }
});

// 14. Initialize on page load
loadConversations();

// 15. Background polling for live sync (every 6 seconds; skipped while a request is in flight or the tab is hidden)
let isPolling = false;
setInterval(async () => {
    if (isPolling || isSending || document.hidden) return;
    isPolling = true;
    try {
        await loadConversations();
        if (activeContactId) {
            await loadMessages(activeContactId, true);
        }
    } finally {
        isPolling = false;
    }
}, 6000);
