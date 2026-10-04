<?php $pageStyles = ['staff/ecommerce_module/_product-header', 'staff/ecommerce_module/product-detail']; ?>

<div class="detail-container">

    <!-- Header -->
    <div class="header-section">
        <div class="header-left">
            <div class="back-btn" onclick="history.back()">
                <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="icon-path" d="M12.5 15L7.5 10L12.5 5" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="header-titles">
                <span class="breadcrumb-text">Store / Products</span>
                <span class="page-title-text">Performance Tee – Black</span>
            </div>
        </div>
        <div class="header-right">
            <div class="action-btn-edit" onclick="location.href='/portal/products/edit';" style="cursor: pointer;">
                <span class="btn-text-edit">Edit</span>
            </div>
            <div class="action-btn-delete">
                <span class="btn-text-delete">Delete</span>
            </div>
        </div>
    </div>

    <div class="content-body">

        <div class="gallery-column">
            <div class="main-image-wrapper">
                <img class="main-image-placeholder" src="/uploads/products/performance_tee.jpg" alt="">

                <div class="image-counter">
                    <span class="image-counter-text">1 / 3</span>
                </div>
            </div>

            <div class="thumbnail-list">
                <div class="thumbnail-item thumbnail-active">
                    <img class="main-image-placeholder" src="/uploads/products/performance_tee.jpg" alt="">

                </div>
                <div class="thumbnail-item">
                    <img class="main-image-placeholder" src="/uploads/products/performance_tee.jpg" alt="">

                </div>
                <div class="thumbnail-item">
                    <img class="main-image-placeholder" src="/uploads/products/performance_tee.jpg" alt="">

                </div>
            </div>
        </div>

        <!-- Right Column: Details -->
        <div class="details-column">

            <!-- Section 1: Core Details -->
            <div class="core-details-grid">
                <div class="detail-block-full">
                    <span class="field-label">Product Name</span>
                    <span class="field-value-large">Performance Tee – Black</span>
                </div>

                <div class="detail-row">
                    <div class="detail-col">
                        <span class="field-label">Product ID</span>
                        <span class="field-value">#PR9801</span>
                    </div>
                    <div class="detail-col">
                        <span class="field-label">Category</span>
                        <span class="field-value">Apparel</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-col">
                        <span class="field-label">Price</span>
                        <span class="field-value">400</span>
                    </div>
                    <div class="detail-col">
                        <span class="field-label">Stock</span>
                        <span class="field-value">3</span>
                    </div>
                </div>

                <div class="detail-row">
                    <div class="detail-col">
                        <span class="field-label">Last Updated</span>
                        <div class="value-with-icon">
                            <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect class="icon-path" x="2" y="3" width="10" height="9" rx="1.5" stroke="#1C1C1C" stroke-width="1.2" />
                                <path class="icon-path" d="M2 6H12" stroke="#1C1C1C" stroke-width="1.2" />
                                <path class="icon-path" d="M4.5 1.5V4.5M9.5 1.5V4.5" stroke="#1C1C1C" stroke-width="1.2" stroke-linecap="round" />
                            </svg>
                            <span class="field-value">Just now</span>
                        </div>
                    </div>
                    <div class="detail-col">
                        <span class="field-label">Status</span>
                        <div class="value-with-icon">
                            <div class="dot-purple"></div>
                            <span class="status-text-value">In Progress</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2: Description -->
            <div class="section-divider-block">
                <span class="field-label">Description</span>
                <span class="description-paragraph">Moisture-wicking performance tee engineered for high-intensity workouts. Flatlock seams reduce chafing during movement.</span>
            </div>

            <!-- Section 3: Attributes -->
            <div class="section-divider-block">
                <span class="field-label">Attributes</span>
                <div class="attributes-grid">
                    <div class="detail-row">
                        <div class="detail-col">
                            <span class="field-label">Brand</span>
                            <span class="field-value">GymCore</span>
                        </div>
                        <div class="detail-col">
                            <span class="field-label">Weight</span>
                            <span class="field-value">180g</span>
                        </div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-col">
                            <span class="field-label">Material</span>
                            <span class="field-value">92% Polyester</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Variants -->
            <div class="section-divider-block">
                <span class="field-label">Variants (2)</span>
                <div class="variants-list">

                    <div class="variant-row">
                        <div class="variant-info-group">
                            <span class="variant-sku-label">SKU</span>
                            <span class="variant-sku-value">PT-BLK-S</span>
                            <div class="variant-chip"><span class="chip-text">S</span></div>
                            <div class="variant-chip"><span class="chip-text">Black</span></div>
                        </div>
                        <span class="variant-stock-value">1 in stock</span>
                    </div>

                    <div class="variant-row">
                        <div class="variant-info-group">
                            <span class="variant-sku-label">SKU</span>
                            <span class="variant-sku-value">PT-BLK-M</span>
                            <div class="variant-chip"><span class="chip-text">M</span></div>
                            <div class="variant-chip"><span class="chip-text">Black</span></div>
                        </div>
                        <span class="variant-stock-value">2 in stock</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>