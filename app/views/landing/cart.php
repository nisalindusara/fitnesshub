<?php $bodyClass = 'page-landing-cart--global'; $pageStyles = ['landing/landing/_store', 'landing/landing/cart']; ?>
<div class="container">
    <!-- Main Cart Area -->
    <section class="cart-section">

        <!-- Left Column: Table -->
        <div class="cart-table-container">
            <!-- Table Header -->
            <div class="cart-grid cart-header">
                <div></div> <!-- Spacer for remove icon -->
                <div></div> <!-- Spacer for image -->
                <div>Product</div>
                <div>Price</div>
                <div class="col-qty">Quantity</div>
                <div class="col-total">Total</div>
            </div>

            <!-- Cart Item 1 -->
            <div class="cart-grid cart-row">
                <div class="col-remove">
                    <button class="remove-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="col-img">
                    <div class="img-placeholder">
                        <img class="img-contain" src="https://www.muscletech.com/cdn/shop/files/MuscleTech-NitroTech-2lb-chocolate.jpg?v=1764974667&amp;width=200" alt="NITROTECH Whey Protein" width="64" height="64">
                    </div>
                </div>
                <div class="col-product">NITROTECH Whey Protein</div>
                <div class="col-price">Rs 12 000</div>
                <div class="col-qty">
                    <div class="qty-selector">
                        <button class="qty-btn">−</button>
                        <span>1</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
                <div class="col-total">Rs 12 000</div>
            </div>

            <!-- Cart Item 2 -->
            <div class="cart-grid cart-row">
                <div class="col-remove">
                    <button class="remove-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="col-img">
                    <div class="img-placeholder">
                        <img src="https://images.unsplash.com/photo-1584827386916-b5351d3ba34b?q=80&amp;w=200&amp;h=200&amp;fit=crop&amp;auto=format" alt="Stretching Band" width="64" height="64">
                    </div>
                </div>
                <div class="col-product">Stretching Band</div>
                <div class="col-price">Rs 6 000</div>
                <div class="col-qty">
                    <div class="qty-selector">
                        <button class="qty-btn">−</button>
                        <span>1</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
                <div class="col-total">Rs 6 000</div>
            </div>
        </div>

        <!-- Right Column: Summary Box -->
        <div class="cart-summary-container">
            <div class="summary-header">
                Cart Total
            </div>
            <div class="summary-body">
                <div class="summary-row">
                    <span>SUBTOTAL</span>
                    <span class="summary-value">Rs 18 000</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-row">
                    <span>DISCOUNT</span>
                    <span class="summary-value">—</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-row total-row">
                    <span>TOTAL</span>
                    <span class="summary-value">Rs 18 000</span>
                </div>
            </div>
            <a href="/store/checkout" class="checkout-btn">Proceed To Checkout</a>
        </div>

    </section>

    <!-- You May Also Like Section -->
    <section class="similar-products-section">
        <div class="section-header">
            <h2 class="section-title">You May Also Like</h2>
        </div>

        <div class="products-grid">
            <!-- Card 1 -->
            <div class="product-card">
                <a href="/store/product" class="product-image img-placeholder">
                    <img src="https://images.unsplash.com/photo-1704650311298-4d6915d34c64?q=80&amp;w=600&amp;h=750&amp;fit=crop&amp;auto=format" alt="Creatine Monohydrate 300 g" loading="lazy" width="400" height="500">
                </a>
                <div class="product-card-info">
                    <h3 class="product-card-title"><a href="/store/product">Creatine Monohydrate 300 g</a></h3>
                    <div class="product-bottom">
                        <span class="product-card-price">Rs 7 500</span>
                        <button class="add-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="product-card">
                <a href="/store/product" class="product-image img-placeholder">
                    <img src="https://images.unsplash.com/photo-1775199603318-7f8a9a63b40d?q=80&amp;w=600&amp;h=750&amp;fit=crop&amp;auto=format" alt="Whey Protein &amp; Shaker Bundle" loading="lazy" width="400" height="500">
                </a>
                <div class="product-card-info">
                    <h3 class="product-card-title"><a href="/store/product">Whey Protein &amp; Shaker Bundle</a></h3>
                    <div class="product-bottom">
                        <span class="product-card-price">Rs 16 900</span>
                        <button class="add-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="product-card">
                <a href="/store/product" class="product-image img-placeholder">
                    <img src="https://images.unsplash.com/photo-1603077492579-39ff927823db?q=80&amp;w=600&amp;h=750&amp;fit=crop&amp;auto=format" alt="Rubber Hex Dumbbells 5 kg (Pair)" loading="lazy" width="400" height="500">
                </a>
                <div class="product-card-info">
                    <h3 class="product-card-title"><a href="/store/product">Rubber Hex Dumbbells 5 kg (Pair)</a></h3>
                    <div class="product-bottom">
                        <span class="product-card-price">Rs 11 000</span>
                        <button class="add-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="product-card">
                <a href="/store/product" class="product-image img-placeholder">
                    <img src="https://images.unsplash.com/photo-1767404890803-228d5390fcd4?q=80&amp;w=600&amp;h=750&amp;fit=crop&amp;auto=format" alt="Pull-Up Assist Band Set" loading="lazy" width="400" height="500">
                </a>
                <div class="product-card-info">
                    <h3 class="product-card-title"><a href="/store/product">Pull-Up Assist Band Set</a></h3>
                    <div class="product-bottom">
                        <span class="product-card-price">Rs 6 500</span>
                        <button class="add-btn">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

