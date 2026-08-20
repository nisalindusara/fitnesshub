<section class="hero-section">
    <div class="container hero-content">
        <a href="/" class="back-btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
            Back to Home
        </a>
        <span class="subtitle">Get In Touch</span>
        <h1 class="hero-title">Contact Us</h1>
        <p class="hero-desc">Have a question about membership, classes, or training? We'd love to hear from you.</p>
    </div>
</section>

<!-- Main Content -->
<main class="main-content">

    <!-- Left Column (Info) -->
    <div class="info-col">
        <h2 class="section-title">Find Us</h2>
        <div class="info-list">
            <div class="info-item">
                <div class="info-label">Address</div>
                <div class="info-text">No. 2664, Anuradhapura, Sri Lanka</div>
            </div>
            <div class="info-item">
                <div class="info-label">Phone</div>
                <div class="info-text">+94 11 234 5678</div>
            </div>
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-text">info@fitnesshub.lk</div>
            </div>
        </div>

        <div class="hours-section">
            <h2 class="section-title">Opening Hours</h2>
            <div class="hours-row">
                <span class="hours-day">Monday – Friday</span>
                <span class="hours-time">5:30 AM – 10:00 PM</span>
            </div>
            <div class="hours-row">
                <span class="hours-day">Saturday</span>
                <span class="hours-time">6:00 AM – 8:00 PM</span>
            </div>
            <div class="hours-row">
                <span class="hours-day">Sunday</span>
                <span class="hours-time">7:00 AM – 6:00 PM</span>
            </div>
            <div class="hours-row">
                <span class="hours-day">Public Holidays</span>
                <span class="hours-time">8:00 AM – 4:00 PM</span>
            </div>
        </div>

        <div class="social-section">
            <h2 class="section-title">Follow Us</h2>
            <div class="social-links">
                <a href="#" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                    </svg>
                </a>
                <a href="#" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                    </svg>
                </a>
                <a href="#" class="social-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Right Column (Form) -->
    <div class="form-col">
        <h2 class="form-title">Send Us A Message</h2>

        <form action="/contact-submit" method="POST" class="form-grid">
            <div class="form-group">
                <label class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control" placeholder="Kasun Perera" required>
            </div>
            <div class="form-group">
                <label class="form-label">Phone</label>
                <input type="tel" name="phone" class="form-control" placeholder="+94 77 123 4567">
            </div>

            <div class="form-group full-width">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>

            <div class="form-group full-width">
                <label class="form-label">Subject</label>
                <select name="subject" class="form-control" required>
                    <option value="" disabled selected>Select a subject...</option>
                    <option value="membership">Membership Inquiry</option>
                    <option value="classes">Classes & Schedule</option>
                    <option value="training">Personal Training</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group full-width">
                <label class="form-label">Message</label>
                <textarea name="message" class="form-control" placeholder="Tell us how we can help you..." required></textarea>
            </div>

            <div class="form-group full-width">
                <button type="submit" class="submit-btn">
                    Send Message
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</main>

<!-- Map Section -->
<section class="map-wrapper">
    <div class="container">
        <h2 class="section-title">Find Us On The Map</h2>
        <div class="map-box">
            <svg class="map-pin" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
            </svg>
            <div class="map-title">No. 2664, Anuradhapura</div>
            <div class="map-subtitle">Sri Lanka</div>
        </div>
    </div>
</section>

<style>
    /* --- Base & Reset --- */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Barlow', sans-serif;
        background-color: #FFFFFF;
        color: #0A0A0A;
        line-height: 1.5;
    }

    .container {
        width: 100%;
        max-width: 1166px;
        margin: 0 auto;
        padding: 0 32px;
    }

    /* --- Hero Section --- */
    .hero-section {
        position: relative;
        height: 425px;
        background-color: #0A0A0A;
        /* Placeholder gradient, replace url() with your actual gym image */
        background-image: linear-gradient(90deg, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.5) 100%), url('/assets/images/landing/contact_hero.png');
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .hero-content {
        padding-top: 64px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        margin-bottom: 32px;
        transition: color 0.2s;
    }

    .back-btn:hover {
        color: #FFFFFF;
    }

    .subtitle {
        color: #E31837;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 3.6px;
        text-transform: uppercase;
        margin-bottom: 12px;
        display: block;
    }

    .hero-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 70px;
        line-height: 0.9;
        letter-spacing: -1.75px;
        text-transform: uppercase;
        color: #FFFFFF;
        margin-bottom: 16px;
    }

    .hero-desc {
        color: rgba(255, 255, 255, 0.5);
        font-size: 16px;
        max-width: 512px;
    }

    /* --- Main Content Area --- */
    .main-content {
        display: flex;
        gap: 96px;
        padding: 80px 32px;
        max-width: 1166px;
        margin: 0 auto;
        flex-wrap: wrap;
    }

    /* --- Left Column: Info --- */
    .info-col {
        flex: 1;
        min-width: 300px;
        max-width: 400px;
    }

    .section-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 18px;
        text-transform: uppercase;
        letter-spacing: -0.45px;
        margin-bottom: 20px;
    }

    .info-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .info-item {
        display: flex;
        gap: 16px;
    }

    .info-label {
        width: 64px;
        color: #E31837;
        font-weight: 900;
        font-size: 12px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding-top: 2px;
    }

    .info-text {
        color: #4A5565;
        font-size: 14px;
        font-weight: 500;
    }

    .hours-section {
        margin-top: 40px;
        padding-top: 40px;
        border-top: 1px solid #F3F4F6;
    }

    .hours-row {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #F3F4F6;
    }

    .hours-day {
        color: #99A1AF;
        font-size: 14px;
        font-weight: 500;
    }

    .hours-time {
        color: #0A0A0A;
        font-size: 14px;
        font-weight: 700;
    }

    .social-section {
        margin-top: 40px;
        padding-top: 40px;
    }

    .social-links {
        display: flex;
        gap: 12px;
        margin-top: 16px;
    }

    .social-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 40px;
        height: 40px;
        border: 1px solid #E5E7EB;
        color: #99A1AF;
        transition: all 0.2s;
    }

    .social-btn:hover {
        border-color: #0A0A0A;
        color: #0A0A0A;
    }

    /* --- Right Column: Form --- */
    .form-col {
        flex: 1.5;
        min-width: 320px;
    }

    .form-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 24px;
        text-transform: uppercase;
        letter-spacing: -0.6px;
        margin-bottom: 24px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 16px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        color: #99A1AF;
        font-weight: 700;
        font-size: 12px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        background: #FFFFFF;
        border: 1px solid #E5E7EB;
        font-family: 'Barlow', sans-serif;
        font-size: 14px;
        font-weight: 500;
        color: #0A0A0A;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-control::placeholder {
        color: #D1D5DC;
    }

    .form-control:focus {
        border-color: #E31837;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 130px;
    }

    .submit-btn {
        margin-top: 20px;
        width: 100%;
        padding: 16px 0;
        background: #E31837;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        border: none;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        transition: background 0.2s;
    }

    .submit-btn:hover {
        background: #c21430;
    }

    /* --- Map Section --- */
    .map-wrapper {
        background: #F9FAFB;
        border-top: 1px solid #F3F4F6;
        padding: 80px 0;
    }

    .map-box {
        margin-top: 24px;
        height: 288px;
        background: #E5E7EB;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .map-pin {
        color: #E31837;
        margin-bottom: 12px;
    }

    .map-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 20px;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .map-subtitle {
        color: #99A1AF;
        font-size: 14px;
    }
</style>