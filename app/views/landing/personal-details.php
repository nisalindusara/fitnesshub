<?php $pageStyles = ['landing/landing/_auth-form', 'landing/landing/personal-details']; ?>

<div class="main-wrapper reset-all">
    <main class="register-screen reset-all">
        <!-- Left Side: Hero Image (fixed) -->
        <section class="hero-section reset-all">
            <button type="button" class="back-btn btn-reset reset-all" onclick="window.location.href='/onboarding/store';">
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