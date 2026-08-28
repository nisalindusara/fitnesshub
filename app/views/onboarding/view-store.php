<div class="onboarding-container">
    <div class="hero-section-step3">
        <button class="back-btn" onclick="window.location.href='/onboarding/view-classes';">
            <svg class="icon-svg" width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>

    <div class="content-section">
        <div class="content-wrapper">

            <div class="progress-container">
                <div class="progress-header">
                    <span class="step-text">Step 3 of 4</span>
                    <span class="percentage-text">75%</span>
                </div>
                <div class="progress-bars">
                    <div class="progress-bar bar-half-active"></div>
                    <div class="progress-bar bar-half-active"></div>
                    <div class="progress-bar bar-active"></div>
                    <div class="progress-bar bar-inactive"></div>
                </div>
            </div>

            <div class="main-content-area">
                <h1 class="heading-step3">Check Out<br>The Store</h1>
                <p class="description">Supplements, performance apparel, and gym accessories — all trainer-approved and stocked in our in-house store, available with no membership required.</p>

                <div class="buttons-container-step3">
                    <button class="btn btn-primary-step3" onclick="window.location.href='/store';">
                        BROWSE ITEMS
                        <svg class="icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <button class="btn btn-skip" onclick="window.location.href='/personal-details';">SKIP FOR NOW</button>
                </div>
            </div>

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

        /* Lock to exactly 100vh on desktop */
        height: 100vh;
        overflow: hidden;
    }

    /* Left Hero Section */
    .hero-section-step3 {
        box-sizing: border-box;
        flex: 1;
        height: 100%;
        position: relative;
        background:
            linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.2) 100%),
            linear-gradient(90deg, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.65) 100%),
            url('https://images.unsplash.com/photo-1593095948071-474c5cc2989d?q=80&w=1470&auto=format&fit=crop') center/cover no-repeat;
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

    /* Right Content Section */
    .content-section {
        box-sizing: border-box;
        flex: 1;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 48px 80px;
        overflow-y: auto;
    }

    .content-wrapper {
        box-sizing: border-box;
        max-width: 423px;
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
    }

    /* Progress Indicator */
    .progress-container {
        box-sizing: border-box;
        width: 100%;
        display: flex;
        flex-direction: column;
        margin: 0 0 48px 0;
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

    .bar-half-active {
        background: rgba(227, 24, 55, 0.5);
    }

    .bar-active {
        background: #E31837;
    }

    .bar-inactive {
        background: rgba(255, 255, 255, 0.08);
    }

    /* Typography & Content */
    .main-content-area {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        max-width: 384px;
    }

    .heading-step3 {
        box-sizing: border-box;
        margin: 16px 0 0 0;
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
        margin: 20px 0 0 0;
        padding: 0;
        font-weight: 400;
        font-size: 16px;
        line-height: 1.62;
        color: rgba(255, 255, 255, 0.5);
    }

    /* Buttons */
    .buttons-container-step3 {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 40px 0 0 0;
        padding: 0;
        width: 100%;
    }

    .btn {
        box-sizing: border-box;
        width: 100%;
        padding: 16px 0;
        margin: 0;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        transition: all 0.2s ease;
        background: transparent;
    }

    .btn-primary-step3 {
        background: #E31837;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .btn-primary-step3:hover {
        background: #c2122d;
    }

    .btn-skip {
        margin-top: 12px;
        color: rgba(255, 255, 255, 0.25);
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
    }

    .btn-skip:hover {
        color: rgba(255, 255, 255, 0.6);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .onboarding-container {
            flex-direction: column;
            height: auto;
            min-height: 100vh;
            overflow: visible;
        }

        .hero-section-step3 {
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
    }
</style>