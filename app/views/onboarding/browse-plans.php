<?php $pageStyles = ['landing/onboarding/_onboarding', 'landing/onboarding/browse-plans']; ?>
<div class="onboarding-container">
    <div class="hero-section-step1">
        <button class="back-btn" onclick="window.location.href='/onboarding';">
            <svg class="icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>

    <div class="content-section">
        <div class="content-wrapper">

            <div class="progress-container">
                <div class="progress-header">
                    <span class="step-text">Step 1 of 4</span>
                    <span class="percentage-text">25%</span>
                </div>
                <div class="progress-bars">
                    <div class="progress-bar bar-active"></div>
                    <div class="progress-bar bar-inactive"></div>
                    <div class="progress-bar bar-inactive"></div>
                    <div class="progress-bar bar-inactive"></div>
                </div>
            </div>

            <div class="main-content-area">
                <h1 class="heading-step1">Unlock Your<br>Full Potential</h1>
                <p class="description">A membership gives you unlimited access to the gym floor, all group classes, and personal coaching - everything you need to reach your goals faster.</p>

                <div class="buttons-container-step1">
                    <button class="btn btn-primary-step1" onclick="window.location.href='/onboarding/membership/select-goal';">
                        BROWSE PLANS
                        <svg class="icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>

                    <button class="btn btn-skip" onclick="window.location.href='/onboarding/class';">SKIP FOR NOW</button>
                </div>
            </div>

        </div>
    </div>
</div>

