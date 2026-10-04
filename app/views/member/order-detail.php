<?php $pageStyles = ['member/member/_order-status', 'member/member/order-detail']; ?>

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