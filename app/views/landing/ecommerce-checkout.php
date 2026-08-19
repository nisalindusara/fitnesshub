<div class="container">
    <div class="checkout-wrapper">

        <!-- Left Column: Checkout Form -->
        <div class="checkout-form-container">
            <!-- Progress Header -->
            <div class="box-header step-header">
                <div class="step-item active">Personal</div>
                <div class="step-item">Billing</div>
                <div class="step-item">Confirmation</div>
            </div>

            <!-- Form Fields -->
            <form class="checkout-form" action="/checkout/billing" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">First Name*</label>
                        <input type="text" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name*</label>
                        <input type="text" class="form-input" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email Address*</label>
                        <input type="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number*</label>
                        <input type="tel" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Street Address*</label>
                    <input type="text" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Town / City*</label>
                    <input type="text" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Country*</label>
                    <input type="text" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Postcode / Zip*</label>
                    <input type="text" class="form-input" required>
                </div>

                <button type="submit" class="btn-next" id="openBtn">Proceed to Payment</button>
            </form>

            <!-- 2. The Dialog Window -->
            <dialog id="myDialog">
                <div class="confirmation-card">
                    <!-- SVG Checkmark Icon -->
                    <div class="success-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>

                    <h1 class="confirmation-title">Thank you!</h1>
                    <p class="confirmation-desc">Your order has been confirmed & we'll let you know once it is shipped. Check your email for the details</p>

                    <div class="button-group">
                        <a href="/" class="btn btn-primary">Go to Homepage</a>
                        <a href="/orders" class="btn btn-outline">Check Order Details</a>
                    </div>
                </div>
            </dialog>

        </div>

        <!-- Right Column: Cart Details -->
        <div class="cart-details-container">
            <div class="box-header cart-details-header">
                Cart Details
            </div>
            <div class="cart-details-body">

                <div class="cart-table-labels">
                    <div style="flex: 1;">PRODUCT</div>
                    <div style="flex: 1; text-align: center;">QUANTITY</div>
                    <div style="flex: 1; text-align: right;">SUBTOTAL</div>
                </div>

                <div class="dashed-divider"></div>

                <div class="cart-item-row">
                    <div class="item-name">NITROTECH Whey Protein</div>
                    <div class="item-qty">01</div>
                    <div class="item-subtotal">Rs12000</div>
                </div>

                <div class="dashed-divider"></div>

                <div class="summary-row">
                    <span>SUBTOTAL</span>
                    <span class="value">Rs12000</span>
                </div>

                <div class="dashed-divider"></div>

                <div class="summary-row">
                    <span>SHIPPING</span>
                    <span class="value">RS450</span>
                </div>

                <div class="dashed-divider"></div>

                <div class="summary-row total-row">
                    <span>Total</span>
                    <span class="value">RS12450</span>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    /* --- Base & Reset --- */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Barlow', sans-serif;
        background-color: #FFFFFF;
        color: #0A0A0A;
        line-height: 1.5;
    }

    .container {
        width: 100%;
        max-width: 1240px;
        margin: 0 auto;
        padding: 80px 32px;
    }

    /* --- Checkout Layout --- */
    .checkout-wrapper {
        display: flex;
        align-items: flex-start;
        gap: 40px;
    }

    /* Shared Header Style */
    .box-header {
        background-color: #99A1AF;
        border-radius: 12px 12px 0 0;
        padding: 24px 32px;
        color: #FFFFFF;
    }

    /* --- Left Column: Form Section --- */
    .checkout-form-container {
        flex: 1.6;
        display: flex;
        flex-direction: column;
    }

    .step-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .step-item {
        font-size: 20px;
        font-weight: 500;
        color: rgba(255, 255, 255, 0.6);
    }

    .step-item.active {
        font-weight: 700;
        color: #FFFFFF;
    }

    .checkout-form {
        background-color: #FFFFFF;
        border: 1px solid #E5E7EB;
        border-top: none;
        border-radius: 0 0 12px 12px;
        padding: 40px 32px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-label {
        font-size: 16px;
        color: #4A5565;
        font-weight: 500;
    }

    .form-input {
        width: 100%;
        padding: 14px 16px;
        border: 1px solid #E5E7EB;
        border-radius: 8px;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        color: #0A0A0A;
        outline: none;
        transition: border-color 0.2s;
    }

    .form-input:focus {
        border-color: #E31837;
    }

    .btn-next {
        align-self: flex-start;
        background-color: #0A0A0A;
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-size: 18px;
        font-weight: 700;
        padding: 16px 40px;
        border: none;
        border-radius: 50px;
        /* Pill shape */
        cursor: pointer;
        margin-top: 16px;
        transition: background-color 0.2s;
    }

    .btn-next:hover {
        background-color: #E31837;
    }

    /* --- Right Column: Cart Details --- */
    .cart-details-container {
        flex: 1;
        min-width: 380px;
        display: flex;
        flex-direction: column;
    }

    .cart-details-header {
        text-align: center;
        font-size: 20px;
        font-weight: 700;
    }

    .cart-details-body {
        background-color: #F9FAFB;
        border: 1px solid #E5E7EB;
        border-top: none;
        border-radius: 0 0 12px 12px;
        padding: 32px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cart-table-labels {
        display: flex;
        justify-content: space-between;
        font-size: 14px;
        text-transform: uppercase;
        color: #4A5565;
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .dashed-divider {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #D1D5DC;
    }

    .cart-item-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 16px;
        color: #99A1AF;
    }

    .item-name {
        flex: 1;
        color: #4A5565;
        font-weight: 500;
    }

    .item-qty {
        flex: 1;
        text-align: center;
    }

    .item-subtotal {
        flex: 1;
        text-align: right;
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 16px;
        color: #0A0A0A;
        font-weight: 500;
    }

    .summary-row .value {
        color: #99A1AF;
    }

    .summary-row.total-row {
        font-weight: 700;
    }

    /* Responsive Breakpoint */
    @media (max-width: 968px) {
        .checkout-wrapper {
            flex-direction: column;
        }

        .cart-details-container {
            width: 100%;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .step-item {
            font-size: 16px;
        }
    }

    /* --- Confirmation Card --- */
    .confirmation-card {
        background-color: #FFFFFF;
        width: 100%;
        max-width: 800px;
        /* Matching the wide proportion of the image */
        padding: 80px 40px;
        border: 1px solid #E5E7EB;
        border-radius: 12px;
        box-shadow: 0px 20px 45px rgba(0, 0, 0, 0.05);
        /* Cleaned up from Figma's raw export */

        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .success-icon {
        width: 64px;
        height: 64px;
        background-color: #4A5565;
        color: #FFFFFF;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
    }

    .confirmation-title {
        font-size: 36px;
        font-weight: 500;
        color: #0A0A0A;
        margin-bottom: 12px;
    }

    .confirmation-desc {
        font-size: 16px;
        color: #99A1AF;
        max-width: 480px;
        margin-bottom: 32px;
    }

    /* --- Button Group --- */
    .button-group {
        display: flex;
        gap: 16px;
    }

    .btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 14px 28px;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        font-weight: 600;
        border-radius: 50px;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .btn-primary {
        background-color: #0A0A0A;
        color: #FFFFFF;
        border: 1px solid #0A0A0A;
    }

    .btn-primary:hover {
        background-color: #E31837;
        /* FitnessHub Accent Red */
        border-color: #E31837;
    }

    .btn-outline {
        background-color: #FFFFFF;
        color: #0A0A0A;
        border: 1px solid #0A0A0A;
    }

    .btn-outline:hover {
        background-color: #F9FAFB;
    }

    /* Responsive Breakpoint */
    @media (max-width: 600px) {
        .confirmation-card {
            padding: 60px 20px;
        }

        .button-group {
            flex-direction: column;
            width: 100%;
        }

        .btn {
            width: 100%;
        }
    }

    dialog {
        border: none;
        background: transparent;
        /* Makes the wrapper seamless with your card */
        margin: auto;
        /* Enforces exact browser viewport centering */
    }

    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.5);
    }
</style>

<script>
    const dialog = document.getElementById("myDialog");
    const checkoutForm = document.querySelector(".checkout-form");

    // Intercept the form submission to prevent the page from refreshing
    checkoutForm.addEventListener("submit", (e) => {
        e.preventDefault(); // <-- STOPS THE PAGE REFRESH FIXING THE CENTERING
        dialog.showModal();
    });
</script>