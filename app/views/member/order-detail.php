<style>
    .order-detail-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .order-detail-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    /* Top bar: back link + delivery badge */
    .order-detail-topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13.5px;
        font-weight: 600;
        color: #6B7280;
        text-decoration: none;
    }

    .back-link:hover {
        color: #374151;
    }

    .delivery-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: #6B7280;
        background-color: #F3F4F6;
        border-radius: 9999px;
    }

    .delivery-badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: #EF4444;
    }

    /* Order heading */
    .order-detail-heading {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 32px;
    }

    .order-detail-title {
        margin: 0 0 6px 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .order-detail-subtitle {
        font-size: 13px;
        color: #9CA3AF;
    }

    .order-detail-status {
        font-size: 13.5px;
        font-weight: 700;
    }

    .order-status-delivered {
        color: #16A34A;
    }

    /* Progress tracker */
    .order-tracker {
        display: flex;
        align-items: flex-start;
        margin-bottom: 32px;
    }

    .tracker-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        width: 110px;
        flex-shrink: 0;
    }

    .tracker-icon {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
    }

    .tracker-icon-done {
        background-color: #16A34A;
    }

    .tracker-label {
        font-size: 12.5px;
        font-weight: 700;
        color: #111827;
    }

    .tracker-time {
        font-size: 11px;
        color: #9CA3AF;
        margin-top: 2px;
    }

    .tracker-line {
        flex: 1 1 auto;
        height: 2px;
        background-color: #E5E7EB;
        margin-top: 14px;
    }

    .tracker-line-done {
        background-color: #16A34A;
    }

    /* Divider */
    .order-detail-divider {
        height: 1px;
        background-color: #EEF0F2;
        margin: 32px 0;
    }

    /* Items section */
    .items-header {
        display: flex;
        align-items: baseline;
        justify-content: space-between;
        margin-bottom: 16px;
    }

    .items-title {
        margin: 0;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .items-carrier {
        font-size: 12.5px;
        color: #9CA3AF;
    }

    .item-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .item-row {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        background-color: #F3F4F6;
        border-radius: 16px;
    }

    .item-thumb {
        width: 52px;
        height: 52px;
        border-radius: 10px;
        overflow: hidden;
        background-color: #E5E7EB;
        flex-shrink: 0;
    }

    .item-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    .item-info {
        flex: 1 1 auto;
        min-width: 0;
    }

    .item-name {
        font-size: 14.5px;
        font-weight: 700;
        color: #111827;
    }

    .item-variant {
        font-size: 12.5px;
        color: #6B7280;
        margin-top: 2px;
    }

    .item-qty {
        font-size: 12.5px;
        color: #9CA3AF;
        margin-top: 2px;
    }

    .item-price {
        font-size: 14.5px;
        font-weight: 700;
        color: #111827;
        flex-shrink: 0;
    }

    /* Payment + summary row */
    .order-summary-row {
        display: flex;
        justify-content: space-between;
        gap: 40px;
    }

    .payment-info {
        flex: 1 1 auto;
    }

    .payment-info-label {
        font-size: 11px;
        font-weight: 600;
        color: #6B7280;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 14px;
    }

    .payment-method {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 12px;
    }

    .payment-icon {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        background-color: #F3F4F6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #374151;
        flex-shrink: 0;
    }

    .payment-card-label {
        font-size: 13.5px;
        font-weight: 700;
        color: #111827;
    }

    .payment-card-meta {
        font-size: 12px;
        color: #9CA3AF;
        margin-top: 2px;
    }

    .track-package-link {
        font-size: 13px;
        font-weight: 600;
        color: #374151;
        text-decoration: underline;
    }

    .cost-summary {
        width: 260px;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .cost-row {
        display: flex;
        justify-content: space-between;
        font-size: 13.5px;
        color: #6B7280;
    }

    .cost-value {
        color: #111827;
        font-weight: 500;
    }

    .cost-row-total {
        margin-top: 6px;
        padding-top: 12px;
        border-top: 1px solid #EEF0F2;
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .cost-row-total .cost-value {
        font-weight: 700;
    }

    /* Footer actions */
    .order-detail-footer {
        display: flex;
        justify-content: flex-end;
        gap: 14px;
        margin-top: 32px;
    }

    .btn-download-invoice {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        font-size: 13.5px;
        font-weight: 600;
        color: #374151;
        background: #fff;
        border: 1px solid #E5E7EB;
        border-radius: 9999px;
        cursor: pointer;
        transition: background-color 0.2s ease;
    }

    .btn-download-invoice:hover {
        background-color: #F3F4F6;
    }

    .btn-reorder {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 22px;
        font-size: 13.5px;
        font-weight: 600;
        color: #fff;
        background-color: #D3272C;
        border: none;
        border-radius: 9999px;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .btn-reorder:hover {
        background-color: #BA1F24;
    }

    .btn-reorder:active {
        transform: scale(0.98);
    }
</style>

<div class="order-detail-page">
    <div class="order-detail-card">

        <!-- Top row: back link + delivery badge -->
        <div class="order-detail-topbar">
            <a href="#" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 12H5M5 12L12 19M5 12L12 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span>Back to Orders</span>
            </a>
            <span class="delivery-badge">
                <span class="delivery-badge-dot"></span>
                Standard Delivery
            </span>
        </div>

        <!-- Order heading -->
        <div class="order-detail-heading">
            <div class="order-heading-left">
                <h2 class="order-detail-title">Order #FH-10892</h2>
                <div class="order-detail-subtitle">Placed on October 24, 2024 &middot; 10:15 AM</div>
            </div>
            <div class="order-detail-status order-status-delivered">Delivered</div>
        </div>

        <!-- Progress tracker -->
        <div class="order-tracker">
            <div class="tracker-step">
                <div class="tracker-icon tracker-icon-done">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="tracker-label">Order Placed</div>
                <div class="tracker-time">Oct 24, 10:15 AM</div>
            </div>

            <div class="tracker-line tracker-line-done"></div>

            <div class="tracker-step">
                <div class="tracker-icon tracker-icon-done">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="tracker-label">Processing</div>
                <div class="tracker-time">Oct 24, 2:30 PM</div>
            </div>

            <div class="tracker-line tracker-line-done"></div>

            <div class="tracker-step">
                <div class="tracker-icon tracker-icon-done">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="tracker-label">Shipped</div>
                <div class="tracker-time">Oct 25, 9:00 AM</div>
            </div>

            <div class="tracker-line tracker-line-done"></div>

            <div class="tracker-step">
                <div class="tracker-icon tracker-icon-done">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 6L9 17L4 12" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="tracker-label">Delivered</div>
                <div class="tracker-time">Oct 26, 1:45 PM</div>
            </div>
        </div>

        <!-- Divider -->
        <div class="order-detail-divider"></div>

        <!-- Items section -->
        <div class="items-header">
            <h3 class="items-title">Items (2)</h3>
            <div class="items-carrier">Carrier: Express Post &middot; #TRK992144</div>
        </div>

        <div class="item-list">
            <div class="item-row">
                <div class="item-thumb">
                    <img src="/uploads/Products/hydro_flask.png" alt="FitnessHub Pro Hydro Flask">
                </div>
                <div class="item-info">
                    <div class="item-name">FitnessHub Pro Hydro Flask (32oz)</div>
                    <div class="item-variant">Matte Black</div>
                    <div class="item-qty">Qty: 1 &middot; $32.50 each</div>
                </div>
                <div class="item-price">LKR 32.50</div>
            </div>

            <div class="item-row">
                <div class="item-thumb">
                    <img src="/uploads/Products/lifting_straps.png" alt="Pro Lifting Straps">
                </div>
                <div class="item-info">
                    <div class="item-name">Pro Lifting Straps</div>
                    <div class="item-variant">Standard Pair &middot; Black</div>
                    <div class="item-qty">Qty: 1 &middot; $16.00 each</div>
                </div>
                <div class="item-price">LKR 16.00</div>
            </div>
        </div>

        <!-- Divider -->
        <div class="order-detail-divider"></div>

        <!-- Payment + summary -->
        <div class="order-summary-row">

            <div class="payment-info">
                <div class="payment-info-label">Payment Information</div>
                <div class="payment-method">
                    <div class="payment-icon">
                        <svg width="18" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="4" width="20" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                            <line x1="2" y1="9" x2="22" y2="9" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                    <div class="payment-text">
                        <div class="payment-card-label">Card</div>
                        <div class="payment-card-meta">Billed on Oct 24, 2024</div>
                    </div>
                </div>
                <a href="#" class="track-package-link">Track Package</a>
            </div>

            <div class="cost-summary">
                <div class="cost-row">
                    <span class="cost-label">Subtotal</span>
                    <span class="cost-value">48.50</span>
                </div>
                <div class="cost-row">
                    <span class="cost-label">Shipping</span>
                    <span class="cost-value">Free</span>
                </div>
                <div class="cost-row">
                    <span class="cost-label">Estimated Tax</span>
                    <span class="cost-value">0.00</span>
                </div>
                <div class="cost-row cost-row-total">
                    <span class="cost-label">Total</span>
                    <span class="cost-value">LKR 48.50</span>
                </div>
            </div>

        </div>

        <!-- Footer actions -->
        <div class="order-detail-footer">
            <button class="btn-download-invoice" type="button">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 3V15M12 15L7 10M12 15L17 10M5 21H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Download Invoice
            </button>
            <button class="btn-reorder" type="button">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4 4V9H9M20 20V15H15M4 9C4 9 6 4 12 4C16 4 19 6.5 20 9M20 15C20 15 18 20 12 20C8 20 5 17.5 4 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                Reorder Items
            </button>
        </div>

    </div>
</div>