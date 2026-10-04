<?php $pageStyles = ['landing/onboarding/membership/want-session']; ?>

<div class="want-session-layout">
    <div class="want-session-left-panel">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership/coach-recommend';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="want-session-right-panel">
        <div class="want-session-content-wrapper">
            <div class="want-session-tag">Personal Training</div>

            <div class="want-session-headline-box">
                <h1 class="want-session-headline">Schedule Your</h1>
                <h1 class="want-session-headline">First PT Session</h1>
            </div>

            <p class="want-session-body-text">
                Would you like to browse Kasun Perera's available time slots and lock in your first personal training session now?
            </p>

            <div class="want-session-coach-container">
                <div class="want-session-coach-card">
                    <div class="want-session-coach-avatar"></div>
                    <div class="want-session-coach-info">
                        <h2 class="want-session-coach-name">Kasun Perera</h2>
                        <h3 class="want-session-coach-title">Head Strength Coach</h3>
                    </div>
                </div>
            </div>

            <div class="want-session-actions-container">
                <div class="want-session-primary-btn-wrapper">
                    <button class="want-session-btn-primary" onclick="window.location.href='/onboarding/membership/select-session';">
                        <span class="want-session-btn-text-primary">Yes, Browse Available Slots</span>
                        <span class="want-session-btn-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="want-session-skip-btn-wrapper">
                    <button class="want-session-btn-skip" onclick="window.location.href='/register';">
                        <span class="want-session-btn-text-skip">Skip For Now</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>