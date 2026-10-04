<?php $pageStyles = ['landing/onboarding/_onboarding', 'landing/onboarding/view-store']; ?>
<div class="onboarding-container">
    <div class="hero-section-step3">
        <button class="back-btn" onclick="window.location.href='/onboarding/class';">
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
                    <span class="step-text">Step 3 of 4</span>
                    <span class="percentage-text">75%</span>
                </div>
                <div class="progress-bars">
                    <div class="progress-bar bar-half-active"></div>
                    <div class="progress-bar bar-half-active"></div>
                    <div class="progress-bar bar-active"></div>
                    <div class="progress-bar bar-inactive"></div>
                </div>
            </div>

            <div class="main-content-area">
                <h1 class="heading-step3">Check Out<br>The Store</h1>
                <p class="description">Supplements, performance apparel, and gym accessories — all trainer-approved and stocked in our in-house store, available with no membership required.</p>

                <div class="buttons-container-step3">
                    <button class="btn btn-primary-step3" onclick="window.location.href='/store';">
                        BROWSE ITEMS
                        <svg class="icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn btn-skip" onclick="window.location.href='/register';">SKIP FOR NOW</button>
                </div>
            </div>

        </div>
    </div>
</div>

