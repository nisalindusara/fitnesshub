<?php $pageStyles = ['landing/onboarding/membership/select-session']; ?>

<div class="select-session-layout">
    <div class="select-session-left-panel">
        <button class="back-btn" onclick="window.location.href='/onboarding/membership/want-session';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="select-session-right-panel">
        <div class="select-session-content-wrapper">

            <div class="select-session-inner-container">
                <div class="select-session-coach-card">
                    <div class="select-session-avatar"></div>
                    <div class="select-session-coach-info">
                        <h2 class="select-session-coach-name">Kasun Perera</h2>
                        <h3 class="select-session-coach-title">Head Strength Coach</h3>
                        <p class="select-session-coach-desc">Specialises in strength programming and athletic development.</p>
                    </div>
                </div>

                <div class="select-session-slots-grid">
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">06:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">08:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">10:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">14:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">17:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">19:30</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                </div>
            </div>

            <div class="select-session-actions-container">
                <button class="select-session-confirm-btn" disabled onclick="window.location.href='/register';">
                    <span class="select-session-confirm-text">Confirm PT Session</span>
                </button>
                <button class="select-session-later-btn" onclick="window.location.href='/register';">
                    <span class="select-session-later-text">Do it later</span>
                </button>
            </div>

        </div>
    </div>
</div>
<script>
    // Pick one slot, then "Confirm PT Session" becomes available
    const slotButtons = document.querySelectorAll('.select-session-slot-btn');
    slotButtons.forEach(btn => btn.addEventListener('click', () => {
        slotButtons.forEach(b => b.setAttribute('aria-pressed', b === btn ? 'true' : 'false'));
        document.querySelector('.select-session-confirm-btn').disabled = false;
    }));
</script>
