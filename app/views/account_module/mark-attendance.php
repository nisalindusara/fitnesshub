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
        padding: 28px 24px;
        width: 100%;
        max-width: 320px;
        background: #ffffff;
        border: 1px solid #eee;
        border-radius: 16px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
    }

    .attendance-member-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        object-fit: cover;
        background: #eee;
    }

    .attendance-member-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .attendance-member-name {
        font-family: "Inter", sans-serif;
        font-weight: 600;
        font-size: 16px;
        color: #1c1c1c;
    }

    .attendance-member-status {
        font-size: 14px;
        color: #666;
    }

    .attendance-action-btn {
        margin-top: 8px;
        width: 100%;
        padding: 10px 20px;
        border-radius: 8px;
        border: none;
        font-family: "Inter", sans-serif;
        font-weight: 600;
        cursor: pointer;
        color: #ffffff;
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

    .attendance-action-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }

    .attendance-member-panel[hidden] {
        display: none;
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
            <img class="attendance-member-avatar" src="" alt="">

            <div class="attendance-member-details">
                <span class="attendance-member-name"></span>
                <span class="attendance-member-status"></span>
            </div>
            <button type="button" class="attendance-action-btn"></button>
        </div>

    </div>
</div>

<script type="module" src="/assets/js/attendance.js"></script>