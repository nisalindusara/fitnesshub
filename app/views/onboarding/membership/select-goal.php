<?php $pageStyles = ['landing/onboarding/membership/select-goal']; ?>

<div class="select-goal">
    <div class="image-container">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="right-container">
        <div class="content-container">
            <div class="headline">
                <h1 class="headline-text-1">Let’s start with</h1>
                <h1 class="headline-text-2">Your Fitness Goal.</h1>
            </div>

            <div class="paragraph-text-container">
                <p class="paragraph-text">Tell us what you want to achieve and we'll personalise your journey from day one.</p>
            </div>

            <div class="goals-section">
                <button class="goal-button">
                    <span class="emoji">🔥</span>
                    <span class="goal-text">Lose Weight</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">💪</span>
                    <span class="goal-text">Build Muscle</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🏃</span>
                    <span class="goal-text">Improve Endurance</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🧘</span>
                    <span class="goal-text">Increase Flexibility</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">⚡</span>
                    <span class="goal-text">General Fitness</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🏆</span>
                    <span class="goal-text">Athletic Performance</span>
                </button>
            </div>

            <div class="primary-btn-container">
                <button class="primary-btn" onclick="window.location.href='/onboarding/membership/coach-recommend';">Continue</button>
            </div>
        </div>
    </div>
</div>