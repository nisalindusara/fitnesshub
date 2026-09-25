<style>
  /* Main Container Card */
  .main-content-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 48px 36px 44px;
    gap: 20px;

    width: 90%;
    max-width: 580px;            /* Fixed typo: added hyphen */
    min-height: auto;             /* Removed fixed 814px height */
    margin: 28px auto 32px;      /* Centers the card horizontally on the page */

    background: #FFFFFF;
    border-radius: 28px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }

  /* Image Container */
  .illustration-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 240px;            /* Scaled down to match mockup proportion */
    height: auto;
  }

  .illustration-image {
    width: 100%;
    height: auto;
    object-fit: contain;
    display: block;
  }

  /* Text and Button Wrapper */
  .content-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 24px;
    width: 100%;
  }

  .text-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    max-width: 380px;            /* Prevents the text from stretching across the entire width */
  }

  .title-text {
    margin: 0;
    font-size: 20px;
    font-weight: 700;
    color: #111827;
    letter-spacing: -0.2px;
  }

  .description-text {
    margin: 0;
    font-size: 13.5px;
    font-weight: 400;
    color: #6B7280;
    line-height: 1.45;
  }

  /* CTA Button */
  .cta-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px 22px;
    background-color: #080808;
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    transition: background-color 0.2s ease, transform 0.1s ease;
  }

  .cta-button:hover {
    background-color: #090909;
  }

  .cta-button:active {
    transform: scale(0.98);
  }

  .cta-text {
    font-size: 14px;
    font-weight: 600;
    color: #FFFFFF;
  }

  .cta-icon-circle {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    border: 1.5px solid rgba(255, 255, 255, 0.85);
    border-radius: 50%;
    box-sizing: border-box;
  }

  .cta-arrow-svg {
    width: 10px;
    height: 10px;
    color: #FFFFFF;
  }
</style>

<div class="main-content-card" id="main-content-card">
  <!-- Graphic Illustration Image -->
  <div class="illustration-container" id="illustration-container">
    <img 
      class="illustration-image" 
      src="/uploads/Communication/Unregistsered_message.png" 
      alt="Fitness Analytics Illustration" 
    />
  </div>

  <!-- Text & Action Group -->
  <div class="content-group" id="content-group">
    <div class="text-group">
      <h2 class="title-text">World Class Instructor At Your Service</h2>
      <p class="description-text">Get expert advice, form checks, custom plans, and daily motivation.</p>
    </div>

    <!-- CTA Button -->
    <button class="cta-button" type="button">
      <span class="cta-text">View Memberships</span>
      <span class="cta-icon-circle">
        <svg class="cta-arrow-svg" viewBox="0 0 24 24" fill="none">
          <path class="cta-arrow-path" d="M7 17L17 7M17 7H9M17 7V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </span>
    </button>
  </div>
</div>