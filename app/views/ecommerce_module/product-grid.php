<?php $pageStyles = ['staff/ecommerce_module/_product-header', 'staff/ecommerce_module/product-grid']; ?>

<div class="list-container">

    <!-- Toolbar -->
    <div class="toolbar-wrapper">
        <div class="toolbar-left-actions">
            <!-- Add Button -->
            <div class="action-icon-button" onclick="location.href='/portal/products/create';" style="cursor: pointer;">
                <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 4V16M4 10H16" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </div>

            <!-- Filter Toggle -->
            <div class="segment-control">
                <div class="segment-button segment-button-active">
                    <span class="segment-text segment-text-active">All</span>
                </div>
                <div class="segment-button">
                    <span class="segment-text">Listed</span>
                </div>
                <div class="segment-button">
                    <span class="segment-text">Not Listed</span>
                </div>
            </div>

            <!-- Sort Button -->
            <div class="action-icon-button">
                <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 4V16M6 4L3 7M6 4L9 7M14 16V4M14 16L11 13M14 16L17 13" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <!-- Search Box -->
        <div class="toolbar-right-actions">
            <div class="search-container">
                <svg class="icon-svg" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="7.333" cy="7.333" r="5.333" stroke="#1C1C1C" stroke-width="1.2" />
                    <path d="M11.333 11.333L14.666 14.666" stroke="#1C1C1C" stroke-width="1.2" stroke-linecap="round" />
                </svg>
                <input type="text" class="search-input-field" placeholder="Search" />
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div class="product-grid">

        <!-- Card 1 -->
        <div class="product-card" onclick="location.href='/portal/products/view';" style="cursor: pointer;">
            <div class="card-image-wrapper">
                <img class="image-placeholder bg-dark-gray" src="/uploads/products/performance_tee.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#PR9801 · Apparel</span>
                    <div class="listed-badge badge-listed">Listed</div>
                </div>
                <span class="card-title">Performance Tee – Black</span>
                <div class="card-price-row">
                    <span class="card-price">400</span>
                    <span class="card-stock">3 in stock</span>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/foam_roller.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#PR9802 · Relaxation</span>
                    <div class="listed-badge badge-listed">Listed</div>
                </div>
                <span class="card-title">Foam Roller Pro</span>
                <div class="card-price-row">
                    <span class="card-price">2,300</span>
                    <span class="card-stock">4 in stock</span>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/gymscore.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#PR9803 · Merch</span>
                    <div class="listed-badge badge-not-listed">Not Listed</div>
                </div>
                <span class="card-title">GymCore Snapback</span>
                <div class="card-price-row">
                    <span class="card-price">4,000</span>
                    <span class="card-stock">6 in stock</span>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/compression.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#CM9804 · Apparel</span>
                    <div class="listed-badge badge-listed">Listed</div>
                </div>
                <span class="card-title">Compression Shorts</span>
                <div class="card-price-row">
                    <span class="card-price">3,000</span>
                    <span class="card-stock">8 in stock</span>
                </div>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/whey_protein.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#CM9805 · Supplements</span>
                    <div class="listed-badge badge-not-listed">Not Listed</div>
                </div>
                <span class="card-title">Whey Protein 2kg</span>
                <div class="card-price-row">
                    <span class="card-price">12,000</span>
                    <span class="card-stock card-stock-out">Out of stock</span>
                </div>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/lifting_staps.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#CM9801 · Accessories</span>
                    <div class="listed-badge badge-listed">Listed</div>
                </div>
                <span class="card-title">Lifting Straps</span>
                <div class="card-price-row">
                    <span class="card-price">1,000</span>
                    <span class="card-stock card-stock-out">Out of stock</span>
                </div>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/resistance_band.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#CM9802 · Merch</span>
                    <div class="listed-badge badge-not-listed">Not Listed</div>
                </div>
                <span class="card-title">Resistance Band Set</span>
                <div class="card-price-row">
                    <span class="card-price">2,000</span>
                    <span class="card-stock">8 in stock</span>
                </div>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="product-card">
            <div class="card-image-wrapper">
                <img class="image-placeholder" src="/uploads/products/creatine_monohydrate.jpg">
            </div>
            <div class="card-details-section">
                <div class="card-meta-row">
                    <span class="card-meta">#CM9803 · Recovery</span>
                    <div class="listed-badge badge-listed">Listed</div>
                </div>
                <span class="card-title">Creatine Monohydrate</span>
                <div class="card-price-row">
                    <span class="card-price">3,500</span>
                    <span class="card-stock">2 in stock</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Pagination -->
    <div class="pagination-wrapper">
        <div class="page-btn page-btn-disabled">
            <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.5 15L7.5 10L12.5 5" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="page-btn page-btn-active">
            <span class="page-text">1</span>
        </div>
        <div class="page-btn">
            <span class="page-text">2</span>
        </div>
        <div class="page-btn">
            <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.5 15L12.5 10L7.5 5" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>

</div>