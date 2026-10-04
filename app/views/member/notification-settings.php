<?php $pageStyles = ['member/member/_toggle-switch']; ?>
<style>
    .notifications-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .notifications-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    .notifications-header {
        margin-bottom: 24px;
    }

    .notifications-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .settings-section {
        margin-bottom: 28px;
    }

    .settings-section:last-child {
        margin-bottom: 0;
    }

    .settings-section-title {
        margin: 0 0 12px 0;
        font-size: 12.5px;
        font-weight: 700;
        color: #374151;
    }

    .settings-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .settings-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 18px 20px;
        background-color: #F3F4F6;
        border-radius: 14px;
    }

    .settings-item-text {
        min-width: 0;
    }

    .settings-item-label {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 4px;
    }

    .settings-item-desc {
        font-size: 12.5px;
        color: #6B7280;
        line-height: 1.4;
    }

    /* Toggle switch */
</style>

<div class="notifications-page">
    <div class="notifications-card">

        <div class="notifications-header">
            <h2 class="notifications-title">Notification Settings</h2>
        </div>

        <!-- Notifications section -->
        <div class="settings-section">
            <h3 class="settings-section-title">Notifications</h3>

            <div class="settings-list">

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">Push Notifications</div>
                        <div class="settings-item-desc">Receive instant updates on your mobile device</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">Email Notifications</div>
                        <div class="settings-item-desc">Weekly digests, account summaries, and updates</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">SMS Notifications</div>
                        <div class="settings-item-desc">Urgent alerts and schedule changes</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-track"></span>
                    </label>
                </div>

            </div>
        </div>

        <!-- Reminders section -->
        <div class="settings-section">
            <h3 class="settings-section-title">Reminders</h3>

            <div class="settings-list">

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">Class Reminders</div>
                        <div class="settings-item-desc">Alerts 1 hour before scheduled group sessions</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">Daily Workout Reminders</div>
                        <div class="settings-item-desc">Morning reminder for planned workout drills</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                </div>

                <div class="settings-item">
                    <div class="settings-item-text">
                        <div class="settings-item-label">Trainer Messages</div>
                        <div class="settings-item-desc">Direct alerts when your trainer sends a message</div>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-track"></span>
                    </label>
                </div>

            </div>
        </div>

    </div>
</div>