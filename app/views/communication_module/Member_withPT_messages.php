<style>
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

#messages-middle-card {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 720px;
  height: 640px;
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
  box-sizing: border-box;
  overflow: hidden;
  border: 1px solid #f0f0f0;
}

.messages-card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 24px 32px 18px 32px;
  border-bottom: 1px solid #f0f0f0;
  gap: 20px;
}

.messages-header-info {
  display: flex;
  align-items: center;
  gap: 12px;
}

.messages-card-title {
  font-size: 22px;
  font-weight: 700;
  color: #111111;
  margin: 0;
}

.messages-badge {
  background-color: #f3f4f6;
  color: #374151;
  font-size: 12px;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 9999px;
  white-space: nowrap;
}

.messages-header-search {
  display: flex;
  align-items: center;
  margin-left: auto;
}

.messages-search-input {
  width: 220px;
  padding: 8px 14px;
  border: 1px solid #e5e7eb;
  border-radius: 8px;
  font-size: 14px;
  color: #111111;
  outline: none;
  background-color: #fafafa;
}

.messages-chat-list {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  overflow-y: auto;
  padding: 16px 24px;
  gap: 8px;
}

.chat-list-item {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 12px 16px;
  border-radius: 14px;
  text-decoration: none;
  color: inherit;
  transition: background-color 0.15s ease;
  cursor: pointer;
}

.chat-list-item:hover {
  background-color: #f9fafb;
}

.chat-item-active {
  background-color: #f3f4f6;
}

.chat-avatar-wrapper {
  position: relative;
  width: 48px;
  height: 48px;
  flex-shrink: 0;
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
  bottom: 0px;
  right: 0px;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  border: 2px solid #ffffff;
  z-index: 2;
}

.chat-status-online {
  background-color: #10b981;
}

.chat-status-offline {
  background-color: #9ca3af;
}

.chat-item-details {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  gap: 4px;
  min-width: 0;
}

.chat-item-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.chat-item-name {
  font-size: 15px;
  font-weight: 600;
  color: #111111;
}

.chat-item-time {
  font-size: 12px;
  color: #888888;
}

.chat-item-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
}

.chat-item-preview {
  font-size: 13px;
  color: #666666;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.chat-unread-count {
  background-color: #111111;
  color: #ffffff;
  font-size: 11px;
  font-weight: 600;
  padding: 2px 7px;
  border-radius: 9999px;
  flex-shrink: 0;
}

.messages-card-footer {
  padding: 16px 32px 24px 32px;
  border-top: 1px solid #f0f0f0;
  display: flex;
  justify-content: center;
}

.messages-new-chat-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: #111111;
  color: #ffffff;
  padding: 12px 24px;
  border-radius: 9999px;
  text-decoration: none;
  font-size: 14px;
  font-weight: 600;
}
</style>

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
      <a href="/communication/chat-marcus" class="chat-list-item chat-item-active">
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
      <a href="/communication/chat-sarah" class="chat-list-item">
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
      <a href="/communication/chat-support" class="chat-list-item">
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