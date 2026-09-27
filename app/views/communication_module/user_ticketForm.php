<style>
  .ticket-page {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
  }

  .ticket-card {
    width: min(94%, 720px);
    padding: 40px 48px;
    background: #fff;
    border-radius: 28px;
    box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
    box-sizing: border-box;
  }

  .support-ticket-form {
    display: flex;
    flex-direction: column;
    width: 100%;
    gap: 22px;
  }

  .form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    width: 100%;
  }

  .form-label {
    font-size: 13.5px;
    font-weight: 600;
    color: #374151;
  }

  .form-label-optional {
    font-weight: 400;
    color: #9ca3af;
  }

  /* Inputs & Select — matches the flat gray fields used across the rest of the app */
  .form-select,
  .form-input {
    width: 100%;
    padding: 12px 16px;
    background-color: #F3F4F6;
    border: 1px solid transparent;
    border-radius: 12px;
    font-size: 14px;
    color: #111827;
    outline: none;
    box-sizing: border-box;
    transition: border-color 0.15s ease, background-color 0.15s ease;
  }

  .form-select {
    appearance: none;
    -webkit-appearance: none;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%236B7280" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>');
    background-repeat: no-repeat;
    background-position: right 16px center;
    background-size: 16px 16px;
    cursor: pointer;
    color: #6b7280;
  }

  .form-textarea {
    width: 100%;
    height: 140px;
    padding: 14px 16px;
    background-color: #F3F4F6;
    border: 1px solid transparent;
    border-radius: 14px;
    font-size: 14px;
    font-family: inherit;
    color: #111827;
    outline: none;
    resize: vertical;
    box-sizing: border-box;
    transition: border-color 0.15s ease, background-color 0.15s ease;
  }

  .form-select:focus,
  .form-input:focus,
  .form-textarea:focus {
    background-color: #fff;
    border-color: #D1D5DB;
  }

  /* File Upload Field */
  .file-upload-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
    background-color: #F3F4F6;
    border-radius: 12px;
    padding: 12px 16px;
    box-sizing: border-box;
    gap: 10px;
    cursor: pointer;
    transition: background-color 0.15s ease;
  }

  .file-upload-wrapper:hover {
    background-color: #ECEDEF;
  }

  .file-paperclip-icon {
    width: 18px;
    height: 18px;
    stroke: #6b7280;
    flex-shrink: 0;
  }

  .file-placeholder-text {
    font-size: 14px;
    color: #6b7280;
  }

  .file-native-input {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  /* Submit Button */
  .ticket-submit-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 15px;
    background-color: #1c1c1e;
    color: #ffffff;
    font-size: 15px;
    font-weight: 600;
    border: none;
    border-radius: 9999px;
    cursor: pointer;
    margin-top: 6px;
    transition: background-color 0.15s ease, transform 0.1s ease;
  }

  .ticket-submit-btn:hover {
    background-color: #000000;
    transform: translateY(-1px);
  }

  .ticket-submit-btn:active {
    transform: translateY(0);
  }
</style>

<div class="ticket-page">
  <div class="ticket-card">

    <form class="support-ticket-form" action="/communication/submit-ticket" method="POST" enctype="multipart/form-data">

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