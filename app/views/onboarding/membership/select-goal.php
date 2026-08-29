<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700&display=swap');

    .select-goal {
        display: flex;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .image-container {
        flex: 2;
        min-width: 300px;
        height: 100%;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.2) 100%),
            linear-gradient(90deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.7) 100%),
            url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1470&auto=format&fit=crop');
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

    .right-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        flex: 3;
        height: 100%;
        padding: 0px 8vw;
        /* Responsive padding */
        box-sizing: border-box;
    }

    .content-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 100%;
        max-width: 618px;
        /* Based on Figma content width */
    }

    .headline {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 12px 0px 0px;
        margin-bottom: 16px;
    }

    .headline-text-1,
    .headline-text-2 {
        font-family: 'Barlow Condensed', sans-serif;
        font-style: normal;
        font-weight: 900;
        font-size: 52.488px;
        line-height: 46px;
        letter-spacing: -1.3122px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .paragraph-text-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        max-width: 384px;
        margin-bottom: 32px;
    }

    .paragraph-text {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        color: rgba(255, 255, 255, 0.5);
        margin: 0;
    }

    .goals-section {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        width: 100%;
    }

    .goal-button {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 16px;
        gap: 12px;
        height: 61.6px;
        background: transparent;
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        cursor: pointer;
        transition: border-color 0.2s ease, background-color 0.2s ease;
    }

    .goal-button:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .emoji {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 20px;
        line-height: 28px;
        color: #FFFFFF;
    }

    .goal-text {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        color: rgba(255, 255, 255, 0.6);
    }

    .primary-btn-container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 32px 0px 0px;
        width: 100%;
    }

    .primary-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 16px 0px;
        gap: 12px;
        width: 100%;
        max-width: 423px;
        /* Based on Figma PrimaryBtn width */
        height: 52px;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.2);
        cursor: not-allowed;
    }
</style>

<div class="select-goal">
    <div class="image-container">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="right-container">
        <div class="content-container">
            <div class="headline">
                <h1 class="headline-text-1">Let’s start with</h1>
                <h1 class="headline-text-2">Your Fitness Goal.</h1>
            </div>

            <div class="paragraph-text-container">
                <p class="paragraph-text">Tell us what you want to achieve and we'll personalise your journey from day one.</p>
            </div>

            <div class="goals-section">
                <button class="goal-button">
                    <span class="emoji">🔥</span>
                    <span class="goal-text">Lose Weight</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">💪</span>
                    <span class="goal-text">Build Muscle</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🏃</span>
                    <span class="goal-text">Improve Endurance</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🧘</span>
                    <span class="goal-text">Increase Flexibility</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">⚡</span>
                    <span class="goal-text">General Fitness</span>
                </button>
                <button class="goal-button">
                    <span class="emoji">🏆</span>
                    <span class="goal-text">Athletic Performance</span>
                </button>
            </div>

            <div class="primary-btn-container">
                <button class="primary-btn">Continue</button>
            </div>
        </div>
    </div>
</div>