<style>
    .profile-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
    }

    .profile-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    /* Header */
    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .card-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .btn-edit {
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        background: #fff;
        border: 1px solid #E5E7EB;
        border-radius: 9999px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-edit:hover {
        background-color: #F3F4F6;
    }

    /* Identity row */
    .profile-identity {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 32px;
    }

    .avatar-circle {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #F1F2F4;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6B7280;
        flex-shrink: 0;
    }

    .identity-name {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .identity-meta {
        font-size: 12.5px;
        color: #9CA3AF;
        margin-top: 2px;
    }

    /* Field grid */
    .field-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px 24px;
    }

    .field-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .field-group-full {
        grid-column: 1 / -1;
    }

    .field-label {
        font-size: 11px;
        font-weight: 600;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.04em;
    }

    .field-input,
    .field-select,
    .field-textarea {
        width: 100%;
        padding: 12px 14px;
        font-size: 14px;
        font-family: inherit;
        color: #111827;
        background-color: #F3F4F6;
        border: 1px solid transparent;
        border-radius: 12px;
        box-sizing: border-box;
        transition: border-color 0.15s ease, background-color 0.15s ease;
    }

    .field-input:focus,
    .field-select:focus,
    .field-textarea:focus {
        outline: none;
        background-color: #fff;
        border-color: #D1D5DB;
    }

    .field-select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%236B7280' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        background-size: 16px;
        cursor: pointer;
    }

    .field-textarea {
        resize: vertical;
        min-height: 64px;
        line-height: 1.5;
    }

    /* Section divider + headers */
    .section-divider {
        height: 1px;
        background-color: #EEF0F2;
        margin: 32px 0 24px;
    }

    .section-header {
        margin-bottom: 20px;
    }

    .section-title {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    /* Footer */
    .card-footer {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 20px;
        margin-top: 32px;
        padding-top: 24px;
        border-top: 1px solid #EEF0F2;
    }

    .btn-cancel {
        font-size: 14px;
        font-weight: 600;
        color: #6B7280;
        background: none;
        border: none;
        cursor: pointer;
    }

    .btn-cancel:hover {
        color: #374151;
    }

    .btn-save {
        padding: 10px 24px;
        font-size: 14px;
        font-weight: 600;
        color: #fff;
        background-color: #D3272C;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .btn-save:hover {
        background-color: #BA1F24;
    }

    .btn-save:active {
        transform: scale(0.98);
    }
</style>

<div class="profile-page">
    <div class="profile-card">

        <!-- Header -->
        <div class="card-header">
            <h2 class="card-title">Personal Details</h2>
            <button class="btn-edit" type="button">Edit</button>
        </div>

        <!-- Avatar row -->
        <div class="profile-identity">
            <div class="avatar-circle">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="currentColor">
                    <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" />
                </svg>
            </div>
            <div class="identity-text">
                <div class="identity-name">Marcus Vance</div>
                <div class="identity-meta">Member since 2021</div>
            </div>
        </div>

        <!-- Personal Details fields -->
        <div class="field-grid">
            <div class="field-group">
                <label class="field-label">First Name</label>
                <input class="field-input" type="text" value="Marcus">
            </div>
            <div class="field-group">
                <label class="field-label">Last Name</label>
                <input class="field-input" type="text" value="Vance">
            </div>

            <div class="field-group">
                <label class="field-label">Email</label>
                <input class="field-input" type="email" value="marcus.vance@example.com">
            </div>
            <div class="field-group">
                <label class="field-label">Phone Number</label>
                <input class="field-input" type="tel" value="+1 (555) 234-5678">
            </div>

            <div class="field-group field-group-full">
                <label class="field-label">Gender</label>
                <select class="field-select">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Non-binary</option>
                    <option>Prefer not to say</option>
                </select>
            </div>
        </div>

        <!-- Divider -->
        <div class="section-divider"></div>

        <!-- Address section -->
        <div class="section-header">
            <h3 class="section-title">Address</h3>
        </div>

        <div class="field-grid">
            <div class="field-group field-group-full">
                <label class="field-label">Street Address</label>
                <input class="field-input" type="text" value="221B Baker Street">
            </div>

            <div class="field-group">
                <label class="field-label">City</label>
                <input class="field-input" type="text" value="Colombo">
            </div>
            <div class="field-group">
                <label class="field-label">State / Province</label>
                <input class="field-input" type="text" value="Western Province">
            </div>

            <div class="field-group">
                <label class="field-label">Postal Code</label>
                <input class="field-input" type="text" value="10100">
            </div>
            <div class="field-group">
                <label class="field-label">Country</label>
                <select class="field-select">
                    <option>Sri Lanka</option>
                    <option>United States</option>
                    <option>United Kingdom</option>
                    <option>Australia</option>
                </select>
            </div>
        </div>

        <!-- Divider -->
        <div class="section-divider"></div>

        <!-- Fitness Information section -->
        <div class="section-header">
            <h3 class="section-title">Fitness Information</h3>
        </div>

        <div class="field-grid">
            <div class="field-group">
                <label class="field-label">Height (cm)</label>
                <input class="field-input" type="number" value="178">
            </div>
            <div class="field-group">
                <label class="field-label">Weight (kg)</label>
                <input class="field-input" type="number" value="74">
            </div>

            <div class="field-group">
                <label class="field-label">Fitness Goal</label>
                <select class="field-select">
                    <option>Build Muscle</option>
                    <option>Lose Weight</option>
                    <option>Improve Endurance</option>
                    <option>General Fitness</option>
                </select>
            </div>
            <div class="field-group">
                <label class="field-label">Activity Level</label>
                <select class="field-select">
                    <option>Beginner</option>
                    <option>Intermediate</option>
                    <option>Advanced</option>
                </select>
            </div>

            <div class="field-group field-group-full">
                <label class="field-label">Medical Conditions / Notes</label>
                <textarea class="field-textarea" rows="3" placeholder="e.g. previous knee injury, asthma">None</textarea>
            </div>
        </div>

        <!-- Footer actions -->
        <div class="card-footer">
            <button class="btn-cancel" type="button">Cancel</button>
            <button class="btn-save" type="button">Save Changes</button>
        </div>

    </div>
</div>