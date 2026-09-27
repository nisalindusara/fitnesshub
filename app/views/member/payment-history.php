<style>
    .payment-history-page {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    .payment-history-card {
        width: min(94%, 960px);
        min-height: 490px;
        padding: 40px 48px;
        background: #fff;
        border-radius: 28px;
        box-shadow: 0 4px 24px rgba(0, 0, 0, .04);
        box-sizing: border-box;
    }

    .payment-history-header {
        margin-bottom: 24px;
    }

    .payment-history-title {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #111827;
        letter-spacing: -0.2px;
    }

    .payment-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    /* Grid columns: date | name (flexible) | card | amount | status | chevron
   Each column has a fixed width, so the same field lines up
   at the exact same x-position across every row. */
    .payment-item {
        display: grid;
        grid-template-columns: 100px 1fr 70px 90px 70px 16px;
        align-items: center;
        column-gap: 20px;
        padding: 16px 20px;
        background-color: #F3F4F6;
        border-radius: 14px;
        text-decoration: none;
        color: inherit;
        transition: background-color 0.15s ease;
    }

    .payment-item:hover {
        background-color: #ECEDEF;
    }

    .payment-date {
        font-size: 13px;
        color: #9CA3AF;
    }

    .payment-name {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .payment-method-label {
        font-size: 13px;
        color: #6B7280;
    }

    .payment-amount {
        font-size: 14px;
        font-weight: 700;
        color: #111827;
    }

    .payment-status {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.04em;
        color: #16A34A;
    }

    .payment-chevron {
        justify-self: end;
    }
</style>

<div class="payment-history-page">
    <div class="payment-history-card">

        <div class="payment-history-header">
            <h2 class="payment-history-title">Payment History</h2>
        </div>

        <div class="payment-list">

            <a href="#" class="payment-item">
                <span class="payment-date">Oct 01, 2024</span>
                <span class="payment-name">Monthly VIP Membership Access</span>
                <span class="payment-method-label">Card</span>
                <span class="payment-amount">$79.00</span>
                <span class="payment-status">PAID</span>
                <svg class="payment-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="payment-item">
                <span class="payment-date">Sep 22, 2024</span>
                <span class="payment-name">Personal Training 5-Pack Session</span>
                <span class="payment-method-label">Card</span>
                <span class="payment-amount">$325.00</span>
                <span class="payment-status">PAID</span>
                <svg class="payment-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="payment-item">
                <span class="payment-date">Sep 01, 2024</span>
                <span class="payment-name">Monthly VIP Membership Access</span>
                <span class="payment-method-label">Card</span>
                <span class="payment-amount">$79.00</span>
                <span class="payment-status">PAID</span>
                <svg class="payment-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="payment-item">
                <span class="payment-date">Aug 15, 2024</span>
                <span class="payment-name">Nutrition Consultation</span>
                <span class="payment-method-label">Card</span>
                <span class="payment-amount">$65.00</span>
                <span class="payment-status">PAID</span>
                <svg class="payment-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

            <a href="#" class="payment-item">
                <span class="payment-date">Aug 01, 2024</span>
                <span class="payment-name">Monthly VIP Membership Access</span>
                <span class="payment-method-label">Card</span>
                <span class="payment-amount">$79.00</span>
                <span class="payment-status">PAID</span>
                <svg class="payment-chevron" width="7" height="10" viewBox="0 0 7 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 9L6 5L1.5 1" stroke="#9CA3AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>

        </div>

    </div>
</div>