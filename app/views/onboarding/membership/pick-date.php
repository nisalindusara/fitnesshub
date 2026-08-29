<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@900&family=Barlow:wght@400;700&display=swap');

    .pick-date-layout {
        display: flex;
        flex-direction: row;
        width: 100vw;
        height: 100vh;
        background: #0A0A0A;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .pick-date-left-panel {
        flex: 3;
        min-width: 300px;
        height: 100%;
        background: url('image_ee2ab7.png') center/cover no-repeat;
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

    .pick-date-right-panel {
        flex: 2;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 0 8vw;
        box-sizing: border-box;
        height: 100%;
    }

    .pick-date-content-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        max-width: 448px;
    }

    .pick-date-headline-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 12px 0px 0px;
    }

    .pick-date-headline-text {
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

    .pick-date-body-text {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        color: rgba(255, 255, 255, 0.5);
        margin: 16px 0 0 0;
        width: 100%;
        max-width: 384px;
    }

    .pick-date-form-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 32px 0px 0px;
        width: 100%;
    }

    .pick-date-label {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 12px;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.4);
        margin: 0 0 8px 0;
    }

    .pick-date-input {
        box-sizing: border-box;
        width: 100%;
        height: 49.6px;
        background: rgba(255, 255, 255, 0.05);
        border: 0.8px solid rgba(255, 255, 255, 0.1);
        color: #FFFFFF;
        padding: 0 16px;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        outline: none;
        transition: border-color 0.2s ease;
    }

    .pick-date-input:focus {
        border-color: rgba(255, 255, 255, 0.3);
    }

    .pick-date-input::-webkit-calendar-picker-indicator {
        filter: invert(1);
        opacity: 0.5;
        cursor: pointer;
    }

    .pick-date-btn-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 32px 0px 0px;
        width: 100%;
    }

    .pick-date-btn {
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
    }

    .pick-date-btn-text {
        font-family: 'Barlow', sans-serif;
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        text-align: center;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.2);
    }
</style>

<div class="pick-date-layout">
    <div class="pick-date-left-panel">
        <button class="back-btn" onclick="window.location.href='/';">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            BACK
        </button>
    </div>
    <div class="pick-date-right-panel">
        <div class="pick-date-content-wrapper">
            <div class="pick-date-headline-container">
                <h1 class="pick-date-headline-text">Pick Your</h1>
                <h1 class="pick-date-headline-text">Visit Date</h1>
            </div>

            <p class="pick-date-body-text">
                Choose the day you plan to visit. We'll show you which trainers are available and when.
            </p>

            <div class="pick-date-form-container">
                <label class="pick-date-label">Select Date</label>
                <input type="date" class="pick-date-input" aria-label="Select Date" />
            </div>

            <div class="pick-date-btn-container">
                <button class="pick-date-btn" disabled>
                    <span class="pick-date-btn-text">See Available Trainers</span>
                </button>
            </div>
        </div>
    </div>
</div>