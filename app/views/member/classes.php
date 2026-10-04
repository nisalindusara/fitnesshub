<?php $pageStyles = ['member/member/classes']; ?>

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