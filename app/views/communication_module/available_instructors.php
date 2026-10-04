<?php $pageStyles = ['member/communication_module/available_instructors']; ?>

<div id="available-instructors-container" class="available-instructors-container">
  <div id="available-instructors-card" class="available-instructors-card">
    
    <!-- Header with Back Button -->
    <div class="instructors-card-header">
      <a href="/member/messages/no-coach" class="instructors-back-btn" title="Back to messages">
        <svg class="instructors-back-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="19" y1="12" x2="5" y2="12"></line>
          <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
      </a>
      <div class="instructors-header-text">
        <h2 class="instructors-card-title">Available Instructors</h2>
        <p class="instructors-card-subtitle">Explore qualified trainers and start a conversation</p>
      </div>
    </div>

    <!-- Instructors List -->
    <div class="instructors-list-area">
      <?php foreach ($instructors as $inst): ?>
        <div class="instructor-item-card">
          
          <!-- Left: Clickable Photo & Details -->
          <div class="instructor-card-left">
            <a href="<?php echo htmlspecialchars($inst['profile_url']); ?>" class="instructor-avatar-link" title="View <?php echo htmlspecialchars($inst['name']); ?>'s profile">
              <div class="instructor-avatar-wrap">
                <img 
                  src="<?php echo htmlspecialchars($inst['avatar']); ?>" 
                  alt="<?php echo htmlspecialchars($inst['name']); ?>" 
                  class="instructor-avatar-img" 
                />
              </div>
            </a>

            <div class="instructor-info">
              <a href="<?php echo htmlspecialchars($inst['profile_url']); ?>" class="instructor-name-link">
                <?php echo htmlspecialchars($inst['name']); ?>
              </a>
              <span class="instructor-role-text"><?php echo htmlspecialchars($inst['title']); ?> · <?php echo htmlspecialchars($inst['experience']); ?></span>
              <div class="instructor-tags">
                <?php foreach ($inst['tags'] as $tag): ?>
                  <span class="instructor-pill-tag"><?php echo htmlspecialchars($tag); ?></span>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- Right: Action Buttons -->
          <!-- Right: Action Buttons -->
        <div class="instructor-actions">
        <a href="<?php echo htmlspecialchars($inst['profile_url']); ?>" class="instructor-profile-btn">
            View Profile
        </a>
        <button type="button" class="instructor-select-btn">
            Select Instructor
        </button>
        </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>