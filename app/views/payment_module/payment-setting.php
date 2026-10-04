<?php $pageStyles = ['staff/payment_module/_payment-form', 'staff/payment_module/payment-setting']; ?>

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