<?php $pageStyles = ['member/communication_module/empty_user_submit_ticket']; ?>

<div id="ticket-view-container" class="ticket-view-container">
  <div id="ticket-empty-card" class="ticket-empty-card">
    
    <!-- Illustration -->
    <div class="ticket-illustration-wrapper">
      <img 
        src="/uploads/Communication/connectionless.png" 
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
    <a href="/member/support/new" class="ticket-new-request-btn" title="Create New Support Request">
      New Request
    </a>

  </div>
</div>