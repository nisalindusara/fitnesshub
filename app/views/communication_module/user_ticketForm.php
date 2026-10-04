<?php $pageStyles = ['member/communication_module/user_ticketForm']; ?>

<div class="ticket-page">
  <div class="ticket-card">

    <form class="support-ticket-form" action="/member/support" method="POST" enctype="multipart/form-data">

      <!-- Category Dropdown -->
      <div class="form-group">
        <label class="form-label" for="ticket-category">Category</label>
        <select class="form-select" id="ticket-category" name="category" required>
          <option value="" disabled selected hidden>Select a category</option>
          <option value="membership">Membership &amp; Billing</option>
          <option value="personal_trainer">Personal Trainer Inquiry</option>
          <option value="technical">Technical / App Issue</option>
          <option value="facility">Gym Facilities &amp; Equipment</option>
          <option value="other">Other Inquiry</option>
        </select>
      </div>

      <!-- Subject Input -->
      <div class="form-group">
        <label class="form-label" for="ticket-subject">Subject</label>
        <input
          type="text"
          class="form-input"
          id="ticket-subject"
          name="subject"
          placeholder="Brief summary of your issue"
          required />
      </div>

      <!-- Description Textarea -->
      <div class="form-group">
        <label class="form-label" for="ticket-description">Description</label>
        <textarea
          class="form-textarea"
          id="ticket-description"
          name="description"
          placeholder="Describe the issue in detail — what happened and when"
          required></textarea>
      </div>

      <!-- Attachment File Upload -->
      <div class="form-group">
        <label class="form-label">Attachment <span class="form-label-optional">(optional)</span></label>
        <label class="file-upload-wrapper" for="ticket-attachment">
          <svg class="file-paperclip-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
          </svg>
          <span class="file-placeholder-text" id="file-placeholder-text">Attach a photo or file</span>
          <input type="file" class="file-native-input" name="attachment" id="ticket-attachment" onchange="document.getElementById('file-placeholder-text').textContent = this.files.length ? this.files[0].name : 'Attach a photo or file'">
        </label>
      </div>

      <!-- Submit Action -->
      <button type="submit" class="ticket-submit-btn">Submit</button>

    </form>

  </div>
</div>