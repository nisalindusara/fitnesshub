<?php
/* Instructor Messages & Communication Module View */
?>

<div class="messages-container" id="messagesChatView">
    
    <!-- Column 1: Conversations List -->
    <section class="conversations-panel" aria-label="Client conversations">
        <div class="conversations-header">
            <h1 class="conversations-title">Messages</h1>
            
            <!-- Search Filter -->
            <div class="conversations-search">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input type="text" id="clientSearchInput" placeholder="Search" aria-label="Search conversations">
            </div>

            <!-- Filter Tabs -->
            <div class="conversations-tabs">
                <button type="button" class="conv-tab-btn active" id="tabAll">All</button>
                <button type="button" class="conv-tab-btn" id="tabUnread">
                    Unread 
                    <?php 
                    $totalUnread = array_sum(array_column($conversations, 'unread_count'));
                    if ($totalUnread > 0): 
                    ?>
                        <span class="badge-unread-count" id="unreadTotalCount"><?= (int)$totalUnread ?></span>
                    <?php endif; ?>
                </button>
            </div>
        </div>

        <!-- Conversations List Items -->
        <div class="conversations-list" id="conversationsList">
            <?php foreach ($conversations as $conv): 
                $cId = (int)$conv['client_id'];
                $cName = htmlspecialchars($conv['first_name'] . ' ' . $conv['last_name']);
                $initials = strtoupper(substr($conv['first_name'], 0, 1) . substr($conv['last_name'], 0, 1));
                $isActive = ($cId === (int)$activeClientId);
                $unread = (int)($conv['unread_count'] ?? 0);
                $snippet = !empty($conv['last_message']) ? htmlspecialchars($conv['last_message']) : 'No messages yet';
                
                // Format relative time
                $timeDisplay = '';
                if (!empty($conv['last_message_time'])) {
                    $ts = strtotime($conv['last_message_time']);
                    if (date('Y-m-d', $ts) === date('Y-m-d')) {
                        $timeDisplay = date('g:i A', $ts);
                    } elseif (date('Y-m-d', $ts) === date('Y-m-d', strtotime('-1 day'))) {
                        $timeDisplay = 'Yesterday';
                    } else {
                        $timeDisplay = date('M j', $ts);
                    }
                }
            ?>
                <div class="conversation-item <?= $isActive ? 'active' : '' ?>" 
                     data-client-id="<?= $cId ?>"
                     data-client-name="<?= $cName ?>"
                     data-unread="<?= $unread ?>"
                     onclick="selectClient(<?= $cId ?>)">
                    
                    <div class="client-avatar">
                        <?= $initials ?>
                    </div>

                    <div class="conversation-info">
                        <div class="conv-top-row">
                            <span class="conv-name"><?= $cName ?></span>
                            <span class="conv-time" id="time-<?= $cId ?>"><?= $timeDisplay ?></span>
                        </div>
                        <div class="conv-bottom-row">
                            <span class="conv-preview" id="snippet-<?= $cId ?>"><?= $snippet ?></span>
                            <?php if ($unread > 0): ?>
                                <span class="unread-dot" id="dot-<?= $cId ?>"></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Column 2: Active Chat Area -->
    <section class="chat-panel" aria-label="Active chat panel">
        <!-- Chat Header -->
        <div class="chat-header">
            <div class="chat-header-left" onclick="showProfileView()" title="Click to view client profile">
                <div class="client-avatar" id="activeChatAvatar">
                    <?= strtoupper(substr($activeClient['first_name'] ?? 'N', 0, 1) . substr($activeClient['last_name'] ?? 'I', 0, 1)) ?>
                </div>
                <div>
                    <div class="chat-header-name" id="activeChatName">
                        <?= htmlspecialchars(($activeClient['first_name'] ?? '') . ' ' . ($activeClient['last_name'] ?? '')) ?>
                    </div>
                </div>
            </div>

            <div class="chat-header-actions">
                <!-- Info Button (Toggles Profile View) -->
                <button class="chat-action-btn" type="button" id="toggleProfileBtn" onclick="showProfileView()" title="Client Details & Session Stats">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Chat Messages History Stream -->
        <div class="chat-stream" id="chatStream">
            <div class="chat-date-divider">
                <span class="chat-date-text">Today</span>
            </div>

            <?php if (empty($chatHistory)): ?>
                <div class="empty-chat-notice" style="text-align: center; color: var(--inst-text-muted); margin: auto; font-size: 13px;">
                    No messages with this client yet. Send a message below to begin!
                </div>
            <?php else: ?>
                <?php foreach ($chatHistory as $msg): 
                    $isOut = ((int)$msg['sender_id'] === (int)$instructorId);
                    $msgId = (int)$msg['id'];
                    $timeStr = date('h:i A', strtotime($msg['created_at']));
                ?>
                    <div class="chat-bubble-row <?= $isOut ? 'outgoing' : 'incoming' ?>" id="bubble-<?= $msgId ?>">
                        <?php if ($isOut): ?>
                            <!-- Delete Button (CRUD Delete) -->
                            <button class="delete-msg-btn" type="button" onclick="deleteMessage(<?= $msgId ?>)" title="Delete message">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                </svg>
                            </button>
                        <?php endif; ?>

                        <div class="chat-bubble">
                            <?= nl2br(htmlspecialchars($msg['message_text'])) ?>
                            <div class="bubble-time-row">
                                <span><?= $timeStr ?></span>
                                <?php if ($isOut): 
                                    $isMsgRead = !empty($msg['is_read']) && (int)$msg['is_read'] === 1;
                                ?>
                                    <span class="double-check-icon <?= $isMsgRead ? 'read' : 'sent' ?>" title="<?= $isMsgRead ? 'Read by client' : 'Delivered' ?>">
                                        <?php if ($isMsgRead): ?>
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                                <polyline points="20 12 12 20"></polyline>
                                            </svg>
                                        <?php else: ?>
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        <?php endif; ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Chat Input Bar (CRUD Create) -->
        <div class="chat-input-bar">
            <form id="sendMessageForm">
                <div class="chat-input-wrapper">
                    <input type="text" 
                           id="messageTextInput" 
                           placeholder="Type a message..." 
                           autocomplete="off" 
                           required>
                    <button type="submit" class="send-msg-btn" title="Send message (Enter)">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>

    <!-- Column 3: Client Activities Panel -->
    <aside class="activities-panel" aria-label="Client recent activities">
        <h2 class="activities-title">
            <span id="activityClientName"><?= htmlspecialchars($activeClient['first_name'] ?? 'Client') ?></span>'s Activities
        </h2>

        <div class="activity-timeline" id="activityTimeline">
            <div class="activity-item">
                <div class="activity-avatar" style="background:#FEF3C7; color:#B45309;">🏋️</div>
                <div class="activity-content">
                    <div class="activity-text">Completed Upper Body Strength Routine</div>
                    <div class="activity-time">Just now</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:#DBEAFE; color:#1D4ED8;">⏱️</div>
                <div class="activity-content">
                    <div class="activity-text">Booked PT Session for Tomorrow 2:00 PM</div>
                    <div class="activity-time">59 minutes ago</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:#E0E7FF; color:#4338CA;">⚖️</div>
                <div class="activity-content">
                    <div class="activity-text">Logged progress: Bodyweight 72.5 kg</div>
                    <div class="activity-time">12 hours ago</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:#FEE2E2; color:#B91C1C;">🎯</div>
                <div class="activity-content">
                    <div class="activity-text">Reached 30-Day Workout Consistency Goal</div>
                    <div class="activity-time">Today, 11:59 AM</div>
                </div>
            </div>

            <div class="activity-item">
                <div class="activity-avatar" style="background:#F3E8FF; color:#7E22CE;">📋</div>
                <div class="activity-content">
                    <div class="activity-text">Completed Membership Renewal</div>
                    <div class="activity-time">Feb 2, 2024</div>
                </div>
            </div>
        </div>
    </aside>
</div>

<div class="client-profile-view" id="clientProfileView">
    
    <!-- Profile Header Card -->
    <div class="profile-header-card">
        <div class="profile-header-left">
            <div class="profile-large-avatar" id="profileLargeAvatar">
                <?= strtoupper(substr($activeClient['first_name'] ?? 'N', 0, 1) . substr($activeClient['last_name'] ?? 'I', 0, 1)) ?>
            </div>
            <div>
                <h2 class="profile-details-title" id="profileClientName">
                    <?= htmlspecialchars(($activeClient['first_name'] ?? 'Nisal') . ' ' . ($activeClient['last_name'] ?? 'Indusara')) ?>
                </h2>
                <div class="profile-meta-row">
                    <span class="profile-meta-item">
                        Fitness Goal : <strong id="profileGoal"><?= htmlspecialchars($activeClient['fitness_goal'] ?? 'Endurance') ?></strong>
                    </span>
                    <span class="profile-meta-item" id="profileEmail">
                        ✉ <?= htmlspecialchars($activeClient['email'] ?? 'nisal@example.com') ?>
                    </span>
                    <span class="profile-meta-item" id="profilePhone">
                        📞 <?= htmlspecialchars($activeClient['phone_number'] ?? '(555) 123-4567') ?>
                    </span>
                    <span class="profile-meta-item">
                        Member Since: <strong id="profileMemberSince"><?= htmlspecialchars($activeClient['created_at'] ?? '2024, Jul 08') ?></strong>
                    </span>
                </div>
            </div>
        </div>

        <div class="profile-header-actions">
            <button type="button" class="btn-profile-action btn-profile-primary" onclick="showChatView()">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                Message
            </button>
            <button type="button" class="btn-profile-action btn-profile-outline" onclick="alert('Client report generated and ready for print/export.');">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                Report
            </button>
        </div>
    </div>

    <!-- Session Details KPIs & Projections -->
    <h3 class="profile-section-title">Session Details</h3>
    <div class="kpi-grid">
        <!-- Next Session -->
        <div class="kpi-card highlight">
            <div class="kpi-label">Next Session</div>
            <div class="kpi-value" id="kpiNextSession"><?= htmlspecialchars($activeClient['next_session'] ?? 'Tomorrow') ?></div>
        </div>

        <!-- Last Session -->
        <div class="kpi-card">
            <div class="kpi-label">Last Session</div>
            <div class="kpi-value" id="kpiLastSession"><?= htmlspecialchars($activeClient['last_session'] ?? '7 days ago') ?></div>
        </div>

        <!-- Total Sessions -->
        <div class="kpi-card">
            <div class="kpi-label">Total Sessions</div>
            <div class="kpi-value" id="kpiTotalSessions"><?= (int)($activeClient['total_sessions'] ?? 695) ?></div>
        </div>

        <!-- Growth -->
        <div class="kpi-card highlight">
            <div class="kpi-label">Growth</div>
            <div class="kpi-value">
                <span id="kpiGrowthRate"><?= htmlspecialchars($activeClient['growth_rate'] ?? '30.1%') ?></span>
                <span class="kpi-delta" id="kpiGrowthDelta"><?= htmlspecialchars($activeClient['growth_delta'] ?? '+5.03%') ?> ↗</span>
            </div>
        </div>

        <!-- Projections vs Actuals (SVG Bar Chart) -->
        <div class="chart-card">
            <div class="chart-card-title">Projections vs Actuals</div>
            <svg viewBox="0 0 320 120" style="width: 100%; height: 90px;">
                <!-- Grid lines -->
                <line x1="30" y1="15" x2="310" y2="15" stroke="#F1F5F9" stroke-width="1"/>
                <line x1="30" y1="45" x2="310" y2="45" stroke="#F1F5F9" stroke-width="1"/>
                <line x1="30" y1="75" x2="310" y2="75" stroke="#F1F5F9" stroke-width="1"/>
                <line x1="30" y1="100" x2="310" y2="100" stroke="#E2E8F0" stroke-width="1"/>

                <!-- Y Axis Labels -->
                <text x="5" y="18" fill="#94A3B8" font-size="8" font-family="sans-serif">30M</text>
                <text x="5" y="48" fill="#94A3B8" font-size="8" font-family="sans-serif">20M</text>
                <text x="5" y="78" fill="#94A3B8" font-size="8" font-family="sans-serif">10M</text>
                <text x="15" y="103" fill="#94A3B8" font-size="8" font-family="sans-serif">0</text>

                <!-- Dual Bars (Jan - Jun) -->
                <!-- Jan -->
                <rect x="55" y="60" width="10" height="40" rx="2" fill="#BAE6FD"/>
                <rect x="57" y="72" width="6" height="28" rx="1" fill="#38BDF8"/>
                <text x="54" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">Jan</text>

                <!-- Feb -->
                <rect x="95" y="45" width="10" height="55" rx="2" fill="#BAE6FD"/>
                <rect x="97" y="58" width="6" height="42" rx="1" fill="#38BDF8"/>
                <text x="94" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">Feb</text>

                <!-- Mar -->
                <rect x="135" y="50" width="10" height="50" rx="2" fill="#BAE6FD"/>
                <rect x="137" y="65" width="6" height="35" rx="1" fill="#38BDF8"/>
                <text x="134" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">Mar</text>

                <!-- Apr -->
                <rect x="175" y="38" width="10" height="62" rx="2" fill="#BAE6FD"/>
                <rect x="177" y="50" width="6" height="50" rx="1" fill="#38BDF8"/>
                <text x="174" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">Apr</text>

                <!-- May -->
                <rect x="215" y="62" width="10" height="38" rx="2" fill="#BAE6FD"/>
                <rect x="217" y="75" width="6" height="25" rx="1" fill="#38BDF8"/>
                <text x="213" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">May</text>

                <!-- Jun -->
                <rect x="255" y="45" width="10" height="55" rx="2" fill="#BAE6FD"/>
                <rect x="257" y="56" width="6" height="44" rx="1" fill="#38BDF8"/>
                <text x="254" y="112" fill="#94A3B8" font-size="8" font-family="sans-serif">Jun</text>
            </svg>
        </div>
    </div>

    <!-- Attendance Section (12-Month Bar Chart Matching Figma) -->
    <h3 class="profile-section-title">Attendance</h3>
    <div class="attendance-chart-container">
        <svg viewBox="0 0 700 160" class="bar-chart-svg">
            <!-- Horizontal Grid lines -->
            <line x1="30" y1="20" x2="680" y2="20" stroke="#F4F4F6" stroke-width="1"/>
            <line x1="30" y1="50" x2="680" y2="50" stroke="#F4F4F6" stroke-width="1"/>
            <line x1="30" y1="80" x2="680" y2="80" stroke="#F4F4F6" stroke-width="1"/>
            <line x1="30" y1="110" x2="680" y2="110" stroke="#F4F4F6" stroke-width="1"/>
            <line x1="30" y1="135" x2="680" y2="135" stroke="#E4E4E7" stroke-width="1"/>

            <!-- Y-Axis Labels -->
            <text x="15" y="24" fill="#A1A1AA" font-size="10" font-family="sans-serif">6</text>
            <text x="15" y="54" fill="#A1A1AA" font-size="10" font-family="sans-serif">4</text>
            <text x="15" y="84" fill="#A1A1AA" font-size="10" font-family="sans-serif">2</text>
            <text x="15" y="138" fill="#A1A1AA" font-size="10" font-family="sans-serif">0</text>

            <!-- 12 Bars Matching Figma Colors (Purple, Green, Black, Sky-blue) -->
            <!-- Jan: 2 (Purple) -->
            <rect x="65" y="105" width="14" height="30" rx="3" fill="#818CF8"/>
            <text x="63" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Jan</text>

            <!-- Feb: 5.5 (Light Green) -->
            <rect x="115" y="50" width="14" height="85" rx="3" fill="#86EFAC"/>
            <text x="113" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Feb</text>

            <!-- Mar: 5 (Dark Charcoal) -->
            <rect x="165" y="60" width="14" height="75" rx="3" fill="#18181B"/>
            <text x="163" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Mar</text>

            <!-- Apr: 6 (Sky Blue) -->
            <rect x="215" y="38" width="14" height="97" rx="3" fill="#7DD3FC"/>
            <text x="213" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Apr</text>

            <!-- May: 4.5 (Soft Grey/Blue) -->
            <rect x="265" y="70" width="14" height="65" rx="3" fill="#93C5FD"/>
            <text x="263" y="152" fill="#71717A" font-size="10" font-family="sans-serif">May</text>

            <!-- Jun: 5.5 (Light Green) -->
            <rect x="315" y="50" width="14" height="85" rx="3" fill="#86EFAC"/>
            <text x="313" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Jun</text>

            <!-- Jul: 5 (Purple) -->
            <rect x="365" y="65" width="14" height="70" rx="3" fill="#818CF8"/>
            <text x="363" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Jul</text>

            <!-- Aug: 5.5 (Light Green) -->
            <rect x="415" y="50" width="14" height="85" rx="3" fill="#86EFAC"/>
            <text x="413" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Aug</text>

            <!-- Sep: 5 (Dark Charcoal) -->
            <rect x="465" y="60" width="14" height="75" rx="3" fill="#18181B"/>
            <text x="463" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Sep</text>

            <!-- Oct: 6 (Sky Blue) -->
            <rect x="515" y="36" width="14" height="99" rx="3" fill="#7DD3FC"/>
            <text x="513" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Oct</text>

            <!-- Nov: 4.5 (Soft Blue) -->
            <rect x="565" y="70" width="14" height="65" rx="3" fill="#93C5FD"/>
            <text x="563" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Nov</text>

            <!-- Dec: 5.5 (Light Green) -->
            <rect x="615" y="50" width="14" height="85" rx="3" fill="#86EFAC"/>
            <text x="613" y="152" fill="#71717A" font-size="10" font-family="sans-serif">Dec</text>
        </svg>
    </div>
</div>


<!-- ========================================================
     Vanilla JavaScript: Interactive State & AJAX CRUD
     ======================================================== -->
<script>
const BASE_URL = window.FITNESSHUB_BASE_URL || '';
let currentClientId = <?= (int)$activeClientId ?>;
let currentInstructorId = <?= (int)$instructorId ?>;

function scrollToBottom() {
    const chatStream = document.getElementById('chatStream');
    if (chatStream) {
        chatStream.scrollTop = chatStream.scrollHeight;
    }
}
window.addEventListener('load', scrollToBottom);

function showProfileView() {
    document.getElementById('messagesChatView').style.display = 'none';
    document.getElementById('clientProfileView').classList.add('active');
    
    const bc = document.getElementById('topbarBreadcrumb');
    const nameEl = document.getElementById('activeChatName');
    if (bc && nameEl) {
        bc.innerHTML = '<span class="bc-item sub" onclick="showChatView()" style="cursor:pointer">Messages</span> <span style="color:#A1A1AA">/</span> <span class="bc-item">' + nameEl.innerText + '\'s Profile</span>';
    }
}

function showChatView() {
    document.getElementById('clientProfileView').classList.remove('active');
    document.getElementById('messagesChatView').style.display = 'flex';
    
    const bc = document.getElementById('topbarBreadcrumb');
    if (bc) bc.innerHTML = '<span class="bc-item">Messages</span>';
    scrollToBottom();
}

function selectClient(clientId) {
    showChatView();
    const targetItem = document.querySelector(`.conversation-item[data-client-id="${clientId}"]`);
    const hasUnread = targetItem && (targetItem.querySelector('.unread-dot') || parseInt(targetItem.getAttribute('data-unread'), 10) > 0);
    if (clientId === currentClientId && !hasUnread) return;
    currentClientId = clientId;

    document.querySelectorAll('.conversation-item').forEach(item => {
        item.classList.remove('active');
        if (parseInt(item.getAttribute('data-client-id'), 10) === clientId) {
            item.classList.add('active');
            const unreadCount = parseInt(item.getAttribute('data-unread'), 10) || (item.querySelector('.unread-dot') ? 1 : 0);
            item.setAttribute('data-unread', '0');
            const dot = item.querySelector('.unread-dot');
            if (dot) {
                dot.remove();
            }
            const totalBadge = document.getElementById('unreadTotalCount');
            if (totalBadge && unreadCount > 0) {
                let count = parseInt(totalBadge.innerText, 10) || 0;
                let newCount = count - unreadCount;
                if (newCount > 0) {
                    totalBadge.innerText = newCount;
                } else {
                    totalBadge.remove();
                }
            }
        }
    });

    fetch(`${BASE_URL}/instructor/messages/chat?client_id=${clientId}`)
        .then(res => res.json())
        .then(data => {
            if (!data.success) return;

            const client = data.client;
            const initials = ((client.first_name || '').charAt(0) + (client.last_name || '').charAt(0)).toUpperCase();
            const fullName = `${client.first_name || ''} ${client.last_name || ''}`.trim();

            document.getElementById('activeChatAvatar').innerText = initials;
            document.getElementById('activeChatName').innerText = fullName;
            document.getElementById('activityClientName').innerText = client.first_name || 'Client';

            document.getElementById('profileLargeAvatar').innerText = initials;
            document.getElementById('profileClientName').innerText = fullName;
            if (document.getElementById('profileEmail')) document.getElementById('profileEmail').innerText = '✉ ' + (client.email || '');
            if (document.getElementById('profilePhone')) document.getElementById('profilePhone').innerText = '📞 ' + (client.phone_number || '');
            if (document.getElementById('profileGoal')) document.getElementById('profileGoal').innerText = client.fitness_goal || 'Endurance';
            if (document.getElementById('profileMemberSince')) document.getElementById('profileMemberSince').innerText = client.created_at ? client.created_at.split(' ')[0] : '2024, Jul 08';

            if (document.getElementById('kpiNextSession')) document.getElementById('kpiNextSession').innerText = client.next_session || 'Upcoming';
            if (document.getElementById('kpiLastSession')) document.getElementById('kpiLastSession').innerText = client.last_session || '7 days ago';
            if (document.getElementById('kpiTotalSessions')) document.getElementById('kpiTotalSessions').innerText = client.total_sessions || '50';
            if (document.getElementById('kpiGrowthRate')) document.getElementById('kpiGrowthRate').innerText = client.growth_rate || '20.0%';
            if (document.getElementById('kpiGrowthDelta')) document.getElementById('kpiGrowthDelta').innerText = (client.growth_delta || '+3.0%') + ' ↗';

            renderChatMessages(data.messages);
        })
        .catch(err => console.error('Error fetching chat:', err));
}

function renderChatMessages(messages) {
    const stream = document.getElementById('chatStream');
    stream.innerHTML = '<div class="chat-date-divider"><span class="chat-date-text">Today</span></div>';

    if (!messages || messages.length === 0) {
        stream.innerHTML += '<div class="empty-chat-notice" style="text-align: center; color: var(--inst-text-muted); margin: auto; font-size: 13px;">No messages with this client yet. Send a message below to begin!</div>';
        return;
    }

    messages.forEach(msg => {
        const isOut = (parseInt(msg.sender_id, 10) === currentInstructorId);
        const timeStr = formatMsgTime(msg.created_at);
        const bubbleRow = document.createElement('div');
        bubbleRow.className = 'chat-bubble-row ' + (isOut ? 'outgoing' : 'incoming');
        bubbleRow.id = 'bubble-' + msg.id;

        const isMsgRead = parseInt(msg.is_read, 10) === 1;
        let checkHtml = '';
        if (isOut) {
            checkHtml = isMsgRead
                ? '<span class="double-check-icon read" title="Read by client"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline><polyline points="20 12 12 20"></polyline></svg></span>'
                : '<span class="double-check-icon sent" title="Delivered"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></span>';
        }
        let deleteHtml = isOut ? '<button class="delete-msg-btn" type="button" onclick="deleteMessage(' + msg.id + ')" title="Delete message"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>' : '';

        bubbleRow.innerHTML = deleteHtml + 
            '<div class="chat-bubble">' + 
                escapeHtml(msg.message_text) + 
                '<div class="bubble-time-row"><span>' + timeStr + '</span>' + checkHtml + '</div>' + 
            '</div>';

        stream.appendChild(bubbleRow);
    });

    scrollToBottom();
}

function handleSendMessage(e) {
    if (e) e.preventDefault();
    const input = document.getElementById('messageTextInput');
    if (!input) return;
    const text = input.value.trim();
    if (!text) return;

    input.value = '';

    const formData = new FormData();
    formData.append('receiver_id', currentClientId);
    formData.append('message_text', text);

    fetch(`${BASE_URL}/instructor/messages/send`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (!data.success) {
            alert(data.error || 'Failed to send message');
            return;
        }

        const msg = data.message;
        const stream = document.getElementById('chatStream');

        const emptyNotice = stream.querySelector('.empty-chat-notice');
        if (emptyNotice) emptyNotice.remove();

        const bubbleRow = document.createElement('div');
        bubbleRow.className = 'chat-bubble-row outgoing';
        bubbleRow.id = 'bubble-' + msg.id;
        const timeStr = formatMsgTime(msg.created_at);

        bubbleRow.innerHTML = 
            '<button class="delete-msg-btn" type="button" onclick="deleteMessage(' + msg.id + ')" title="Delete message">' +
                '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>' +
            '</button>' +
            '<div class="chat-bubble">' + 
                escapeHtml(msg.message_text) + 
                '<div class="bubble-time-row"><span>' + timeStr + '</span><span class="double-check-icon sent" title="Delivered"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg></span></div>' + 
            '</div>';

        stream.appendChild(bubbleRow);
        scrollToBottom();

        const snippetEl = document.getElementById('snippet-' + currentClientId);
        if (snippetEl) snippetEl.innerText = text;
        const timeEl = document.getElementById('time-' + currentClientId);
        if (timeEl) timeEl.innerText = timeStr;
    })
    .catch(err => console.error('Error sending message:', err));
}

function deleteMessage(messageId) {
    if (!confirm('Are you sure you want to delete this message?')) return;

    const formData = new FormData();
    formData.append('message_id', messageId);

    fetch(`${BASE_URL}/instructor/messages/delete`, {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            const bubble = document.getElementById('bubble-' + messageId);
            if (bubble) {
                bubble.style.opacity = '0';
                bubble.style.transform = 'scale(0.95)';
                bubble.style.transition = 'all 0.2s ease';
                setTimeout(() => bubble.remove(), 200);
            }
        } else {
            alert('Could not delete message: ' + (data.error || 'Unknown error'));
        }
    })
    .catch(err => console.error('Error deleting message:', err));
}

window.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('view') === 'profile') {
        showProfileView();
    }
});

document.getElementById('sendMessageForm')?.addEventListener('submit', handleSendMessage);

document.getElementById('clientSearchInput')?.addEventListener('input', function(e) {
    const term = e.target.value.toLowerCase();
    document.querySelectorAll('.conversation-item').forEach(item => {
        const name = (item.getAttribute('data-client-name') || '').toLowerCase();
        item.style.display = name.includes(term) ? 'flex' : 'none';
    });
});

document.getElementById('tabAll')?.addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('tabUnread')?.classList.remove('active');
    document.querySelectorAll('.conversation-item').forEach(item => item.style.display = 'flex');
});

document.getElementById('tabUnread')?.addEventListener('click', function() {
    this.classList.add('active');
    document.getElementById('tabAll')?.classList.remove('active');
    document.querySelectorAll('.conversation-item').forEach(item => {
        const unread = parseInt(item.getAttribute('data-unread'), 10) || 0;
        item.style.display = unread > 0 ? 'flex' : 'none';
    });
});

function formatMsgTime(dateStr) {
    if (!dateStr) return 'Now';
    const d = new Date(dateStr.replace(/-/g, "/"));
    let hours = d.getHours();
    let mins = d.getMinutes();
    const ampm = hours >= 12 ? 'PM' : 'AM';
    hours = hours % 12 || 12;
    mins = mins < 10 ? '0' + mins : mins;
    return `${hours}:${mins} ${ampm}`;
}

function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str || '';
    return div.innerHTML;
}
</script>
