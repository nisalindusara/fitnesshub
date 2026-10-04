<?php $pageStyles = ['landing/onboarding/_onboarding', 'landing/onboarding/start']; ?>
<div class="onboarding-container">
    <div class="hero-section">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>

    <div class="content-section">
        <div class="content-wrapper">
            <h1 class="heading">Ready to Start<br>Your Journey?</h1>
            <p class="description">Join The Fitness Hub and train with certified coaches, book classes, and track your progress — all in one place.</p>

            <div class="tags-container">
                <span class="tag">Personalized Coaching</span>
                <span class="tag">Class Booking</span>
                <span class="tag">Progress Tracking</span>
                <span class="tag">Wellness Plans</span>
            </div>

            <div class="buttons-container">
                <a href="/onboarding/membership">
                    <button class="btn btn-primary">
                        GET STARTED
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </a>
                <a href="/login"><button class="btn btn-secondary">I ALREADY HAVE AN ACCOUNT</button></a>
            </div>

            <p class="footer-text">
                By continuing you agree to our <a href="/terms-and-conditions">Terms of Use</a> and <a href="/privacy-policy">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>

