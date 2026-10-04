<?php $pageStyles = ['landing/onboarding/membership/pick-date']; ?>

<div class="pick-date-layout">
    <div class="pick-date-left-panel">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="pick-date-right-panel">
        <div class="pick-date-content-wrapper">
            <div class="pick-date-headline-container">
                <h1 class="pick-date-headline-text">Pick Your</h1>
                <h1 class="pick-date-headline-text">Visit Date</h1>
            </div>

            <p class="pick-date-body-text">
                Choose the day you plan to visit. We'll show you which trainers are available and when.
            </p>

            <div class="pick-date-form-container">
                <label class="pick-date-label">Select Date</label>
                <input type="date" class="pick-date-input" aria-label="Select Date" />
            </div>

            <div class="pick-date-btn-container">
                <button class="pick-date-btn" disabled onclick="window.location.href='/onboarding/membership/select-coach';">
                    <span class="pick-date-btn-text">See Available Trainers</span>
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    // Enable "See Available Trainers" once a date is picked
    document.querySelector('.pick-date-input').addEventListener('input', (e) => {
        document.querySelector('.pick-date-btn').disabled = !e.target.value;
    });
</script>
