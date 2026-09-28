<style>
    /* Classes screen – middle container (id/class selectors only)
   Font (Plus Jakarta Sans) and page spacing come from member-layout */

    #classes-page {
        --ink: #1c1d21;
        --muted: #6a6d75;
        --line: #e2e2de;
        --surface: #ffffff;
        --surface-alt: #f3f3f1;
        --brand: #d32f2f;
        --brand-dark: #a82323;
        --warn: #c26a00;

        --font: "Plus Jakarta Sans", system-ui, -apple-system, sans-serif;

        box-sizing: border-box;
        width: 100%;
        max-width: 1080px;
        margin: 0 auto;
        padding: 0;
        /* .main-content already clears the header and the dock */
        font-family: var(--font);
        color: var(--ink);
    }

    .classes__title {
        margin: 0 0 16px;
        font-size: 1.75rem;
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: -0.02em;
    }

    /* White panel */
    .classes__panel {
        box-sizing: border-box;
        background: var(--surface);
        border-radius: 24px;
        padding: 22px;
    }

    /* Search + filter */
    .classes__tools {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .search {
        position: relative;
        flex: 1;
        display: flex;
        align-items: center;
    }

    .search__icon {
        position: absolute;
        left: 14px;
        width: 18px;
        height: 18px;
        fill: none;
        stroke: var(--muted);
        stroke-width: 2;
        stroke-linecap: round;
        pointer-events: none;
    }

    .search__input {
        box-sizing: border-box;
        width: 100%;
        height: 44px;
        padding: 0 14px 0 42px;
        border: 1.5px solid transparent;
        border-radius: 12px;
        background: var(--surface-alt);
        font: 500 0.95rem var(--font);
        color: var(--ink);
        outline: none;
    }

    .search__input:focus {
        border-color: var(--ink);
        background: var(--surface);
    }

    .filter-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        height: 44px;
        padding: 0 16px;
        border: 0;
        border-radius: 12px;
        background: var(--ink);
        color: #fff;
        font: 600 0.95rem var(--font);
        cursor: pointer;
    }

    .filter-btn:hover {
        background: #33353b;
    }

    .filter-btn__icon {
        width: 18px;
        height: 18px;
        fill: none;
        stroke: currentColor;
        stroke-width: 2.2;
        stroke-linecap: round;
    }

    /* Grid */
    .class-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 18px;
    }

    /* Card */
    .class-card {
        display: flex;
        flex-direction: column;
        border: 1.5px solid var(--line);
        border-radius: 18px;
        overflow: hidden;
        background: var(--surface);
        transition: border-color 0.15s ease;
    }

    .class-card:hover {
        border-color: #c5c5c0;
    }

    /* Top: image */
    .class-card__media {
        position: relative;
        flex: none;
        width: 100%;
        aspect-ratio: 16 / 10;
        overflow: hidden;
        background: var(--surface-alt);
        /* shows while the image loads */
    }

    /* Absolutely positioned so the image's own size can never stretch the box */
    .class-card__img {
        position: absolute;
        inset: 0;
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    /* Bottom: details */
    .class-card__body {
        display: flex;
        flex-direction: column;
        flex: 1;
        padding: 16px 16px 18px;
    }

    .class-card__name {
        margin: 0 0 10px;
        font-size: 1.125rem;
        font-weight: 700;
        line-height: 1.3;
        letter-spacing: -0.01em;
    }

    .class-card__meta {
        display: flex;
        flex-wrap: wrap;
        gap: 6px 16px;
        margin: 0 0 10px;
        padding: 0;
        list-style: none;
    }

    .class-card__meta-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .class-card__icon {
        width: 16px;
        height: 16px;
        fill: none;
        stroke: var(--brand);
        stroke-width: 2;
        stroke-linecap: round;
        flex: none;
    }

    /* Name row with spots booked on the right */
    .class-card__head {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        gap: 12px;
        margin: 0 0 10px;
    }

    .class-card__head .class-card__name {
        margin: 0;
    }

    .class-card__spots {
        flex: none;
        margin: 0;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--muted);
        white-space: nowrap;
    }

    /* amber when 2 or fewer spots left */
    .class-card__spots--low {
        color: var(--warn);
    }

    .class-card__desc {
        margin: 0 0 16px;
        font-size: 0.9rem;
        line-height: 1.5;
        color: var(--muted);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Join button – pinned to the bottom so buttons line up across a row */
    .btn {
        box-sizing: border-box;
        width: 100%;
        height: 44px;
        margin-top: auto;
        border: 0;
        border-radius: 12px;
        font: 600 0.95rem var(--font);
        cursor: pointer;
        transition: background-color 0.15s ease;
    }

    .btn--join {
        background: var(--brand);
        color: #fff;
    }

    .btn--join:hover {
        background: var(--brand-dark);
    }

    .btn--join:disabled {
        background: var(--surface-alt);
        color: var(--muted);
        cursor: not-allowed;
    }

    /* Keyboard focus */
    .btn:focus-visible,
    .filter-btn:focus-visible {
        outline: 2.5px solid var(--brand);
        outline-offset: 2px;
    }

    /* Mobile */
    @media (max-width: 640px) {
        .classes__panel {
            padding: 14px;
            border-radius: 18px;
        }

        .class-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        .class-card,
        .btn {
            transition: none;
        }
    }
</style>

<!-- Classes screen: middle container only (header + bottom nav come from the layout) -->
<section id="classes-page" class="classes" aria-labelledby="classes-title">

    <h1 id="classes-title" class="classes__title">Classes</h1>

    <div id="classes-panel" class="classes__panel">

        <div class="classes__tools">
            <label class="search" for="class-search">
                <svg class="search__icon" viewBox="0 0 24 24" aria-hidden="true">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="M20 20l-4-4"></path>
                </svg>
                <input id="class-search" class="search__input" type="search" placeholder="Search classes">
            </label>
            <button type="button" id="filter-btn" class="filter-btn">
                <svg class="filter-btn__icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M4 6h16M7 12h10M10 18h4"></path>
                </svg>
                Filter
            </button>
        </div>

        <div id="class-list" class="class-grid">
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1520877880798-5ee004e3f11e?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="Morning Spin class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">Morning Spin</h2>
                        <p class="class-card__spots" title="14 of 20 spots booked">14/20</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Wed, 7:00 AM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Marcus Lee
                        </li>
                    </ul>
                    <p class="class-card__desc">Start your day with an energetic indoor cycling session built around climbs and sprints.</p>
                    <button type="button" class="btn btn--join">Join</button>
                </div>
            </article>
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1754257319747-df51c384c0fa?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="Pilates Reformer class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">Pilates Reformer</h2>
                        <p class="class-card__spots" title="4 of 12 spots booked">4/12</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Wed, 9:30 AM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Sophia Carter
                        </li>
                    </ul>
                    <p class="class-card__desc">Full-body workout on the reformer machine to improve strength, flexibility and posture.</p>
                    <button type="button" class="btn btn--join">Join</button>
                </div>
            </article>
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="CrossFit WOD class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">CrossFit WOD</h2>
                        <p class="class-card__spots class-card__spots--low" title="14 of 16 spots booked">14/16</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Wed, 12:00 PM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Dave Miller
                        </li>
                    </ul>
                    <p class="class-card__desc">Constantly varied functional movements performed at high intensity.</p>
                    <button type="button" class="btn btn--join">Join</button>
                </div>
            </article>
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="Core Builder class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">Core Builder</h2>
                        <p class="class-card__spots" title="9 of 18 spots booked">9/18</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Thu, 6:00 PM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Emily Chen
                        </li>
                    </ul>
                    <p class="class-card__desc">A focused 45-minute session to strengthen abdominals, obliques and lower back.</p>
                    <button type="button" class="btn btn--join">Join</button>
                </div>
            </article>
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="Kettlebell Circuit class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">Kettlebell Circuit</h2>
                        <p class="class-card__spots" title="6 of 14 spots booked">6/14</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Fri, 7:15 PM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Dave Miller
                        </li>
                    </ul>
                    <p class="class-card__desc">Swings, cleans and carries in timed rounds for strength and conditioning.</p>
                    <button type="button" class="btn btn--join">Join</button>
                </div>
            </article>
            <article class="class-card">
                <div class="class-card__media">
                    <img class="class-card__img" src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&amp;fit=crop&amp;w=800&amp;q=70" alt="Sunrise Yoga class" loading="lazy">
                </div>
                <div class="class-card__body">
                    <div class="class-card__head">
                        <h2 class="class-card__name">Sunrise Yoga</h2>
                        <p class="class-card__spots class-card__spots--full" title="20 of 20 spots booked">20/20</p>
                    </div>
                    <ul class="class-card__meta">
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v5l3 2"></path>
                            </svg>
                            Sat, 8:00 AM
                        </li>
                        <li class="class-card__meta-item">
                            <svg class="class-card__icon" viewBox="0 0 24 24" aria-hidden="true">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 21c0-4 4-6 8-6s8 2 8 6"></path>
                            </svg>
                            Sophia Carter
                        </li>
                    </ul>
                    <p class="class-card__desc">A slow flow to open up the hips and shoulders and ease into the weekend.</p>
                    <button type="button" class="btn btn--join" disabled>Class full</button>
                </div>
            </article>
        </div>

    </div>

</section>