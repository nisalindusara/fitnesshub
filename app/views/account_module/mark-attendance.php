<style>
    .attendance-title {
        font-size: 22px;
        font-weight: 700;
        color: #1c1c1c;
    }

    .attendance-search-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 40px;
    }

    .attendance-search-box {
        position: relative;
        display: flex;
        align-items: center;
        gap: 12px;
        width: 100%;
        max-width: 620px;
        padding: 14px 20px;
        background: #fff;
        border-radius: 999px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }

    .attendance-search-icon-svg {
        width: 18px;
        height: 18px;
        stroke: rgba(28, 28, 28, 0.35);
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        flex-shrink: 0;
    }

    .attendance-search-input {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        font-size: 14px;
        font-family: "Inter", sans-serif;
        color: #1c1c1c;
    }

    .attendance-search-input::placeholder {
        color: rgba(28, 28, 28, 0.3);
    }

    .attendance-stats {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 14px;
        font-size: 13px;
    }

    .attendance-stat-highlight {
        color: #1c1c1c;
        font-weight: 600;
    }

    .attendance-stat-dot {
        color: rgba(28, 28, 28, 0.25);
    }

    .attendance-stat-muted {
        color: rgba(28, 28, 28, 0.4);
    }

    /* --- Search results dropdown --- */

    .attendance-search-results {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        max-width: 620px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        z-index: 10;
    }

    .attendance-search-results[hidden] {
        display: none;
    }

    .attendance-search-result {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 20px;
        cursor: pointer;
    }

    .attendance-search-result:hover {
        background: #f5f5f5;
    }

    .attendance-result-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        object-fit: cover;
        flex-shrink: 0;
        background: #eee;
    }

    .attendance-result-info {
        display: flex;
        flex-direction: column;
        gap: 2px;
        text-align: left;
    }

    .attendance-result-name {
        font-family: "Inter", sans-serif;
        font-weight: 600;
        font-size: 14px;
        color: #1c1c1c;
    }

    .attendance-result-phone {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.45);
    }

    .attendance-search-empty {
        padding: 12px 20px;
        color: #888;
        font-size: 14px;
    }

    /* --- Selected member panel --- */

    .attendance-member-panel {
        margin: 24px auto 0;
        padding: 36px 44px;
        width: 100%;
        max-width: 560px;
        background: #ffffff;
        border: 1px solid #eee;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);

        display: grid;
        grid-template-columns: auto 1fr;
        column-gap: 24px;
        row-gap: 4px;
        align-items: start;
        grid-template-areas:
            "avatar name"
            "avatar badges"
            "avatar phone"
            "statusline statusline"
            "statuscard statuscard"
            "empty empty"
            "options options"
            "button button";
    }


    .attendance-member-panel[hidden] {
        display: none;
    }

    .attendance-avatar-wrap {
        position: relative;
        grid-area: avatar;
        align-self: center;
    }

    .attendance-member-avatar {
        width: 96px;
        height: 96px;
        border-radius: 50%;
        object-fit: cover;
        background: #eee;
    }

    .attendance-status-dot {
        position: absolute;
        bottom: -2px;
        right: -2px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #22c55e;
        border: 3px solid #ffffff;
    }

    .attendance-member-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .attendance-member-name {
        font-size: 20px;
        font-family: "Inter", sans-serif;
        font-weight: 600;
        color: #1c1c1c;
        grid-area: name;
        text-align: left;
        align-self: end;
    }

    .attendance-member-badges {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: center;
        grid-area: badges;
        justify-content: flex-start;
        text-align: left;
    }

    .attendance-member-phone {
        font-size: 14px;
        color: rgba(28, 28, 28, 0.55);
        grid-area: phone;
        text-align: left;
    }

    .attendance-member-status {
        font-size: 14px;
        color: #666;
        grid-area: statusline;
        text-align: left;
        margin-top: 10px;
    }

    .attendance-status-card {
        width: 100%;
        margin-top: 8px;
        padding: 16px 20px;
        background: #f4f6fb;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        text-align: left;
        grid-area: statuscard;
        margin-top: 10px;
    }

    .attendance-status-left {
        display: flex;
        flex-direction: column;
        gap: 2px;
    }

    .attendance-status-label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.04em;
        color: rgba(28, 28, 28, 0.45);
    }

    .attendance-status-value {
        font-size: 14px;
        font-weight: 600;
        color: #1c1c1c;
    }

    .attendance-status-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 4px;
    }

    .attendance-status-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: #16a34a;
    }

    .attendance-status-badge-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #22c55e;
    }

    .attendance-status-duration {
        font-size: 12px;
        color: rgba(28, 28, 28, 0.45);
    }

    .attendance-action-btn {
        margin-top: 8px;
        width: 100%;
        padding: 14px 20px;
        border-radius: 8px;
        border: none;
        font-family: "Inter", sans-serif;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        color: #ffffff;
        grid-area: button;
        margin-top: 10px;
    }

    .attendance-action-btn[data-action="check-in"] {
        background: #1c1c1c;
    }

    .attendance-action-btn[data-action="check-out"] {
        background: #ED1C24;
    }

    .attendance-action-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .attendance-badge {
        padding: 4px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
    }

    .attendance-badge-id {
        background: #f1f1f1;
        color: rgba(28, 28, 28, 0.6);
    }

    .attendance-badge-active {
        background: #e8f9ee;
        color: #16a34a;
    }

    .attendance-badge-expired,
    .attendance-badge-cancelled {
        background: #fdecec;
        color: #dc2626;
    }

    .attendance-empty-state {
        width: 100%;
        margin-top: 8px;
        padding: 14px 16px;
        background: #fdf6ec;
        border: 1px dashed #e8c988;
        border-radius: 12px;
        font-size: 13px;
        color: #92660d;
        text-align: center;
        grid-area: empty;
        margin-top: 10px;
    }

    .attendance-status-card[hidden] {
        display: none;
    }

    .attendance-empty-state[hidden] {
        display: none;
    }

    .attendance-checkin-options {
        grid-area: options;
        margin-top: 10px;
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 8px;
        text-align: left;
        margin-top: 4px;
    }

    .attendance-checkin-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 14px;
        border: 1px solid #eee;
        border-radius: 10px;
        font-size: 13px;
        color: #1c1c1c;
        cursor: pointer;
    }
</style>

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