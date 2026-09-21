<?php
// Dynamic base URL detection for XAMPP subdirectories vs VirtualHosts
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
$baseUrl = ($scriptDir === '/' || $scriptDir === '.') ? '' : $scriptDir;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Instructor Portal — FitnessHub') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Design System CSS (Uses Dynamic Base URL + Cache Buster) -->
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/tokens.css">
    <link rel="stylesheet" href="<?= $baseUrl ?>/assets/css/instructor.css?v=<?= time() ?>">

    <!-- Embedded Notification Styles (Guarantees zero flash of unstyled content regardless of CSS caching) -->
    <style>
    .notification-dropdown-wrapper {
        position: relative !important;
        display: inline-flex !important;
        align-items: center !important;
    }
    .notification-dropdown {
        display: none;
        position: absolute !important;
        top: calc(100% + 8px) !important;
        right: 0 !important;
        width: 340px !important;
        background: #FFFFFF !important;
        border: 1px solid #E4E4E7 !important;
        border-radius: 12px !important;
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.12), 0 8px 10px -6px rgba(0, 0, 0, 0.06) !important;
        z-index: 9999 !important;
        flex-direction: column !important;
        overflow: hidden !important;
    }
    .notification-dropdown.active {
        display: flex !important;
    }
    .notif-header {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 12px 16px !important;
        border-bottom: 1px solid #F4F4F6 !important;
        background: #FFFFFF !important;
    }
    .notif-header-left {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
    }
    .notif-title {
        font-size: 13.5px !important;
        font-weight: 700 !important;
        color: #18181B !important;
    }
    .notif-badge-count {
        background: #18181B !important;
        color: #FFFFFF !important;
        font-size: 10px !important;
        font-weight: 700 !important;
        padding: 2px 6px !important;
        border-radius: 999px !important;
    }
    .notif-btn-clear {
        background: transparent !important;
        border: none !important;
        font-size: 11px !important;
        font-weight: 500 !important;
        color: #71717A !important;
        cursor: pointer !important;
    }
    .notif-btn-clear:hover {
        color: #18181B !important;
    }
    .notif-list {
        max-height: 320px !important;
        overflow-y: auto !important;
        display: flex !important;
        flex-direction: column !important;
        background: #FFFFFF !important;
    }
    .notif-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 12px !important;
        padding: 12px 16px !important;
        border-bottom: 1px solid #F4F4F6 !important;
        text-decoration: none !important;
        color: inherit !important;
        transition: background 0.15s ease !important;
        cursor: default !important;
    }
    .notif-item:hover {
        background: #F8F8FA !important;
    }
    .notif-item.unread {
        background: #F9FAFB !important;
    }
    .notif-icon-circle {
        width: 32px !important;
        height: 32px !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        flex-shrink: 0 !important;
    }
    .notif-icon-circle.blue { background: #E0F2FE !important; color: #0284C7 !important; }
    .notif-icon-circle.green { background: #DCFCE7 !important; color: #16A34A !important; }
    .notif-icon-circle.amber { background: #FEF3C7 !important; color: #D97706 !important; }
    .notif-icon-circle.purple { background: #F3E8FF !important; color: #9333EA !important; }
    .notif-content {
        flex: 1 !important;
        min-width: 0 !important;
        text-align: left !important;
    }
    .notif-top-row {
        display: flex !important;
        align-items: baseline !important;
        justify-content: space-between !important;
        gap: 6px !important;
        margin-bottom: 2px !important;
    }
    .notif-heading {
        font-size: 12.5px !important;
        font-weight: 600 !important;
        color: #18181B !important;
    }
    .notif-time {
        font-size: 10.5px !important;
        color: #A1A1AA !important;
        flex-shrink: 0 !important;
    }
    .notif-body {
        font-size: 11.5px !important;
        color: #71717A !important;
        line-height: 1.35 !important;
        word-break: break-word !important;
    }
    .notif-dot {
        width: 6px !important;
        height: 6px !important;
        border-radius: 50% !important;
        background: #3B82F6 !important;
        margin-top: 6px !important;
        flex-shrink: 0 !important;
    }
    .notif-footer {
        padding: 10px 16px !important;
        text-align: center !important;
        border-top: 1px solid #F4F4F6 !important;
        background: #FAFAFB !important;
    }
    .notif-footer a {
        font-size: 11.5px !important;
        font-weight: 600 !important;
        color: #71717A !important;
        text-decoration: none !important;
    }
    .notif-footer a:hover {
        color: #18181B !important;
    }
    </style>

    <!-- Global Base URL for JavaScript fetch calls -->
    <script>
        window.FITNESSHUB_BASE_URL = '<?= $baseUrl ?>';
    </script>
</head>
<body class="instructor-body">

    <!-- App Container -->
    <div class="instructor-shell">
        
        <!-- Left Sidebar Navigation (Matching Figma) -->
        <aside class="instructor-sidebar">
            <div class="sidebar-top">
                <!-- Brand Logo -->
                <a href="<?= $baseUrl ?>/" class="sidebar-brand" title="FitnessHub Home">
                    <img src="<?= $baseUrl ?>/assets/images/logo_bg_removed.png" alt="FitnessHub" class="brand-logo-img">
                </a>
            </div>

            <!-- Favorites Group -->
            <div class="sidebar-nav-group">
                <div class="group-label">Favorites</div>
               <a href="<?= $baseUrl ?>/instructor/schedule" class="sidebar-nav-link <?= ($currentRoute ?? '') === '/instructor/schedule' ? 'active' : '' ?>">
                    <span class="nav-dot">•</span>
                    <span class="nav-text">My Schedule</span>
                </a > 
            </div>

            <!-- Dashboards Group -->
            <div class="sidebar-nav-group">
                <div class="group-label">Dashboards</div>
                
                <a href="<?= $baseUrl ?>/instructor/overview" class="sidebar-nav-link <?= ($currentRoute ?? '') === '/instructor/overview' ? 'active' : '' ?>">
                    <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polygon points="12 8 8 12 12 16 16 12 12 8"></polygon>
                    </svg>
                    <span class="nav-text">Overview</span>
                </a>

                <a href="<?= $baseUrl ?>/instructor/schedule" class="sidebar-nav-link <?= ($currentRoute ?? '') === '/instructor/schedule' ? 'active' : '' ?>">
                    <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    <span class="nav-text">My Schedule</span>
                </a>

                <a href="<?= $baseUrl ?>/my-clients" class="sidebar-nav-link <?= ($currentRoute ?? '') === '/my-clients' ? 'active' : '' ?>">
                    <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span class="nav-text">My Clients</span>
                </a>

                <!-- Messages (Active highlighted link in Figma) -->
                <a href="<?= $baseUrl ?>/instructor/messages" class="sidebar-nav-link <?= strpos(($currentRoute ?? ''), '/instructor/messages') !== false ? 'active' : '' ?>">
                    <div class="active-indicator"></div>
                    <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <span class="nav-text">Messages</span>
                </a>
            </div>

            <!-- Bottom Account Link -->
            <div class="sidebar-bottom">
                <a href="<?= $baseUrl ?>/account" class="sidebar-nav-link <?= ($currentRoute ?? '') === '/account' ? 'active' : '' ?>">
                    <svg class="nav-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <span class="nav-text">Account</span>
                </a>
            </div>
        </aside>

        <!-- Main View Wrapper -->
        <div class="instructor-main-view">
            
            <!-- Top App Bar (Matching Figma) -->
            <header class="instructor-topbar">
                <div class="topbar-left">
                    <button class="topbar-btn" title="Toggle Sidebar" type="button">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="9" y1="3" x2="9" y2="21"></line>
                        </svg>
                    </button>
                    <button class="topbar-btn" title="Bookmark" type="button">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </button>
                    <div class="topbar-breadcrumb" id="topbarBreadcrumb">
                        <span class="bc-item"><?= htmlspecialchars($breadcrumb ?? 'Messages') ?></span>
                    </div>
                </div>

                <div class="topbar-right">
                    <!-- Search Box -->
                    <div class="topbar-search">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" placeholder="Search" aria-label="Search">
                        <kbd class="kbd-badge">⌘K</kbd>
                    </div>

                    <!-- Action Icons -->
                    <div class="notification-dropdown-wrapper">
                        <button class="topbar-btn has-badge" id="notifBellBtn" title="Notifications" type="button" aria-expanded="false" aria-haspopup="true">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                            </svg>
                        </button>

                        <!-- Notification Dropdown Panel -->
                        <div class="notification-dropdown" id="notifDropdown" style="display: none;">
                            <div class="notif-header">
                                <div class="notif-header-left">
                                    <span class="notif-title">Notifications</span>
                                    <span class="notif-badge-count" id="notifBadgeCount">3 New</span>
                                </div>
                                <button type="button" class="notif-btn-clear" id="notifMarkAllBtn">Mark all read</button>
                            </div>

                            <div class="notif-list" id="notifList">
                                <!-- Item 1: Direct Message -->
                                <div class="notif-item unread">
                                    <div class="notif-icon-circle blue">💬</div>
                                    <div class="notif-content">
                                        <div class="notif-top-row">
                                            <span class="notif-heading">Nisal Indusara</span>
                                            <span class="notif-time">10m ago</span>
                                        </div>
                                        <div class="notif-body">Hey Coach! Just confirming our session for today at 2 PM.</div>
                                    </div>
                                    <span class="notif-dot"></span>
                                </div>

                                <!-- Item 2: Session Booking -->
                                <div class="notif-item unread">
                                    <div class="notif-icon-circle green">📅</div>
                                    <div class="notif-content">
                                        <div class="notif-top-row">
                                            <span class="notif-heading">PT Session Booked</span>
                                            <span class="notif-time">1h ago</span>
                                        </div>
                                        <div class="notif-body">Melani Muthumini booked Upper Body Strength for Wednesday.</div>
                                    </div>
                                    <span class="notif-dot"></span>
                                </div>

                                <!-- Item 3: Milestone Reached -->
                                <div class="notif-item unread">
                                    <div class="notif-icon-circle amber">🎯</div>
                                    <div class="notif-content">
                                        <div class="notif-top-row">
                                            <span class="notif-heading">Goal Completed</span>
                                            <span class="notif-time">Yesterday</span>
                                        </div>
                                        <div class="notif-body">Hajara Shafra reached 30-Day Workout Consistency Goal!</div>
                                    </div>
                                    <span class="notif-dot"></span>
                                </div>

                                <!-- Item 4: Progress Log -->
                                <div class="notif-item">
                                    <div class="notif-icon-circle purple">⚖️</div>
                                    <div class="notif-content">
                                        <div class="notif-top-row">
                                            <span class="notif-heading">Progress Log</span>
                                            <span class="notif-time">2d ago</span>
                                        </div>
                                        <div class="notif-body">Manuja Nirmal logged bodyweight progress: 72.5 kg.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="notif-footer">
                                <span style="font-size: 11px; color: #A1A1AA;">Notifications updated automatically</span>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content Body -->
            <main class="instructor-content-area">
                <?= $content ?>
            </main>
        </div>
    </div>

    <!-- Notification Bell Toggle Script -->
    <script>
        (function() {
            const bellBtn = document.getElementById('notifBellBtn');
            const dropdown = document.getElementById('notifDropdown');
            const markAllBtn = document.getElementById('notifMarkAllBtn');
            const badgeCount = document.getElementById('notifBadgeCount');

            if (!bellBtn || !dropdown) return;

            bellBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isCurrentlyOpen = (dropdown.style.display === 'flex');
                if (isCurrentlyOpen) {
                    dropdown.style.display = 'none';
                    dropdown.classList.remove('active');
                    bellBtn.setAttribute('aria-expanded', 'false');
                } else {
                    dropdown.style.display = 'flex';
                    dropdown.classList.add('active');
                    bellBtn.setAttribute('aria-expanded', 'true');
                }
            });

            dropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            document.addEventListener('click', function() {
                dropdown.style.display = 'none';
                dropdown.classList.remove('active');
                bellBtn.setAttribute('aria-expanded', 'false');
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    dropdown.style.display = 'none';
                    dropdown.classList.remove('active');
                    bellBtn.setAttribute('aria-expanded', 'false');
                }
            });

            markAllBtn?.addEventListener('click', function() {
                document.querySelectorAll('#notifList .notif-item.unread').forEach(item => {
                    item.classList.remove('unread');
                });
                document.querySelectorAll('#notifList .notif-dot').forEach(dot => {
                    dot.remove();
                });
                if (badgeCount) {
                    badgeCount.innerText = '0 New';
                    badgeCount.style.backgroundColor = 'var(--inst-text-faint)';
                }
                bellBtn.classList.remove('has-badge');
            });
        })();
    </script>
</body>
</html>
