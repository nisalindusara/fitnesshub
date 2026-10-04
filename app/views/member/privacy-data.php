<?php $pageStyles = ['member/member/_toggle-switch', 'member/member/privacy-data']; ?>

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