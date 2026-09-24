<style>
    .list-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        gap: 12px;
        width: 100%;
        /* Changed to 100% to allow expansion */
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    .toolbar-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 8px;
        gap: 16px;
        width: 100%;
        height: 47.6px;
        background: #F7F9FB;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .toolbar-left-actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 0px;
        gap: 8px;
    }

    .action-icon-button {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 4px;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .icon-svg {
        display: block;
    }

    .segment-control {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 2px 4px;
        gap: 2px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.08);
        border-radius: 8px;
        box-sizing: border-box;
    }

    .segment-button {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 4px 8px;
        height: 26px;
        border-radius: 4px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .segment-button-active {
        background: rgba(28, 28, 28, 0.08);
    }

    .segment-text {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        text-align: center;
        color: rgba(28, 28, 28, 0.45);
    }

    .segment-text-active {
        color: #1C1C1C;
    }

    .toolbar-right-actions {
        display: flex;
    }

    .search-container {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 4px 8px;
        gap: 8px;
        width: 161.6px;
        height: 30.6px;
        background: rgba(255, 255, 255, 0.4);
        border: 0.8px solid rgba(28, 28, 28, 0.1);
        border-radius: 8px;
        box-sizing: border-box;
    }

    .search-input-field {
        width: 100%;
        height: 17px;
        font-family: 'Inter', sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 17px;
        color: #1C1C1C;
        border: none;
        background: transparent;
        outline: none;
        padding: 0;
    }

    .search-input-field::placeholder {
        color: rgba(28, 28, 28, 0.2);
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 12px;
        width: 100%;
        box-sizing: border-box;
    }

    .product-card {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 0px;
        width: 100%;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.08);
        border-radius: 12px;
        box-sizing: border-box;
        overflow: hidden;
    }

    .card-image-wrapper {
        position: relative;
        width: 100%;
        height: 162px;
        background: #F7F9FB;
        box-sizing: border-box;
    }

    .image-placeholder {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .card-details-section {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 12px;
        width: 100%;
        height: 85px;
        box-sizing: border-box;
    }

    .card-meta-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-bottom: 2px;
    }

    .card-meta {
        font-weight: 400;
        font-size: 10px;
        line-height: 15px;
        color: rgba(28, 28, 28, 0.4);
    }

    .listed-badge {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 2px 6px;
        background: #F7F9FB;
        border-radius: 6px;
        font-weight: 400;
        font-size: 10px;
        line-height: 15px;
        box-sizing: border-box;
    }

    .badge-listed {
        color: #4AA785;
        /* Green color to indicate active/listed */
    }

    .badge-not-listed {
        color: rgba(28, 28, 28, 0.4);
        /* Subdued gray color for not listed */
    }

    .card-title {
        width: 100%;
        font-weight: 400;
        font-size: 13px;
        line-height: 18px;
        color: #1C1C1C;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .card-price-row {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        margin-top: 8px;
    }

    .card-price {
        font-weight: 400;
        font-size: 12px;
        line-height: 18px;
        color: #1C1C1C;
    }

    .card-stock {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.5);
    }

    .card-stock-out {
        color: rgba(28, 28, 28, 0.3);
    }

    .pagination-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: center;
        padding: 4px 0px 0px;
        gap: 8px;
        width: 100%;
        height: 32px;
        box-sizing: border-box;
    }

    .page-btn {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        padding: 4px;
        width: 28px;
        height: 28px;
        border-radius: 8px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .page-btn-active {
        background: rgba(28, 28, 28, 0.08);
        padding: 0px;
    }

    .page-btn-disabled {
        opacity: 0.3;
        cursor: default;
    }

    .page-text {
        font-weight: 400;
        font-size: 14px;
        line-height: 21px;
        text-align: center;
        color: #1C1C1C;
    }
</style>

<div class="list-container">

    <!-- Toolbar -->
    <div class="toolbar-wrapper">
        <div class="toolbar-left-actions">
            <!-- Add Button -->
            <div class="action-icon-button" onclick="location.href='http://fitnesshub.local/portal/ecom/products/add-product';" style="cursor: pointer;">
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
        <div class="product-card" onclick="location.href='http://fitnesshub.local/portal/ecom/products/view-product';" style="cursor: pointer;">
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