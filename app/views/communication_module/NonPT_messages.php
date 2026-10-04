<?php $pageStyles = ['member/communication_module/_message-list', 'member/communication_module/NonPT_messages']; ?>

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
        <a href="/member/instructors/elena" class="chat-avatar-link" title="View Coach Elena's profile">
          <div class="chat-avatar-wrapper">
            <img 
              src="/uploads/profiles/profile_5.jpg" 
              alt="Coach Elena" 
              class="chat-avatar-img" 
            />
          </div>
        </a>

        <a href="/member/messages/elena" class="chat-item-link">
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

        <a href="/member/messages/support" class="chat-item-link">
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

        <a href="/member/instructors" class="promo-cta-btn">
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