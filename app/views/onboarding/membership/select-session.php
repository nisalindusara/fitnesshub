<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700&display=swap');

    .select-session-layout {
        display: flex;
        flex-direction: row;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .select-session-left-panel {
        flex: 2;
        min-width: 300px;
        height: 100%;
        background: url('image_ee31c1.png') center/cover no-repeat;
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

    .select-session-right-panel {
        flex: 3;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 8vw;
        box-sizing: border-box;
        height: 100%;
    }

    .select-session-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 618px;
        /* Container width mapped from Figma 617.33px */
    }

    .select-session-inner-container {
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 585.33px;
        /* Width matching the card and grid */
        margin-bottom: 24px;
    }

    .select-session-coach-card {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        padding: 20px;
        gap: 20px;
        width: 100%;
        background: rgba(227, 24, 55, 0.05);
        border: 0.8px solid rgba(227, 24, 55, 0.4);
    }

    .select-session-avatar {
        width: 150px;
        height: 150px;
        /* Adding a placeholder profile image mapped to the avatar */
        background: #1E2939 url('https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=200&auto=format&fit=crop') center/cover no-repeat;
        flex-shrink: 0;
    }

    .select-session-coach-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .select-session-coach-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 20px;
        line-height: 28px;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .select-session-coach-title {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #E31837;
        margin: 0 0 8px 0;
    }

    .select-session-coach-desc {
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 19px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }

    .select-session-slots-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 6px;
        width: 100%;
        margin-top: 16px;
    }

    .select-session-slot-btn {
        box-sizing: border-box;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px 0px;
        height: 57.1px;
        background: transparent;
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        cursor: pointer;
        transition: border-color 0.2s ease, background-color 0.2s ease;
    }

    .select-session-slot-btn:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .select-session-time-text {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        letter-spacing: -0.35px;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    .select-session-status-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 9px;
        line-height: 14px;
        text-align: center;
        letter-spacing: 0.9px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.2);
        margin: 2px 0 0 0;
    }

    .select-session-actions-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        max-width: 423.2px;
        /* Mapped from Action buttons width */
    }

    .select-session-confirm-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 16px 0px;
        width: 100%;
        height: 52px;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        cursor: not-allowed;
        margin-bottom: 12px;
    }

    .select-session-confirm-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.2);
    }

    .select-session-later-btn {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 16px 0px;
        width: 100%;
        height: 53.6px;
        background: transparent;
        border: 0.8px solid rgba(255, 255, 255, 0.2);
        cursor: pointer;
        transition: background-color 0.2s ease, border-color 0.2s ease;
    }

    .select-session-later-btn:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.4);
    }

    .select-session-later-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #FFFFFF;
    }
</style>

<div class="select-session-layout">
    <div class="select-session-left-panel">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="select-session-right-panel">
        <div class="select-session-content-wrapper">

            <div class="select-session-inner-container">
                <div class="select-session-coach-card">
                    <div class="select-session-avatar"></div>
                    <div class="select-session-coach-info">
                        <h2 class="select-session-coach-name">Kasun Perera</h2>
                        <h3 class="select-session-coach-title">Head Strength Coach</h3>
                        <p class="select-session-coach-desc">Specialises in strength programming and athletic development.</p>
                    </div>
                </div>

                <div class="select-session-slots-grid">
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">06:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">08:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">10:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">14:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">17:00</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                    <button class="select-session-slot-btn">
                        <span class="select-session-time-text">19:30</span>
                        <span class="select-session-status-text">Free</span>
                    </button>
                </div>
            </div>

            <div class="select-session-actions-container">
                <button class="select-session-confirm-btn" disabled>
                    <span class="select-session-confirm-text">Confirm PT Session</span>
                </button>
                <button class="select-session-later-btn">
                    <span class="select-session-later-text">Do it later</span>
                </button>
            </div>

        </div>
    </div>
</div>