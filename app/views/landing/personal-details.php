<div class="onboarding-container-full">
    <div class="inner-wrapper">

        <div class="back-btn-container">
            <button type="button" class="back-btn" onclick="window.location.href='/onboarding/view-store';">
                <svg class="icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                BACK
            </button>
        </div>

        <div class="progress-section">
            <div class="progress-header">
                <span class="step-text">Step 4 of 4</span>
                <span class="percentage-text">100%</span>
            </div>
            <div class="progress-bars">
                <div class="progress-bar bar-active"></div>
                <div class="progress-bar bar-active"></div>
                <div class="progress-bar bar-active"></div>
                <div class="progress-bar bar-active"></div>
            </div>
        </div>

        <div class="form-section">
            <div class="form-wrapper">

                <h1 class="heading-step4">Enter Your<br>Details</h1>
                <p class="description">You're almost there. Create your account to save your preferences, track progress, and book classes.</p>

                <form action="/register-submit" method="POST" class="account-form">
                    <div class="form-fields">

                        <div class="form-row split-row">
                            <div class="input-group">
                                <label class="input-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" name="first_name" class="input-field" placeholder="Kasun" required>
                            </div>
                            <div class="input-group">
                                <label class="input-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="last_name" class="input-field" placeholder="Perera" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label class="input-label" for="email">Email Address</label>
                                <input type="email" id="email" name="email" class="input-field" placeholder="kasun@example.com" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label class="input-label" for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone_number" class="input-field" placeholder="+94 77 123 4567">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label class="input-label" for="password">Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="password" name="password" class="input-field" placeholder="Min 8 characters" required>
                                    <button type="button" class="icon-btn" aria-label="Toggle password visibility">
                                        <svg class="icon-svg-dim" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24M1 1l22 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label class="input-label" for="confirmPassword">Confirm Password</label>
                                <div class="input-with-icon">
                                    <input type="password" id="confirmPassword" name="confirmPassword" class="input-field" placeholder="Min 8 characters" required>
                                    <button type="button" class="icon-btn" aria-label="Toggle password visibility">
                                        <svg class="icon-svg-dim" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24M1 1l22 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="submit-btn-container">
                        <button type="submit" class="btn-primary-submit">CREATE ACCOUNT</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<style>
    /* Main Layout Container */
    .onboarding-container-full {
        box-sizing: border-box;
        width: 100%;
        margin: 0 auto;
        background-color: #0A0A0A;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        min-height: 100vh;
    }

    .inner-wrapper {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        padding: 48px 80px;
        width: 100%;
    }

    /* Back Button */
    .back-btn-container {
        box-sizing: border-box;
        width: 100%;
        margin-bottom: 40px;
    }

    .back-btn {
        box-sizing: border-box;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        color: rgba(255, 255, 255, 0.6);
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .back-btn:hover {
        color: #FFFFFF;
    }

    .icon-svg {
        display: block;
    }

    /* Progress Indicator */
    .progress-section {
        box-sizing: border-box;
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-bottom: 40px;
    }

    .progress-header {
        box-sizing: border-box;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin: 0 0 12px 0;
    }

    .step-text {
        box-sizing: border-box;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.3);
    }

    .percentage-text {
        box-sizing: border-box;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 14px;
        line-height: 20px;
        color: #E31837;
    }

    .progress-bars {
        box-sizing: border-box;
        display: flex;
        gap: 8px;
        width: 100%;
    }

    .progress-bar {
        box-sizing: border-box;
        flex: 1;
        height: 4px;
        border-radius: 20px;
    }

    .bar-active {
        background: #E31837;
    }

    /* Content Section */
    .form-section {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .form-wrapper {
        box-sizing: border-box;
        width: 100%;
        max-width: 384px;
        display: flex;
        flex-direction: column;
    }

    /* Typography */
    .heading-step4 {
        box-sizing: border-box;
        margin: 0 0 20px 0;
        padding: 0;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: clamp(40px, 5vw, 58.32px);
        line-height: 0.88;
        letter-spacing: -1.458px;
        text-transform: uppercase;
    }

    .description {
        box-sizing: border-box;
        margin: 0 0 40px 0;
        padding: 0;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.62;
        color: rgba(255, 255, 255, 0.5);
    }

    /* Form Styles */
    .account-form {
        box-sizing: border-box;
        width: 100%;
        display: flex;
        flex-direction: column;
        margin: 0;
        padding: 0;
    }

    .form-fields {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 16px;
    }

    .form-row {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        width: 100%;
    }

    .split-row {
        flex-direction: row;
        gap: 12px;
    }

    .input-group {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        width: 100%;
        flex: 1;
    }

    .input-label {
        box-sizing: border-box;
        margin-bottom: 8px;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.4);
    }

    .input-field {
        box-sizing: border-box;
        width: 100%;
        height: 46px;
        padding: 12px 16px;
        background: rgba(255, 255, 255, 0.05);
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 17px;
        outline: none;
        transition: border-color 0.2s ease;
    }

    .input-field:focus {
        border-color: #E31837;
    }

    .input-field::placeholder {
        color: rgba(255, 255, 255, 0.2);
    }

    .input-with-icon {
        box-sizing: border-box;
        position: relative;
        width: 100%;
    }

    .input-with-icon .input-field {
        padding-right: 48px;
    }

    .icon-btn {
        box-sizing: border-box;
        position: absolute;
        right: 16px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        padding: 0;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .icon-svg-dim {
        color: rgba(255, 255, 255, 0.3);
        transition: color 0.2s ease;
    }

    .icon-btn:hover .icon-svg-dim {
        color: rgba(255, 255, 255, 0.6);
    }

    /* Submit Button */
    .submit-btn-container {
        box-sizing: border-box;
        margin-top: 32px;
        width: 100%;
    }

    .btn-primary-submit {
        box-sizing: border-box;
        width: 100%;
        padding: 16px 0;
        margin: 0;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #E31837;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        transition: background 0.2s ease;
    }

    .btn-primary-submit:hover {
        background: #c2122d;
    }

    /* Responsive Design */
    @media (max-width: 576px) {
        .inner-wrapper {
            padding: 48px 24px;
        }

        .split-row {
            flex-direction: column;
            gap: 16px;
        }
    }
</style>