<?php $pageStyles = ['staff/payment_module/_payment-form', 'staff/payment_module/add-cash-payment']; ?>

<div id="staff-record-payment-container">

    <div class="page-header">
        <button class="icon-btn" id="record-payment-back-btn" aria-label="Back to payments" onclick="window.location.href='<?= Gate::allows('view_payments_overview') ? '/portal/payments' : '/portal' ?>'">
            <svg class="icon-svg" viewBox="0 0 24 24">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </button>
        <span class="page-title">Record Cash Payment</span>
    </div>

    <div class="content-body">
        <div class="card">
            <div class="card-content" id="record-payment-form">

                <!-- Payment Category -->
                <div class="form-group">
                    <label class="form-label">Payment Category</label>
                    <div class="category-selector">
                        <button class="category-option category-option-active">
                            <svg class="category-icon-svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M4 21v-1a8 8 0 0 1 16 0v1" />
                            </svg>
                            <span>Membership</span>
                        </button>
                        <button class="category-option">
                            <svg class="category-icon-svg" viewBox="0 0 24 24">
                                <circle cx="9" cy="8" r="3" />
                                <circle cx="17" cy="8" r="3" />
                                <path d="M2 21v-1a6 6 0 0 1 10-4.5" />
                                <path d="M12 15.5A6 6 0 0 1 22 20v1" />
                            </svg>
                            <span>Classes</span>
                        </button>
                        <button class="category-option">
                            <svg class="category-icon-svg" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 7v5l3 3" />
                            </svg>
                            <span>Personal Training</span>
                        </button>
                        <button class="category-option">
                            <svg class="category-icon-svg" viewBox="0 0 24 24">
                                <path d="M6 8h12l-1 12H7L6 8Z" />
                                <path d="M9 8V6a3 3 0 0 1 6 0v2" />
                            </svg>
                            <span>Store</span>
                        </button>
                    </div>
                </div>

                <!-- Member -->
                <div class="form-group">
                    <label class="form-label">Member</label>
                    <div class="form-search-box">
                        <svg class="field-icon-svg" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" />
                            <path d="M21 21l-4.3-4.3" />
                        </svg>
                        <input type="text" placeholder="Search by name or member ID...">
                    </div>
                </div>

                <!-- Plan / Duration -->
                <div class="form-row">
                    <div class="form-group form-group-flex">
                        <label class="form-label">Plan</label>
                        <select class="form-select">
                            <option>Premium — LKR 8,000 / mo</option>
                        </select>
                    </div>
                    <div class="form-group form-group-flex">
                        <label class="form-label">Duration</label>
                        <select class="form-select">
                            <option>1 Month</option>
                        </select>
                    </div>
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="form-label">Amount</label>
                    <div class="amount-input-wrapper">
                        <span class="amount-prefix">LKR</span>
                        <input type="text" class="amount-input" value="0.00" readonly>
                        <span class="amount-hint">Auto-calculated</span>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="form-group">
                    <label class="form-label">Payment Method</label>
                    <div class="payment-method-selector">
                        <button class="payment-method-option payment-method-option-active">
                            <svg class="method-icon-svg" viewBox="0 0 24 24">
                                <rect x="2" y="6" width="20" height="12" rx="2" />
                                <path d="M2 10h20" />
                            </svg>
                            Cash
                        </button>
                        <button class="payment-method-option">
                            <svg class="method-icon-svg" viewBox="0 0 24 24">
                                <rect x="2" y="5" width="20" height="14" rx="2" />
                                <path d="M2 10h20" />
                                <path d="M6 15h4" />
                            </svg>
                            Card
                        </button>
                    </div>
                </div>

                <!-- Payment Date / Receipt No -->
                <div class="form-row">
                    <div class="form-group form-group-flex">
                        <label class="form-label">Payment Date</label>
                        <div class="form-search-box">
                            <svg class="field-icon-svg" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                            <input type="text" placeholder="">
                        </div>
                    </div>
                    <div class="form-group form-group-flex">
                        <label class="form-label">Receipt No. (Optional)</label>
                        <input type="text" class="form-input" placeholder="e.g. RCP-0091">
                    </div>
                </div>

                <!-- Notes -->
                <div class="form-group">
                    <label class="form-label">Notes (Optional)</label>
                    <textarea class="form-textarea" placeholder="Any additional notes for this payment..."></textarea>
                </div>

                <!-- Footer -->
                <div class="form-footer">
                    <button class="btn-discard">Discard</button>
                    <button class="btn-save">
                        <svg class="btn-icon-svg" viewBox="0 0 24 24">
                            <path d="M22 2 11 13" />
                            <path d="M22 2 15 22l-4-9-9-4 20-7Z" />
                        </svg>
                        Save Payment
                    </button>
                </div>

            </div>
        </div>
    </div>

</div>