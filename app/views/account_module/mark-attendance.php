<?php $pageStyles = ['staff/account_module/mark-attendance']; ?>

<div id="staff-attendance-container">

    <div class="page-header">
        <span class="page-title attendance-title">Attendance</span>
    </div>

    <div class="content-body">

        <div class="attendance-search-panel">
            <div class="attendance-search-box">
                <svg class="attendance-search-icon-svg" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="7" />
                    <path d="M21 21l-4.3-4.3" />
                </svg>
                <input type="text" class="attendance-search-input" placeholder="Search by name, phone, or member ID..." autocomplete="off">
                <div class="attendance-search-results" hidden></div>
            </div>

            <div class="attendance-stats">
                <span class="attendance-stat-highlight" id="attendance-checked-in-count">42 checked in</span>
                <span class="attendance-stat-dot">&bull;</span>
                <span class="attendance-stat-muted">124 total members today</span>
            </div>
        </div>

        <div class="attendance-member-panel" hidden>
            <div class="attendance-avatar-wrap">
                <img class="attendance-member-avatar" src="" alt="">
                <span class="attendance-status-dot" hidden></span>
            </div>

            <span class="attendance-member-name"></span>
            <div class="attendance-member-badges"></div>
            <span class="attendance-member-phone"></span>

            <!-- Simple text shown only when NOT checked in -->
            <span class="attendance-member-status"></span>

            <!-- Rich status card shown only when checked in -->
            <div class="attendance-status-card" hidden>
                <div class="attendance-status-left">
                    <span class="attendance-status-label">CURRENT STATUS</span>
                    <span class="attendance-status-value">
                        Checked In at <span class="attendance-checked-in-time"></span>
                    </span>
                </div>
                <div class="attendance-status-right">
                    <span class="attendance-status-badge">
                        <span class="attendance-status-badge-dot"></span> On Facility Grounds
                    </span>
                    <span class="attendance-status-duration"></span>
                </div>
            </div>

            <!-- Shown only when NOT checked in AND blocked (no membership/class) -->
            <div class="attendance-empty-state" hidden>
                No active membership or class enrollment found — check-in is disabled.
            </div>

            <!-- Radio picker, shown only when there's more than one valid check-in reason -->
            <div class="attendance-checkin-options" hidden></div>

            <button type="button" class="attendance-action-btn"></button>
        </div>

    </div>
</div>

<script type="module" src="/assets/js/attendance.js"></script>