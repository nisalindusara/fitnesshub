<style>
/* Outer Body Container - Centers the middle card */
#ticket-view-container {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  min-height: calc(100vh - 140px);
  padding: 0 0 10px;
  box-sizing: border-box;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Middle Content Card Shell */
#ticket-empty-card {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 100%;
  max-width: 832px;
  min-height: 600px;
  background: #ffffff;
  border-radius: 28px;
  box-shadow: 0 4px 24px rgba(0, 0, 0, 0.05);
  box-sizing: border-box;
  padding: 48px 32px;
  border: 1px solid #ededed;
  text-align: center;
}

/* Illustration Container */
.ticket-illustration-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  max-width: 440px;
  height: 260px;
  margin-bottom: 28px;
}

.ticket-illustration-img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
  display: block;
}

/* Heading & Description Text */
.ticket-empty-title {
  font-size: 20px;
  font-weight: 700;
  color: #111111;
  margin: 0 0 10px 0;
  line-height: 1.3;
}

.ticket-empty-desc {
  font-size: 13.5px;
  line-height: 1.55;
  color: #777777;
  max-width: 400px;
  margin: 0 0 30px 0;
}

/* Red "New Request" Button */
.ticket-new-request-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color: #dc2626; /* Vibrant red matching Figma */
  color: #ffffff;
  padding: 13px 36px;
  border-radius: 9999px;
  font-size: 14px;
  font-weight: 600;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.15s ease, transform 0.1s ease;
  box-shadow: 0 2px 8px rgba(220, 38, 38, 0.25);
}

.ticket-new-request-btn:hover {
  background-color: #b91c1c;
  transform: translateY(-1px);
}

.ticket-new-request-btn:active {
  transform: translateY(0);
}
</style>

<div id="ticket-view-container" class="ticket-view-container">
  <div id="ticket-empty-card" class="ticket-empty-card">
    
    <!-- Illustration -->
    <div class="ticket-illustration-wrapper">
      <img 
        src="/uploads/Communication/checkboard.png" 
        alt="No tickets yet" 
        class="ticket-illustration-img" 
      />
    </div>

    <!-- Text Information -->
    <h2 class="ticket-empty-title">You haven't reached out to us yet</h2>
    <p class="ticket-empty-desc">
      Need help? Send us a message and we'll get back to you shortly.
    </p>

    <!-- Navigatable "New Request" Button -->
    <a href="/communication/user-ticketForm" class="ticket-new-request-btn" title="Create New Support Request">
      New Request
    </a>

  </div>
</div>