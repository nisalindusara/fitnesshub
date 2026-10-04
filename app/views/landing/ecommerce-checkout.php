<?php $bodyClass = 'page-landing-ecommerce-checkout--global'; $pageStyles = ['landing/landing/_store', 'landing/landing/ecommerce-checkout']; ?>
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
            <form class="checkout-form" action="/store/checkout" method="POST">
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
                        <?php if (!empty($_SESSION['user_id']) && empty($_SESSION['is_staff'])): ?>
                            <a href="/member/profile/orders" class="btn btn-outline">Check Order Details</a>
                        <?php else: ?>
                            <a href="/store" class="btn btn-outline">Continue Shopping</a>
                        <?php endif; ?>
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


<script>
    const dialog = document.getElementById("myDialog");
    const checkoutForm = document.querySelector(".checkout-form");

    // Intercept the form submission to prevent the page from refreshing
    checkoutForm.addEventListener("submit", (e) => {
        e.preventDefault(); // <-- STOPS THE PAGE REFRESH FIXING THE CENTERING
        dialog.showModal();
    });
</script>