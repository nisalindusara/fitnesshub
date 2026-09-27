<style>
/* Outer Body Container - Centers the middle card */
#available-instructors-container {
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

/* Middle Card Shell */
#available-instructors-card {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 760px;
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
  box-sizing: border-box;
  overflow: hidden;
  border: 1px solid #f0f0f0;
}

/* Header with Back Button */
.instructors-card-header {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 24px 32px 18px 32px;
  border-bottom: 1px solid #f0f0f0;
}

.instructors-back-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  color: #111111;
  text-decoration: none;
  padding: 6px;
  border-radius: 8px;
  transition: background-color 0.15s ease;
}

.instructors-back-btn:hover {
  background-color: #f3f4f6;
}

.instructors-back-icon {
  width: 20px;
  height: 20px;
}

.instructors-header-text {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.instructors-card-title {
  font-size: 22px;
  font-weight: 700;
  color: #111111;
  margin: 0;
}

.instructors-card-subtitle {
  font-size: 13px;
  color: #777777;
  margin: 0;
}

/* Instructors List Feed */
.instructors-list-area {
  display: flex;
  flex-direction: column;
  padding: 20px 28px;
  gap: 16px;
}

/* Instructor Card Row */
.instructor-item-card {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 18px 20px;
  background: #ffffff;
  border: 1px solid #f0f0f0;
  border-radius: 18px;
  gap: 16px;
  transition: box-shadow 0.15s ease, border-color 0.15s ease;
}

.instructor-item-card:hover {
  border-color: #e5e7eb;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
}

/* Left: Avatar + Details */
.instructor-card-left {
  display: flex;
  align-items: center;
  gap: 16px;
  min-width: 0;
}

/* Clickable Avatar */
.instructor-avatar-link {
  display: inline-flex;
  text-decoration: none;
  cursor: pointer;
  border-radius: 50%;
  flex-shrink: 0;
  transition: transform 0.15s ease, opacity 0.15s ease;
}

.instructor-avatar-link:hover {
  transform: scale(1.06);
  opacity: 0.9;
}

.instructor-avatar-wrap {
  position: relative;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background-color: #f3f4f6;
  overflow: hidden;
}

.instructor-avatar-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Metadata */
.instructor-info {
  display: flex;
  flex-direction: column;
  gap: 4px;
  min-width: 0;
}

.instructor-name-link {
  font-size: 16px;
  font-weight: 700;
  color: #111111;
  text-decoration: none;
  transition: color 0.15s ease;
}

.instructor-name-link:hover {
  color: #3b82f6;
  text-decoration: underline;
}

.instructor-role-text {
  font-size: 12.5px;
  color: #666666;
}

.instructor-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-top: 4px;
}

.instructor-pill-tag {
  font-size: 11px;
  font-weight: 600;
  padding: 3px 10px;
  border-radius: 9999px;
  background-color: #f3f4f6;
  color: #4b5563;
}

/* Right Action Buttons */
.instructor-actions {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-shrink: 0;
}

.instructor-profile-btn {
  padding: 8px 16px;
  font-size: 13px;
  font-weight: 600;
  color: #374151;
  background-color: #f9fafb;
  border: 1px solid #e5e7eb;
  border-radius: 9999px;
  text-decoration: none;
  transition: background-color 0.15s ease, border-color 0.15s ease;
}

.instructor-profile-btn:hover {
  background-color: #f3f4f6;
  border-color: #d1d5db;
}

/* "Select Instructor" non-navigatable button */
.instructor-select-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 8px 18px;
  font-size: 13px;
  font-weight: 600;
  color: #ffffff;
  background-color: #111111;
  border: none;
  border-radius: 9999px;
  cursor: pointer;
  outline: none;
  transition: background-color 0.15s ease, transform 0.1s ease;
}

.instructor-select-btn:hover {
  background-color: #2e2e2e;
  transform: translateY(-1px);
}

.instructor-select-btn:active {
  transform: translateY(0);
}
</style>

<div id="available-instructors-container" class="available-instructors-container">
  <div id="available-instructors-card" class="available-instructors-card">
    
    <!-- Header with Back Button -->
    <div class="instructors-card-header">
      <a href="/communication/user-messages" class="instructors-back-btn" title="Back to messages">
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