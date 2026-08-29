<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700&display=swap');

    .want-session-layout {
        display: flex;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .want-session-left-panel {
        flex: 2;
        min-width: 300px;
        height: 100%;
        background: url('image_edd442.png') center/cover no-repeat;
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

    .want-session-right-panel {
        flex: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 8vw;
        box-sizing: border-box;
        height: 100%;
    }

    .want-session-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        max-width: 448px;
    }

    .want-session-tag {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        color: #E31837;
        margin-bottom: 12px;
    }

    .want-session-headline-box {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .want-session-headline {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 52.488px;
        line-height: 46px;
        letter-spacing: -1.3122px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .want-session-body-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        color: rgba(255, 255, 255, 0.5);
        margin: 16px 0 0 0;
        max-width: 384px;
    }

    .want-session-coach-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        margin-top: 32px;
    }

    .want-session-coach-card {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 16px;
        gap: 16px;
        width: 100%;
        height: 81.6px;
        border: 0.8px solid rgba(255, 255, 255, 0.1);
    }

    .want-session-coach-avatar {
        width: 48px;
        height: 48px;
        /* Adding a placeholder image to match the avatar aesthetic */
        background: #1E2939 url('https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=200&auto=format&fit=crop') center/cover no-repeat;
        flex-shrink: 0;
    }

    .want-session-coach-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .want-session-coach-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: -0.4px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .want-session-coach-title {
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
        color: rgba(255, 255, 255, 0.4);
        margin: 0;
    }

    .want-session-actions-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        margin-top: 32px;
    }

    .want-session-primary-btn-wrapper {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-bottom: 12px;
    }

    .want-session-btn-primary {
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

    .want-session-btn-primary:hover {
        background: #C41530;
    }

    .want-session-btn-text-primary {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .want-session-btn-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .want-session-skip-btn-wrapper {
        width: 100%;
        height: 56px;
        display: flex;
        align-items: flex-start;
    }

    .want-session-btn-skip {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 44px;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .want-session-btn-text-skip {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.25);
        transition: color 0.2s ease;
    }

    .want-session-btn-skip:hover .want-session-btn-text-skip {
        color: rgba(255, 255, 255, 0.5);
    }
</style>

<div class="want-session-layout">
    <div class="want-session-left-panel">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="want-session-right-panel">
        <div class="want-session-content-wrapper">
            <div class="want-session-tag">Personal Training</div>

            <div class="want-session-headline-box">
                <h1 class="want-session-headline">Schedule Your</h1>
                <h1 class="want-session-headline">First PT Session</h1>
            </div>

            <p class="want-session-body-text">
                Would you like to browse Kasun Perera's available time slots and lock in your first personal training session now?
            </p>

            <div class="want-session-coach-container">
                <div class="want-session-coach-card">
                    <div class="want-session-coach-avatar"></div>
                    <div class="want-session-coach-info">
                        <h2 class="want-session-coach-name">Kasun Perera</h2>
                        <h3 class="want-session-coach-title">Head Strength Coach</h3>
                    </div>
                </div>
            </div>

            <div class="want-session-actions-container">
                <div class="want-session-primary-btn-wrapper">
                    <button class="want-session-btn-primary">
                        <span class="want-session-btn-text-primary">Yes, Browse Available Slots</span>
                        <span class="want-session-btn-icon">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                </div>
                <div class="want-session-skip-btn-wrapper">
                    <button class="want-session-btn-skip">
                        <span class="want-session-btn-text-skip">Skip For Now</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>