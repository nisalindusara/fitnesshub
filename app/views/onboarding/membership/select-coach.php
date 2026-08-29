<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700;900&display=swap');

    .select-coach-layout {
        display: flex;
        flex-direction: row;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        overflow: hidden;
        /* Prevent body scroll, handle scroll in right panel */
    }

    .select-coach-left-panel {
        flex: 2;
        min-width: 300px;
        height: 100vh;
        background: url('image_ee39fb.png') center/cover no-repeat;
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

    .select-coach-right-panel {
        flex: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 40px 8vw;
        box-sizing: border-box;
        height: 100vh;
        overflow-y: auto;
        /* Enables scrolling for overflowing content */
    }

    .select-coach-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        max-width: 448px;
        margin: auto 0;
        /* Vertically center content if it is smaller than viewport, but allow scroll if larger */
        padding-bottom: 40px;
        /* Extra padding at the bottom for scrolling clearance */
    }

    .select-coach-tag {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        color: #E31837;
        margin-bottom: 12px;
    }

    .select-coach-headline-box {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .select-coach-headline {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 52.488px;
        line-height: 46px;
        letter-spacing: -1.3122px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .select-coach-body-text {
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 23px;
        color: rgba(255, 255, 255, 0.5);
        margin: 16px 0 24px 0;
        width: 100%;
    }

    .select-coach-highlight {
        font-weight: 700;
        color: #FFFFFF;
    }

    .select-coach-list {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 12px;
    }

    .select-coach-card {
        box-sizing: border-box;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        padding: 16px;
        gap: 16px;
        width: 100%;
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        background: transparent;
        transition: border-color 0.2s ease, background-color 0.2s ease;
        cursor: pointer;
    }

    .select-coach-card:hover {
        background: rgba(255, 255, 255, 0.03);
        border-color: rgba(255, 255, 255, 0.3);
    }

    .select-coach-card.recommended {
        background: rgba(227, 24, 55, 0.05);
        border: 0.8px solid rgba(227, 24, 55, 0.5);
    }

    .select-coach-avatar {
        width: 48px;
        height: 48px;
        background: #1E2939 url('https://images.unsplash.com/photo-1594381898411-846e7d193883?q=80&w=150&auto=format&fit=crop') center/cover no-repeat;
        flex-shrink: 0;
    }

    .select-coach-avatar-2 {
        background-image: url('https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=150&auto=format&fit=crop');
    }

    .select-coach-avatar-3 {
        background-image: url('https://images.unsplash.com/photo-1567598508481-65985588ce6b?q=80&w=150&auto=format&fit=crop');
    }

    .select-coach-avatar-4 {
        background-image: url('https://images.unsplash.com/photo-1583468982228-19f19164aee2?q=80&w=150&auto=format&fit=crop');
    }

    .select-coach-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    .select-coach-name-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 8px;
        margin-bottom: 2px;
    }

    .select-coach-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 16px;
        line-height: 24px;
        letter-spacing: -0.4px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin: 0;
    }

    .select-coach-badge {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 2px 8px;
        background: #E31837;
        font-family: 'Barlow', sans-serif;
        font-weight: 900;
        font-size: 10px;
        line-height: 15px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .select-coach-title {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: #E31837;
        margin: 0 0 4px 0;
    }

    .select-coach-desc {
        font-family: 'Barlow', sans-serif;
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
        color: rgba(255, 255, 255, 0.4);
        margin: 0;
    }

    .select-coach-actions {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        margin-top: 32px;
    }

    .select-coach-btn-primary {
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
        margin-bottom: 12px;
    }

    .select-coach-btn-primary:hover {
        background: #C41530;
    }

    .select-coach-btn-text-primary {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: #FFFFFF;
    }

    .select-coach-btn-skip {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 44px;
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .select-coach-btn-text-skip {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.25);
        transition: color 0.2s ease;
    }

    .select-coach-btn-skip:hover .select-coach-btn-text-skip {
        color: rgba(255, 255, 255, 0.5);
    }
</style>

<div class="select-coach-layout">
    <div class="select-coach-left-panel">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="select-coach-right-panel">
        <div class="select-coach-content-wrapper">

            <div class="select-coach-tag">Browse Instructors</div>

            <div class="select-coach-headline-box">
                <h1 class="select-coach-headline">The Right Coach</h1>
                <h1 class="select-coach-headline">Will Get You There</h1>
            </div>

            <p class="select-coach-body-text">
                The right instructor will help you figure out <span class="select-coach-highlight">general fitness</span>. Browse our coaches and pick the one you feel best about.
            </p>

            <div class="select-coach-list">

                <!-- Coach 1 (Recommended) -->
                <div class="select-coach-card recommended">
                    <div class="select-coach-avatar"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Kasun Perera</h2>
                            <div class="select-coach-badge">Recommended</div>
                        </div>
                        <h3 class="select-coach-title">Head Strength Coach</h3>
                        <p class="select-coach-desc">Specialises in strength programming and athletic development.</p>
                    </div>
                </div>

                <!-- Coach 2 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-2"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Nimali Fernando</h2>
                        </div>
                        <h3 class="select-coach-title">Yoga & Wellness Coach</h3>
                        <p class="select-coach-desc">Expert in flexibility, mobility, and mind-body wellness.</p>
                    </div>
                </div>

                <!-- Coach 3 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-3"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Dinesh Silva</h2>
                        </div>
                        <h3 class="select-coach-title">Conditioning Coach</h3>
                        <p class="select-coach-desc">Former national athlete focused on functional strength.</p>
                    </div>
                </div>

                <!-- Coach 4 -->
                <div class="select-coach-card">
                    <div class="select-coach-avatar select-coach-avatar-4"></div>
                    <div class="select-coach-info">
                        <div class="select-coach-name-row">
                            <h2 class="select-coach-name">Tharaka Jayasinghe</h2>
                        </div>
                        <h3 class="select-coach-title">Cardio & HIIT Coach</h3>
                        <p class="select-coach-desc">High-energy coach for fat loss, cardio, and HIIT circuits.</p>
                    </div>
                </div>

            </div>

            <div class="select-coach-actions">
                <button class="select-coach-btn-primary">
                    <span class="select-coach-btn-text-primary">Yes, I'll Take a Coach</span>
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.33337 8H12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 3.33337L12.6667 8.00004L8 12.6667" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="select-coach-btn-skip">
                    <span class="select-coach-btn-text-skip">I'll decide later</span>
                </button>
            </div>

        </div>
    </div>
</div>