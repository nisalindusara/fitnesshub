<?php $pageStyles = ['member/communication_module/_message-list', 'member/communication_module/Member_withPT_messages']; ?>

<div id="messages-body-container" class="messages-body-container">
  <div id="messages-middle-card" class="messages-middle-card">
    
    <div class="messages-card-header">
      <div class="messages-header-info">
        <h2 class="messages-card-title">Messages</h2>
        <span class="messages-badge">3 Unread</span>
      </div>
      <div class="messages-header-search">
        <input type="text" class="messages-search-input" placeholder="Search conversations..." />
      </div>
    </div>

    <div class="messages-chat-list">
      <!-- Item 1: Marcus -->
      <a href="/member/messages/marcus" class="chat-list-item chat-item-active">
        <div class="chat-avatar-wrapper">
          <img src="/uploads/profiles/profile_1.jpg" alt="Coach Marcus" class="chat-avatar-img" />
          <span class="chat-status-dot chat-status-online"></span>
        </div>
        <div class="chat-item-details">
          <div class="chat-item-top">
            <span class="chat-item-name">Coach Marcus</span>
            <span class="chat-item-time">10:42 AM</span>
          </div>
          <div class="chat-item-bottom">
            <span class="chat-item-preview">Your revised workout schedule is ready for review!</span>
            <span class="chat-unread-count">2</span>
          </div>
        </div>
      </a>

      <!-- Item 2: Sarah -->
      <a href="/member/messages/sarah" class="chat-list-item">
        <div class="chat-avatar-wrapper">
          <img src="/uploads/profiles/profile_2.jpg" alt="Sarah Miller" class="chat-avatar-img" />
          <span class="chat-status-dot chat-status-offline"></span>
        </div>
        <div class="chat-item-details">
          <div class="chat-item-top">
            <span class="chat-item-name">Sarah Miller (Nutritionist)</span>
            <span class="chat-item-time">Yesterday</span>
          </div>
          <div class="chat-item-bottom">
            <span class="chat-item-preview">Don't forget to track your hydration targets today.</span>
            <span class="chat-unread-count">1</span>
          </div>
        </div>
      </a>

      <!-- Item 3: Support -->
      <a href="/member/messages/support" class="chat-list-item">
        <div class="chat-avatar-wrapper">
          <img src="/uploads/Communication/SupportTeam.png" alt="FitnessHub Support" class="chat-avatar-img" />
          <span class="chat-status-dot chat-status-online"></span>
        </div>
        <div class="chat-item-details">
          <div class="chat-item-top">
            <span class="chat-item-name">FitnessHub Support Desk</span>
            <span class="chat-item-time">Sep 24</span>
          </div>
          <div class="chat-item-bottom">
            <span class="chat-item-preview">Welcome! Let us know if you need any assistance getting started.</span>
          </div>
        </div>
      </a>
    </div>

    <div class="messages-card-footer">
      <a href="#new-conversation" class="messages-new-chat-btn">
        <span class="messages-btn-text">Start New Conversation</span>
      </a>
    </div>

  </div>
</div>