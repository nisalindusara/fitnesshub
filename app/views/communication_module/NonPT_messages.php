<style>
/* Outer Body Container - Centers the middle card */
#messages-body-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  min-height: calc(100vh - 140px);
  padding: 24px 16px;
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Middle Content Card - matching Figma frame proportions */
#messages-middle-card {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 720px;
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
  box-sizing: border-box;
  overflow: hidden;
  border: 1px solid #f0f0f0;
}

/* Header */
.messages-card-header {
  display: flex;
  align-items: center;
  padding: 24px 32px 18px 32px;
  border-bottom: 1px solid #f0f0f0;
}

.messages-card-title {
  font-size: 22px;
  font-weight: 700;
  color: #111111;
  margin: 0;
}

/* Scroll Area */
.messages-content-area {
  display: flex;
  flex-direction: column;
  padding: 16px 24px 32px 24px;
  gap: 12px;
}

/* Chat Row */
.chat-list-row {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 12px 16px;
  border-radius: 16px;
  transition: background-color 0.15s ease;
}

.chat-list-row:hover {
  background-color: #f9fafb;
}

/* Avatar Link */
.chat-avatar-link {
  display: inline-flex;
  text-decoration: none;
  cursor: pointer;
  border-radius: 50%;
  flex-shrink: 0;
  transition: transform 0.15s ease, opacity 0.15s ease;
}

.chat-avatar-link:hover {
  transform: scale(1.05);
  opacity: 0.9;
}

.chat-avatar-wrapper {
  position: relative;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: #f3f4f6;
}

.chat-avatar-img {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  display: block;
}

.chat-status-dot {
  position: absolute;
  bottom: 1px;
  right: 1px;
  width: 11px;
  height: 11px;
  border-radius: 50%;
  border: 2px solid #ffffff;
  z-index: 2;
}

.chat-status-online {
  background-color: #10b981;
}

/* Chat Item Details */
.chat-item-link {
  display: flex;
  flex-grow: 1;
  text-decoration: none;
  color: inherit;
  min-width: 0;
  cursor: pointer;
}

.chat-item-details {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  gap: 2px;
  min-width: 0;
}

.chat-item-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.chat-item-name {
  font-size: 15px;
  font-weight: 700;
  color: #111111;
}

.chat-item-time {
  font-size: 11.5px;
  color: #888888;
}

.chat-item-role {
  font-size: 10.5px;
  font-weight: 600;
  letter-spacing: 0.04em;
  color: #888888;
  text-transform: uppercase;
}

.chat-item-preview {
  font-size: 13px;
  color: #666666;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  margin-top: 2px;
}

/* Upgrade Promo Banner Section */
.promo-banner-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  margin-top: 28px;
  padding: 0 20px;
}

.promo-illustration-wrap {
  width: 220px;
  height: 160px;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 20px;
}

.promo-illustration-img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.promo-title {
  font-size: 18px;
  font-weight: 700;
  color: #111111;
  margin: 0 0 10px 0;
}

.promo-description {
  font-size: 13px;
  line-height: 1.55;
  color: #777777;
  max-width: 480px;
  margin: 0 0 24px 0;
}

.promo-cta-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background-color: #111111;
  color: #ffffff;
  padding: 12px 24px;
  border-radius: 9999px;
  text-decoration: none;
  font-size: 13.5px;
  font-weight: 600;
  transition: background-color 0.2s ease, transform 0.15s ease;
}

.promo-cta-btn:hover {
  background-color: #2b2b2b;
  transform: translateY(-1px);
}

.promo-cta-icon {
  width: 16px;
  height: 16px;
  stroke: #ffffff;
}
</style>

<div id="messages-body-container" class="messages-body-container">
  <div id="messages-middle-card" class="messages-middle-card">
    
    <!-- Header -->
    <div class="messages-card-header">
      <h2 class="messages-card-title">Messages</h2>
    </div>

    <!-- Messages & Promo Body -->
    <div class="messages-content-area">
      
      <!-- Conversation 1: Coach Elena -->
      <div class="chat-list-row">
        <a href="/instructor/profile/elena" class="chat-avatar-link" title="View Coach Elena's profile">
          <div class="chat-avatar-wrapper">
            <img 
              src="/uploads/profiles/profile_5.jpg" 
              alt="Coach Elena" 
              class="chat-avatar-img" 
            />
          </div>
        </a>

        <a href="/communication/chat-elena" class="chat-item-link">
          <div class="chat-item-details">
            <div class="chat-item-top">
              <span class="chat-item-name">Coach Elena</span>
              <span class="chat-item-time">Yesterday</span>
            </div>
            <span class="chat-item-role">MEAL PLAN INSTRUCTOR</span>
            <span class="chat-item-preview">I've updated your macros for the week...</span>
          </div>
        </a>
      </div>

      <!-- Conversation 2: Support Team -->
      <div class="chat-list-row">
        <!-- Static avatar wrapper, no profile link for support team -->
        <div class="chat-avatar-wrapper">
          <img 
            src="/uploads/Communication/SupportTeam.png" 
            alt="Support Team" 
            class="chat-avatar-img" 
          />
        </div>

        <a href="/communication/chat-support" class="chat-item-link">
          <div class="chat-item-details">
            <div class="chat-item-top">
              <span class="chat-item-name">Support Team</span>
              <span class="chat-item-time">Monday</span>
            </div>
            <span class="chat-item-role">SUPPORT</span>
            <span class="chat-item-preview">Your membership renewal was successful.</span>
          </div>
        </a>
      </div>

      <!-- Upgrade Promo Banner -->
      <div class="promo-banner-container">
        <div class="promo-illustration-wrap">
          <img 
            src="/uploads/Communication/user_message.png" 
            alt="Personal Trainer Guidance" 
            class="promo-illustration-img" 
          />
        </div>

        <h3 class="promo-title">Get Expert Guidance Tailored Just For You</h3>
        <p class="promo-description">
          Your dedicated coach creates custom workouts, tracks your progress, and gives you the exact nutrition and accountability you need to see real results faster.
        </p>

        <a href="/instructors" class="promo-cta-btn">
          <span>View Available Instructors</span>
          <svg class="promo-cta-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="7" y1="17" x2="17" y2="7"></line>
            <polyline points="7 7 17 7 17 17"></polyline>
          </svg>
        </a>
      </div>

    </div>

  </div>
</div>