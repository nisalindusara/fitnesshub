<style>
    .sp-page {
        padding: 32px;
        box-sizing: border-box;
        width: 100%;
    }

    /* ---------- Header ---------- */
    .sp-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 24px;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 28px;
        margin-bottom: 24px;
    }

    .sp-identity {
        display: flex;
        align-items: center;
        gap: 20px;
        min-width: 0;
    }

    .sp-avatar {
        width: 72px;
        height: 72px;
        border-radius: 50%;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #e6f3ff;
        color: #2d3748;
        font-size: 22px;
        font-weight: 700;
        object-fit: cover;
    }

    .sp-name-block {
        display: flex;
        flex-direction: column;
        gap: 4px;
        min-width: 0;
    }

    .sp-name {
        font-size: 22px;
        font-weight: 700;
        color: #1a202c;
    }

    .sp-role {
        font-size: 14px;
        font-weight: 500;
        color: #4a5568;
    }

    .sp-meta {
        font-size: 12px;
        color: #a0aec0;
    }

    .sp-actions {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
    }

    /* ---------- Buttons ---------- */
    .sp-btn {
        font-family: inherit;
        font-size: 13px;
        font-weight: 500;
        padding: 8px 14px;
        border-radius: 8px;
        cursor: pointer;
        white-space: nowrap;
        border: 1px solid #1a202c;
        background-color: #1a202c;
        color: #ffffff;
        display: inline-block;
        line-height: normal;
        text-decoration: none;
    }

    .sp-btn:hover {
        background-color: #2d3748;
        border-color: #2d3748;
    }

    .sp-btn-outline {
        background-color: transparent;
        color: #2d3748;
        border-color: #cbd5e0;
    }

    .sp-btn-outline:hover {
        background-color: #edf2f7;
        border-color: #cbd5e0;
    }

    .sp-btn:focus-visible {
        outline: 2px solid #3182ce;
        outline-offset: 2px;
    }

    /* ---------- Detail panels ---------- */
    .sp-row {
        display: flex;
        gap: 24px;
    }

    .sp-panel {
        flex: 1;
        min-width: 0;
        background-color: #f7f9fc;
        border-radius: 16px;
        padding: 24px;
        box-sizing: border-box;
    }

    .sp-panel-title {
        font-size: 14px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 16px;
    }

    .sp-details {
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    .sp-detail {
        display: flex;
        justify-content: space-between;
        gap: 16px;
        padding: 14px 0;
        border-bottom: 1px solid #edf2f7;
        font-size: 13px;
    }

    .sp-detail:first-child {
        padding-top: 0;
    }

    .sp-detail:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .sp-label {
        color: #a0aec0;
        flex-shrink: 0;
    }

    .sp-value {
        color: #2d3748;
        font-weight: 500;
        text-align: right;
        margin: 0;
        overflow-wrap: anywhere;
    }

    .sp-value-green {
        color: #38a169;
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .sp-row {
            flex-direction: column;
        }
    }

    @media (max-width: 600px) {
        .sp-page {
            padding: 16px;
        }

        .sp-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
        }

        .sp-actions {
            width: 100%;
        }

        .sp-actions .sp-btn {
            flex: 1;
        }
    }
</style>

<div class="sp-page">

    <div class="sp-header">
        <div class="sp-identity">
            <div class="sp-avatar" aria-hidden="true">NP</div>
            <div class="sp-name-block">
                <div class="sp-name">Nadeesha Perera</div>
                <div class="sp-role">Super Admin</div>
                <div class="sp-meta">Staff ID STF-0007 · Joined 12 Jun 2026</div>
            </div>
        </div>
        <div class="sp-actions">
            <a href="/reset-password" class="sp-btn sp-btn-outline">Change password</a>
            <button type="button" class="sp-btn">Edit profile</button>
        </div>
    </div>

    <div class="sp-row">
        <section class="sp-panel">
            <h2 class="sp-panel-title">Personal Details</h2>
            <dl class="sp-details">
                <div class="sp-detail">
                    <dt class="sp-label">Full name</dt>
                    <dd class="sp-value">Nadeesha Perera</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Email</dt>
                    <dd class="sp-value">nadeesha.perera@fitnesshub.lk</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Phone</dt>
                    <dd class="sp-value">071 456 7890</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Address</dt>
                    <dd class="sp-value">No. 45, Maithripala Senanayake Mawatha, Anuradhapura</dd>
                </div>
            </dl>
        </section>

        <section class="sp-panel">
            <h2 class="sp-panel-title">Account</h2>
            <dl class="sp-details">
                <div class="sp-detail">
                    <dt class="sp-label">Role</dt>
                    <dd class="sp-value">Super Admin</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Status</dt>
                    <dd class="sp-value sp-value-green">Active</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Last login</dt>
                    <dd class="sp-value">Today, 8:12 AM</dd>
                </div>
                <div class="sp-detail">
                    <dt class="sp-label">Password last changed</dt>
                    <dd class="sp-value">3 Aug 2026</dd>
                </div>
            </dl>
        </section>
    </div>

</div>