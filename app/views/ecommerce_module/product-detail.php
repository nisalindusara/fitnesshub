<style>
    .detail-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 0px;
        min-height: 688px;
        background: #FFFFFF;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    .header-section {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 16px 24px;
        width: 100%;
        height: 70.8px;
        border-bottom: 0.8px solid rgba(28, 28, 28, 0.08);
        box-sizing: border-box;
    }

    .header-left {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 12px;
    }

    .back-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        cursor: pointer;
    }

    .icon-svg {
        display: block;
    }

    .header-titles {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .breadcrumb-text {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
    }

    .page-title-text {
        font-weight: 400;
        font-size: 14px;
        line-height: 21px;
        color: #1C1C1C;
    }

    .header-right {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 8px;
    }

    .action-btn-edit {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        height: 30px;
        background: rgba(28, 28, 28, 0.06);
        border-radius: 8px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .btn-text-edit {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        text-align: center;
        color: #1C1C1C;
    }

    .action-btn-delete {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        height: 30px;
        background: rgba(220, 38, 38, 0.07);
        border-radius: 8px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .btn-text-delete {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        text-align: center;
        color: #DC2626;
    }

    .content-body {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        width: 100%;
        box-sizing: border-box;
    }

    .gallery-column {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        gap: 12px;
        box-sizing: border-box;
    }

    .main-image-wrapper {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 272px;
        height: 204px;
        border-radius: 12px;
        overflow: hidden;
    }

    .main-image-placeholder {
        width: 100%;
        height: 100%;
    }

    .dot-purple {
        width: 6px;
        height: 6px;
        background: #95A4FC;
        border-radius: 50%;
    }

    .image-counter {
        position: absolute;
        right: 12px;
        bottom: 12px;
        display: flex;
        align-items: center;
        padding: 1px 8px;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 6px;
    }

    .image-counter-text {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: #FFFFFF;
    }

    .thumbnail-list {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 8px;
        width: 272px;
        height: 50px;
    }

    .thumbnail-item {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        width: 64px;
        height: 48px;
        border-radius: 8px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .thumbnail-active {
        border: 1.6px solid #1C1C1C;
    }

    .thumb-placeholder-1 {
        width: 100%;
        height: 100%;
    }

    .thumb-placeholder-2 {
        width: 100%;
        height: 100%;
    }

    .thumb-placeholder-3 {
        width: 100%;
        height: 100%;
    }

    .details-column {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px 24px 24px 0px;
        gap: 24px;
        box-sizing: border-box;
    }

    .core-details-grid {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        width: 100%;
    }

    .detail-block-full {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
        width: 100%;
    }

    .field-label {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
    }

    .field-value-large {
        font-weight: 400;
        font-size: 13px;
        line-height: 20px;
        color: #1C1C1C;
    }

    .detail-row {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        width: 100%;
        gap: 32px;
    }

    .detail-col {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
        width: 289.2px;
    }

    .field-value {
        font-weight: 400;
        font-size: 13px;
        line-height: 20px;
        color: #1C1C1C;
    }

    .value-with-icon {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 4px;
        height: 20px;
    }

    .status-text-value {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        color: #8A8CD9;
        margin-left: 2px;
    }

    .section-divider-block {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 20px 0px 0px;
        width: 100%;
        border-top: 0.8px solid rgba(28, 28, 28, 0.06);
        box-sizing: border-box;
        gap: 4px;
    }

    .description-paragraph {
        font-weight: 400;
        font-size: 13px;
        line-height: 20px;
        color: rgba(28, 28, 28, 0.7);
    }

    .attributes-grid {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 4px 0px 0px;
        gap: 16px;
        width: 100%;
    }

    .variants-list {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 4px 0px 0px;
        gap: 8px;
        width: 100%;
    }

    .variant-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 10px 12px;
        width: 100%;
        height: 42.6px;
        background: #F7F9FB;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .variant-info-group {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 8px;
    }

    .variant-sku-label {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
    }

    .variant-sku-value {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        color: #1C1C1C;
    }

    .variant-chip {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 2px 6px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.1);
        border-radius: 4px;
        box-sizing: border-box;
    }

    .chip-text {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: #1C1C1C;
    }

    .variant-stock-value {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        color: #1C1C1C;
    }
</style>

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
            <div class="action-btn-edit" onclick="location.href='http://fitnesshub.local/portal/ecom/products/edit-product';" style="cursor: pointer;">
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