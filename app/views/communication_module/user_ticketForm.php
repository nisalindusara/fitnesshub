<style>
/* Outer Body matching Figma frame constraints */
#ticket-form-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: flex-start;
  width: 100%;
  min-height: calc(100vh - 140px);
  padding: 40px 16px;
  gap: 10px;
  box-sizing: border-box;
  background-color: #e8e8e8;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
}

/* Middle Box Shell */
#ticket-form-card {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 900px;
  background: transparent;
  box-sizing: border-box;
}

/* Form Layout */
.support-ticket-form {
  display: flex;
  flex-direction: column;
  width: 100%;
  max-width: 580px;
  margin: 0 auto;
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

/* Inputs & Select */
.form-select,
.form-input {
  width: 100%;
  padding: 14px 18px;
  background-color: #ffffff;
  border: 1px solid transparent;
  border-radius: 12px;
  font-size: 14px;
  color: #111111;
  outline: none;
  box-sizing: border-box;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
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
  height: 150px;
  padding: 16px 18px;
  background-color: #ffffff;
  border: 1px solid transparent;
  border-radius: 14px;
  font-size: 14px;
  font-family: inherit;
  color: #111111;
  outline: none;
  resize: vertical;
  box-sizing: border-box;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  transition: border-color 0.15s ease, box-shadow 0.15s ease;
}

.form-select:focus,
.form-input:focus,
.form-textarea:focus {
  border-color: #d1d5db;
  box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.03);
}

/* File Upload Field */
.file-upload-wrapper {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  background-color: #ffffff;
  border-radius: 12px;
  padding: 12px 18px;
  box-sizing: border-box;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
  gap: 10px;
}

.file-paperclip-icon {
  width: 18px;
  height: 18px;
  stroke: #6b7280;
  flex-shrink: 0;
}

.file-native-input {
  width: 100%;
  font-size: 13.5px;
  color: #6b7280;
  cursor: pointer;
  outline: none;
  border: none;
  background: transparent;
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

<div id="ticket-form-container">
  <div id="ticket-form-card">
    
    <form class="support-ticket-form" action="/communication/submit-ticket" method="POST" enctype="multipart/form-data">
      
      <!-- Category Dropdown -->
      <div class="form-group">
        <label class="form-label" for="ticket-category">Category</label>
        <select class="form-select" id="ticket-category" name="category" required>
          <option value="" disabled selected hidden>Select a category</option>
          <option value="membership">Membership & Billing</option>
          <option value="personal_trainer">Personal Trainer Inquiry</option>
          <option value="technical">Technical / App Issue</option>
          <option value="facility">Gym Facilities & Equipment</option>
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
          required 
        />
      </div>

      <!-- Description Textarea -->
      <div class="form-group">
        <label class="form-label" for="ticket-description">Description</label>
        <textarea 
          class="form-textarea" 
          id="ticket-description" 
          name="description" 
          placeholder="Describe the issue in detail — what happened and when" 
          required
        ></textarea>
      </div>

      <!-- Attachment File Upload -->
      <div class="form-group">
        <label class="form-label">Attachment <span class="form-label-optional">(optional)</span></label>
        <div class="file-upload-wrapper">
          <svg class="file-paperclip-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path>
          </svg>
          <input type="file" class="file-native-input" name="attachment" id="ticket-attachment" />
        </div>
      </div>

      <!-- Submit Action -->
      <button type="submit" class="ticket-submit-btn">Submit</button>

    </form>

  </div>
</div>