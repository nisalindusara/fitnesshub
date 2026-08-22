<div class="page-wrapper">

    <!-- Hero Header -->
    <header class="hero-header">
        <div class="hero-container">
            <a href="#" class="back-btn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7" />
                </svg>
                Back to Home
            </a>
            <span class="schedule-tagline">Full Weekly Schedule</span>
            <h1 class="hero-title">Class Schedule</h1>
            <p class="hero-description">Book your spot in any class. Availability updates in real time — full classes are marked sold out.</p>
        </div>
    </header>

    <!-- Day Navigation Bar -->
    <div class="day-selector-bar" aria-label="Days of the week">
        <div class="day-selector-container">
            <button class="day-tab active">Mon</button>
            <button class="day-tab">Tue</button>
            <button class="day-tab">Wed</button>
            <button class="day-tab">Thu</button>
            <button class="day-tab">Fri</button>
            <button class="day-tab">Sat</button>
            <button class="day-tab">Sun</button>
        </div>
    </div>

    <!-- Filters Section -->
    <section class="filters-bar" aria-label="Schedule Filters">
        <div class="filters-container">
            <div class="filter-left-group">
                <span class="filter-label">Filter:</span>
                <button class="filter-btn active">All Types</button>
                <button class="filter-btn">High Intensity</button>
                <button class="filter-btn">Flexibility</button>
                <button class="filter-btn">Strength</button>
                <button class="filter-btn">Cardio</button>
            </div>
            <div>
                <select class="instructor-select" aria-label="Filter by instructor">
                    <option>All Instructors</option>
                    <option>Kasun Perera</option>
                    <option>Nimali Fernando</option>
                    <option>Dinesh Silva</option>
                    <option>Tharaka Jayasinghe</option>
                </select>
            </div>
        </div>
    </section>

    <!-- Main Schedule Content -->
    <main class="schedule-section">
        <div class="schedule-container">

            <!-- Day Section Header -->
            <div class="day-header">
                <div class="day-title-wrap">
                    <h2 class="day-title">Monday</h2>
                    <span class="class-count">5 classes</span>
                </div>
                <a href="#" class="btn-join-schedule">
                    Join to Book
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <!-- Class Cards List -->
            <div class="class-list">

                <!-- Row 1: HIIT Blast -->
                <article class="class-card">
                    <div class="class-time">
                        <span class="time-val">06:00</span>
                        <span class="time-duration">45 min</span>
                    </div>
                    <div class="class-info-group">
                        <img class="class-thumb" src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=120&auto=format&fit=crop" alt="HIIT Blast class thumbnail" />
                        <div class="class-details">
                            <div class="class-title-tag">
                                <h3 class="class-name">HIIT Blast</h3>
                                <span class="badge badge-hiit">High Intensity</span>
                            </div>
                            <span class="instructor-name">Kasun Perera</span>
                        </div>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Level</span>
                        <span class="meta-value">Advanced</span>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Spots Left</span>
                        <span class="spots-num low">4</span>
                    </div>
                    <div class="class-action">
                        <button class="btn-action book">Book Now</button>
                    </div>
                </article>

                <!-- Row 2: Yoga Flow -->
                <article class="class-card">
                    <div class="class-time">
                        <span class="time-val">09:00</span>
                        <span class="time-duration">60 min</span>
                    </div>
                    <div class="class-info-group">
                        <img class="class-thumb" src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?q=80&w=120&auto=format&fit=crop" alt="Yoga Flow class thumbnail" />
                        <div class="class-details">
                            <div class="class-title-tag">
                                <h3 class="class-name">Yoga Flow</h3>
                                <span class="badge badge-flex">Flexibility</span>
                            </div>
                            <span class="instructor-name">Nimali Fernando</span>
                        </div>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Level</span>
                        <span class="meta-value">All Levels</span>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Spots Left</span>
                        <span class="spots-num">12</span>
                    </div>
                    <div class="class-action">
                        <button class="btn-action book">Book Now</button>
                    </div>
                </article>

                <!-- Row 3: Strength Circuit -->
                <article class="class-card">
                    <div class="class-time">
                        <span class="time-val">12:00</span>
                        <span class="time-duration">50 min</span>
                    </div>
                    <div class="class-info-group">
                        <img class="class-thumb" src="https://images.unsplash.com/photo-1581009146145-b5ef050c2e1e?q=80&w=120&auto=format&fit=crop" alt="Strength Circuit thumbnail" />
                        <div class="class-details">
                            <div class="class-title-tag">
                                <h3 class="class-name">Strength Circuit</h3>
                                <span class="badge badge-strength">Strength</span>
                            </div>
                            <span class="instructor-name">Dinesh Silva</span>
                        </div>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Level</span>
                        <span class="meta-value">Intermediate</span>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Spots Left</span>
                        <span class="spots-num">8</span>
                    </div>
                    <div class="class-action">
                        <button class="btn-action book">Book Now</button>
                    </div>
                </article>

                <!-- Row 4: Spin & Burn -->
                <article class="class-card">
                    <div class="class-time">
                        <span class="time-val">18:00</span>
                        <span class="time-duration">40 min</span>
                    </div>
                    <div class="class-info-group">
                        <img class="class-thumb" src="https://images.unsplash.com/photo-1534258936925-c58bed479fcb?q=80&w=120&auto=format&fit=crop" alt="Spin & Burn thumbnail" />
                        <div class="class-details">
                            <div class="class-title-tag">
                                <h3 class="class-name">Spin & Burn</h3>
                                <span class="badge badge-cardio">Cardio</span>
                            </div>
                            <span class="instructor-name">Tharaka Jayasinghe</span>
                        </div>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Level</span>
                        <span class="meta-value">Intermediate</span>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Spots Left</span>
                        <span class="spots-num full">Full</span>
                    </div>
                    <div class="class-action">
                        <button class="btn-action sold-out" disabled>Sold Out</button>
                    </div>
                </article>

                <!-- Row 5: HIIT Blast -->
                <article class="class-card">
                    <div class="class-time">
                        <span class="time-val">19:30</span>
                        <span class="time-duration">45 min</span>
                    </div>
                    <div class="class-info-group">
                        <img class="class-thumb" src="https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=120&auto=format&fit=crop" alt="HIIT Blast class thumbnail" />
                        <div class="class-details">
                            <div class="class-title-tag">
                                <h3 class="class-name">HIIT Blast</h3>
                                <span class="badge badge-hiit">High Intensity</span>
                            </div>
                            <span class="instructor-name">Kasun Perera</span>
                        </div>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Level</span>
                        <span class="meta-value">Advanced</span>
                    </div>
                    <div class="meta-col">
                        <span class="meta-label">Spots Left</span>
                        <span class="spots-num">6</span>
                    </div>
                    <div class="class-action">
                        <button class="btn-action book">Book Now</button>
                    </div>
                </article>

            </div>
        </div>
    </main>

    <!-- Bottom CTA Footer -->
    <footer class="footer-cta">
        <div class="footer-container">
            <div class="cta-text-group">
                <h3 class="cta-heading">Ready to book your first class?</h3>
                <p class="cta-subtext">Become a member to unlock class bookings across the full weekly schedule.</p>
            </div>
            <a href="#" class="btn-cta-join">
                Join Now
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </footer>

</div>

<style>
    :root {
        --primary-red: #E31837;
        --primary-black: #0A0A0A;
        --text-muted: #99A1AF;
        --text-sub: #6A7282;
        --border-color: #E5E7EB;
        --border-light: #F3F4F6;
        --bg-filter: #F9FAFB;
        --max-width: 1440px;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Barlow', sans-serif;
        background-color: #FFFFFF;
        color: var(--primary-black);
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .page-wrapper {
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* =========================================================
       HERO HEADER SECTION
       ========================================================= */
    .hero-header {
        position: relative;
        width: 100%;
        background-color: #0A0A0A;
        background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.82) 0%, rgba(0, 0, 0, 0.5) 100%),
            url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1600&auto=format&fit=crop');
        background-size: cover;
        background-position: center;
        padding: 48px 32px;
        display: flex;
        justify-content: center;
    }

    .hero-container {
        width: 100%;
        max-width: var(--max-width);
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        margin-bottom: 28px;
        transition: color 0.2s;
    }

    .back-btn:hover {
        color: #FFFFFF;
    }

    .back-btn svg {
        stroke: currentColor;
    }

    .schedule-tagline {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        color: var(--primary-red);
        margin-bottom: 8px;
    }

    .hero-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: clamp(42px, 5.5vw, 70px);
        line-height: 0.95;
        letter-spacing: -1.75px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin-bottom: 16px;
    }

    .hero-description {
        font-size: 15px;
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.65);
        max-width: 520px;
    }

    /* =========================================================
       DAY SELECTOR BAR
       ========================================================= */
    .day-selector-bar {
        width: 100%;
        background: #FFFFFF;
        border-bottom: 1px solid var(--border-color);
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.05);
        display: flex;
        justify-content: center;
    }

    .day-selector-container {
        width: 100%;
        max-width: var(--max-width);
        padding: 0 32px;
        display: flex;
        overflow-x: auto;
        scrollbar-width: none;
    }

    .day-selector-container::-webkit-scrollbar {
        display: none;
    }

    .day-tab {
        padding: 16px 20px;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 700;
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        color: var(--text-muted);
        background: none;
        border: none;
        border-bottom: 2px solid transparent;
        cursor: pointer;
        white-space: nowrap;
        transition: all 0.2s;
    }

    .day-tab:hover {
        color: var(--primary-black);
    }

    .day-tab.active {
        color: var(--primary-red);
        border-bottom-color: var(--primary-red);
    }

    /* =========================================================
       FILTERS BAR
       ========================================================= */
    .filters-bar {
        width: 100%;
        background: var(--bg-filter);
        border-bottom: 1px solid var(--border-color);
        display: flex;
        justify-content: center;
    }

    .filters-container {
        width: 100%;
        max-width: var(--max-width);
        padding: 16px 32px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
    }

    .filter-left-group {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
    }

    .filter-label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-right: 4px;
    }

    .filter-btn {
        padding: 8px 16px;
        font-family: 'Barlow', sans-serif;
        font-size: 12px;
        font-weight: 700;
        line-height: 16px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--text-sub);
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        cursor: pointer;
        border-radius: 0px;
        transition: all 0.2s;
    }

    .filter-btn:hover {
        border-color: #0A0A0A;
        color: #0A0A0A;
    }

    .filter-btn.active {
        background: #0A0A0A;
        border-color: #0A0A0A;
        color: #FFFFFF;
    }

    .instructor-select {
        appearance: none;
        -webkit-appearance: none;
        background: #FFFFFF url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="%236A7282" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>') no-repeat right 12px center;
        border: 1px solid var(--border-color);
        padding: 8px 36px 8px 16px;
        font-family: 'Barlow', sans-serif;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--text-sub);
        cursor: pointer;
        min-width: 195px;
        border-radius: 0;
    }

    .instructor-select:focus {
        outline: none;
        border-color: #0A0A0A;
    }

    /* =========================================================
       SCHEDULE LIST SECTION
       ========================================================= */
    .schedule-section {
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 48px 32px;
    }

    .schedule-container {
        width: 100%;
        max-width: var(--max-width);
        display: flex;
        flex-direction: column;
        gap: 32px;
    }

    .day-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .day-title-wrap {
        display: flex;
        align-items: baseline;
        gap: 12px;
    }

    .day-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 30px;
        line-height: 36px;
        letter-spacing: -0.75px;
        text-transform: uppercase;
        color: var(--primary-black);
    }

    .class-count {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-muted);
    }

    .btn-join-schedule {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary-red);
        color: #FFFFFF;
        padding: 12px 24px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-join-schedule:hover {
        background: #c8132e;
    }

    .class-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    /* Single Class Card */
    .class-card {
        background: #FFFFFF;
        border: 1px solid var(--border-light);
        padding: 20px 24px;
        display: grid;
        grid-template-columns: 110px auto 160px 140px 120px;
        align-items: center;
        gap: 24px;
        transition: box-shadow 0.2s, border-color 0.2s;
    }

    .class-card:hover {
        border-color: var(--border-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
    }

    .class-time {
        display: flex;
        flex-direction: column;
    }

    .time-val {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 24px;
        line-height: 1;
        color: var(--primary-black);
    }

    .time-duration {
        font-size: 12px;
        font-weight: 500;
        color: var(--text-muted);
        margin-top: 4px;
    }

    .class-info-group {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .class-thumb {
        width: 56px;
        height: 56px;
        border-radius: 2px;
        object-fit: cover;
        background-color: #F3F4F6;
        flex-shrink: 0;
    }

    .class-details {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .class-title-tag {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
    }

    .class-name {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 20px;
        line-height: 1.2;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        color: var(--primary-black);
    }

    .badge {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 2px 8px;
        line-height: 14px;
    }

    .badge-hiit {
        background: var(--primary-red);
        color: #FFFFFF;
    }

    .badge-flex {
        background: #F3E8FF;
        color: #8200DB;
    }

    .badge-strength {
        background: #101828;
        color: #FFFFFF;
    }

    .badge-cardio {
        background: #FFEDD4;
        color: #CA3500;
    }

    .instructor-name {
        font-size: 14px;
        font-weight: 500;
        color: var(--text-muted);
    }

    .meta-col {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .meta-label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--text-muted);
    }

    .meta-value {
        font-size: 14px;
        font-weight: 600;
        color: var(--primary-black);
    }

    .spots-num {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 20px;
        line-height: 1.2;
        color: var(--primary-black);
    }

    .spots-num.low {
        color: var(--primary-red);
    }

    .spots-num.full {
        color: #D1D5DC;
    }

    .btn-action {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 11px 20px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        cursor: pointer;
        width: 100%;
        text-align: center;
        transition: background-color 0.2s, border-color 0.2s;
    }

    .btn-action.book {
        background: var(--primary-red);
        color: #FFFFFF;
    }

    .btn-action.book:hover {
        background: #c8132e;
    }

    .btn-action.sold-out {
        background: #FFFFFF;
        border: 1px solid var(--border-color);
        color: #D1D5DC;
        cursor: not-allowed;
    }

    /* =========================================================
       FOOTER CTA SECTION
       ========================================================= */
    .footer-cta {
        width: 100%;
        background: #FFFFFF;
        border-top: 1px solid var(--border-light);
        padding: 64px 32px;
        display: flex;
        justify-content: center;
        margin-top: auto;
    }

    .footer-container {
        width: 100%;
        max-width: var(--max-width);
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
    }

    .cta-text-group {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .cta-heading {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 30px;
        line-height: 36px;
        letter-spacing: -0.75px;
        text-transform: uppercase;
        color: var(--primary-black);
    }

    .cta-subtext {
        font-size: 14px;
        line-height: 20px;
        color: var(--text-muted);
    }

    .btn-cta-join {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        padding: 16px 40px;
        background: var(--primary-red);
        color: #FFFFFF;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        text-decoration: none;
        white-space: nowrap;
        border: none;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-cta-join:hover {
        background: #c8132e;
    }

    /* =========================================================
       RESPONSIVE DESIGN (BREAKPOINTS)
       ========================================================= */
    @media (max-width: 992px) {
        .class-card {
            grid-template-columns: 90px 1fr 1fr;
            grid-template-areas:
                "time info info"
                "time level spots"
                "action action action";
            row-gap: 16px;
        }

        .class-time {
            grid-area: time;
        }

        .class-info-group {
            grid-area: info;
        }

        .meta-col:nth-of-type(1) {
            grid-area: level;
        }

        .meta-col:nth-of-type(2) {
            grid-area: spots;
        }

        .class-action {
            grid-area: action;
        }

        .footer-container {
            flex-direction: column;
            align-items: flex-start;
        }

        .btn-cta-join {
            width: 100%;
        }
    }

    @media (max-width: 640px) {

        .hero-header,
        .schedule-section,
        .footer-cta {
            padding: 32px 16px;
        }

        .filters-container {
            padding: 16px;
        }

        .instructor-select {
            width: 100%;
        }

        .filter-left-group {
            width: 100%;
            overflow-x: auto;
            padding-bottom: 4px;
            flex-wrap: nowrap;
        }

        .filter-btn {
            white-space: nowrap;
        }

        .class-card {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            padding: 16px;
        }

        .class-card>div,
        .class-action {
            width: 100%;
        }

        .day-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .btn-join-schedule {
            width: 100%;
            justify-content: center;
        }
    }
</style>