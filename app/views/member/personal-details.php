<?php $pageStyles = ['member/member/personal-details']; ?>

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