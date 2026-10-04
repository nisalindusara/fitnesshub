<?php $bodyClass = 'page-landing-ecom-landing--global'; $pageStyles = ['landing/landing/_store', 'landing/landing/eCom-landing']; ?>
<!-- Hero Section -->
<header class="store-hero">
    <h1 class="hero-title">Gear Chosen for Your Goals.</h1>
    <p class="hero-subtitle">Shop supplements and equipment recommended by your instructor, curated for exactly where you are in your training.</p>

    <div class="search-wrapper">
        <input type="text" class="search-input" placeholder="Search An Item">
        <button class="search-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </button>
    </div>
</header>

<!-- Featured Products -->
<section class="featured-section container">
    <div class="section-header">
        <h2 class="section-title">Featured Products</h2>
    </div>

    <div class="products-grid">
        <!-- Product 1 -->
        <div class="product-card">
            <div class="product-image">
                <img src="/assets/images/landing/featured_item_1.jpg">
            </div>
            <div class="product-info">
                <h3 class="product-title">Whey Protein Vanilla</h3>
                <div class="product-bottom">
                    <span class="product-price">LKR 20000.00</span>
                    <button class="add-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="product-card">
            <div class="product-image">
                <img src="/assets/images/landing/featured_item_2.jpg">
            </div>
            <div class="product-info">
                <h3 class="product-title">Power Shaker bottle</h3>
                <div class="product-bottom">
                    <span class="product-price">LKR 3500.00</span>
                    <button class="add-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="product-card">
            <div class="product-image">
                <img src="/assets/images/landing/featured_item_3.jpg">
            </div>
            <div class="product-info">
                <h3 class="product-title">WHEY Protein Powder</h3>
                <div class="product-bottom">
                    <span class="product-price">LKR 7000.00</span>
                    <button class="add-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Product 4 -->
        <div class="product-card">
            <div class="product-image">
                <img src="/assets/images/landing/featured_item_4.jpg">
            </div>
            <div class="product-info">
                <h3 class="product-title">Hit Fitness Power Band</h3>
                <div class="product-bottom">
                    <span class="product-price">LKR 1200.00</span>
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

<!-- About Section -->
<section class="about-section container">
    <div class="about-grid">
        <div class="about-content">
            <h2 class="about-title">Explore the Full Catalogue</h2>
            <p class="about-desc">Unlike general marketplaces, everything in our store is selected specifically for training, recovery, and performance. If it's not something we'd recommend to our own members, it's not on these shelves.</p>
            <a href="/store/catalog" class="about-btn">
                Explore Catalogue
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>

        <!-- Absolute Positioning used here to easily recreate the overlapping collage from Figma -->
        <div class="collage-wrapper">
            <div class="collage-bg"></div>
            <div class="collage-main"><img src="/assets/images/landing/explore_catalog_big.jpg" alt=""></div>
            <div class="collage-small-top"><img src="/assets/images/landing/explore_catalog_small.jpg" alt=""></div>
            <div class="collage-small-bottom"><img src="/assets/images/landing/explore_catalog_small_2.jpg" alt=""></div>
        </div>
    </div>
</section>

