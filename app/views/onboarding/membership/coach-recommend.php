<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700&display=swap');

    .coach-recommend {
        display: flex;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Barlow', sans-serif;
    }

    .left-panel {
        flex: 2;
        min-width: 300px;
        height: 100%;
        /* Using the exact image reference requested, with a fallback color/gradient */
        background: url('image_edc88b.png') center/cover no-repeat,
            linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0.2) 100%);
        background-size: cover;
        background-position: center;
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

    .right-panel {
        flex: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 0 8vw;
        box-sizing: border-box;
        height: 100%;
    }

    .onboarding-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        max-width: 448px;
    }

    .tag-text {
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        color: #E31837;
        margin-bottom: 12px;
    }

    .headline-container {
        display: flex;
        flex-direction: column;
        margin-bottom: 16px;
    }

    .headline-text {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 52.488px;
        line-height: 46px;
        letter-spacing: -1.3122px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .paragraph-text {
        font-weight: 400;
        font-size: 14px;
        line-height: 23px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0 0 24px 0;
    }

    .highlight-text {
        font-weight: 700;
        color: #FFFFFF;
    }

    .instructor-card {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        padding: 20px;
        gap: 20px;
        width: 100%;
        box-sizing: border-box;
        background: rgba(227, 24, 55, 0.05);
        border: 0.8px solid rgba(227, 24, 55, 0.4);
        margin-bottom: 16px;
    }

    .instructor-avatar {
        width: 64px;
        height: 64px;
        /* Adding a placeholder image to match the avatar aesthetic */
        background: #1E2939 url('https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=200&auto=format&fit=crop') center/cover no-repeat;
        flex-shrink: 0;
    }

    .instructor-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .instructor-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 20px;
        line-height: 28px;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .instructor-title {
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #E31837;
        margin: 0 0 8px 0;
    }

    .instructor-desc {
        font-weight: 400;
        font-size: 14px;
        line-height: 19px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }

    .disclaimer-text {
        font-weight: 400;
        font-size: 12px;
        line-height: 20px;
        color: rgba(255, 255, 255, 0.3);
        margin: 0 0 24px 0;
    }

    .actions-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 12px;
    }

    .primary-button {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 16px 0px;
        gap: 12px;
        width: 100%;
        height: 52px;
        background: #E31837;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .primary-button:hover {
        background: #C41530;
    }

    .primary-button-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .primary-button-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .outline-button {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 16px 0px;
        width: 100%;
        height: 54px;
        background: transparent;
        border: 0.8px solid rgba(255, 255, 255, 0.2);
        cursor: pointer;
        transition: border-color 0.2s ease, background-color 0.2s ease;
    }

    .outline-button:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .outline-button-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .skip-button {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 44px;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .skip-button-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.25);
        transition: color 0.2s ease;
    }

    .skip-button:hover .skip-button-text {
        color: rgba(255, 255, 255, 0.5);
    }
</style>

<div class="coach-recommend">
    <div class="left-panel">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="right-panel">
        <div class="onboarding-content">
            <div class="tag-text">Your Matched Instructor</div>

            <div class="headline-container">
                <h1 class="headline-text">We Found Your</h1>
                <h1 class="headline-text">Perfect Coach</h1>
            </div>

            <p class="paragraph-text">
                Based on your goal <span class="highlight-text">General Fitness</span> we recommend:
            </p>

            <div class="instructor-card">
                <div class="instructor-avatar"></div>
                <div class="instructor-info">
                    <h2 class="instructor-name">Kasun Perera</h2>
                    <h3 class="instructor-title">Head Strength Coach</h3>
                    <p class="instructor-desc">Specialises in strength programming and athletic development.</p>
                </div>
            </div>

            <p class="disclaimer-text">
                This instructor's expertise aligns with your goal. You can change this at any time from your dashboard.
            </p>

            <div class="actions-container">
                <button class="primary-button">
                    <span class="primary-button-text">Yes, This Works For Me</span>
                    <span class="primary-button-icon">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
                <button class="outline-button">
                    <span class="outline-button-text">Select Another Coach</span>
                </button>
                <button class="skip-button">
                    <span class="skip-button-text">I don't need a coach at the moment</span>
                </button>
            </div>
        </div>
    </div>
</div>