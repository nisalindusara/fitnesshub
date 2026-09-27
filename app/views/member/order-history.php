<style>
    .orders-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .orders-card {
        width: min(94%, 960px);
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    .orders-title {
        margin: 0 0 24px 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .order-list {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .order-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 20px 24px;
        background-color: #F3F4F6;
        border-radius: 16px;
        text-decoration: none;
        color: inherit;
        transition: background-color 0.15s ease;
    }

    .order-item:hover {
        background-color: #ECEDEF;
    }

    .order-info {
        display: flex;
        flex-direction: column;
        gap: 6px;
        min-width: 0;
    }

    .order-meta {
        font-size: 12.5px;
        color: #9CA3AF;
    }

    .order-name {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
        line-height: 1.4;
    }

    .order-status-group {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 4px;
        flex-shrink: 0;
        text-align: right;
    }

    .order-amount {
        font-size: 15px;
        font-weight: 700;
        color: #111827;
    }

    .order-status {
        font-size: 12.5px;
        font-weight: 600;
    }

    .order-status-delivered {
        color: #16A34A;
    }

    .order-status-completed {
        color: #2563EB;
    }

    .order-chevron {
        flex-shrink: 0;
    }
</style>

<div class="orders-page">
    <div class="orders-card">

        <h2 class="orders-title">Your Orders</h2>

        <div class="order-list">

            <a href="/member/member-profile/order-history/view" class="order-item">
                <div class="order-info">
                    <div class="order-meta">Order #FH-10892 &middot; October 24, 2024</div>
                    <div class="order-name">FitnessHub Pro Hydro Flask (32oz)</div>
                </div>
                <div class="order-status-group">
                    <div class="order-amount">$48.50</div>
                    <div class="order-status order-status-delivered">Delivered</div>
                </div>
                <svg class="order-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="/member/member-profile/order-history/view" class="order-item">
                <div class="order-info">
                    <div class="order-meta">Order #FH-10741 &middot; October 01, 2024</div>
                    <div class="order-name">Annual VIP All-Access Membership Renewal</div>
                </div>
                <div class="order-status-group">
                    <div class="order-amount">$899.00</div>
                    <div class="order-status order-status-completed">Completed</div>
                </div>
                <svg class="order-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="/member/member-profile/order-history/view" class="order-item">
                <div class="order-info">
                    <div class="order-meta">Order #FH-10619 &middot; September 15, 2024</div>
                    <div class="order-name">Whey Isolate Protein (Chocolate, 2.2kg)</div>
                </div>
                <div class="order-status-group">
                    <div class="order-amount">$74.20</div>
                    <div class="order-status order-status-delivered">Delivered</div>
                </div>
                <svg class="order-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="/member/member-profile/order-history/view" class="order-item">
                <div class="order-info">
                    <div class="order-meta">Order #FH-10502 &middot; August 28, 2024</div>
                    <div class="order-name">Personal Training 10-Session Pack</div>
                </div>
                <div class="order-status-group">
                    <div class="order-amount">$650.00</div>
                    <div class="order-status order-status-completed">Completed</div>
                </div>
                <svg class="order-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

        </div>

    </div>
</div>