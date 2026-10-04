<?php $pageStyles = ['staff/ecommerce_module/_product-header', 'staff/ecommerce_module/product-detail-edit']; ?>

<div class="edit-container">
    <!-- Header -->
    <div class="header-section">
        <div class="header-left">
            <div class="back-btn" onclick="history.back()" style="cursor: pointer;">
                <svg class="icon-svg" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path class="icon-path" d="M12.5 15L7.5 10L12.5 5" stroke="#1C1C1C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="header-titles">
                <span class="breadcrumb-text">Store / Products / Edit</span>
                <span class="page-title-text">Performance Tee – Black</span>
            </div>
        </div>
        <div class="header-right">
            <div class="action-btn-cancel">
                <span class="btn-text-cancel">Cancel</span>
            </div>
            <div class="action-btn-save">
                <span class="btn-text-save">Save changes</span>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="content-body">

        <!-- Left Column: Images & Status -->
        <div class="left-panel">
            <span class="section-title">Images (3)</span>

            <div class="image-manager-list">
                <!-- Image 1 (Cover) -->
                <div class="image-manager-item active-image-item">
                    <img class="img-thumb" src="/uploads/products/performance_tee.jpg">
                    <div class="img-info">
                        <span class="img-title">Cover</span>
                        <span class="img-url">https://images.unsplas...</span>
                    </div>
                    <div class="img-actions">
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 12L6 8L10 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M6 12L10 8L6 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12 4L4 12M4 4L12 12" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <!-- Image 2 -->
                <div class="image-manager-item">
                    <img class="img-thumb" src="/uploads/products/performance_tee.jpg">
                    <div class="img-info">
                        <span class="img-title">Image 2</span>
                        <span class="img-url">https://images.unsplas...</span>
                    </div>
                    <div class="img-actions">
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 12L6 8L10 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M6 12L10 8L6 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12 4L4 12M4 4L12 12" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <!-- Image 3 -->
                <div class="image-manager-item">
                    <img class="img-thumb" src="/uploads/products/performance_tee.jpg">
                    <div class="img-info">
                        <span class="img-title">Image 3</span>
                        <span class="img-url">https://images.unsplas...</span>
                    </div>
                    <div class="img-actions">
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 12L6 8L10 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M6 12L10 8L6 4" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg class="icon-svg action-icon" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M12 4L4 12M4 4L12 12" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="add-image-row">
                <input type="text" class="input-field flex-fill" placeholder="Paste image URL...">
                <button class="secondary-btn">Add URL</button>
                <button class="secondary-btn">Upload</button>
            </div>

            <div class="divider"></div>

            <span class="section-title">Status</span>
            <div class="select-wrapper">
                <select class="select-field">
                    <option>In Progress</option>
                    <option>Complete</option>
                    <option>Pending</option>
                </select>
            </div>
        </div>

        <!-- Right Column: Form Fields -->
        <div class="right-panel">

            <div class="form-group">
                <span class="field-label">Product Name</span>
                <input type="text" class="input-field" value="Performance Tee – Black">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <span class="field-label">Category</span>
                    <input type="text" class="input-field" value="Apparel">
                </div>
                <div class="form-group">
                    <span class="field-label">Price</span>
                    <input type="text" class="input-field" value="400">
                </div>
            </div>

            <div class="form-group half-width">
                <span class="field-label">Stock</span>
                <input type="text" class="input-field" value="3">
            </div>

            <div class="form-group">
                <span class="field-label">Description</span>
                <textarea class="textarea-field">Moisture-wicking performance tee engineered for high-intensity workouts. Flatlock seams reduce chafing during movement.</textarea>
            </div>

            <div class="divider"></div>

            <!-- Attributes Section -->
            <div class="section-header">
                <span class="section-title">Attributes</span>
                <div class="add-btn-link">
                    <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M7 2.91666V11.0833M2.91666 7H11.0833" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <span class="add-btn-text">Add field</span>
                </div>
            </div>

            <div class="dynamic-list">
                <div class="dynamic-row">
                    <input type="text" class="input-field" value="Brand">
                    <input type="text" class="input-field" value="GymCore">
                    <div class="remove-btn">
                        <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M3 7H11" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="dynamic-row">
                    <input type="text" class="input-field" value="Weight">
                    <input type="text" class="input-field" value="180g">
                    <div class="remove-btn">
                        <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M3 7H11" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="dynamic-row">
                    <input type="text" class="input-field" value="Material">
                    <input type="text" class="input-field" value="92% Polyester">
                    <div class="remove-btn">
                        <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M3 7H11" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <!-- Variants Section -->
            <div class="section-header">
                <span class="section-title">Variants (2)</span>
                <div class="add-btn-link">
                    <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M7 2.91666V11.0833M2.91666 7H11.0833" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                    <span class="add-btn-text">Add variant</span>
                </div>
            </div>

            <div class="variant-table-headers">
                <span class="th-sku">SKU</span>
                <span class="th-size">Size</span>
                <span class="th-color">Color / Flavour</span>
                <span class="th-stock">Stock</span>
            </div>

            <div class="dynamic-list">
                <div class="variant-form-row">
                    <input type="text" class="input-field input-sku" value="PT-BLK-S">
                    <input type="text" class="input-field input-size" value="S">
                    <input type="text" class="input-field input-color" value="Black">
                    <input type="text" class="input-field input-stock" value="1">
                    <div class="remove-btn">
                        <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M3 7H11" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="variant-form-row">
                    <input type="text" class="input-field input-sku" value="PT-BLK-M">
                    <input type="text" class="input-field input-size" value="M">
                    <input type="text" class="input-field input-color" value="Black">
                    <input type="text" class="input-field input-stock" value="2">
                    <div class="remove-btn">
                        <svg class="icon-svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M3 7H11" stroke="#99A1AF" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>