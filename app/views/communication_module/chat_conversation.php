<?php $pageStyles = ['member/communication_module/chat_conversation']; ?>

<div id="chat-view-container" class="chat-view-container">
  <div id="chat-conversation-card" class="chat-conversation-card">
    
    <!-- Top Bar -->
    <div class="chat-header">
      <div class="chat-header-left">
  <!-- Back Button -->
    <!-- Back Button -->
    <a href="#" onclick="if (history.length > 1) { history.back(); return false; } else { window.location.href='/member/messages/no-coach'; }" class="chat-back-btn" title="Back to messages">
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