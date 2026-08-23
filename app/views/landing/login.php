<style>
    /* globals & resets via classes */
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@500;600;700&display=swap');

    .reset-all,
    .reset-all::before,
    .reset-all::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .main-wrapper {
        font-family: 'Barlow', sans-serif;
        background-color: #0A0A0A;
        color: #FFFFFF;
        height: 100vh;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .btn-reset {
        cursor: pointer;
        border: none;
        background: none;
        font-family: inherit;
    }

    .link-reset {
        text-decoration: none;
        color: inherit;
    }

    .input-reset {
        font-family: inherit;
    }

    /* LoginScreen specific styles */
    .login-screen {
        display: flex;
        width: 100%;
        height: 100%;
        background: #0A0A0A;
    }

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

    .back-btn {
        display: flex;
        align-items: center;
        gap: 8px;
        position: absolute;
        top: 32px;
        left: 32px;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.6);
        transition: color 0.2s ease;
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
    .welcome-text {
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        color: #E31837;
    }

    .heading {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 48px;
        line-height: 43px;
        letter-spacing: -1.2px;
        text-transform: uppercase;
        margin-top: 12px;
    }

    .subtitle {
        font-weight: 500;
        font-size: 14px;
        line-height: 20px;
        color: rgba(255, 255, 255, 0.4);
        margin-top: 8px;
    }

    /* Form Elements */
    .login-form {
        display: flex;
        flex-direction: column;
        margin-top: 40px;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .input-label {
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.5);
        margin-bottom: 8px;
    }

    .text-input {
        width: 100%;
        height: 49.6px;
        background: rgba(255, 255, 255, 0.05);
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        padding: 14px 16px;
        font-size: 14px;
        color: #FFFFFF;
        outline: none;
        transition: border-color 0.2s ease;
    }

    .text-input::placeholder {
        color: rgba(255, 255, 255, 0.2);
    }

    .text-input:focus {
        border-color: rgba(255, 255, 255, 0.3);
    }

    .password-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .password-input {
        padding-right: 48px;
    }

    .eye-btn {
        position: absolute;
        right: 16px;
        width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .forgot-password {
        display: flex;
        justify-content: flex-end;
        margin-top: -8px;
    }

    .forgot-password-link {
        font-weight: 600;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 0.3px;
        color: #E31837;
    }

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

    .submit-btn:hover {
        background: #c5142f;
    }

    /* Footer / Signup Prompt */
    .signup-prompt {
        margin-top: 32px;
        text-align: center;
        font-weight: 500;
        font-size: 14px;
        color: rgba(255, 255, 255, 0.3);
    }

    .signup-text {
        margin: 0;
    }

    .signup-link {
        font-weight: 700;
        color: #E31837;
        letter-spacing: 0.35px;
        margin-left: 4px;
    }
</style>

<div class="main-wrapper reset-all">
    <main class="login-screen reset-all">
        <!-- Left Side: Hero Image -->
        <section class="hero-section reset-all">
            <button class="back-btn btn-reset reset-all">
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
                <span class="welcome-text reset-all">Welcome Back</span>
                <h1 class="heading reset-all">Sign In</h1>
                <p class="subtitle reset-all">Access your training dashboard, classes, and progress.</p>

                <form class="login-form reset-all" action="" method="POST">
                    <div class="input-group reset-all">
                        <label for="email" class="input-label reset-all">Email Address</label>
                        <input type="email" name="email" id="email" class="text-input input-reset reset-all" placeholder="you@example.com" required>
                    </div>

                    <div class="input-group reset-all">
                        <label for="password" class="input-label reset-all">Password</label>
                        <div class="password-wrapper reset-all">
                            <input type="password" name="password" id="password" class="text-input password-input input-reset reset-all" placeholder="••••••••" required>
                            <button type="button" class="eye-btn btn-reset reset-all" aria-label="Toggle password visibility">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" class="reset-all"></path>
                                    <line x1="1" y1="1" x2="23" y2="23" class="reset-all"></line>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="forgot-password reset-all">
                        <a href="#" class="forgot-password-link link-reset reset-all">Forgot password?</a>
                    </div>

                    <p><? if (isset($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        } ?></p>
                    <button type="submit" class="submit-btn btn-reset reset-all">
                        Sign In
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                            <line x1="5" y1="12" x2="19" y2="12" class="reset-all"></line>
                            <polyline points="12 5 19 12 12 19" class="reset-all"></polyline>
                        </svg>
                    </button>
                </form>

                <div class="signup-prompt reset-all">
                    <p class="signup-text reset-all">Don't have an account? <a href="#" class="signup-link link-reset reset-all">Create one</a></p>
                </div>
            </div>
        </section>
    </main>
</div>