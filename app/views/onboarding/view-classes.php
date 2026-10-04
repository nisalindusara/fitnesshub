<?php $pageStyles = ['landing/onboarding/_onboarding', 'landing/onboarding/view-classes']; ?>
<div class="onboarding-container">
    <div class="hero-section-step2">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership';">
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
                    <span class="step-text">Step 2 of 4</span>
                    <span class="percentage-text">50%</span>
                </div>
                <div class="progress-bars">
                    <div class="progress-bar bar-half-active"></div>
                    <div class="progress-bar bar-active"></div>
                    <div class="progress-bar bar-inactive"></div>
                    <div class="progress-bar bar-inactive"></div>
                </div>
            </div>

            <div class="main-content-area">
                <h1 class="heading-step2">Want to Join<br>a Class?</h1>
                <p class="description">We run 30+ classes every week — HIIT, yoga, strength circuits, and more. Every session is led by a certified coach and open to all fitness levels.</p>

                <div class="buttons-container-step2">
                    <button class="btn btn-primary-step2" onclick="window.location.href='/classes';">
                        BROWSE CLASSES
                        <svg class="icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn btn-skip" onclick="window.location.href='/onboarding/store';">SKIP FOR NOW</button>
                </div>
            </div>

        </div>
    </div>
</div>

