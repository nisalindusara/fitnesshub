<style>
    .edit-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 0px;
        width: 100%;
        min-height: 100vh;
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
        border-bottom: 1px solid rgba(28, 28, 28, 0.08);
        box-sizing: border-box;
        background: #FFFFFF;
    }

    .header-left {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 12px;
    }

    .back-btn {
        display: flex;
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
        font-weight: 500;
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

    .action-btn-cancel {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        height: 32px;
        background: #F3F4F6;
        border-radius: 8px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .btn-text-cancel {
        font-weight: 500;
        font-size: 12px;
        line-height: 18px;
        color: #1C1C1C;
    }

    .action-btn-save {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        height: 32px;
        background: #1C1C1C;
        border-radius: 8px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .btn-text-save {
        font-weight: 500;
        font-size: 12px;
        line-height: 18px;
        color: #FFFFFF;
    }

    .content-body {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        width: 100%;
        box-sizing: border-box;
    }

    /* Left Panel */
    .left-panel {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        gap: 16px;
        width: 340px;
        border-right: 1px solid rgba(28, 28, 28, 0.08);
        min-height: calc(100vh - 71px);
        box-sizing: border-box;
    }

    .section-title {
        font-weight: 500;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
    }

    .image-manager-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        width: 100%;
    }

    .image-manager-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 8px;
        gap: 12px;
        width: 100%;
        background: #F7F9FB;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .active-image-item {
        background: #F3F4F6;
    }

    .img-thumb {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        flex-shrink: 0;
    }

    .img-info {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        overflow: hidden;
    }

    .img-title {
        font-weight: 500;
        font-size: 12px;
        line-height: 18px;
        color: #1C1C1C;
    }

    .img-url {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .img-actions {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 8px;
    }

    .action-icon {
        cursor: pointer;
    }

    .add-image-row {
        display: flex;
        flex-direction: row;
        gap: 8px;
        width: 100%;
    }

    .flex-fill {
        flex-grow: 1;
    }

    .secondary-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 12px;
        height: 36px;
        background: #F3F4F6;
        border-radius: 8px;
        border: none;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 12px;
        color: #1C1C1C;
        cursor: pointer;
    }

    .divider {
        width: 100%;
        height: 1px;
        background: rgba(28, 28, 28, 0.08);
        margin: 8px 0;
    }

    .select-wrapper {
        width: 100%;
        height: 36px;
        background: #FFFFFF;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        overflow: hidden;
    }

    .select-field {
        width: 100%;
        height: 100%;
        border: none;
        padding: 0 12px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        color: #1C1C1C;
        background: transparent;
        outline: none;
        appearance: none;
        cursor: pointer;
    }


    /* Right Panel */
    .right-panel {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        padding: 24px 32px;
        gap: 24px;
        box-sizing: border-box;
        max-width: 800px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        width: 100%;
    }

    .form-row {
        display: flex;
        flex-direction: row;
        gap: 24px;
        width: 100%;
    }

    .half-width {
        width: calc(50% - 12px);
    }

    .field-label {
        font-weight: 400;
        font-size: 11px;
        line-height: 16px;
        color: rgba(28, 28, 28, 0.4);
    }

    .input-field {
        width: 100%;
        height: 36px;
        padding: 0 12px;
        background: #FFFFFF;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        color: #1C1C1C;
        box-sizing: border-box;
        outline: none;
    }

    .input-field::placeholder {
        color: rgba(28, 28, 28, 0.3);
    }

    .textarea-field {
        width: 100%;
        height: 80px;
        padding: 10px 12px;
        background: #FFFFFF;
        border: 1px solid rgba(28, 28, 28, 0.12);
        border-radius: 8px;
        font-family: 'Inter', sans-serif;
        font-size: 13px;
        color: #1C1C1C;
        box-sizing: border-box;
        resize: none;
        outline: none;
    }

    .section-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .add-btn-link {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 4px;
        cursor: pointer;
    }

    .add-btn-text {
        font-weight: 500;
        font-size: 11px;
        color: #99A1AF;
    }

    .dynamic-list {
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 100%;
    }

    .dynamic-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 16px;
        width: 100%;
    }

    .remove-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 24px;
        height: 24px;
        cursor: pointer;
    }

    /* Variant Headers */
    .variant-table-headers {
        display: flex;
        flex-direction: row;
        width: 100%;
        padding: 0 12px;
        box-sizing: border-box;
    }

    .variant-table-headers span {
        font-weight: 400;
        font-size: 11px;
        color: rgba(28, 28, 28, 0.4);
    }

    .th-sku {
        width: 30%;
    }

    .th-size {
        width: 25%;
    }

    .th-color {
        width: 25%;
    }

    .th-stock {
        width: 20%;
    }

    .variant-form-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 12px;
        width: 100%;
    }

    .input-sku {
        width: 30%;
    }

    .input-size {
        width: 25%;
    }

    .input-color {
        width: 25%;
    }

    .input-stock {
        width: 20%;
    }
</style>

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