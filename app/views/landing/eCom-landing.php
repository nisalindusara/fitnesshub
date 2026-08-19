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
                <h3 class="product-title">Hit Fitness Power Band</h3>
                <div class="product-bottom">
                    <span class="product-price">$200.00</span>
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
                <h3 class="product-title">Hit Fitness Power Band</h3>
                <div class="product-bottom">
                    <span class="product-price">$200.00</span>
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
                    <span class="product-price">$200.00</span>
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
                    <span class="product-price">$200.00</span>
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
            <a href="/about" class="about-btn">
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

<style>
    /* --- Base & Reset --- */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Barlow', sans-serif;
        background-color: #F9FAFB;
        /* Light gray background matching the image */
        color: #0A0A0A;
        line-height: 1.5;
    }

    .container {
        width: 100%;
        max-width: 1231px;
        margin: 0 auto;
        padding: 0 32px;
    }

    /* --- Hero Section --- */
    .store-hero {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding: 80px 20px 40px;
        height: 100vh;
        background: url('/assets/images/landing/store_page_hero_image.png') center/cover no-repeat;
    }

    .hero-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 56px;
        text-transform: uppercase;
        letter-spacing: -1px;
        color: #0A0A0A;
        margin-bottom: 16px;
    }

    .hero-subtitle {
        font-family: 'Barlow', sans-serif;
        font-weight: 500;
        font-size: 16px;
        color: #4A5565;
        max-width: 650px;
        margin-bottom: 32px;
    }

    /* --- Search Bar --- */
    .search-wrapper {
        position: relative;
        width: 100%;
        max-width: 400px;
        margin-bottom: 40px;
    }

    .search-input {
        width: 100%;
        padding: 16px 24px;
        background: #E5E7EB;
        border: 1px solid transparent;
        border-radius: 50px;
        font-family: 'Barlow', sans-serif;
        font-size: 16px;
        font-weight: 500;
        color: #0A0A0A;
        outline: none;
        transition: all 0.2s;
    }

    .search-input::placeholder {
        color: #99A1AF;
    }

    .search-input:focus {
        border-color: #E31837;
        background: #FFFFFF;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .search-btn {
        position: absolute;
        right: 8px;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: #0A0A0A;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #FFFFFF;
        transition: background 0.2s;
    }

    .search-btn:hover {
        background: #E31837;
    }

    /* --- Featured Products Section --- */
    .featured-section {
        padding: 80px 0;
    }

    .section-header {
        text-align: center;
        margin-bottom: 48px;
        position: relative;
    }

    .section-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 36px;
        text-transform: uppercase;
        color: #0A0A0A;
        display: inline-block;
    }

    /* The small pink/red accent line from the design */
    .section-title::before {
        content: '';
        position: absolute;
        top: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 3px;
        background-color: #E31837;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .product-card {
        display: flex;
        flex-direction: column;
        gap: 16px;
        height: 100%;
    }

    .product-image {
        width: 100%;
        aspect-ratio: 4 / 5;
        border-radius: 12px;
        object-position: center 30%;
    }

    .product-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
        flex: 1;
    }

    .product-title {
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 18px;
        color: #0A0A0A;
        line-height: 1.3;
        min-height: calc(1.3em * 2);
        /* reserves space for 2 lines every time */
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: auto;
    }

    .product-price {
        font-weight: 900;
        font-size: 14px;
        color: #0A0A0A;
    }

    .add-btn {
        background: none;
        border: 1.5px solid #0A0A0A;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #0A0A0A;
        transition: all 0.2s;
    }

    .add-btn:hover {
        background: #E31837;
        border-color: #E31837;
        color: #FFFFFF;
    }

    /* --- About Section --- */
    .about-section {
        padding: 80px 0;
        border-top: 1px solid #E5E7EB;
    }

    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .about-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 24px;
    }

    .about-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 900;
        font-size: 42px;
        text-transform: uppercase;
        line-height: 1.1;
        color: #0A0A0A;
    }

    .about-desc {
        font-size: 16px;
        color: #4A5565;
        max-width: 505px;
    }

    .about-btn {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 16px 32px;
        background: #E31837;
        /* Using the primary red */
        color: #FFFFFF;
        font-family: 'Barlow', sans-serif;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1.4px;
        text-transform: uppercase;
        text-decoration: none;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .about-btn:hover {
        background: #c21430;
    }

    /* Collage Grid Layout */
    .collage-wrapper {
        position: relative;
        width: 100%;
        height: 420px;
    }

    .collage-bg {
        position: absolute;
        right: 0;
        top: 0;
        width: 345px;
        height: 345px;
        border-radius: 16px;
        background: #E5E7EB;
    }

    .collage-main {
        position: absolute;
        right: 30px;
        top: 54px;
        width: 437px;
        height: 363px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .collage-small-top {
        position: absolute;
        left: 0;
        top: 10px;
        width: 155px;
        height: 155px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .collage-small-bottom {
        position: absolute;
        left: 0;
        top: 185px;
        width: 155px;
        height: 185px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .product-image img,
    .collage-bg img,
    .collage-main img,
    .collage-small-top img,
    .collage-small-bottom img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        overflow: hidden;
        display: block;
    }

    .collage-main img,
    .collage-small-top img,
    .collage-small-bottom img {
        border-radius: 16px;
    }
</style>