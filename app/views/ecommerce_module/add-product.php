<?php $bodyClass = 'page-ecommerce-module-add-product--global'; $pageStyles = ['staff/ecommerce_module/add-product']; ?>


<div class="main-container">
    <div class="header-section">
        <span class="header-text">Add Product</span>
    </div>

    <div class="form-layout">
        <div class="columns-wrapper">

            <!-- Left Column -->
            <div class="left-column">
                <div class="card-panel">
                    <div class="card-header">
                        <span class="card-title">Product Details</span>
                    </div>

                    <div class="form-fields">
                        <!-- Name -->
                        <div class="field-group">
                            <span class="field-label">Name</span>
                            <input type="text" class="text-input" placeholder="e.g. Whey Protein Isolate" />
                        </div>

                        <!-- Description -->
                        <div class="field-group textarea-group">
                            <span class="field-label">Description</span>
                            <textarea class="textarea-input" placeholder="Describe the product..."></textarea>
                        </div>

                        <!-- Category -->
                        <div class="field-group">
                            <span class="field-label">Category</span>
                            <div class="select-box">
                                <span class="select-placeholder">Select a category</span>
                                <span class="chevron-icon">
                                    <svg class="svg-icon" width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1.5L6 6.5L11 1.5" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <!-- Price and Stock -->
                        <div class="row-group">
                            <div class="half-field">
                                <span class="field-label">Base Price</span>
                                <div class="input-with-prefix">
                                    <span class="prefix-text">Rs.</span>
                                    <input type="text" class="borderless-input" placeholder="0.00" />
                                </div>
                            </div>
                            <div class="half-field">
                                <span class="field-label">Stock Quantity</span>
                                <input type="text" class="text-input" placeholder="0" />
                            </div>
                        </div>

                        <!-- SKU -->
                        <div class="field-group">
                            <span class="field-label">SKU</span>
                            <input type="text" class="text-input" placeholder="e.g. WH-ISO-001" />
                        </div>

                        <!-- Variants Section -->
                        <div class="variants-section">
                            <div class="variants-header">
                                <span class="variants-title">Variants</span>
                                <button class="add-variant-btn">
                                    <svg class="svg-icon" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7 2.91666V11.0833M2.91666 7H11.0833" stroke="#364153" stroke-width="1.16667" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="add-variant-text">Add Variant</span>
                                </button>
                            </div>

                            <div class="variants-table">
                                <div class="table-headers">
                                    <span class="col-header col-size">Size</span>
                                    <span class="col-header col-color">Color</span>
                                    <span class="col-header col-qty">Stock Qty</span>
                                    <span class="col-header col-price">Price Override</span>
                                </div>

                                <div class="table-row">
                                    <input type="text" class="variant-input val-size" value="M" />
                                    <input type="text" class="variant-input val-color" value="Black" />
                                    <input type="text" class="variant-input val-qty" value="0" />
                                    <div class="variant-input val-price input-with-icon">
                                        <span class="currency-icon">$</span>
                                        <input type="text" class="borderless-input" placeholder="—" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column">

                <!-- Product Image -->
                <div class="card-panel image-panel">
                    <div class="card-header no-border">
                        <span class="card-title">Product Image</span>
                    </div>

                    <div class="upload-box">
                        <div class="upload-icon">
                            <svg class="svg-icon" width="37" height="27" viewBox="0 0 37 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.741 9.94198C11.3857 5.76633 14.9961 2.5 19.3333 2.5C22.7533 2.5 25.6669 4.6067 26.899 7.64326C27.2023 7.60195 27.5143 7.58065 27.8333 7.58065C31.7454 7.58065 34.9167 10.7519 34.9167 14.664C34.9167 18.576 31.7454 21.7473 27.8333 21.7473H10.8333C6.23096 21.7473 2.5 18.0163 2.5 13.414C2.5 9.0768 5.8118 5.51351 10.0381 5.11181" stroke="#A3A3A3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.3333 11.8333V17.5" stroke="#A3A3A3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.0833 14.6667L19.3333 10.4167L23.5833 14.6667" stroke="#A3A3A3" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <span class="upload-title">Drag & drop or click to upload</span>
                        <span class="upload-subtitle">PNG, JPG up to 5MB</span>
                        <button class="browse-btn"><span class="browse-text">Browse files</span></button>
                    </div>

                    <div class="thumbnails-container">
                        <div class="thumbnail-placeholder">
                            <svg class="svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke="#D1D5DC" stroke-width="1.5" />
                                <circle cx="8.5" cy="8.5" r="1.5" stroke="#D1D5DC" stroke-width="1.5" />
                                <path d="M21 15L16 10L5 21" stroke="#D1D5DC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="thumbnail-placeholder">
                            <svg class="svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke="#D1D5DC" stroke-width="1.5" />
                                <circle cx="8.5" cy="8.5" r="1.5" stroke="#D1D5DC" stroke-width="1.5" />
                                <path d="M21 15L16 10L5 21" stroke="#D1D5DC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="thumbnail-placeholder">
                            <svg class="svg-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="3" y="3" width="18" height="18" rx="2" stroke="#D1D5DC" stroke-width="1.5" />
                                <circle cx="8.5" cy="8.5" r="1.5" stroke="#D1D5DC" stroke-width="1.5" />
                                <path d="M21 15L16 10L5 21" stroke="#D1D5DC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="card-panel status-panel">
                    <div class="card-header no-border">
                        <span class="card-title">Status</span>
                    </div>
                    <div class="select-box status-select">
                        <span class="status-active-text">Active</span>
                        <span class="chevron-icon">
                            <svg class="svg-icon" width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="#364153" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </div>
                </div>

            </div>
        </div>

        <!-- Actions Row -->
        <div class="actions-container">
            <button class="action-btn discard-btn"><span class="discard-text">Discard</span></button>
            <button class="action-btn save-btn"><span class="save-text">Add Product</span></button>
        </div>

    </div>
</div>