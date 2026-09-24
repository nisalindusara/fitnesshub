<style>
 /* Container & Base Styles */
#page-container {
  box-sizing: border-box;
  width: 100%;
  min-height: 100vh;
  background-color: #dddddd;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  display: flex;
  flex-direction: column;
}

/* Header & Navigation */
.top-nav {
  box-sizing: border-box;
  width: 100%;
  height: 70px;
  background-color: #ffffff;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 40px;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.nav-left {
  display: flex;
  align-items: center;
}

.brand-logo {
  width: 48px;
  height: 48px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.logo-svg {
  width: 100%;
  height: 100%;
}

.nav-right {
  display: flex;
  align-items: center;
  gap: 14px;
}

.nav-icon-btn {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background-color: #e5e5e5;
  border: none;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  padding: 0;
  transition: background-color 0.2s ease;
}

.nav-icon-btn:hover {
  background-color: #d6d6d6;
}

.nav-icon-svg {
  width: 20px;
  height: 20px;
}

/* Content Area */
.content-wrapper {
  box-sizing: border-box;
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 30px 20px 50px 20px;
}

.onboarding-card {
  box-sizing: border-box;
  background-color: #ffffff;
  width: 100%;
  max-width: 650px;
  min-height: 580px;
  border-radius: 28px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 40px 50px;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.04);
  text-align: center;
}

/* Illustration */
.illustration-wrapper {
  width: 100%;
  max-width: 420px;
  height: 230px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 25px;
}

.illustration-svg {
  width: 100%;
  height: 100%;
}

/* Description Text */
.description-text {
  font-size: 13.5px;
  line-height: 1.6;
  color: #71717a;
  max-width: 500px;
  margin: 0 0 35px 0;
  font-weight: 400;
  letter-spacing: -0.1px;
}

/* Red CTA Button */
.cta-button {
  background-color: #cc2529;
  border: none;
  border-radius: 9999px;
  padding: 10px 14px 10px 24px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  cursor: pointer;
  box-shadow: 0 4px 10px rgba(204, 37, 41, 0.25);
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.cta-button:hover {
  background-color: #b51f23;
}

.cta-button:active {
  transform: scale(0.98);
}

.cta-text {
  color: #ffffff;
  font-size: 14px;
  font-weight: 500;
  letter-spacing: 0.1px;
}

.cta-icon-circle {
  width: 24px;
  height: 24px;
  border-radius: 50%;
  border: 1.5px solid rgba(255, 255, 255, 0.75);
  display: flex;
  align-items: center;
  justify-content: center;
}

.cta-arrow-svg {
  width: 13px;
  height: 13px;
  stroke: #ffffff;
}   
</style>

<div id="page-container" class="app-container">
  <!-- Top Navigation Bar -->
  <header class="top-nav">
    <div class="nav-left">
      <div class="brand-logo">
        <svg class="logo-svg" viewBox="0 0 100 100">
          <circle cx="50" cy="50" r="48" fill="none" stroke="#222222" stroke-width="3"/>
          <!-- Red Figure -->
          <path d="M42 35 C42 31 38 27 34 27 C30 27 26 31 26 35 C26 39 30 42 34 42 C38 42 42 39 42 35 Z M30 44 C22 46 20 54 20 62 L32 62 C34 56 38 52 42 49 C38 46 34 44 30 44 Z" fill="#d32f2f"/>
          <!-- Dark Figure -->
          <path d="M66 35 C66 31 62 27 58 27 C54 27 50 31 50 35 C50 39 54 42 58 42 C62 42 66 39 66 35 Z M56 44 C52 46 48 49 46 52 C50 56 52 62 52 62 L68 62 C68 54 64 46 56 44 Z" fill="#222222"/>
          <text x="50" y="78" text-anchor="middle" font-size="9" font-weight="700" fill="#222222" font-family="sans-serif">FITNESS</text>
          <text x="50" y="88" text-anchor="middle" font-size="7" font-weight="600" fill="#222222" font-family="sans-serif">HUB</text>
        </svg>
      </div>
    </div>
    
    <div class="nav-right">
      <button type="button" class="nav-icon-btn">
        <svg class="nav-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#555555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
      </button>
      <button type="button" class="nav-icon-btn">
        <svg class="nav-icon-svg" viewBox="0 0 24 24" fill="none" stroke="#555555" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </button>
    </div>
  </header>

  <!-- Main Content Card -->
  <main class="content-wrapper">
    <div class="onboarding-card">
      
      <!-- Illustration Section -->
      <div class="illustration-wrapper">
        <svg class="illustration-svg" viewBox="0 0 500 300" preserveAspectRatio="xMidYMid meet">
          <!-- Background Shape -->
          <ellipse cx="250" cy="180" rx="170" ry="90" fill="#e3edf7" />
          <ellipse cx="250" cy="235" rx="140" ry="12" fill="#cbe0f2" />

          <!-- Ladders / Wall Bars -->
          <line x1="225" y1="110" x2="225" y2="230" stroke="#bccad6" stroke-width="4"/>
          <line x1="245" y1="110" x2="245" y2="230" stroke="#bccad6" stroke-width="4"/>
          <line x1="225" y1="125" x2="245" y2="125" stroke="#bccad6" stroke-width="3"/>
          <line x1="225" y1="145" x2="245" y2="145" stroke="#bccad6" stroke-width="3"/>
          <line x1="225" y1="165" x2="245" y2="165" stroke="#bccad6" stroke-width="3"/>
          <line x1="225" y1="185" x2="245" y2="185" stroke="#bccad6" stroke-width="3"/>
          <line x1="225" y1="205" x2="245" y2="205" stroke="#bccad6" stroke-width="3"/>

          <line x1="255" y1="110" x2="255" y2="230" stroke="#bccad6" stroke-width="4"/>
          <line x1="275" y1="110" x2="275" y2="230" stroke="#bccad6" stroke-width="4"/>
          <line x1="255" y1="125" x2="275" y2="125" stroke="#bccad6" stroke-width="3"/>
          <line x1="255" y1="145" x2="275" y2="145" stroke="#bccad6" stroke-width="3"/>
          <line x1="255" y1="165" x2="275" y2="165" stroke="#bccad6" stroke-width="3"/>
          <line x1="255" y1="185" x2="275" y2="185" stroke="#bccad6" stroke-width="3"/>
          <line x1="255" y1="205" x2="275" y2="205" stroke="#bccad6" stroke-width="3"/>

          <!-- Wall Clock -->
          <circle cx="320" cy="130" r="10" fill="#ffffff" stroke="#9bb1c4" stroke-width="2"/>
          <line x1="320" y1="130" x2="320" y2="124" stroke="#9bb1c4" stroke-width="2"/>
          <line x1="320" y1="130" x2="324" y2="130" stroke="#9bb1c4" stroke-width="2"/>

          <!-- Treadmill Machine -->
          <polygon points="295,232 360,230 355,225 295,227" fill="#2d3748" />
          <line x1="305" y1="227" x2="315" y2="195" stroke="#4a5568" stroke-width="4" stroke-linecap="round"/>
          <line x1="315" y1="195" x2="330" y2="195" stroke="#4a5568" stroke-width="3" stroke-linecap="round"/>

          <!-- Skipping Figure (Left) -->
          <circle cx="195" cy="132" r="7" fill="#fcd5b5"/>
          <path d="M190 128 C185 125 180 135 188 135" stroke="#1a202c" stroke-width="3" fill="none"/>
          <path d="M190 140 L200 140 L198 160 L190 160 Z" fill="#ff6b81"/>
          <path d="M192 160 L188 198 L198 198 L200 160 Z" fill="#1a202c"/>
          <path d="M170 170 Q 185 120 210 165" stroke="#2b6cb0" stroke-width="1.5" fill="none"/>

          <!-- Meditating / Sitting Figure (Center) -->
          <polygon points="215,240 280,240 265,228 230,228" fill="#3182ce" opacity="0.6"/>
          <circle cx="247" cy="186" r="6" fill="#fcd5b5"/>
          <path d="M241 193 L254 193 L252 212 L242 212 Z" fill="#cbd5e0"/>
          <path d="M235 212 C235 224 260 224 260 212 Z" fill="#2b6cb0"/>

          <!-- Dumbbell Trainer (Right-Center) -->
          <circle cx="280" cy="130" r="7" fill="#fcd5b5"/>
          <path d="M275 138 L285 138 L283 154 L277 154 Z" fill="#ffffff"/>
          <path d="M276 154 L274 195 L285 195 L284 154 Z" fill="#3182ce"/>
          <circle cx="295" cy="144" r="3.5" fill="#ed8936"/>
          <circle cx="270" cy="188" r="3.5" fill="#ed8936"/>

          <!-- Running Boy on Treadmill (Far Right) -->
          <circle cx="325" cy="142" r="6" fill="#fcd5b5"/>
          <path d="M320 149 L330 149 L328 168 L321 168 Z" fill="#4299e1"/>
          <path d="M321 168 L315 186 L324 186 Z" fill="#2d3748"/>
          <path d="M328 168 L338 184 L332 187 Z" fill="#2d3748"/>
        </svg>
      </div>

      <!-- Description Text -->
      <p class="description-text">
        Before you begin, we invite you to create a new membership. With our membership plans, you'll gain access to state-of-the-art equipment, expert trainers, workout and meal schedules and a supportive community to keep you motivated along the way.
      </p>

      <!-- Action Button -->
      <button type="button" class="cta-button">
        <span class="cta-text">View Memberships</span>
        <span class="cta-icon-circle">
          <svg class="cta-arrow-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="7" y1="17" x2="17" y2="7"></line>
            <polyline points="7 7 17 7 17 17"></polyline>
          </svg>
        </span>
      </button>

    </div>
  </main>
</div>