<?php $pageStyles = ['landing/landing/_auth-form', 'landing/landing/reset-password']; ?>

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
