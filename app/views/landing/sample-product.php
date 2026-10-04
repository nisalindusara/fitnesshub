<?php $bodyClass = 'page-landing-sample-product--global'; $pageStyles = ['landing/landing/_store', 'landing/landing/sample-product']; ?>
<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="/store">Product Listing</a>
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
            <polyline points="9 18 15 12 9 6"></polyline>
        </svg>
        <span>NITROTECH Whey Protein</span>
    </div>

    <!-- Product Top Section -->
    <main class="product-main">
        <!-- Left: Image Gallery (click a thumbnail to swap it with the main image) -->
        <div class="product-gallery">
            <div class="gallery-thumbnails">
                <button type="button" class="thumbnail img-placeholder" aria-label="Show benefits image">
                    <img src="https://www.muscletech.com/cdn/shop/files/MuscleTech-NitroTech-WheyProtein-2000x2000-01-V2-new.jpg?v=1764974667&amp;width=1000" alt="NITROTECH Whey Protein, benefits">
                </button>
                <button type="button" class="thumbnail img-placeholder" aria-label="Show formula image">
                    <img src="https://www.muscletech.com/cdn/shop/files/MuscleTech-NitroTech-WheyProtein-2000x2000-02-V3_new.jpg?v=1764974667&amp;width=1000" alt="NITROTECH Whey Protein, formula">
                </button>
                <button type="button" class="thumbnail img-placeholder" aria-label="Show nutrition image">
                    <img src="https://www.muscletech.com/cdn/shop/files/MuscleTech-NitroTech-WheyProtein-2000x2000-03-V2_new.jpg?v=1764974667&amp;width=1000" alt="NITROTECH Whey Protein, nutrition">
                </button>
            </div>
            <div class="gallery-main img-placeholder">
                <img id="gallery-main-img" src="https://www.muscletech.com/cdn/shop/files/MuscleTech-NitroTech-2lb-chocolate.jpg?v=1764974667&amp;width=1000" alt="NITROTECH Whey Protein 2 lb, Milk Chocolate">
            </div>
        </div>

        <!-- Right: Product Info -->
        <div class="product-info">
            <div class="product-header">
                <h1 class="product-title">NITROTECH Whey Protein</h1>
                <button class="wishlist-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                    </svg>
                </button>
            </div>

            <div class="product-price-row">
                <div class="product-price">Rs.12 000.00</div>
                <div class="price-divider"></div>
                <div class="product-reviews">
                    <div class="stars">
                        <!-- SVG Stars -->
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#E5E7EB">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    ( 32 review )
                </div>
            </div>

            <div class="divider"></div>

            <div class="product-desc">
                <p>MuscleTech Nitro-Tech is a scientifically engineered whey protein formula designed for athletes looking to build more lean muscle, increase strength, and maximize recovery. Powered by premium whey peptides and isolates, this fast-absorbing powder is enhanced with creatine monohydrate to deliver superior muscle-building results compared to regular whey protein alone.</p>
                <ul>
                    <li>30g of premium whey protein isolate and peptides per serving for rapid muscle synthesis.</li>
                    <li>3g of clinically studied creatine monohydrate to amplify explosive strength and power.</li>
                    <li>6.8g of naturally occurring BCAAs to fuel optimal muscle repair and recovery.</li>
                </ul>
            </div>

            <div class="product-actions">
                <div class="row-actions">
                    <div class="qty-selector">
                        <button class="qty-btn">−</button>
                        <span>1</span>
                        <button class="qty-btn">+</button>
                    </div>
                    <a href="/store/cart" class="btn btn-primary">Add to Cart</a>
                </div>
                <button class="btn btn-outline">Buy Now</button>
            </div>

            <div class="shipping-info">
                <div class="shipping-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="3" width="15" height="13"></rect>
                        <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                        <circle cx="5.5" cy="18.5" r="2.5"></circle>
                        <circle cx="18.5" cy="18.5" r="2.5"></circle>
                    </svg>
                    Free island-wide shipping on all orders over Rs.20000
                </div>
                <div class="shipping-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="1 4 1 10 7 10"></polyline>
                        <polyline points="23 20 23 14 17 14"></polyline>
                        <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                    </svg>
                    Delivers in: 3-7 Working Days <u>Shipping & Return</u>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Extended Description Tabs -->
<div class="extended-info-wrapper">
    <div class="container">
        <div class="tab-header">
            <div class="tab-title active">Description</div>
            <div class="tab-divider"></div>
            <div class="tab-title inactive">Reviews</div>
        </div>

        <div class="tab-content">
            <p>Engineered with multi-phase filtration technology, Nitro-Tech ensures a cleaner protein source with significantly less fat, lactose, and impurities than cheaper alternatives. The foundational blend of rapid-absorbing whey isolates allows your body to quickly assimilate critical amino acids right after an intense workout, effectively igniting protein synthesis. Manufactured according to strict cGMP standards, this advanced performance formula guarantees maximum purity and unmatched ingredient integrity to help you shatter your fitness benchmarks safely.</p>
            <ul>
                <li>Rapid-Absorbing Formula: Utilizes micro-filtered whey peptides and isolates for faster post-workout nutrient delivery.</li>
                <li>Enhanced ATP Regeneration: The integrated creating does helps replenish cellular energy stores during high-intensity training.</li>
                <li>Less Mass Optimization: Formulated with only 2.5g of fat and 4g of carbohydrates to promote pure, clean muscle growth.</li>
                <li>Complete Amino Profile: Features an essential matrix including L-leucine, L-valine, and L-isoleucine to protect against muscle breakdown.</li>
            </ul>
        </div>
    </div>
</div>

<!-- Similar Products -->
<div class="container">
    <section class="similar-products-section">
        <h2 class="section-title">Similar Products</h2>
        <div class="products-grid">

            <!-- Card 1 -->
            <div class="product-card">
                <a href="/store/product" class="product-image img-placeholder">
                    <img src="https://images.unsplash.com/photo-1693996045300-521e9d08cabc?q=80&amp;w=600&amp;h=750&amp;fit=crop&amp;auto=format" alt="Vanilla Whey Protein 2 lb" loading="lazy" width="400" height="500">
                </a>
                <div class="product-card-info">
                    <h3 class="product-card-title"><a href="/store/product">Vanilla Whey Protein 2 lb</a></h3>
                    <div class="product-bottom">
                        <span class="product-card-price">Rs 14 500</span>
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

            <!-- Card 3 -->
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


<script>
    // Gallery: clicking a thumbnail swaps its image with the main image
    (function() {
        var mainImg = document.getElementById('gallery-main-img');
        var thumbs = document.querySelectorAll('.gallery-thumbnails .thumbnail');
        if (!mainImg || !thumbs.length) return;

        thumbs.forEach(function(thumb) {
            thumb.addEventListener('click', function() {
                var thumbImg = thumb.querySelector('img');
                var mainSrc = mainImg.src,
                    mainAlt = mainImg.alt;

                mainImg.classList.add('is-swapping');
                setTimeout(function() {
                    mainImg.src = thumbImg.src;
                    mainImg.alt = thumbImg.alt;
                    thumbImg.src = mainSrc;
                    thumbImg.alt = mainAlt;
                    thumb.setAttribute('aria-label', 'Show ' + mainAlt.split(', ').pop() + ' image');
                    mainImg.classList.remove('is-swapping');
                }, 150);
            });
        });
    })();
</script>