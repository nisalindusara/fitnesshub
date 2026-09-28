<style>
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
        min-height: 100vh;
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

    /* Register screen (mirrors LoginScreen layout) */
    .register-screen {
        display: flex;
        width: 100%;
        height: 100vh;
        height: 100dvh;
        /* accounts for mobile browser bars */
        overflow: hidden;
        /* page itself never scrolls */
        background: #0A0A0A;
    }

    /* --- Hero Section (Left, fixed) --- */
    .hero-section {
        flex: 1 1 50%;
        height: 100%;
        background:
            linear-gradient(0deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.4) 100%),
            linear-gradient(90deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0) 100%),
            url('/assets/images/landing/login_hero.png') center/cover no-repeat;
        position: relative;
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

    /* --- Form Section (Right, scrollable) --- */
    .form-section {
        flex: 1 1 50%;
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 100%;
        overflow-y: auto;
        /* only this side scrolls */
        padding: 40px 20px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 423.2px;
        margin: auto 0;
        /* centers vertically without clipping the top when content overflows */
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

    .name-row {
        display: flex;
        flex-direction: row;
        gap: 12px;
    }

    .name-row .input-group {
        flex: 1;
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

    .text-input.input-error {
        border-color: #E31837;
    }

    .field-error {
        color: #E31837;
        font-size: 12px;
        font-weight: 500;
        margin-top: 6px;
        min-height: 14px;
    }

    .form-error {
        color: #E31837;
        font-size: 13px;
        font-weight: 500;
        margin-bottom: 12px;
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

    .eye-btn svg {
        pointer-events: none;
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
        margin-top: 8px;
        transition: background 0.2s ease;
    }

    .submit-btn:hover {
        background: #c5142f;
    }

    /* Footer / Login Prompt */
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

    @media (max-width: 900px) {
        .hero-section {
            display: none;
        }

        .form-section {
            flex: 1 1 100%;
        }
    }

    @media (max-width: 576px) {
        .name-row {
            flex-direction: column;
            gap: 20px;
        }
    }
</style>

<div class="main-wrapper reset-all">
    <main class="register-screen reset-all">
        <!-- Left Side: Hero Image (fixed) -->
        <section class="hero-section reset-all">
            <button type="button" class="back-btn btn-reset reset-all" onclick="window.location.href='/onboarding/view-store';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                    <line x1="19" y1="12" x2="5" y2="12" class="reset-all"></line>
                    <polyline points="12 19 5 12 12 5" class="reset-all"></polyline>
                </svg>
                Back
            </button>
        </section>

        <!-- Right Side: Form Content (scrollable) -->
        <section class="form-section reset-all">
            <div class="form-container reset-all">
                <span class="welcome-text reset-all">Get Started</span>
                <h1 class="heading reset-all">Create Account</h1>
                <p class="subtitle reset-all">You're almost there. Create your account to save your preferences, track progress, and book classes.</p>

                <form class="login-form reset-all" action="/register" method="POST" id="registerForm" novalidate>

                    <div class="name-row reset-all">
                        <div class="input-group reset-all">
                            <label for="firstName" class="input-label reset-all">First Name</label>
                            <input type="text" id="firstName" name="first_name" class="text-input input-reset reset-all" placeholder="Kasun" required>
                            <p class="field-error reset-all" id="firstNameError"></p>
                        </div>
                        <div class="input-group reset-all">
                            <label for="lastName" class="input-label reset-all">Last Name</label>
                            <input type="text" id="lastName" name="last_name" class="text-input input-reset reset-all" placeholder="Perera" required>
                            <p class="field-error reset-all" id="lastNameError"></p>
                        </div>
                    </div>

                    <div class="input-group reset-all">
                        <label for="email" class="input-label reset-all">Email Address</label>
                        <input type="email" id="email" name="email" class="text-input input-reset reset-all" placeholder="kasun@example.com" required autocomplete="email" inputmode="email">
                        <p class="field-error reset-all" id="emailError"></p>
                    </div>

                    <div class="input-group reset-all">
                        <label for="phone" class="input-label reset-all">Phone Number</label>
                        <input type="tel" id="phone" name="phone_number" class="text-input input-reset reset-all" placeholder="+94 77 123 4567">
                    </div>

                    <div class="input-group reset-all">
                        <label for="password" class="input-label reset-all">Password</label>
                        <div class="password-wrapper reset-all">
                            <input type="password" id="password" name="password" class="text-input password-input input-reset reset-all" placeholder="Min 8 characters" required minlength="8">
                            <button type="button" class="eye-btn btn-reset reset-all toggle-password" data-target="password" aria-label="Toggle password visibility">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" class="reset-all"></path>
                                    <line x1="1" y1="1" x2="23" y2="23" class="reset-all"></line>
                                </svg>
                            </button>
                        </div>
                        <p class="field-error reset-all" id="passwordError"></p>
                    </div>

                    <div class="input-group reset-all">
                        <label for="confirmPassword" class="input-label reset-all">Confirm Password</label>
                        <div class="password-wrapper reset-all">
                            <input type="password" id="confirmPassword" name="confirmPassword" class="text-input password-input input-reset reset-all" placeholder="Min 8 characters" required minlength="8">
                            <button type="button" class="eye-btn btn-reset reset-all toggle-password" data-target="confirmPassword" aria-label="Toggle password visibility">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                                    <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" class="reset-all"></path>
                                    <line x1="1" y1="1" x2="23" y2="23" class="reset-all"></line>
                                </svg>
                            </button>
                        </div>
                        <p class="field-error reset-all" id="confirmPasswordError"></p>
                    </div>

                    <?php if (isset($_SESSION['error'])): ?>
                        <p class="form-error"><?= htmlspecialchars($_SESSION['error']) ?></p>
                        <?php unset($_SESSION['error']); ?>
                    <?php endif; ?>

                    <button type="submit" class="submit-btn btn-reset reset-all">
                        Create Account
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="reset-all">
                            <line x1="5" y1="12" x2="19" y2="12" class="reset-all"></line>
                            <polyline points="12 5 19 12 12 19" class="reset-all"></polyline>
                        </svg>
                    </button>
                </form>

                <div class="signup-prompt reset-all">
                    <p class="signup-text reset-all">Already have an account? <a href="/login" class="signup-link link-reset reset-all">Sign in</a></p>
                </div>
            </div>
        </section>
    </main>
</div>

<script>
    (function() {
        var EYE_OPEN = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        var EYE_CLOSED = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';

        document.querySelectorAll('.toggle-password').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var targetId = btn.getAttribute('data-target');
                var input = document.getElementById(targetId);
                if (!input) return;

                var isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';

                var svg = btn.querySelector('svg');
                if (svg) {
                    svg.innerHTML = isHidden ? EYE_OPEN : EYE_CLOSED;
                }
            });
        });

        var form = document.getElementById('registerForm');
        var email = document.getElementById('email');
        var emailError = document.getElementById('emailError');
        var password = document.getElementById('password');
        var confirmPassword = document.getElementById('confirmPassword');
        var confirmError = document.getElementById('confirmPasswordError');

        var EMAIL_RE = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

        function validateEmail(showEmpty) {
            var value = email.value.trim();
            if (value === '') {
                emailError.textContent = showEmpty ? 'Email is required.' : '';
                email.classList.toggle('input-error', !!showEmpty);
                return false;
            }
            if (!EMAIL_RE.test(value)) {
                emailError.textContent = 'Please enter a valid email address.';
                email.classList.add('input-error');
                return false;
            }
            emailError.textContent = '';
            email.classList.remove('input-error');
            return true;
        }

        function validateMatch() {
            if (confirmPassword.value.length === 0) {
                confirmError.textContent = '';
                confirmPassword.classList.remove('input-error');
                return true;
            }
            if (password.value !== confirmPassword.value) {
                confirmError.textContent = 'Passwords do not match.';
                confirmPassword.classList.add('input-error');
                return false;
            }
            confirmError.textContent = '';
            confirmPassword.classList.remove('input-error');
            return true;
        }

        var firstName = document.getElementById('firstName');
        var lastName = document.getElementById('lastName');

        function validateRequired(input, label) {
            var err = document.getElementById(input.id + 'Error');
            if (input.value.trim() === '') {
                err.textContent = label + ' is required.';
                input.classList.add('input-error');
                return false;
            }
            err.textContent = '';
            input.classList.remove('input-error');
            return true;
        }

        function validatePassword() {
            var err = document.getElementById('passwordError');
            if (password.value.length < 8) {
                err.textContent = 'Password must be at least 8 characters.';
                password.classList.add('input-error');
                return false;
            }
            err.textContent = '';
            password.classList.remove('input-error');
            return true;
        }

        function validateConfirm() {
            if (confirmPassword.value === '') {
                confirmError.textContent = 'Please confirm your password.';
                confirmPassword.classList.add('input-error');
                return false;
            }
            return validateMatch();
        }

        [firstName, lastName].forEach(function(input) {
            input.addEventListener('input', function() {
                if (input.classList.contains('input-error')) {
                    validateRequired(input, input === firstName ? 'First name' : 'Last name');
                }
            });
        });

        password.addEventListener('input', function() {
            if (password.classList.contains('input-error')) validatePassword();
        });

        email.addEventListener('blur', function() {
            if (email.value.trim() !== '') validateEmail(false);
        });
        email.addEventListener('input', function() {
            if (email.classList.contains('input-error')) validateEmail(false);
        });

        password.addEventListener('input', validateMatch);
        confirmPassword.addEventListener('input', validateMatch);

        form.addEventListener('submit', function(e) {
            // Run every check so all errors show at once, in form order
            var checks = [
                [firstName, validateRequired(firstName, 'First name')],
                [lastName, validateRequired(lastName, 'Last name')],
                [email, validateEmail(true)],
                [password, validatePassword()],
                [confirmPassword, validateConfirm()]
            ];

            var firstInvalid = checks.filter(function(c) {
                return !c[1];
            })[0];
            if (firstInvalid) {
                e.preventDefault();
                firstInvalid[0].focus();
            }
        });
    })();
</script>