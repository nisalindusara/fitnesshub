<?php $pageStyles = ['member/member/_toggle-switch', 'member/member/notification-settings']; ?>

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