<style>
    .privacy-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .privacy-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    .privacy-header {
        margin-bottom: 24px;
    }

    .privacy-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .privacy-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .privacy-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 20px;
        background-color: #F3F4F6;
        border-radius: 14px;
    }

    .privacy-item-link {
        text-decoration: none;
        color: inherit;
        transition: background-color 0.15s ease;
    }

    .privacy-item-link:hover {
        background-color: #ECEDEF;
    }

    .privacy-item-text {
        min-width: 0;
    }

    .privacy-item-label {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .privacy-item-label-danger {
        color: #DC2626;
    }

    .privacy-item-desc {
        font-size: 12.5px;
        color: #6B7280;
        line-height: 1.4;
    }

    .privacy-chevron {
        flex-shrink: 0;
    }

    .privacy-chevron-danger {
        opacity: 1;
    }

    /* Toggle switch */
    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 44px;
        height: 26px;
        flex-shrink: 0;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-track {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #D1D5DB;
        border-radius: 9999px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .toggle-track::before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 3px;
        bottom: 3px;
        background-color: #fff;
        border-radius: 50%;
        transition: transform 0.2s ease;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
    }

    .toggle-switch input:checked+.toggle-track {
        background-color: #D3272C;
    }

    .toggle-switch input:checked+.toggle-track::before {
        transform: translateX(18px);
    }
</style>

<div class="privacy-page">
    <div class="privacy-card">

        <div class="privacy-header">
            <h2 class="privacy-title">Privacy and Data</h2>
        </div>

        <div class="privacy-list">

            <div class="privacy-item">
                <div class="privacy-item-text">
                    <div class="privacy-item-label">Public Profile Visibility</div>
                    <div class="privacy-item-desc">Allow other gym members and instructors to discover your profile</div>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-track"></span>
                </label>
            </div>

            <div class="privacy-item">
                <div class="privacy-item-text">
                    <div class="privacy-item-label">Show on Gym Leaderboards</div>
                    <div class="privacy-item-desc">Display your performance badges on studio screens</div>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-track"></span>
                </label>
            </div>

            <a href="#" class="privacy-item privacy-item-link">
                <div class="privacy-item-text">
                    <div class="privacy-item-label">Data Sharing Preferences</div>
                    <div class="privacy-item-desc">Manage third-party device synchronization like Apple Health</div>
                </div>
                <svg class="privacy-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="privacy-item privacy-item-link">
                <div class="privacy-item-text">
                    <div class="privacy-item-label">Download My Data</div>
                    <div class="privacy-item-desc">Request an archive of all your workout history and personal data</div>
                </div>
                <svg class="privacy-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="privacy-item privacy-item-link privacy-item-danger">
                <div class="privacy-item-text">
                    <div class="privacy-item-label privacy-item-label-danger">Delete Account</div>
                    <div class="privacy-item-desc">Permanently delete your account and personal history</div>
                </div>
                <svg class="privacy-chevron privacy-chevron-danger" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#EF4444" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

        </div>

    </div>
</div>