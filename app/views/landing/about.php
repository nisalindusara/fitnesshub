<?php
// Default about page view for FitnessHub
?>

<div style="min-height: 100vh; background-color: white;">
    <!-- Hero -->
    <div style="position: relative; background-color: #0a0a0a; padding-top: 4rem;">
        <div style="position: absolute; inset: 0; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?q=80&w=1440&h=500" alt="Gym interior" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.25;" />
            <div style="position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.8), rgba(0,0,0,0.4));"></div>
        </div>
        <div style="position: relative; z-index: 10; max-width: 1440px; margin: 0 auto; padding: 5rem 2rem;">
            <a href="/" style="font-family: 'Barlow', sans-serif; display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.5); font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; text-decoration: none; margin-bottom: 2rem; transition: color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M13 8H3M7 12l-4-4 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /></svg>
                Back to Home
            </a>
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">
                Who We Are
            </p>
            <h1 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(3rem, 6vw, 5.5rem); font-weight: 900; text-transform: uppercase; color: white; line-height: 0.88; letter-spacing: -0.02em; margin-bottom: 1rem; margin-top: 0;">
                <span style="display: block;">The Fitness Hub</span>
                <span style="display: block;">Anuradhapura</span>
            </h1>
            <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.5); font-size: 1rem; max-width: 36rem; line-height: 1.625; margin: 0;">
                Located at No. 2664, Anuradhapura — a welcoming gym dedicated to helping every member reach their fitness goals.
            </p>
        </div>
    </div>

    <!-- Story section -->
    <div style="max-width: 1440px; height: calc(100vh - var(--nav-height)); margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 4rem; align-items: stretch; box-sizing: border-box; padding: 2rem 1rem;">
        <!-- Text Column -->
        <div style="display: flex; flex-direction: column; justify-content: center; min-height: 0;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 1rem; margin-top: 0;">Our Story</p>
            <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; color: #0a0a0a; line-height: 0.93; letter-spacing: -0.02em; margin-bottom: 1.5rem; margin-top: 0;">
                <span style="display: block;">Built For Every</span>
                <span style="display: block;">Body In Anuradhapura</span>
            </h2>
            <div style="font-family: 'Barlow', sans-serif; color: #4b5563; font-size: 1rem; line-height: 1.625; display: flex; flex-direction: column; gap: 1rem;">
                <p style="margin: 0;">The Fitness Hub Anuradhapura was founded with a single mission: to make high-quality fitness accessible to everyone in our community — regardless of experience, age, or background.</p>
                <p style="margin: 0;">With a team of experienced and friendly coaches, the gym provides personalized guidance and support to ensure every workout is effective and enjoyable. Whether you're stepping into a gym for the first time or pushing toward your next personal best, our coaches meet you exactly where you are.</p>
                <p style="margin: 0;">We offer a full range of services tailored to meet your needs — from one-on-one personal training to high-energy group classes — making The Fitness Hub the perfect place to achieve your health and fitness aspirations.</p>
            </div>
            <div style="margin-top: 2.5rem; display: flex; flex-wrap: wrap; gap: 1rem;">
                <a href="/onboarding?flow=get-started" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                    Join Us <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </a>
                <a href="/contact" style="font-family: 'Barlow', sans-serif; border: 1px solid #d1d5db; color: #0a0a0a; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: border-color 0.2s;" onmouseover="this.style.borderColor='#0a0a0a'" onmouseout="this.style.borderColor='#d1d5db'">
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Image Column -->
        <div style="position: relative; width: 100%; height: 100%; min-height: 0;">
            <div style="position: relative; overflow: hidden; background-color: #f3f4f6; width: 100%; height: 100%;">
                <img src="/assets/images/landing/value_section_img.png" alt="Training at The Fitness Hub" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" />
            </div>
            <div style="position: absolute; bottom: -1.5rem; left: -1.5rem; background-color: #E31837; color: white; padding: 1.5rem; width: 11rem; z-index: 10;">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 2.25rem; font-weight: 900; line-height: 1; margin: 0;">No. 2664</p>
                <p style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0.25rem 0 0 0; opacity: 0.8;">Anuradhapura</p>
            </div>
        </div>
    </div>

    <!-- Stats bar -->
    <div style="background-color: #0a0a0a; padding: 3.5rem 0;">
        <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem; display: flex; flex-wrap: wrap; justify-content: space-around; gap: 2rem;">
            <div style="text-align: center; flex: 1; border-right: 1px solid rgba(255,255,255,0.1);">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 3.5rem; font-weight: 900; color: white; line-height: 1; margin: 0;">500+</p>
                <p style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin: 0.5rem 0 0 0;">Active Members</p>
            </div>
            <div style="text-align: center; flex: 1; border-right: 1px solid rgba(255,255,255,0.1);">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 3.5rem; font-weight: 900; color: white; line-height: 1; margin: 0;">12+</p>
                <p style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin: 0.5rem 0 0 0;">Certified Coaches</p>
            </div>
            <div style="text-align: center; flex: 1; border-right: 1px solid rgba(255,255,255,0.1);">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 3.5rem; font-weight: 900; color: white; line-height: 1; margin: 0;">30+</p>
                <p style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin: 0.5rem 0 0 0;">Weekly Classes</p>
            </div>
            <div style="text-align: center; flex: 1;">
                <p style="font-family: 'Barlow Condensed', sans-serif; font-size: 3.5rem; font-weight: 900; color: white; line-height: 1; margin: 0;">5★</p>
                <p style="font-family: 'Barlow', sans-serif; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; color: rgba(255,255,255,0.4); margin: 0.5rem 0 0 0;">Member Rating</p>
            </div>
        </div>
    </div>

    <!-- Values -->
    <div style="max-width: 1440px; margin: 0 auto; padding: 5rem 2rem;">
        <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">What Drives Us</p>
        <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; color: #0a0a0a; line-height: 0.93; letter-spacing: -0.02em; margin-bottom: 3rem; margin-top: 0;">
            Our Values
        </h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); border-left: 1px solid #f3f4f6; border-top: 1px solid #f3f4f6;">
            <!-- Value 1 -->
            <div style="padding: 2rem; border-right: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                <p style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 0.75rem; margin-top: 0;">01</p>
                <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.5rem; font-weight: 900; text-transform: uppercase; color: #0a0a0a; letter-spacing: -0.02em; margin-bottom: 0.75rem; margin-top: 0;">Personalized Guidance</h3>
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.875rem; line-height: 1.625; margin: 0;">Every member receives individual attention and programming tailored to their current fitness level and goals — beginner or elite.</p>
            </div>
            <!-- Value 2 -->
            <div style="padding: 2rem; border-right: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                <p style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 0.75rem; margin-top: 0;">02</p>
                <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.5rem; font-weight: 900; text-transform: uppercase; color: #0a0a0a; letter-spacing: -0.02em; margin-bottom: 0.75rem; margin-top: 0;">Inclusive Community</h3>
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.875rem; line-height: 1.625; margin: 0;">We have built a space free of intimidation, where everyone cheers for everyone else’s progress. We are an inclusive community.</p>
            </div>
            <!-- Value 3 -->
            <div style="padding: 2rem; border-right: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                <p style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 0.75rem; margin-top: 0;">03</p>
                <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.5rem; font-weight: 900; text-transform: uppercase; color: #0a0a0a; letter-spacing: -0.02em; margin-bottom: 0.75rem; margin-top: 0;">Expertise Driven</h3>
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.875rem; line-height: 1.625; margin: 0;">Our coaches continuously train and educate themselves to offer the latest, safest, and most effective programming possible.</p>
            </div>
            <!-- Value 4 -->
            <div style="padding: 2rem; border-right: 1px solid #f3f4f6; border-bottom: 1px solid #f3f4f6; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='transparent'">
                <p style="font-family: 'Barlow Condensed', sans-serif; color: #E31837; font-size: 0.875rem; font-weight: 700; letter-spacing: 0.1em; margin-bottom: 0.75rem; margin-top: 0;">04</p>
                <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.5rem; font-weight: 900; text-transform: uppercase; color: #0a0a0a; letter-spacing: -0.02em; margin-bottom: 0.75rem; margin-top: 0;">Results You Can Measure</h3>
                <p style="font-family: 'Barlow', sans-serif; color: #6b7280; font-size: 0.875rem; line-height: 1.625; margin: 0;">We track progress, adjust programming, and celebrate every milestone — because your results are the truest measure of our work.</p>
            </div>
        </div>
    </div>

    <!-- Coaches -->
    <div style="background-color: #0a0a0a; padding: 5rem 0;">
        <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem;">
            <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.3em; text-transform: uppercase; margin-bottom: 0.75rem; margin-top: 0;">The Team</p>
            <h2 style="font-family: 'Barlow Condensed', sans-serif; font-size: clamp(2rem, 4vw, 3.5rem); font-weight: 900; text-transform: uppercase; color: white; line-height: 0.93; letter-spacing: -0.02em; margin-bottom: 3rem; margin-top: 0;">
                Experienced &amp; Friendly Coaches
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem;">
                
                <!-- Coach 1 -->
                <div>
                    <div style="position: relative; overflow: hidden; aspect-ratio: 3/4; background-color: #111827; margin-bottom: 1.25rem;">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?q=80&w=400&h=533" alt="Kasun Perera" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7; transition: all 0.5s;" onmouseover="this.style.opacity='0.9'; this.style.transform='scale(1.05)'" onmouseout="this.style.opacity='0.7'; this.style.transform='scale(1)'" />
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); pointer-events: none;"></div>
                    </div>
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; text-transform: uppercase; color: white; letter-spacing: -0.02em; margin: 0;">Kasun Perera</h3>
                    <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0.25rem 0 0.5rem 0;">Head Coach</p>
                    <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; line-height: 1.625; margin: 0;">SLAF Certified with 8 years of experience. Specializes in strength programming and body transformation.</p>
                </div>
                
                <!-- Coach 2 -->
                <div>
                    <div style="position: relative; overflow: hidden; aspect-ratio: 3/4; background-color: #111827; margin-bottom: 1.25rem;">
                        <img src="https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=400&h=533" alt="Nimali Fernando" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7; transition: all 0.5s;" onmouseover="this.style.opacity='0.9'; this.style.transform='scale(1.05)'" onmouseout="this.style.opacity='0.7'; this.style.transform='scale(1)'" />
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); pointer-events: none;"></div>
                    </div>
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; text-transform: uppercase; color: white; letter-spacing: -0.02em; margin: 0;">Nimali Fernando</h3>
                    <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0.25rem 0 0.5rem 0;">Yoga & Movement Coach</p>
                    <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; line-height: 1.625; margin: 0;">Focused on mobility, recovery, and holistic well-being. Teaches all levels.</p>
                </div>

                <!-- Coach 3 -->
                <div>
                    <div style="position: relative; overflow: hidden; aspect-ratio: 3/4; background-color: #111827; margin-bottom: 1.25rem;">
                        <img src="https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=400&h=533" alt="Nimali Fernando" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7; transition: all 0.5s;" onmouseover="this.style.opacity='0.9'; this.style.transform='scale(1.05)'" onmouseout="this.style.opacity='0.7'; this.style.transform='scale(1)'" />
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); pointer-events: none;"></div>
                    </div>
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; text-transform: uppercase; color: white; letter-spacing: -0.02em; margin: 0;">Nimali Fernando</h3>
                    <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0.25rem 0 0.5rem 0;">Yoga & Movement Coach</p>
                    <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; line-height: 1.625; margin: 0;">Focused on mobility, recovery, and holistic well-being. Teaches all levels.</p>
                </div>

                <!-- Coach 4 -->
                <div>
                    <div style="position: relative; overflow: hidden; aspect-ratio: 3/4; background-color: #111827; margin-bottom: 1.25rem;">
                        <img src="https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?q=80&w=400&h=533" alt="Nimali Fernando" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.7; transition: all 0.5s;" onmouseover="this.style.opacity='0.9'; this.style.transform='scale(1.05)'" onmouseout="this.style.opacity='0.7'; this.style.transform='scale(1)'" />
                        <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); pointer-events: none;"></div>
                    </div>
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.25rem; font-weight: 900; text-transform: uppercase; color: white; letter-spacing: -0.02em; margin: 0;">Nimali Fernando</h3>
                    <p style="font-family: 'Barlow', sans-serif; color: #E31837; font-size: 0.75rem; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; margin: 0.25rem 0 0.5rem 0;">Yoga & Movement Coach</p>
                    <p style="font-family: 'Barlow', sans-serif; color: rgba(255,255,255,0.4); font-size: 0.875rem; line-height: 1.625; margin: 0;">Focused on mobility, recovery, and holistic well-being. Teaches all levels.</p>
                </div>

            </div>
        </div>
    </div>

    <!-- CTA -->
    <div style="background-color: white; padding: 4rem 0; border-top: 1px solid #f3f4f6;">
        <div style="max-width: 1440px; margin: 0 auto; padding: 0 2rem; display: flex; align-items: center; justify-content: space-between; gap: 1.5rem;">
            <div>
                <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size: 1.875rem; font-weight: 900; text-transform: uppercase; color: #0a0a0a; margin: 0 0 0.25rem 0; letter-spacing: -0.02em;">
                    Ready to train with us?
                </h3>
                <p style="font-family: 'Barlow', sans-serif; color: #9ca3af; font-size: 0.875rem; margin: 0;">
                    Visit us at No. 2664, Anuradhapura or get in touch with our team today.
                </p>
            </div>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                <a href="/contact" style="font-family: 'Barlow', sans-serif; border: 1px solid #d1d5db; color: #0a0a0a; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; text-decoration: none; transition: border-color 0.2s;" onmouseover="this.style.borderColor='#0a0a0a'" onmouseout="this.style.borderColor='#d1d5db'">
                    Contact Us
                </a>
                <a href="/onboarding?flow=get-started" style="font-family: 'Barlow', sans-serif; background-color: #E31837; color: white; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; padding: 1rem 2rem; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#c21430'" onmouseout="this.style.backgroundColor='#E31837'">
                    Join Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                </a>
            </div>
        </div>
    </div>
</div>
