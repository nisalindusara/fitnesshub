<?php $pageStyles = ['staff/payment_module/_payment-form']; ?>
<style>
    /* Icon (back arrow) */
    .icon-svg {
        width: 18px;
        height: 18px;
        stroke: currentColor;
        stroke-width: 1.5;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        color: #1c1c1c;
    }

    .icon-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border: none;
        background: transparent;
        border-radius: 8px;
        cursor: pointer;
        padding: 0;
    }

    .icon-btn:hover {
        background: rgba(28, 28, 28, 0.05);
    }

    /* Layout */
    .settings-row {
        display: flex;
        gap: 32px;
        padding: 24px;
    }

    .settings-row-info {
        flex: 0 0 220px;
    }

    .settings-row-title {
        font-size: 14px;
        font-weight: 600;
        color: #1c1c1c;
        margin: 0 0 6px;
    }

    .settings-row-desc {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.5);
        line-height: 18px;
        margin: 0;
    }

    .settings-row-fields {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px 20px;
    }

    .settings-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 24px;
        border-top: 1px solid rgba(28, 28, 28, 0.08);
    }

    .settings-last-saved {
        font-size: 13px;
        color: rgba(28, 28, 28, 0.4);
    }

    /* Form fields */
    .form-group {
        margin-bottom: 0;
    }

    .form-input {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-size: 14px;
        font-family: "Inter", sans-serif;
        color: #1c1c1c;
        background: #fff;
        box-sizing: border-box;
    }

    .form-input:focus {
        outline: none;
        border-color: #2563eb;
    }

    /* Save button */
    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 18px;
        background: #1c1c1c;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-family: "Inter", sans-serif;
        color: #fff;
        cursor: pointer;
    }

    .btn-save:hover {
        background: #2c2c2c;
    }
</style>

<div id="staff-payment-settings-container">

    <div class="page-header">
        <button class="icon-btn" id="payment-settings-back-btn" aria-label="Back to payments" onclick="window.location.href='<?= Gate::allows('view_payments_overview') ? '/portal/payments' : '/portal' ?>'">
            <svg class="icon-svg" viewBox="0 0 24 24">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </button>
        <span class="page-title">Payment Settings</span>
    </div>

    <div class="content-body">
        <div class="card">

            <div class="settings-row">
                <div class="settings-row-info">
                    <h3 class="settings-row-title">Bank Account Details</h3>
                    <p class="settings-row-desc">These details are shown to members when they choose bank transfer.</p>
                </div>

                <div class="settings-row-fields">
                    <div class="form-group form-group-flex">
                        <label class="form-label">Bank Name</label>
                        <input type="text" class="form-input" value="Commercial Bank of Ceylon">
                    </div>
                    <div class="form-group form-group-flex">
                        <label class="form-label">Account Number</label>
                        <input type="text" class="form-input" value="8011234567">
                    </div>
                    <div class="form-group form-group-flex">
                        <label class="form-label">Account Name</label>
                        <input type="text" class="form-input" value="FitnessHub (Pvt) Ltd">
                    </div>
                    <div class="form-group form-group-flex">
                        <label class="form-label">Branch</label>
                        <input type="text" class="form-input" value="Colombo 03">
                    </div>
                </div>
            </div>

            <div class="settings-footer">
                <span class="settings-last-saved">Last saved: Oct 24, 2023 at 09:15 AM</span>
                <button class="btn-save">Save Settings</button>
            </div>

        </div>
    </div>

</div>