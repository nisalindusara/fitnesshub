<?php $pageStyles = ['landing/landing/_auth-form']; ?>
<style>
    /* globals & resets via classes */
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@500;600;700&display=swap');

    .main-wrapper {
        font-family: 'Barlow', sans-serif;
        background-color: #0A0A0A;
        color: #FFFFFF;
        height: 100vh;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    /* LoginScreen specific styles */

    /* --- Hero Section (Left) --- */
    .hero-section {
        flex: 1 1 50%;
        /* Grow, shrink, and start at 50% width */
        height: 100%;
        background:
            linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.4) 100%),
            linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%),
            url('/assets/images/landing/login_hero.png') center/cover no-repeat;
        position: relative;
        /* Added back so the absolute back button stays inside the image */
    }

    .back-btn:hover {
        color: #FFFFFF;
    }

    /* --- Form Section (Right) --- */
    .form-section {
        flex: 1 1 50%;
        /* Grow, shrink, and start at 50% width */
        /* Removed width: 100%; */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 40px 20px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 423.2px;
    }

    /* Typography */

    /* Form Elements */

    .submit-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 12px;
        width: 100%;
        height: 52px;
        background: #E31837;
        color: #FFFFFF;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        margin-top: 20px;
        transition: background 0.2s ease;
    }

    /* Footer / Signup Prompt */
</style>

<div class="main-wrapper reset-all">
    <main class="login-screen reset-all">
        <!-- Left Side: Hero Image -->
        <section class="hero-section reset-all">
            <button type="button" class="back-btn btn-reset reset-all" onclick="if (history.length > 1) { history.back(); } else { window.location.href = '/login'; }">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                    <line x1="19" y1="12" x2="5" y2="12" class="reset-all"></line>
                    <polyline points="12 19 5 12 12 5" class="reset-all"></polyline>
                </svg>
                Back
            </button>
        </section>

        <!-- Right Side: Form Content -->
        <section class="form-section reset-all">
            <div class="form-container reset-all">
                <span class="welcome-text reset-all">Account Security</span>
                <h1 class="heading reset-all">Reset Password</h1>
                <p class="subtitle reset-all">Enter the email you use to sign in and we'll send you a link to set a new password.</p>

                <!-- Emails aren't sent yet, so the button does nothing; this is the end of the flow for now -->
                <form class="login-form reset-all" onsubmit="return false;">
                    <div class="input-group reset-all">
                        <label for="email" class="input-label reset-all">Email Address</label>
                        <input type="email" name="email" id="email" class="text-input input-reset reset-all" placeholder="you@example.com" autocomplete="email">
                    </div>

                    <button type="button" class="submit-btn btn-reset reset-all">
                        Send Reset Link
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                            <line x1="5" y1="12" x2="19" y2="12" class="reset-all"></line>
                            <polyline points="12 5 19 12 12 19" class="reset-all"></polyline>
                        </svg>
                    </button>
                </form>

                <div class="signup-prompt reset-all">
                    <p class="signup-text reset-all">Remembered it? <a href="/login" class="signup-link link-reset reset-all">Sign in</a></p>
                </div>
            </div>
        </section>
    </main>
</div>
