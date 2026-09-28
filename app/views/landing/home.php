<?php
// Default home page view for FitnessHub
// Styles: /assets/css/tokens.css + /assets/css/landing.css (move this link into your layout <head> if you prefer)
?>
<link rel="stylesheet" href="/assets/css/tokens.css">
<link rel="stylesheet" href="/assets/css/landing.css">

<main class="fh">

    <!-- ─── Hero ─── -->
    <section id="home" class="fh-hero">
        <img class="fh-hero__img"
            src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=1600&h=1000&fit=crop"
            alt="Gym floor at The Fitness Hub, Anuradhapura">
        <div class="fh-hero__shade" aria-hidden="true"></div>

        <div class="fh-container fh-hero__inner">
            <div class="fh-hero__top">
                <p class="fh-hero__kicker">The Fitness Hub, Anuradhapura</p>
                <h1 class="fh-hero__title">Train hard.<br>Train together.</h1>
            </div>

            <div class="fh-hero__bottom">
                <p class="fh-hero__text">
                    A well-equipped gym floor, a dedicated cardio section, and friendly coaches who plan your training and diet with you. Now with online booking and membership.
                </p>
                <div class="fh-btn-row">
                    <a href="/register" class="fh-btn">
                        <span class="fh-btn__label">Get started</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                    <a href="#membership" class="fh-btn fh-btn--ghost">
                        <span class="fh-btn__label">View plans</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── About / Value ─── -->
    <section id="about" class="fh-section fh-about">
        <div class="fh-container fh-about__grid">
            <div class="fh-about__media">
                <img src="/assets/images/landing/value_section_img.png" alt="Member training with free weights">
            </div>

            <div class="fh-about__content">
                <div class="fh-about__intro">
                    <h2 class="fh-h2">Supporting your<br>fitness journey</h2>
                    <p class="fh-body">
                        Led by head coach Lakmal, our team builds your workout programme and diet schedule around your goals, whether you're starting out or chasing your next PR.
                    </p>
                    <a href="#programs" class="fh-btn">
                        <span class="fh-btn__label">Learn more</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </div>

                <div class="fh-about__detail">
                    <ul class="fh-checks">
                        <li>Strength and cardio equipment on one floor</li>
                        <li>Personal workout programmes and diet plans</li>
                        <li>A friendly, supportive gym community</li>
                    </ul>
                    <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=600&h=600&fit=crop" alt="Coach guiding a member at The Fitness Hub">
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Programs ─── -->
    <section id="programs" class="fh-section fh-section--dark">
        <div class="fh-container">
            <h2 class="fh-h2 fh-h2--center">Programs designed for<br>real progress</h2>

            <div class="fh-programs">
                <details class="fh-program" open>
                    <summary class="fh-program__head">
                        <span class="fh-program__num">01</span>
                        <span class="fh-program__title">Muscle Building</span>
                        <span class="fh-program__arrow" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </summary>
                    <div class="fh-program__body">
                        <p>Hypertrophy-focused programmes that progress your lifts week by week to build size and strength.</p>
                        <a href="#membership" class="fh-btn">
                            <span class="fh-btn__label">Start now</span>
                            <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M8 7h9v9" />
                                </svg></span>
                        </a>
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&amp;w=1200&amp;h=675&amp;fit=crop" alt="Member training with a coach">
                    </div>
                </details>

                <details class="fh-program">
                    <summary class="fh-program__head">
                        <span class="fh-program__num">02</span>
                        <span class="fh-program__title">Cardio Section</span>
                        <span class="fh-program__arrow" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </summary>
                    <div class="fh-program__body">
                        <p>Treadmills, bikes, and cardio machines to build endurance and burn calories at your own pace.</p>
                        <a href="#membership" class="fh-btn">
                            <span class="fh-btn__label">Start now</span>
                            <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M8 7h9v9" />
                                </svg></span>
                        </a>
                        <img src="/assets/images/landing/image-spin-and-burn.png" alt="Cardio machines">
                    </div>
                </details>

                <details class="fh-program">
                    <summary class="fh-program__head">
                        <span class="fh-program__num">03</span>
                        <span class="fh-program__title">Fitness &amp; Fat Loss Programmes</span>
                        <span class="fh-program__arrow" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </summary>
                    <div class="fh-program__body">
                        <p>Structured plans that combine weights and conditioning to help you lose fat and get fitter.</p>
                        <a href="#membership" class="fh-btn">
                            <span class="fh-btn__label">Start now</span>
                            <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M8 7h9v9" />
                                </svg></span>
                        </a>
                        <img src="/assets/images/landing/image-hiit-blast.png" alt="Conditioning workout">
                    </div>
                </details>

                <details class="fh-program">
                    <summary class="fh-program__head">
                        <span class="fh-program__num">04</span>
                        <span class="fh-program__title">Abs &amp; Core</span>
                        <span class="fh-program__arrow" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </summary>
                    <div class="fh-program__body">
                        <p>Focused core sessions to strengthen your midsection, improve posture, and support your big lifts.</p>
                        <a href="#membership" class="fh-btn">
                            <span class="fh-btn__label">Start now</span>
                            <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M8 7h9v9" />
                                </svg></span>
                        </a>
                        <img src="/assets/images/landing/image-strength-circuit.png" alt="Core training">
                    </div>
                </details>

                <details class="fh-program">
                    <summary class="fh-program__head">
                        <span class="fh-program__num">05</span>
                        <span class="fh-program__title">Nutrition Guide</span>
                        <span class="fh-program__arrow" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </summary>
                    <div class="fh-program__body">
                        <p>Balanced diet schedules from our coaches, matched to your training goals.</p>
                        <a href="#store" class="fh-btn">
                            <span class="fh-btn__label">Explore store</span>
                            <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                    <path d="M7 17 17 7M8 7h9v9" />
                                </svg></span>
                        </a>
                        <img src="/assets/images/landing/store-image-1.png" alt="Supplements from the store">
                    </div>
                </details>
            </div>
        </div>
    </section>

    <!-- ─── Member Stories (CSS-only slider) ─── -->
    <section id="testimonials" class="fh-section fh-stories">
        <div class="fh-container">
            <h2 class="fh-h2">Member stories</h2>

            <div class="fh-stories__grid">
                <aside class="fh-stories__aside">
                    <span class="fh-stories__quote" aria-hidden="true">&ldquo;</span>
                    <div class="fh-stat">
                        <strong>4.8★</strong>
                        <span>Google rating, 67 reviews</span><!-- TODO: verify current rating -->
                    </div>
                </aside>

                <div class="fh-stories__slider">
                    <input class="fh-sr" type="radio" name="fh-story" id="fh-story-1" checked>
                    <input class="fh-sr" type="radio" name="fh-story" id="fh-story-2">
                    <input class="fh-sr" type="radio" name="fh-story" id="fh-story-3">

                    <!-- TODO: replace with real member quotes (with their permission) -->
                    <div class="fh-stories__track">
                        <article class="fh-story fh-story--1">
                            <div class="fh-stars" aria-label="5 out of 5 stars">★★★★★</div>
                            <blockquote>The coaches actually care. Lakmal set up my programme and diet plan, and I've never been this consistent.</blockquote>
                            <div class="fh-story__foot">
                                <div class="fh-author">
                                    <img src="https://i.pravatar.cc/112?img=11" alt="">
                                    <div><strong>Ruwan Bandara</strong><span>Member since 2023</span></div>
                                </div>
                                <div class="fh-story__nav">
                                    <label for="fh-story-3" class="fh-circle" aria-label="Previous story"><svg viewBox="0 0 24 24">
                                            <path d="M19 12H5m6-6-6 6 6 6" />
                                        </svg></label>
                                    <label for="fh-story-2" class="fh-circle fh-circle--red" aria-label="Next story"><svg viewBox="0 0 24 24">
                                            <path d="M5 12h14m-6-6 6 6-6 6" />
                                        </svg></label>
                                </div>
                            </div>
                        </article>

                        <article class="fh-story fh-story--2">
                            <div class="fh-stars" aria-label="5 out of 5 stars">★★★★★</div>
                            <blockquote>Great equipment, great music, and everyone here is friendly. It's the best vibe of any gym in town.</blockquote>
                            <div class="fh-story__foot">
                                <div class="fh-author">
                                    <img src="https://i.pravatar.cc/112?img=32" alt="">
                                    <div><strong>Ishara Wickramasinghe</strong><span>Member since 2024</span></div>
                                </div>
                                <div class="fh-story__nav">
                                    <label for="fh-story-1" class="fh-circle" aria-label="Previous story"><svg viewBox="0 0 24 24">
                                            <path d="M19 12H5m6-6-6 6 6 6" />
                                        </svg></label>
                                    <label for="fh-story-3" class="fh-circle fh-circle--red" aria-label="Next story"><svg viewBox="0 0 24 24">
                                            <path d="M5 12h14m-6-6 6 6-6 6" />
                                        </svg></label>
                                </div>
                            </div>
                        </article>

                        <article class="fh-story fh-story--3">
                            <div class="fh-stars" aria-label="5 out of 5 stars">★★★★★</div>
                            <blockquote>I came in as a complete beginner. The trainers helped me with every exercise until I felt confident on my own.</blockquote>
                            <div class="fh-story__foot">
                                <div class="fh-author">
                                    <img src="https://i.pravatar.cc/112?img=53" alt="">
                                    <div><strong>Chamod Rajapaksha</strong><span>Member since 2022</span></div>
                                </div>
                                <div class="fh-story__nav">
                                    <label for="fh-story-2" class="fh-circle" aria-label="Previous story"><svg viewBox="0 0 24 24">
                                            <path d="M19 12H5m6-6-6 6 6 6" />
                                        </svg></label>
                                    <label for="fh-story-1" class="fh-circle fh-circle--red" aria-label="Next story"><svg viewBox="0 0 24 24">
                                            <path d="M5 12h14m-6-6 6 6-6 6" />
                                        </svg></label>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── Membership ─── -->
    <section id="membership" class="fh-section fh-section--dark">
        <div class="fh-container">
            <h2 class="fh-h2 fh-h2--center">Membership options<br>made for you</h2>

            <!-- TODO: confirm Monthly and Annual prices and inclusions with the gym -->
            <div class="fh-plans">
                <article class="fh-plan">
                    <h3 class="fh-plan__name">Day Pass</h3>
                    <p class="fh-plan__desc">For a single visit, or to try the gym before committing.</p>
                    <p class="fh-plan__price">LKR 1,000<span>/visit</span></p>
                    <div class="fh-plan__features">
                        <p>What you get:</p>
                        <ul>
                            <li>Full gym floor access</li>
                            <li>Cardio section</li>
                            <li class="is-off">Workout programme</li>
                            <li class="is-off">Diet schedule</li>
                            <li class="is-off">Store discount</li>
                        </ul>
                    </div>
                    <a href="/personal-details?plan=day" class="fh-btn fh-btn--light fh-btn--block">
                        <span class="fh-btn__label">Buy pass</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </article>

                <article class="fh-plan fh-plan--featured">
                    <span class="fh-plan__badge">Most popular</span>
                    <h3 class="fh-plan__name">Monthly</h3>
                    <p class="fh-plan__desc">For regular members who want a plan and coaching support.</p>
                    <p class="fh-plan__price">LKR 4,500<span>/month</span></p>
                    <div class="fh-plan__features">
                        <p>What you get:</p>
                        <ul>
                            <li>Full gym floor access</li>
                            <li>Cardio section</li>
                            <li>Personal workout programme</li>
                            <li>Diet schedule</li>
                            <li class="is-off">Store discount</li>
                        </ul>
                    </div>
                    <a href="/personal-details?plan=monthly" class="fh-btn fh-btn--block">
                        <span class="fh-btn__label">Start now</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </article>

                <article class="fh-plan">
                    <h3 class="fh-plan__name">Annual</h3>
                    <p class="fh-plan__desc">For committed members who want everything, all year.</p>
                    <p class="fh-plan__price">LKR 45,000<span>/year</span></p>
                    <div class="fh-plan__features">
                        <p>What you get:</p>
                        <ul>
                            <li>Full gym floor access</li>
                            <li>Cardio section</li>
                            <li>Programme reviewed monthly</li>
                            <li>Diet schedule</li>
                            <li>10% off store purchases</li>
                        </ul>
                    </div>
                    <a href="/personal-details?plan=annual" class="fh-btn fh-btn--light fh-btn--block">
                        <span class="fh-btn__label">Start now</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </article>
            </div>
        </div>
    </section>

    <!-- ─── Classes ─── -->
    <section id="classes" class="fh-section">
        <div class="fh-container">
            <h2 class="fh-h2 fh-h2--center">Find your<br>next class</h2>

            <!-- TODO: confirm which sessions the gym runs -->
            <div class="fh-classes">
                <article class="fh-class">
                    <a href="/classes" class="fh-class__media"><img src="/assets/images/landing/image-hiit-blast.png" alt="HIIT Blast class"></a>
                    <p class="fh-class__meta">45 min / Coach-led</p>
                    <h3 class="fh-class__title">HIIT Blast</h3>
                    <p class="fh-class__text">High-intensity intervals to build endurance and burn calories fast.</p>
                    <a href="/onboarding?flow=class" class="fh-link">Book class <svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></a>
                </article>

                <article class="fh-class">
                    <a href="/classes" class="fh-class__media"><img src="/assets/images/landing/image-yoga-flow.png" alt="Yoga Flow class"></a>
                    <p class="fh-class__meta">60 min / Coach-led</p>
                    <h3 class="fh-class__title">Yoga Flow</h3>
                    <p class="fh-class__text">Mobility, balance, and breathing work for recovery and flexibility.</p>
                    <a href="/onboarding?flow=class" class="fh-link">Book class <svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></a>
                </article>

                <article class="fh-class">
                    <a href="/classes" class="fh-class__media"><img src="/assets/images/landing/image-strength-circuit.png" alt="Strength Circuit class"></a>
                    <p class="fh-class__meta">50 min / Coach-led</p>
                    <h3 class="fh-class__title">Strength Circuit</h3>
                    <p class="fh-class__text">Compound lifts and stations to build full-body strength.</p>
                    <a href="/onboarding?flow=class" class="fh-link">Book class <svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></a>
                </article>

                <article class="fh-class">
                    <a href="/classes" class="fh-class__media"><img src="/assets/images/landing/image-spin-and-burn.png" alt="Spin and Burn class"></a>
                    <p class="fh-class__meta">40 min / Coach-led</p>
                    <h3 class="fh-class__title">Spin &amp; Burn</h3>
                    <p class="fh-class__text">Rhythm-based indoor cycling for cardio and leg endurance.</p>
                    <a href="/onboarding?flow=class" class="fh-link">Book class <svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></a>
                </article>
            </div>

            <div class="fh-center">
                <a href="/classes" class="fh-btn">
                    <span class="fh-btn__label">View full schedule</span>
                    <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                            <path d="M7 17 17 7M8 7h9v9" />
                        </svg></span>
                </a>
            </div>
        </div>
    </section>

    <!-- ─── Store ─── -->
    <section id="store" class="fh-section fh-section--grey">
        <div class="fh-container">
            <div class="fh-store">
                <div class="fh-store__intro">
                    <h2 class="fh-h2">Fuel your<br>progress</h2>
                    <p class="fh-body">Supplements, performance apparel, and gym accessories, recommended by our trainers.</p>
                    <a href="/onboarding?flow=store" class="fh-btn">
                        <span class="fh-btn__label">Shop now</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </div>
                <div class="fh-store__items">
                    <img src="/assets/images/landing/store-image-1.png" alt="Store product">
                    <img src="/assets/images/landing/store-image-2.png" alt="Store product">
                    <img src="/assets/images/landing/store-image-3.png" alt="Store product">
                </div>
            </div>
            <p class="fh-store__banner">Members get <strong>10% off</strong> every purchase, applied automatically at checkout.</p>
        </div>
    </section>

    <!-- ─── Closing CTA ─── -->
    <section id="contact" class="fh-section fh-section--dark fh-cta">
        <div class="fh-container">
            <div class="fh-cta__top">
                <h2 class="fh-h2">Start your fitness<br>journey today</h2>
                <div class="fh-cta__side">
                    <p>Walk in, meet the coaches, and start training in Anuradhapura. Book a day pass or call us to sign up.</p>
                    <a href="/personal-details" class="fh-btn">
                        <span class="fh-btn__label">Join now</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </div>
            </div>

            <div class="fh-cta__bottom">
                <div class="fh-contact">
                    <h3>Contact</h3>
                    <ul>
                        <li><svg viewBox="0 0 24 24">
                                <path d="M12 22s7-6.3 7-12a7 7 0 0 0-14 0c0 5.7 7 12 7 12z" />
                                <circle cx="12" cy="10" r="2.5" />
                            </svg>No. 2664, Anuradhapura 50000</li>
                        <li><svg viewBox="0 0 24 24">
                                <path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2" />
                            </svg><a href="tel:+94767788837">076 778 8837</a>&nbsp;(Lakmal)</li>
                        <li><svg viewBox="0 0 24 24">
                                <path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2" />
                            </svg><a href="tel:+94767777773">076 777 7773</a></li>
                        <li><svg viewBox="0 0 24 24">
                                <path d="M15 3h-2a4 4 0 0 0-4 4v3H7v4h2v7h4v-7h2.5l.5-4h-3V7a1 1 0 0 1 1-1h2z" />
                            </svg><a href="https://www.facebook.com/p/The-Fitness-HUB-100050345780505/" target="_blank" rel="noopener">The Fitness HUB on Facebook</a></li>
                    </ul>
                </div>

                <div class="fh-hours">
                    <h3>Opening hours</h3>
                    <!-- TODO: confirm opening hours with the gym -->
                    <dl>
                        <div>
                            <dt>Monday – Friday</dt>
                            <dd>5:30 AM – 10:00 PM</dd>
                        </div>
                        <div>
                            <dt>Saturday</dt>
                            <dd>6:00 AM – 8:00 PM</dd>
                        </div>
                        <div>
                            <dt>Sunday</dt>
                            <dd>7:00 AM – 6:00 PM</dd>
                        </div>
                        <div>
                            <dt>Public holidays</dt>
                            <dd>8:00 AM – 4:00 PM</dd>
                        </div>
                    </dl>
                    <a href="https://maps.google.com/?q=8.3117,80.40371" target="_blank" rel="noopener" class="fh-btn fh-btn--block">
                        <span class="fh-btn__label">View location</span>
                        <span class="fh-btn__icon" aria-hidden="true"><svg viewBox="0 0 24 24">
                                <path d="M7 17 17 7M8 7h9v9" />
                            </svg></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>