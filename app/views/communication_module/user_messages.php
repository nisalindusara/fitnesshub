<style>
  .page-content {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }

  .main-content-card {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    width: min(92%, 720px);
    max-height: 100%;
    /* clamps to leftover space, never forces scroll */
    padding: 56px 48px;
    gap: 32px;

    background: #fff;
    border-radius: 28px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
    box-sizing: border-box;
    overflow: hidden;
  }

  .illustration-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 320px;
    height: auto;
  }

  .illustration-image {
    width: 100%;
    height: auto;
    object-fit: contain;
    display: block;
  }

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
    max-width: 380px;
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

  .cta-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px 22px;
    background-color: #090909;
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

<div class="page-content">
  <div class="main-content-card">
    <div class="illustration-container">
      <img class="illustration-image"
        src="/uploads/Communication/user_message.png"
        alt="User Message Illustration">
    </div>

    <div class="content-group">
      <div class="text-group">
        <h2 class="title-text">World Class Instructor At your Service</h2>
        <p class="description-text">
          Get expert advice, form checks, custom plans, and daily motivation
        </p>
      </div>

      <button class="cta-button" type="button">
        <span class="cta-text">View Memberships</span>
        <span class="cta-icon-circle">
          <svg class="cta-arrow-svg" viewBox="0 0 24 24" fill="none">
            <path d="M7 17L17 7M17 7H9M17 7V15"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>
        </span>
      </button>
    </div>
  </div>
</div>