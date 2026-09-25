<style>
/* Page container */
#instructor-profile-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  min-height: calc(100vh - 120px);
  padding: 24px 16px 60px 16px;
  box-sizing: border-box;
  gap: 20px;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  color: #1a1a1a;
}

/* Base Card Shell */
.profile-card {
  width: 100%;
  max-width: 832px;
  background: #ffffff;
  border-radius: 24px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
  border: 1px solid #ededed;
  box-sizing: border-box;
}

/* Card 1: Top Profile Header */
.profile-hero-card {
  display: flex;
  align-items: flex-start;
  gap: 24px;
  padding: 32px;
}

.profile-avatar-wrap {
  width: 120px;
  height: 120px;
  border-radius: 20px;
  overflow: hidden;
  flex-shrink: 0;
  background-color: #f3f4f6;
}

.profile-avatar-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.profile-hero-details {
  display: flex;
  flex-direction: column;
  flex-grow: 1;
  gap: 12px;
}

.profile-name-row {
  display: flex;
  align-items: center;
  gap: 14px;
}

.profile-name {
  font-size: 26px;
  font-weight: 700;
  margin: 0;
  color: #111111;
}

.profile-contact-btn {
  background-color: #1a1a1a;
  color: #ffffff;
  font-size: 13px;
  font-weight: 600;
  padding: 6px 16px;
  border-radius: 9999px;
  text-decoration: none;
  transition: background-color 0.15s ease;
}

.profile-contact-btn:hover {
  background-color: #333333;
}

.profile-subtitle {
  font-size: 14px;
  color: #777777;
  margin: 0;
}

.profile-tags-list {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 4px;
}

.profile-tag {
  font-size: 12px;
  font-weight: 600;
  padding: 6px 14px;
  border-radius: 9999px;
}

/* Tag Variants */
.tag-purple  { background-color: #ede9fe; color: #7c3aed; }
.tag-orange  { background-color: #ffedd5; color: #ea580c; }
.tag-pink    { background-color: #fee2e2; color: #e11d48; }
.tag-blue    { background-color: #e0f2fe; color: #0284c7; }
.tag-green   { background-color: #dcfce7; color: #16a34a; }

/* Card 2: Quick Metrics */
.profile-stats-card {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  padding: 28px 0;
  text-align: center;
}

.profile-stat-box {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.profile-stat-box:not(:last-child) {
  border-right: 1px solid #f0f0f0;
}

.profile-stat-num {
  font-size: 32px;
  font-weight: 800;
  color: #111111;
  line-height: 1.1;
}

.profile-stat-label {
  font-size: 12px;
  font-weight: 500;
  color: #888888;
}

/* Card 3: About & Philosophy */
.profile-content-card {
  padding: 32px 36px;
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.profile-section-title {
  font-size: 18px;
  font-weight: 700;
  margin: 0;
  color: #111111;
}

.profile-body-text {
  font-size: 14.5px;
  line-height: 1.65;
  color: #555555;
  margin: 0;
}

/* Card 4: Certifications */
.profile-cert-item {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-top: 4px;
}

.profile-cert-icon-wrap {
  width: 36px;
  height: 36px;
  border-radius: 50%;
  background-color: #f3f4f6;
  display: flex;
  align-items: center;
  justify-content: center;
}

.profile-cert-icon {
  width: 18px;
  height: 18px;
  fill: #111111;
}

.profile-cert-name {
  font-size: 14.5px;
  font-weight: 600;
  color: #222222;
}
</style>

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