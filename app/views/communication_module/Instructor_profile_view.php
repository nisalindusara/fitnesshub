<?php $pageStyles = ['member/communication_module/Instructor_profile_view']; ?>

<div id="instructor-profile-container" class="instructor-profile-container">

  <!-- Top Hero Header -->
  <div class="profile-card profile-hero-card">
    <div class="profile-avatar-wrap">
      <img 
        src="<?php echo htmlspecialchars($instructor['avatar']); ?>" 
        alt="<?php echo htmlspecialchars($instructor['name']); ?>" 
        class="profile-avatar-img" 
      />
    </div>

    <div class="profile-hero-details">
      <div class="profile-name-row">
        <h1 class="profile-name"><?php echo htmlspecialchars($instructor['name']); ?></h1>
        <a href="<?php echo htmlspecialchars($instructor['chat_route']); ?>" class="profile-contact-btn">Contact</a>
      </div>
      <p class="profile-subtitle"><?php echo htmlspecialchars($instructor['title']); ?> · <?php echo htmlspecialchars($instructor['experience']); ?></p>

      <div class="profile-tags-list">
        <?php foreach ($instructor['tags'] as $tag): ?>
          <span class="profile-tag <?php echo htmlspecialchars($tag['color']); ?>">
            <?php echo htmlspecialchars($tag['name']); ?>
          </span>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- Key Metrics Row -->
  <div class="profile-card profile-stats-card">
    <div class="profile-stat-box">
      <span class="profile-stat-num"><?php echo htmlspecialchars($instructor['stats']['exp_years']); ?></span>
      <span class="profile-stat-label">Years Experience</span>
    </div>
    <div class="profile-stat-box">
      <span class="profile-stat-num"><?php echo htmlspecialchars($instructor['stats']['years_with_us']); ?></span>
      <span class="profile-stat-label">Years With Us</span>
    </div>
    <div class="profile-stat-box">
      <span class="profile-stat-num"><?php echo htmlspecialchars($instructor['stats']['clients']); ?></span>
      <span class="profile-stat-label">Active Clients</span>
    </div>
  </div>

  <!-- About Card -->
  <div class="profile-card profile-content-card">
    <h2 class="profile-section-title">About</h2>
    <?php foreach ($instructor['about_paragraphs'] as $para): ?>
      <p class="profile-body-text"><?php echo htmlspecialchars($para); ?></p>
    <?php endforeach; ?>
  </div>

  <!-- Certifications Card -->
  <div class="profile-card profile-content-card">
    <h2 class="profile-section-title">Certifications</h2>
    <div class="profile-cert-item">
      <div class="profile-cert-icon-wrap">
        <svg class="profile-cert-icon" viewBox="0 0 24 24">
          <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
        </svg>
      </div>
      <span class="profile-cert-name"><?php echo htmlspecialchars($instructor['certification']); ?></span>
    </div>
  </div>

</div>