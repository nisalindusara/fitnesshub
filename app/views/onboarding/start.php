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
                <a href="/onboarding/browse-plans">
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
                By continuing you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
            </p>
        </div>
    </div>
</div>

<style>
    /* Main Layout Container */
    .onboarding-container {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        width: 100%;
        margin: 0 auto;
        background-color: #0A0A0A;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        height: 100vh;
        overflow: hidden;
    }

    /* Left Hero Section */
    .hero-section {
        box-sizing: border-box;
        flex: 1;
        height: 100%;
        position: relative;
        background:
            linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0) 100%),
            linear-gradient(90deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%),
            url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop') center/cover no-repeat;
    }

    .back-btn {
        box-sizing: border-box;
        position: absolute;
        top: 32px;
        left: 32px;
        background: none;
        border: none;
        padding: 0;
        margin: 0;
        color: rgba(255, 255, 255, 0.6);
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
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

    .back-icon {
        display: block;
    }

    /* Right Content Section */
    .content-section {
        box-sizing: border-box;
        flex: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 64px 80px;

        /* Allow internal scrolling if screen height is unusually short on desktop */
        overflow-y: auto;
    }

    .content-wrapper {
        box-sizing: border-box;
        max-width: 448px;
        width: 100%;
        margin: 0 auto;
    }

    /* Typography & Content */
    .heading {
        box-sizing: border-box;
        margin: 0 0 24px 0;
        padding: 0;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: clamp(48px, 5vw, 70px);
        line-height: 0.88;
        letter-spacing: -1.75px;
        text-transform: uppercase;
    }

    .description {
        box-sizing: border-box;
        margin: 0 0 48px 0;
        padding: 0;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.62;
        color: rgba(255, 255, 255, 0.5);
    }

    /* Tags */
    .tags-container {
        box-sizing: border-box;
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin: 0 0 48px 0;
        padding: 0;
    }

    .tag {
        box-sizing: border-box;
        border: 1px solid rgba(255, 255, 255, 0.1);
        padding: 6px 12px;
        font-weight: 600;
        font-size: 12px;
        line-height: 1.33;
        letter-spacing: 0.3px;
        color: rgba(255, 255, 255, 0.4);
    }

    /* Buttons */
    .buttons-container {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        gap: 16px;
        margin: 0 0 32px 0;
        padding: 0;
    }

    .btn {
        box-sizing: border-box;
        width: 100%;
        padding: 20px;
        margin: 0;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        transition: all 0.2s ease;
    }

    .btn-icon {
        display: block;
    }

    .btn-primary {
        background: #E31837;
        color: #FFFFFF;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 18px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .btn-primary:hover {
        background: #c2122d;
    }

    .btn-secondary {
        background: transparent;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    /* Footer Links */
    .footer-text {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-size: 12px;
        line-height: 1.62;
        text-align: center;
        color: rgba(255, 255, 255, 0.2);
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.4);
        text-decoration: underline;
        transition: color 0.2s ease;
    }

    .footer-link:hover {
        color: #FFFFFF;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .onboarding-container {
            flex-direction: column;
            /* Restore normal document flow so mobile can scroll */
            height: auto;
            min-height: 100vh;
            overflow: visible;
        }

        .hero-section {
            min-height: 400px;
        }

        .content-section {
            padding: 64px 40px;
            overflow-y: visible;
        }
    }

    @media (max-width: 576px) {
        .content-section {
            padding: 48px 24px;
        }

        .heading {
            font-size: 40px;
        }
    }
</style>