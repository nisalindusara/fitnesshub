<?php $pageStyles = ['landing/onboarding/membership/select-coach']; ?>

<div class="select-coach-layout">
    <div class="select-coach-left-panel">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership/coach-recommend';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="select-coach-right-panel">
        <div class="select-coach-content-wrapper">

            <div class="select-coach-tag">Browse Instructors</div>

            <div class="select-coach-headline-box">
                <h1 class="select-coach-headline">The Right Coach</h1>
                <h1 class="select-coach-headline">Will Get You There</h1>
            </div>

            <p class="select-coach-body-text">
                The right instructor will help you figure out <span class="select-coach-highlight">general fitness</span>. Browse our coaches and pick the one you feel best about.
            </p>

            <div class="select-coach-list">

                <!-- Coach 1 (Recommended) -->
                <div class="select-coach-card recommended">
                    <div class="select-coach-avatar"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Kasun Perera</h2>
                            <div class="select-coach-badge">Recommended</div>
                        </div>
                        <h3 class="select-coach-title">Head Strength Coach</h3>
                        <p class="select-coach-desc">Specialises in strength programming and athletic development.</p>
                    </div>
                </div>

                <!-- Coach 2 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-2"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Nimali Fernando</h2>
                        </div>
                        <h3 class="select-coach-title">Yoga & Wellness Coach</h3>
                        <p class="select-coach-desc">Expert in flexibility, mobility, and mind-body wellness.</p>
                    </div>
                </div>

                <!-- Coach 3 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-3"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Dinesh Silva</h2>
                        </div>
                        <h3 class="select-coach-title">Conditioning Coach</h3>
                        <p class="select-coach-desc">Former national athlete focused on functional strength.</p>
                    </div>
                </div>

                <!-- Coach 4 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-4"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Tharaka Jayasinghe</h2>
                        </div>
                        <h3 class="select-coach-title">Cardio & HIIT Coach</h3>
                        <p class="select-coach-desc">High-energy coach for fat loss, cardio, and HIIT circuits.</p>
                    </div>
                </div>

            </div>

            <div class="select-coach-actions">
                <button class="select-coach-btn-primary" onclick="window.location.href='/onboarding/membership/want-session';">
                    <span class="select-coach-btn-text-primary">Yes, I'll Take a Coach</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="select-coach-btn-skip" onclick="window.location.href='/register';">
                    <span class="select-coach-btn-text-skip">I'll decide later</span>
                </button>
            </div>

        </div>
    </div>
</div>