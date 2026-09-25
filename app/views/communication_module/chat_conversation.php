<style>
/* Outer Center Wrapper matching Figma frame constraints */
#chat-view-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  min-height: calc(100vh - 140px);
  padding: 16px;
  gap: 10px;
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Middle Card (832px width x 782px height) */
#chat-conversation-card {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 832px;
  height: 782px;
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
  box-sizing: border-box;
  overflow: hidden;
  border: 1px solid #ededed;
}

/* Header */
.chat-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 18px 28px;
  border-bottom: 1px solid #f0f0f0;
}

.chat-header-left {
  display: flex;
  align-items: center;
  gap: 14px;
}

.chat-back-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #111111;
  text-decoration: none;
  padding: 4px;
  border-radius: 8px;
  transition: background-color 0.15s ease;
}

.chat-back-btn:hover {
  background-color: #f3f4f6;
}

.chat-header-icon {
  width: 20px;
  height: 20px;
}

/* Clickable Profile Photo Link in Header */
.chat-header-avatar-link {
  display: inline-flex;
  text-decoration: none;
  cursor: pointer;
  border-radius: 50%;
  flex-shrink: 0;
  transition: transform 0.15s ease, opacity 0.15s ease;
}

.chat-header-avatar-link:hover {
  transform: scale(1.06);
  opacity: 0.9;
}

.chat-header-avatar-link:active {
  transform: scale(0.98);
}

/* Instructor Avatar Container */
.chat-instructor-avatar-wrap {
  position: relative;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background-color: #f3f4f6;
}

.chat-instructor-avatar {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  display: block;
}

.chat-online-badge {
  position: absolute;
  bottom: 1px;
  right: 1px;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background-color: #10b981;
  border: 2px solid #ffffff;
}

.chat-instructor-meta {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.chat-instructor-name {
  font-size: 16px;
  font-weight: 700;
  color: #111111;
  line-height: 1.2;
}

.chat-instructor-role {
  font-size: 11px;
  font-weight: 600;
  letter-spacing: 0.04em;
  color: #888888;
}

.chat-header-right {
  display: flex;
  align-items: center;
}

.chat-options-btn {
  background: none;
  border: none;
  cursor: pointer;
  color: #555555;
  padding: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: background-color 0.15s ease;
}

.chat-options-btn:hover {
  background-color: #f3f4f6;
}

/* Scrollable Messages Area */
.chat-messages-area {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  overflow-y: auto;
  padding: 28px 36px;
  gap: 20px;
}

.chat-message-group {
  display: flex;
  flex-direction: column;
  max-width: 68%;
  gap: 6px;
}

/* Incoming (Left, Light Grey) */
.chat-incoming-group {
  align-self: flex-start;
  align-items: flex-start;
}

.chat-incoming-bubble {
  background-color: #f1f2f4;
  color: #222222;
  border-radius: 16px;
  padding: 14px 18px;
  font-size: 14.5px;
  line-height: 1.45;
}

/* Outgoing (Right, Dark Black) */
.chat-outgoing-group {
  align-self: flex-end;
  align-items: flex-end;
}

.chat-outgoing-bubble {
  background-color: #0b0b0b;
  color: #ffffff;
  border-radius: 16px;
  padding: 14px 18px;
  font-size: 14.5px;
  line-height: 1.45;
}

/* Timestamps & Receipts */
.chat-timestamp {
  font-size: 11px;
  color: #999999;
  margin-top: 4px;
}

.chat-timestamp-outgoing-wrap {
  display: flex;
  align-items: center;
  gap: 4px;
}

.chat-check-icon {
  width: 13px;
  height: 13px;
  stroke: #999999;
}

/* Footer / Input */
.chat-footer {
  display: flex;
  align-items: center;
  padding: 18px 28px 24px 28px;
  gap: 14px;
  background-color: #ffffff;
}

.chat-attach-btn {
  background: none;
  border: none;
  cursor: pointer;
  color: #666666;
  padding: 4px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color 0.15s ease;
}

.chat-attach-btn:hover {
  color: #111111;
}

.chat-plus-icon {
  width: 26px;
  height: 26px;
}

.chat-input-wrapper {
  flex-grow: 1;
}

.chat-input-field {
  width: 100%;
  box-sizing: border-box;
  background-color: #f6f7f9;
  border: 1px solid transparent;
  border-radius: 14px;
  padding: 14px 18px;
  font-size: 14.5px;
  color: #111111;
  outline: none;
  transition: background-color 0.2s ease, border-color 0.2s ease;
}

.chat-input-field:focus {
  background-color: #ffffff;
  border-color: #e0e0e0;
}

.chat-send-btn {
  background-color: #0d0d0d;
  color: #ffffff;
  border: none;
  width: 44px;
  height: 44px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background-color 0.2s ease, transform 0.1s ease;
}

.chat-send-btn:hover {
  background-color: #2b2b2b;
  transform: scale(1.04);
}

.chat-send-icon {
  width: 18px;
  height: 18px;
  margin-left: 2px;
}
</style>

<div id="chat-view-container" class="chat-view-container">
  <div id="chat-conversation-card" class="chat-conversation-card">
    
    <!-- Top Bar -->
    <div class="chat-header">
      <div class="chat-header-left">
  <!-- Back Button -->
    <a href="/communication/PTmember-messages" class="chat-back-btn" title="Back to messages">
        <svg class="chat-header-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="19" y1="12" x2="5" y2="12"></line>
        <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
    </a>

    <!-- IF $profile_url EXISTS: Wrap in link. IF NULL (Support): Render as static image -->
    <?php if (!empty($profile_url)): ?>
        <a href="<?php echo htmlspecialchars($profile_url); ?>" class="chat-header-avatar-link" title="View <?php echo htmlspecialchars($name); ?>'s profile">
        <div class="chat-instructor-avatar-wrap">
            <img src="<?php echo htmlspecialchars($avatar); ?>" alt="<?php echo htmlspecialchars($name); ?>" class="chat-instructor-avatar" />
            <span class="chat-online-badge"></span>
        </div>
        </a>
    <?php else: ?>
        <div class="chat-instructor-avatar-wrap">
        <img src="<?php echo htmlspecialchars($avatar); ?>" alt="<?php echo htmlspecialchars($name); ?>" class="chat-instructor-avatar" />
        <span class="chat-online-badge"></span>
        </div>
    <?php endif; ?>

    <div class="chat-instructor-meta">
        <span class="chat-instructor-name"><?php echo htmlspecialchars($name); ?></span>
        <span class="chat-instructor-role"><?php echo htmlspecialchars($role); ?></span>
    </div>
    </div>

      <div class="chat-header-right">
        <button class="chat-options-btn" type="button" title="More options">
          <svg class="chat-header-icon" viewBox="0 0 24 24" fill="currentColor">
            <circle cx="12" cy="5" r="2"></circle>
            <circle cx="12" cy="12" r="2"></circle>
            <circle cx="12" cy="19" r="2"></circle>
          </svg>
        </button>
      </div>
    </div>

    <!-- Messages Area -->
    <div class="chat-messages-area">
      <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $msg): ?>
          <div class="chat-message-group <?php echo $msg['type'] === 'incoming' ? 'chat-incoming-group' : 'chat-outgoing-group'; ?>">
            <div class="chat-bubble <?php echo $msg['type'] === 'incoming' ? 'chat-incoming-bubble' : 'chat-outgoing-bubble'; ?>">
              <?php echo htmlspecialchars($msg['text']); ?>
            </div>
            <div class="<?php echo $msg['type'] === 'outgoing' ? 'chat-timestamp-outgoing-wrap' : ''; ?>">
              <span class="chat-timestamp"><?php echo htmlspecialchars($msg['time']); ?></span>
              <?php if ($msg['type'] === 'outgoing'): ?>
                <svg class="chat-check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="chat-message-group chat-incoming-group">
          <div class="chat-bubble chat-incoming-bubble">
            That’s totally normal! DOMS usually peaks around 24–48 hours post–workout.
          </div>
          <div class="chat-bubble chat-incoming-bubble">
            Make sure to hydrate well today and try to get in some light movement. Active recovery is key.
          </div>
          <span class="chat-timestamp">10:48 AM</span>
        </div>

        <div class="chat-message-group chat-outgoing-group">
          <div class="chat-bubble chat-outgoing-bubble">
            Thanks! I’ll do that routine on my lunch break.
          </div>
          <div class="chat-bubble chat-outgoing-bubble">
            Are we still on for Thursday at 6 AM?
          </div>
          <div class="chat-timestamp-outgoing-wrap">
            <span class="chat-timestamp">10:52 AM</span>
            <svg class="chat-check-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- Footer Input Bar -->
    <div class="chat-footer">
      <button class="chat-attach-btn" type="button" title="Attach file">
        <svg class="chat-plus-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"></circle>
          <line x1="12" y1="8" x2="12" y2="16"></line>
          <line x1="8" y1="12" x2="16" y2="12"></line>
        </svg>
      </button>

      <div class="chat-input-wrapper">
        <input type="text" class="chat-input-field" placeholder="Type a message..." />
      </div>

      <button class="chat-send-btn" type="button" title="Send message">
        <svg class="chat-send-icon" viewBox="0 0 24 24" fill="currentColor">
          <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
        </svg>
      </button>
    </div>

  </div>
</div>