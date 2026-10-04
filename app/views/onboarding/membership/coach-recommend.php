<?php $pageStyles = ['landing/onboarding/membership/coach-recommend']; ?>

<div class="coach-recommend">
    <div class="left-panel">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership/select-goal';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="right-panel">
        <div class="onboarding-content">
            <div class="tag-text">Your Matched Instructor</div>

            <div class="headline-container">
                <h1 class="headline-text">We Found Your</h1>
                <h1 class="headline-text">Perfect Coach</h1>
            </div>

            <p class="paragraph-text">
                Based on your goal <span class="highlight-text">General Fitness</span> we recommend:
            </p>

            <div class="instructor-card">
                <div class="instructor-avatar"></div>
                <div class="instructor-info">
                    <h2 class="instructor-name">Kasun Perera</h2>
                    <h3 class="instructor-title">Head Strength Coach</h3>
                    <p class="instructor-desc">Specialises in strength programming and athletic development.</p>
                </div>
            </div>

            <p class="disclaimer-text">
                This instructor's expertise aligns with your goal. You can change this at any time from your dashboard.
            </p>

            <div class="actions-container">
                <button class="primary-button" onclick="window.location.href='/onboarding/membership/want-session';">
                    <span class="primary-button-text">Yes, This Works For Me</span>
                    <span class="primary-button-icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
                <button class="outline-button" onclick="window.location.href='/onboarding/membership/select-coach';">
                    <span class="outline-button-text">Select Another Coach</span>
                </button>
                <button class="skip-button" onclick="window.location.href='/register';">
                    <span class="skip-button-text">I don't need a coach at the moment</span>
                </button>
            </div>
        </div>
    </div>
</div>