<?php
// Default home page view for FitnessHub
?>

<!-- ─── Hero Carousel ─── -->
<section id="home" style="position: relative; width: 100%; min-height: calc(100vh - var(--nav-height)); display: flex; align-items: flex-end; background-color: #0a0a0a; overflow: hidden;">
    <!-- Background Slides -->
    <div id="hero-slider" style="position: absolute; inset: 0; transition: opacity 0.5s ease-in-out;">
        <!-- Slide 1 -->
        <div class="hero-slide active" style="position: absolute; inset: 0; opacity: 1; transition: opacity 0.5s;" data-index="0">
            <img src="https://images.unsplash.com/photo-1540497077202-7c8a3999166f?q=80&w=1440&h=900" alt="Built For Your Best Self" style="width: 100%; height: 100%; object-fit: cover; object-position: center;" />
            <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.9), rgba(0,0,0,0.6), rgba(0,0,0,0.2));"></div>
            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent, rgba(0,0,0,0.3));"></div>
        </div>
        <!-- Slide 2 -->
        <div class="hero-slide" style="position: absolute; inset: 0; opacity: 0; transition: opacity 0.5s;" data-index="1">
            <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=1440&h=900" alt="Featured Class" style="width: 100%; height: 100%; object-fit: cover; object-position: top;" />
            <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.9), rgba(0,0,0,0.6), rgba(0,0,0,0.2));"></div>
            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent, rgba(0,0,0,0.3));"></div>
        </div>
    </div>

    <!-- Content -->
    <div style="position: relative; z-index: 10; width: 100%; max-width: 1440px; margin: 0 auto; padding: 0 2rem; padding-bottom: 6rem;">
        <div style="max-width: 42rem; display: grid;">
            
            <!-- Slide 1 Content -->
            <div class="hero-content active" id="hero-content-0" style="grid-area: 1 / 1; pointer-events: auto; transition: all 0.5s; opacity: 1; transform: translateY(0);">
                <h1 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(3.5rem, 8vw, 7rem); font-weight: 900; text-transform: uppercase; line-height: 0.9; letter-spacing: -0.02em; color: white; margin-top: 0; margin-bottom: 1.5rem;">
                    <span style="display: block;">The Gym</span>
                    <span style="display: block;">That Runs</span>
                    <span style="display: block; color: #E31837;">Itself</span>
                </h1>
                <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.125rem; font-weight: 500; margin-bottom: 2.5rem; max-width: 28rem; line-height: 1.625;">
                    Experience Sri Lanka's premiere automated fitness facility. Book classes, track workouts, and manage your membership completely on your terms.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="/onboarding?flow=membership" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                        Claim Offer
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </a>
                    <a href="#membership" style="font-family: 'Barlow', sans-serif; border: 2px solid white; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';">
                        View All Plans
                    </a>
                </div>
            </div>

            <!-- Slide 2 Content -->
            <div class="hero-content" id="hero-content-1" style="grid-area: 1 / 1; pointer-events: none; transition: all 0.5s; opacity: 0; transform: translateY(1rem);">
            
                <h1 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(3.5rem, 8vw, 7rem); font-weight: 900; text-transform: uppercase; line-height: 0.9; letter-spacing: -0.02em; color: white; margin-top: 0; margin-bottom: 1.5rem;">
                    <span style="display: block;">Push Your</span>
                    <span style="display: block; color: #E31837;">Limits With</span>
                    <span style="display: block;">HIIT Blast</span>
                </h1>
                <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.7); font-size: 1.125rem; font-weight: 500; margin-bottom: 2.5rem; max-width: 28rem; line-height: 1.625;">
                    High-intensity interval training designed to maximise calorie burn and build endurance. 45 minutes. Full effort. Real results.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    <a href="/onboarding?flow=class" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                        Book a Class
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </a>
                    <a href="/classes" style="font-family: 'Barlow', sans-serif; border: 2px solid white; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: all 0.2s;" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='white';">
                        View Schedule
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Controls & Progress -->
    <div>
        <button onclick="nextHeroSlide(-1)" style="position: absolute; left: 1.5rem; top: 50%; transform: translateY(-50%); z-index: 20; width: 3rem; height: 3rem; border: 1px solid rgba(255,255,255,0.2); background: rgba(0,0,0,0.3); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); cursor: pointer; transition: all 0.2s;" onmouseover="this.style.color='white'; this.style.borderColor='white'; this.style.background='rgba(0,0,0,0.5)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.borderColor='rgba(255,255,255,0.2)'; this.style.background='rgba(0,0,0,0.3)'">
            <svg width="20" height="20" viewBox="0 0 16 16" fill="none"><path d="M10 4l-4 4 4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /></svg>
        </button>
        <button onclick="nextHeroSlide(1)" style="position: absolute; right: 1.5rem; top: 50%; transform: translateY(-50%); z-index: 20; width: 3rem; height: 3rem; border: 1px solid rgba(255,255,255,0.2); background: rgba(0,0,0,0.3); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); cursor: pointer; transition: all 0.2s;" onmouseover="this.style.color='white'; this.style.borderColor='white'; this.style.background='rgba(0,0,0,0.5)'" onmouseout="this.style.color='rgba(255,255,255,0.6)'; this.style.borderColor='rgba(255,255,255,0.2)'; this.style.background='rgba(0,0,0,0.3)'">
            <svg width="20" height="20" viewBox="0 0 16 16" fill="none"><path d="M6 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /></svg>
        </button>

        <div style="position: absolute; bottom: 2rem; left: 50%; transform: translateX(-50%); z-index: 20; display: flex; align-items: center; gap: 1.5rem;">
            <span id="hero-current" style="font-family: 'Barlow Condensed', sans-serif; color: rgba(255,255,255,0.3); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em;">01</span>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <button class="hero-dot" onclick="setHeroSlide(0)" style="width: 2rem; height: 0.375rem; background-color: #E31837; border: none; cursor: pointer; transition: all 0.3s;"></button>
                <button class="hero-dot" onclick="setHeroSlide(1)" style="width: 0.375rem; height: 0.375rem; background-color: rgba(255,255,255,0.3); border: none; cursor: pointer; transition: all 0.3s;"></button>
            </div>
            <span style="font-family: 'Barlow Condensed', sans-serif; color: rgba(255,255,255,0.3); font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em;">02</span>
        </div>

        <div style="position: absolute; bottom: 0; left: 0; right: 0; height: 0.125rem; background-color: rgba(255,255,255,0.1);">
            <div id="hero-progress" style="height: 100%; background-color: #E31837;"></div>
        </div>
    </div>
    
    <script src="/assets/js/hero-slider.js"></script>
</section>

<!-- ─── Value Section ─── -->
<section style="background-color: white; height: calc(100vh - var(--nav-height));" id="about">
    <div style="max-width: 1440px; margin: 0; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); height: inherit;">
        <div style="position: relative; overflow: hidden;background-color: #e5e7eb; height: inherit;">
            <img src="/assets/images/landing/value_section_img.png" alt="Value Section" style="width: 100%; height: 100%; object-fit: cover; object-position: center;" />
        </div>
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; background-color: white; height: inherit;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 1rem; margin-top: 0;">
                One Platform, Total Control
            </p>
            <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; color: #0a0a0a; line-height: 0.95; letter-spacing: -0.02em; margin-bottom: 1.5rem; margin-top: 0;">
                <span style="display: block;">Everything Your</span>
                <span style="display: block;">Fitness Journey</span>
                <span style="display: block;">Needs</span>
            </h2>
            <p style="font-family: 'Barlow', sans-serif; color: #4b5563; font-size: 1rem; line-height: 1.625; margin-bottom: 1.5rem; max-width: 24rem;">
                From tracking every rep to booking your next class, FitnessHub brings workout logging, class scheduling, and personal coaching under one roof — built for Sri Lankan gyms.
            </p>
            <ul style="list-style: none; padding: 0; margin: 0; margin-bottom: 2.5rem; font-family: 'Barlow', sans-serif; display: flex; flex-direction: column; gap: 0.75rem;">
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151; font-weight: 500;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E31837" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 0.125rem;"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Smart workout tracking with progress analytics
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151; font-weight: 500;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E31837" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 0.125rem;"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Live class booking & schedule management
                </li>
                <li style="display: flex; align-items: flex-start; gap: 0.75rem; font-size: 0.875rem; color: #374151; font-weight: 500;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#E31837" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 0.125rem;"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    Direct access to certified personal coaches
                </li>
            </ul>
            <a href="#programs" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                Learn More
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- ─── Programs Accordion ─── -->
<section id="programs" style="background-color: #0a0a0a; padding: 6rem 0;">
    <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
        <div style="text-align: center; margin-bottom: 4rem;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 1rem; margin-top: 0;">
                What We Offer
            </p>
            <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 900; text-transform: uppercase; color: white; line-height: 0.92; letter-spacing: -0.02em; margin: 0;">
                Programs Designed For<br />Real Progress
            </h2>
        </div>

        <div style="max-width: 56rem; margin: 0 auto;">
            
            <!-- Accordion Item 1 -->
            <div style="border-top: 1px solid rgba(255,255,255,0.1);">
                <button onclick="toggleAccordion('program-1')" style="width: 100%; display: flex; align-items: center; gap: 1.5rem; padding: 1.5rem 0; background: none; border: none; text-align: left; cursor: pointer;" class="accordion-btn">
                    <span style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; width: 2rem; flex-shrink: 0;">01</span>
                    <span style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(1.25rem, 3vw, 1.5rem); font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: white; flex: 1;">Personal Training</span>
                    <span style="color: rgba(255,255,255,0.4);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                </button>
                <div id="program-1" class="accordion-content" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; padding-bottom: 2.5rem;">
                    <div>
                        <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.6); font-size: 1rem; line-height: 1.625; margin-bottom: 2rem;">
                            One-on-one sessions with SLAF-certified trainers. Tailored programming built around your goals, schedule, and current fitness level.
                        </p>
                        <a href="#membership" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.75rem 1.5rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                            Start Now
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                    </div>
                    <div style="position: relative; overflow: hidden; background-color: #111827; aspect-ratio: 4/3;">
                        <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=600&h=450" alt="Personal Training" style="width: 100%; height: 100%; object-fit: cover;" />
                    </div>
                </div>
            </div>

            <!-- Accordion Item 2 -->
            <div style="border-top: 1px solid rgba(255,255,255,0.1);">
                <button onclick="toggleAccordion('program-2')" style="width: 100%; display: flex; align-items: center; gap: 1.5rem; padding: 1.5rem 0; background: none; border: none; text-align: left; cursor: pointer;" class="accordion-btn">
                    <span style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; width: 2rem; flex-shrink: 0;">02</span>
                    <span style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(1.25rem, 3vw, 1.5rem); font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: rgba(255,255,255,0.6); flex: 1;">Group Classes</span>
                    <span style="color: rgba(255,255,255,0.4);"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg></span>
                </button>
                <div id="program-2" class="accordion-content" style="display: none; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; padding-bottom: 2.5rem;">
                    <div>
                        <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.6); font-size: 1rem; line-height: 1.625; margin-bottom: 2rem;">
                            High-energy sessions led by expert instructors. From beginner-friendly flows to advanced circuits — there is a class for every level.
                        </p>
                        <a href="#membership" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.75rem 1.5rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                            Start Now
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div style="border-top: 1px solid rgba(255,255,255,0.1);"></div>
        </div>
    </div>
    <script src="/assets/js/programs-accordian.js"></script>
</section>

<!-- ─── Classes Section ─── -->
<section style="background-color: white; padding: 6rem 0;">
    <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
        <div style="display: flex; flex-wrap: wrap; align-items: flex-end; justify-content: space-between; gap: 1.5rem; margin-bottom: 3.5rem;">
            <div>
                <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">
                    Schedule & Classes
                </p>
                <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; color: #0a0a0a; line-height: 0.93; letter-spacing: -0.02em; margin: 0;">
                    Find Your Class
                </h2>
            </div>
            <a href="/classes" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                View Schedule <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
            </a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem;">
            <!-- Class Card 1 -->
            <div style="background-color: #f5f5f5; display: flex; flex-direction: column; cursor: pointer;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 4/3; background-color: #e5e7eb;">
                    <img src="/assets/images/landing/image-hiit-blast.png" alt="HIIT Blast" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'"/>
                    <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: #E31837; color: white; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.25rem 0.625rem;">
                        High Intensity
                    </div>
                </div>
                <div style="padding: 1.25rem; display: flex; flex-direction: column; flex: 1;">
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: #0a0a0a; margin: 0 0 0.25rem 0;">HIIT Blast</h3>
                    <div style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #e5e7eb; display: flex; align-items: center; gap: 0.75rem; font-family: 'Barlow', sans-serif; font-size: 0.75rem; color: #6b7280; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;">
                        <span>⏱ 45 min</span>
                        <span style="color: #d1d5db;">|</span>
                        <span>Kasun Perera</span>
                    </div>
                </div>
            </div>

            <!-- Class Card 2 -->
            <div style="background-color: #f5f5f5; display: flex; flex-direction: column; cursor: pointer;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 4/3; background-color: #e5e7eb;">
                    <img src="/assets/images/landing/image-yoga-flow.png" alt="Yoga Flow" style="width: 100%; height: 100%; object-fit: cover;" />
                    <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: rgba(227, 24, 55, 0.9); color: white; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.25rem 0.625rem;">
                        Flexibility
                    </div>
                </div>
                <div style="padding: 1.25rem; display: flex; flex-direction: column; flex: 1;">
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: #0a0a0a; margin: 0 0 0.25rem 0;">Yoga Flow</h3>
                    <div style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #e5e7eb; display: flex; align-items: center; gap: 0.75rem; font-family: 'Barlow', sans-serif; font-size: 0.75rem; color: #6b7280; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;">
                        <span>⏱ 60 min</span>
                        <span style="color: #d1d5db;">|</span>
                        <span>Nimali Fernando</span>
                    </div>
                </div>
            </div>

            <!-- Class Card 3 -->
            <div style="background-color: #f5f5f5; display: flex; flex-direction: column; cursor: pointer;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 4/3; background-color: #e5e7eb;">
                    <img src="/assets/images/landing/image-strength-circuit.png" alt="Yoga Flow" style="width: 100%; height: 100%; object-fit: cover;" />
                    <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: rgba(227, 24, 55, 0.9); color: white; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.25rem 0.625rem;">
                        Strength
                    </div>
                </div>
                <div style="padding: 1.25rem; display: flex; flex-direction: column; flex: 1;">
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: #0a0a0a; margin: 0 0 0.25rem 0;">Strength Circuit</h3>
                    <div style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #e5e7eb; display: flex; align-items: center; gap: 0.75rem; font-family: 'Barlow', sans-serif; font-size: 0.75rem; color: #6b7280; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;">
                        <span>⏱ 50 min</span>
                        <span style="color: #d1d5db;">|</span>
                        <span>Dinesh Silva</span>
                    </div>
                </div>
            </div>

            <!-- Class Card 4 -->
            <div style="background-color: #f5f5f5; display: flex; flex-direction: column; cursor: pointer;">
                <div style="position: relative; overflow: hidden; aspect-ratio: 4/3; background-color: #e5e7eb;">
                    <img src="/assets/images/landing/image-spin-and-burn.png" alt="Yoga Flow" style="width: 100%; height: 100%; object-fit: cover;" />
                    <div style="position: absolute; top: 0.75rem; left: 0.75rem; background-color: rgba(227, 24, 55, 0.9); color: white; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 0.25rem 0.625rem;">
                        Cardio
                    </div>
                </div>
                <div style="padding: 1.25rem; display: flex; flex-direction: column; flex: 1;">
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; color: #0a0a0a; margin: 0 0 0.25rem 0;">Sping & Burn</h3>
                    <div style="margin-top: auto; padding-top: 0.75rem; border-top: 1px solid #e5e7eb; display: flex; align-items: center; gap: 0.75rem; font-family: 'Barlow', sans-serif; font-size: 0.75rem; color: #6b7280; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase;">
                        <span>⏱ 40 min</span>
                        <span style="color: #d1d5db;">|</span>
                        <span>Tharaka Jayasinghe</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ─── Testimonial Section ─── -->
<section id="testimonials" style="margin: 0; padding: 0; background-color: #E5E7EB; display: flex; justify-content: center;">
  <!-- Outer Section: 100% width of the screen -->
  <div style="font-family: 'Barlow', sans-serif; box-sizing: border-box; display: flex; justify-content: center; align-items: center; padding: 96px 0; width: 100%; background: #F5F5F5;">
    
    <!-- Inner Container: 100% width -->
    <div style="box-sizing: border-box; display: flex; width: 100%; max-width: 1440px; padding: 0 32px;">
      
      <!-- Flex Layout to replace absolute positioning -->
      <div style="display: flex; flex-direction: row; flex-wrap: wrap; justify-content: space-between; align-items: center; width: 100%; gap: 64px;">

        <!-- Left Column: Stats Container -->
        <div style="display: flex; flex-direction: column; align-items: flex-start; gap: 32px; flex: 1; min-width: 320px; max-width: 400px;">

          <!-- Stat Item: Active Members -->
          <div style="box-sizing: border-box; display: flex; flex-direction: column; align-items: flex-start; padding-left: 24px; width: 100%; border-left: 4px solid #E31837;">
            <div style="display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 4px;">
              <span style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 80px; line-height: 1; color: #0A0A0A;">500+</span>
            </div>
            <div style="display: flex; flex-direction: column; align-items: flex-start;">
              <span style="font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 14px; line-height: 20px; letter-spacing: 1.4px; text-transform: uppercase; color: #6A7282;">Active Members</span>
            </div>
          </div>

          <!-- Stat Item: Expert Trainers -->
          <div style="box-sizing: border-box; display: flex; flex-direction: column; align-items: flex-start; padding-left: 24px; width: 100%; border-left: 4px solid #E31837;">
            <div style="display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 4px;">
              <span style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 56px; line-height: 1; color: #0A0A0A;">12+</span>
            </div>
            <div style="display: flex; flex-direction: column; align-items: flex-start;">
              <span style="font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 14px; line-height: 20px; letter-spacing: 1.4px; text-transform: uppercase; color: #6A7282;">Expert Trainers</span>
            </div>
          </div>

          <!-- Stat Item: Weekly Classes -->
          <div style="box-sizing: border-box; display: flex; flex-direction: column; align-items: flex-start; padding-left: 24px; width: 100%; border-left: 4px solid #E31837;">
            <div style="display: flex; flex-direction: column; align-items: flex-start; margin-bottom: 4px;">
              <span style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 56px; line-height: 1; color: #0A0A0A;">30+</span>
            </div>
            <div style="display: flex; flex-direction: column; align-items: flex-start;">
              <span style="font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 14px; line-height: 20px; letter-spacing: 1.4px; text-transform: uppercase; color: #6A7282;">Weekly Classes</span>
            </div>
          </div>

        </div>

        <!-- Right Column: Testimonial Card -->
        <div style="box-sizing: border-box; display: flex; flex-direction: column; align-items: flex-start; padding: 56px; position: relative; background: #FFFFFF; flex: 2; min-width: 320px; box-shadow: 0px 4px 24px rgba(0,0,0,0.02);">

          <!-- Giant Background Quote (Opacity 0.2) -->
          <div style="position: absolute; left: 40px; top: -24px; opacity: 0.2; user-select: none;">
            <span style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 128px; line-height: 1; color: #E31837;">"</span>
          </div>

          <!-- Section Label -->
          <div style="display: flex; flex-direction: column; align-items: flex-start; position: relative; z-index: 1;">
            <span style="font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 12px; line-height: 16px; letter-spacing: 3.6px; text-transform: uppercase; color: #E31837;">Member Stories</span>
          </div>

          <!-- Stars Container -->
          <div style="display: flex; flex-direction: row; align-items: flex-start; padding: 16px 0 24px 0; gap: 4px; position: relative; z-index: 1;">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.7725L9 13.335L4.365 15.7725L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z" fill="#E31837"/></svg>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.7725L9 13.335L4.365 15.7725L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z" fill="#E31837"/></svg>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.7725L9 13.335L4.365 15.7725L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z" fill="#E31837"/></svg>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.7725L9 13.335L4.365 15.7725L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z" fill="#E31837"/></svg>
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1.5L11.3175 6.195L16.5 6.9525L12.75 10.605L13.635 15.7725L9 13.335L4.365 15.7725L5.25 10.605L1.5 6.9525L6.6825 6.195L9 1.5Z" fill="#E31837"/></svg>
          </div>

          <!-- Main Quote -->
          <div style="display: flex; flex-direction: column; align-items: flex-start; position: relative; z-index: 1;">
            <p style="margin: 0; font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 34.992px; line-height: 44px; letter-spacing: -0.8748px; text-transform: uppercase; color: #0A0A0A; max-width: 600px;">
              "Training here transformed my energy, strength, and overall confidence. Every session pushes me toward a better version of myself."
            </p>
          </div>

          <!-- Author Info -->
          <div style="display: flex; flex-direction: row; align-items: center; padding-top: 32px; gap: 16px; position: relative; z-index: 1;">
            
            <!-- Avatar -->
            <div style="width: 56px; height: 56px; border-radius: 50%; background-image: url('https://i.pravatar.cc/150?img=11'); background-size: cover; background-position: center; background-color: #E5E7EB;"></div>

            <!-- Name and Title -->
            <div style="display: flex; flex-direction: column; justify-content: center;">
              <span style="font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 18px; line-height: 28px; letter-spacing: 0.45px; text-transform: uppercase; color: #0A0A0A;">Ruwan Bandara</span>
              <span style="font-family: 'Barlow', sans-serif; font-weight: 600; font-size: 12px; line-height: 16px; letter-spacing: 1.2px; text-transform: uppercase; color: #6A7282;">Member since 2023 · Colombo</span>
            </div>

          </div>

        </div>

      </div>
    </div>
  </div>
</section>

<!-- ─── Membership Plans Section ─── -->
 <section id="membership-plans" style="background-color: #0A0A0A; padding-top: 6rem; padding-bottom: 6rem;">
    <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <p style="margin: 0; color: #E31837; font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase;">flexible pricing</p>
        <h1 style="margin: 0; color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 3rem; text-align: center;">Membership Options<br> made for you</h1>
    </div>
    <div  style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin: 2rem;">
        <!-- Card 1 -->
        <div style="border: 0.8px solid rgba(255, 255, 255, 0.1); padding: 2rem 3rem; display: flex; flex-direction: column; gap: 30px;">
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <h3 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 1rem; margin: 0 0 10px 0;">Day Pass</h3>
                <h2 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 2rem; margin: 0">LKR 800</h2>
                <p style="color: rgba(255, 255, 255, 0.4); text-transform: uppercase; font-family: 'Barlow', sans-serif; margin: 0;">Single Visit</p>
                <hr style="border: none; height: 2px; background-color: rgba(255, 255, 255, 0.1);">
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
            </div>
            <button style="background-color: transparent; border: 2px solid rgba(255, 255, 255, 0.1); font-family: 'Barlow', sans-serif; text-transform: uppercase; font-weight: 600; color: #fff; font-size: 0.8rem; padding: 1rem; display: flex; gap: 12px; justify-content: center; align-items: center;">Buy Pass<img src="/assets/images/Vector-rightarrow.svg" style="width: 10px; height: 8px;"></button>
        </div>

        <!-- Card 2 -->
        <div style="border: 0.8px solid rgba(255, 255, 255, 0.1); padding: 2rem 3rem; display: flex; flex-direction: column; gap: 30px;">
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <h3 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 1rem; margin: 0 0 10px 0;">1 month</h3>
                <h2 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 2rem; margin: 0">LKR 4,500</h2>
                <p style="color: rgba(255, 255, 255, 0.4); text-transform: uppercase; font-family: 'Barlow', sans-serif; margin: 0;">per month</p>
                <hr style="border: none; height: 2px; background-color: rgba(255, 255, 255, 0.1);">
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">All group Classes</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">1 PT consultation</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Locker room & towel</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
            </div>
            <button style="background-color: transparent; border: 2px solid rgba(255, 255, 255, 0.1); font-family: 'Barlow', sans-serif; text-transform: uppercase; font-weight: 600; color: #fff; font-size: 0.8rem; padding: 1rem; display: flex; gap: 12px; justify-content: center; align-items: center;">Buy Pass<img src="/assets/images/Vector-rightarrow.svg" style="width: 10px; height: 8px;"></button>
        </div>

        <!-- Card 3 -->
        <div style="border: 1.5px solid #E31837; padding: 2rem 3rem; display: flex; flex-direction: column; gap: 30px;">
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <h3 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 1rem; margin: 0 0 10px 0;">Day Pass</h3>
                <h2 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 2rem; margin: 0">LKR 800</h2>
                <p style="color: rgba(255, 255, 255, 0.4); text-transform: uppercase; font-family: 'Barlow', sans-serif; margin: 0;">Single Visit</p>
                <hr style="border: none; height: 2px; background-color: rgba(255, 255, 255, 0.1);">
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
            </div>
            <button style="background-color: #E31837; border: none; font-family: 'Barlow', sans-serif; text-transform: uppercase; font-weight: 600; color: #fff; font-size: 0.8rem; padding: 1rem; display: flex; gap: 12px; justify-content: center; align-items: center;">Buy Pass<img src="/assets/images/Vector-rightarrow.svg" style="width: 10px; height: 8px;"></button>
        </div>

        <!-- Card 4 -->
        <div style="border: 0.8px solid rgba(255, 255, 255, 0.1); padding: 2rem 3rem; display: flex; flex-direction: column; gap: 30px;">
            <div style="display: flex; flex-direction: column; gap: 5px;">
                <h3 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 1rem; margin: 0 0 10px 0;">Day Pass</h3>
                <h2 style="color: #fff; text-transform: uppercase; font-family: 'Barlow', sans-serif; font-weight: 900; font-size: 2rem; margin: 0">LKR 800</h2>
                <p style="color: rgba(255, 255, 255, 0.4); text-transform: uppercase; font-family: 'Barlow', sans-serif; margin: 0;">Single Visit</p>
                <hr style="border: none; height: 2px; background-color: rgba(255, 255, 255, 0.1);">
            </div>
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span><img src="/assets/images/icons/Vector-correct.svg" alt="Available option" style="width: 9px; height: 6px;"></span><span style="color: rgba(255, 255, 255, 0.7); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
                <div style="display: flex; gap: 12px;"><span style="display: flex; align-items: center;"><div style="width: 12px; height: 1px; background-color: rgba(255, 255, 255, 0.4); display: inline-block;"></div></span><span style="color: rgba(255, 255, 255, 0.4); font-family: 'Barlow', sans-serif; font-weight: 500; font-size: 14px;">Full Gym floor access</span></div>
            </div>
            <button style="background-color: transparent; border: 2px solid rgba(255, 255, 255, 0.1); font-family: 'Barlow', sans-serif; text-transform: uppercase; font-weight: 600; color: #fff; font-size: 0.8rem; padding: 1rem; display: flex; gap: 12px; justify-content: center; align-items: center;">Buy Pass<img src="/assets/images/icons/Vector-rightarrow.svg" style="width: 10px; height: 8px;"></button>
        </div>

      
    </div>
 </section>

<!-- ─── Store Teaser ─── -->
<section id="store" style="background-color: white; padding: 6rem 0; border-top: 1px solid #f3f4f6;">
    <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 3rem; align-items: center;">
            <div>
                <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 1rem; margin-top: 0;">
                    FitnessHub Store
                </p>
                <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; text-transform: uppercase; color: #0a0a0a; line-height: 0.92; letter-spacing: -0.02em; margin-bottom: 1.5rem; margin-top: 0;">
                    <span style="display: block;">Fuel Your</span>
                    <span style="display: block;">Progress</span>
                </h2>
                <p style="font-family: 'Barlow', sans-serif; color: #4b5563; font-size: 1rem; line-height: 1.625; margin-bottom: 2rem; max-width: 24rem;">
                    Quality supplements, performance apparel, and gym accessories — sourced and recommended by our trainers. Member discount included.
                </p>
                <a href="/onboarding?flow=store" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                    Shop Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </a>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem;">
                <div style="background-color: #f3f4f6; aspect-ratio: 1; overflow: hidden; border: 1px solid #e5e7eb;">
                   <img src="/assets/images/landing/store-image-1.png" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="background-color: #f3f4f6; aspect-ratio: 1; overflow: hidden; border: 1px solid #e5e7eb;">
                   <img src="/assets/images/landing/store-image-2.png" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="background-color: #f3f4f6; aspect-ratio: 1; overflow: hidden; border: 1px solid #e5e7eb;">
                   <img src="/assets/images/landing/store-image-3.png" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background-color: #0a0a0a; padding: 1.5rem 2.5rem; display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 1rem;">
            <p style="font-family: 'Barlow Condensed', sans-serif; color: white; font-size: 1.25rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.025em; margin: 0;">
                Members get <span style="color: #E31837;">10% off</span> every purchase — automatically applied at checkout
            </p>
        </div>
    </div>
</section>

<!-- ─── Closing CTA ─── -->
<section style="background-color: #0a0a0a; padding: 6rem 0; border-top: 1px solid rgba(255,255,255,0.1);">
    <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(360px, 1fr)); gap: 4rem; align-items: flex-start;">
            
            <div>
                <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 1rem; margin-top: 0;">
                    Ready to Train?
                </p>
                <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(3rem, 6vw, 5rem); font-weight: 900; text-transform: uppercase; color: white; line-height: 0.88; letter-spacing: -0.02em; margin-bottom: 2rem; margin-top: 0;">
                    <span style="display: block;">Start Your Fitness</span>
                    <span style="display: block;">Journey Today</span>
                </h2>
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(0.8rem, 1.2vw, 1.5rem); color:rgba(255, 255, 255, 0.5);">
                    Walk in, sign up, and begin training with Sri Lanka's<br> most complete gym management system behind you.
                </p>
                <a href="#membership" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2.5rem; font-size: 0.875rem; display: inline-flex; align-items: center; justify-content: center; gap: 0.75rem; text-decoration: none;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                    Visit Us <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </a>
                <div style="margin-top: 40px;">
                    <p style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(0.8rem, 1.2vw, 1.5rem); display:flex; gap: 2rem;"><span style="color: #E31837; text-transform: uppercase;">Address</span><span style=" color: rgba(255, 255, 255, 0.5);">45 Galle Road, Colombo 03, Sri Lanka</span></p>
                    <p style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(0.8rem, 1.2vw, 1.5rem); display: flex; gap: 2rem;"><span style="color: #E31837; text-transform: uppercase;">Phone</span><span style=" color: rgba(255, 255, 255, 0.5);">+94 11 234 5678</span></p>
                    <p style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(0.8rem, 1.2vw, 1.5rem); display: flex; gap: 2rem;"><span style="color: #E31837; text-transform: uppercase;">Email</span><span style=" color: rgba(255, 255, 255, 0.5);">info@fitnesshub.lk</span></p>
                </div>
            </div>

            <div style="border: 1px solid rgba(255,255,255,0.1); padding: 2.5rem;">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.125rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.1em; color: white; margin-bottom: 2rem; margin-top: 0;">
                    Opening Hours
                </p>
                <div style="font-family: 'Barlow', sans-serif;">
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <span style="font-size: 0.875rem; color: rgba(255,255,255,0.5); font-weight: 500;">Monday – Friday</span>
                        <span style="font-size: 0.875rem; color: white; font-weight: 700; letter-spacing: 0.025em;">5:30 AM – 10:00 PM</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <span style="font-size: 0.875rem; color: rgba(255,255,255,0.5); font-weight: 500;">Saturday</span>
                        <span style="font-size: 0.875rem; color: white; font-weight: 700; letter-spacing: 0.025em;">6:00 AM – 8:00 PM</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <span style="font-size: 0.875rem; color: rgba(255,255,255,0.5); font-weight: 500;">Sunday</span>
                        <span style="font-size: 0.875rem; color: white; font-weight: 700; letter-spacing: 0.025em;">7:00 AM – 6:00 PM</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 0.75rem 0; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <span style="font-size: 0.875rem; color: rgba(255,255,255,0.5); font-weight: 500;">Public Holidays</span>
                        <span style="font-size: 0.875rem; color: white; font-weight: 700; letter-spacing: 0.025em;">8:00 AM – 4:00 PM</span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>