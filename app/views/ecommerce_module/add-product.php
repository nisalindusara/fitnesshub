<style>
    :root {
        --accent: #6366F1;
        --accent-hover: #4F46E5;
        --accent-light: #EEF2FF;
    }

    .main-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 20px 24px 0px;
        gap: 20px;
        height: 902.39px;
        background: #FAFAFA;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
    }

    .header-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        padding: 4px 8px;
        width: 101px;
        height: 28px;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .header-text {
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        color: #1C1C1C;
    }

    .form-layout {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 12px;
        box-sizing: border-box;
    }

    .columns-wrapper {
        width: 100%;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 20px;
        box-sizing: border-box;
    }

    .left-column {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 637.33px;
        box-sizing: border-box;
    }

    .right-column {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
        width: 318.67px;
        box-sizing: border-box;
    }

    .card-panel {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        gap: 22px;
        width: 100%;
        background: #FFFFFF;
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.06), 0px 1px 2px rgba(0, 0, 0, 0.04);
        transition: box-shadow 0.15s ease;
        border: 1px solid #E7E7E7;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .card-header {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
        height: 27px;
        border-bottom: 1px solid #E7E7E7;
        box-sizing: border-box;
    }

    .no-border {
        border-bottom: none;
        height: auto;
        padding-bottom: 16px;
    }

    .card-title {
        font-weight: 600;
        font-size: 14px;
        line-height: 26px;
        color: #281715;
    }

    .form-fields {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    .field-group {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
        width: 100%;
        box-sizing: border-box;
    }

    .textarea-group {
        padding-bottom: 7px;
    }

    .row-group {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        gap: 20px;
        width: 100%;
        box-sizing: border-box;
    }

    .half-field {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
        width: 283.66px;
        box-sizing: border-box;
    }

    .field-label {
        font-weight: 500;
        font-size: 12px;
        line-height: 21px;
        color: #281715;
    }

    .text-input {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 12px;
        width: 100%;
        height: 40px;
        background: #FFFFFF;
        border: 1px solid #D4D4D4;
        border-radius: 8px;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        color: #281715;
        outline: none;
    }

    .text-input::placeholder {
        color: #A3A3A3;
    }

    .textarea-input {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 10px 12px;
        width: 100%;
        height: 102px;
        background: #FFFFFF;
        border: 1px solid #D4D4D4;
        border-radius: 12px;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        color: #281715;
        resize: none;
        outline: none;
    }

    .textarea-input::placeholder {
        color: #A3A3A3;
    }

    .select-box {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 12px;
        width: 100%;
        height: 40px;
        background: #FFFFFF;
        border: 1px solid #D4D4D4;
        border-radius: 12px;
        box-sizing: border-box;
        cursor: pointer;
    }

    .select-placeholder {
        font-size: 12px;
        color: #281715;
    }

    .input-with-prefix {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 10px 12px;
        width: 100%;
        height: 40px;
        background: #FFFFFF;
        border: 1px solid #D4D4D4;
        border-radius: 12px;
        box-sizing: border-box;
        gap: 8px;
    }

    .prefix-text {
        font-size: 12px;
        line-height: 21px;
        color: #6B6B6B;
    }

    .borderless-input {
        border: none;
        outline: none;
        background: transparent;
        width: 100%;
        height: 100%;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        color: #281715;
        padding: 0;
    }

    .borderless-input::placeholder {
        color: #A3A3A3;
    }

    .variants-section {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        padding: 20px;
        width: 100%;
        background: #FFFFFF;
        border: 0.8px solid #F3F4F6;
        border-radius: 12px;
        box-sizing: border-box;
        margin-top: 4px;
    }

    .variants-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        height: 29.6px;
        box-sizing: border-box;
    }

    .variants-title {
        font-weight: 600;
        font-size: 14px;
        line-height: 20px;
        color: #101828;
    }

    .add-variant-btn {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 6px 12px;
        gap: 6px;
        height: 29.6px;
        border: 0.8px solid #E5E7EB;
        border-radius: 8px;
        background: transparent;
        cursor: pointer;
        box-sizing: border-box;
    }

    .add-variant-text {
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        color: #364153;
    }

    .variants-table {
        display: flex;
        flex-direction: column;
        width: 100%;
        margin-top: 16px;
        box-sizing: border-box;
    }

    .table-headers {
        position: relative;
        width: 100%;
        height: 16px;
    }

    .col-header {
        position: absolute;
        font-weight: 600;
        font-size: 12px;
        line-height: 16px;
        color: #99A1AF;
    }

    .col-size {
        left: 4px;
    }

    .col-color {
        left: 142px;
    }

    .col-qty {
        left: 280px;
    }

    .col-price {
        left: 418px;
    }

    .table-row {
        position: relative;
        width: 100%;
        height: 37.6px;
        margin-top: 12px;
    }

    .variant-input {
        position: absolute;
        top: 0;
        height: 37.6px;
        border: 0.8px solid #E5E7EB;
        border-radius: 8px;
        padding: 8px 12px;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        color: #101828;
        outline: none;
    }

    .val-size {
        left: 0px;
        width: 128.32px;
    }

    .val-color {
        left: 140.32px;
        width: 128.34px;
    }

    .val-qty {
        left: 280.66px;
        width: 128.32px;
    }

    .val-price {
        left: 420.99px;
        width: 128.34px;
    }

    .input-with-icon {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 8px 12px 8px 28px;
        background: #FFFFFF;
    }

    .currency-icon {
        position: absolute;
        left: 12px;
        top: 8.8px;
        font-size: 14px;
        line-height: 20px;
        color: #99A1AF;
    }

    .image-panel {
        gap: 24px;
    }

    .upload-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 32px;
        width: 100%;
        height: 185.67px;
        border: 1px dashed #D4D4D4;
        border-radius: 12px;
        box-sizing: border-box;
    }

    .upload-icon {
        margin-bottom: 12px;
        display: flex;
        justify-content: center;
    }

    .upload-title {
        font-weight: 500;
        font-size: 12px;
        line-height: 21px;
        color: #6B6B6B;
        text-align: center;
    }

    .upload-subtitle {
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
        color: #99A1AF;
        text-align: center;
        margin-top: 4px;
    }

    .browse-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 6px 12px;
        width: 94px;
        height: 28px;
        background: #F3F4F6;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        margin-top: 12px;
        box-sizing: border-box;
    }

    .browse-text {
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        color: #4A5565;
    }

    .thumbnails-container {
        display: flex;
        flex-direction: row;
        gap: 8px;
        width: 100%;
        height: 75.3px;
        box-sizing: border-box;
    }

    .thumbnail-placeholder {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 84.22px;
        height: 75.3px;
        background: #F3F4F6;
        border-radius: 8px;
        box-sizing: border-box;
    }

    .status-panel {
        padding: 24px;
        height: 132px;
        gap: 0;
    }

    .status-select {
        border: 0.8px solid #E5E7EB;
        border-radius: 8px;
        height: 40px;
    }

    .status-active-text {
        font-size: 14px;
        line-height: 17px;
        color: #364153;
    }

    .actions-container {
        display: flex;
        flex-direction: row;
        justify-content: flex-end;
        align-items: flex-start;
        padding: 0px 0px 12px;
        gap: 8px;
        height: 52.6px;
        box-sizing: border-box;
    }

    .action-btn {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 9px 16px;
        height: 40.6px;
        border-radius: 8px;
        cursor: pointer;
        box-sizing: border-box;
    }

    .discard-btn {
        width: 82.6px;
        background: #FFFFFF;
        border: 0.8px solid rgba(28, 28, 28, 0.12);
    }

    .discard-text {
        font-family: 'Arimo', sans-serif;
        font-weight: 500;
        font-size: 14px;
        line-height: 21px;
        color: #1C1C1C;
    }

    .save-btn {
        background: #1C1C1C;
        border: none;
        padding: 9px 24px;
    }

    .save-text {
        font-family: 'Arimo', sans-serif;
        font-weight: 500;
        font-size: 14px;
        line-height: 21px;
        color: #FFFFFF;
    }

    .svg-icon {
        display: block;
    }

    .text-input:focus,
    .textarea-input:focus,
    .select-box:focus-within,
    .input-with-prefix:focus-within,
    .variant-input:focus-within,
    .status-select:focus-within {
        border-color: var(--accent);
        box-shadow: 0 0 0 3px var(--accent-light);
    }

    .text-input:hover,
    .textarea-input:hover,
    .select-box:hover,
    .input-with-prefix:hover {
        border-color: #B0B0B0;
    }

    .card-header {
        border-bottom: 1px solid #EDEDED;
        position: relative;
    }

    .card-title::before {
        content: "";
        display: inline-block;
        width: 3px;
        height: 12px;
        background: var(--accent);
        margin-right: 8px;
        border-radius: 2px;
        vertical-align: middle;
    }

    .upload-box {
        background: var(--accent-light);
        border-color: #C7D2FE;
        transition: border-color 0.15s ease, background 0.15s ease;
    }

    .upload-box:hover {
        border-color: var(--accent);
        background: #E0E7FF;
    }

    .browse-btn {
        background: var(--accent);
        transition: background 0.15s ease;
    }

    .browse-text {
        color: #FFFFFF;
    }

    .browse-btn:hover {
        background: var(--accent-hover);
    }

    .thumbnail-placeholder {
        background: #F9FAFB;
        border: 1px solid #E5E7EB;
    }

    .status-select {
        background: #ECFDF3;
        border-color: #ABEFC6;
    }

    .status-active-text {
        color: #067647;
        font-weight: 600;
    }

    .status-active-text::before {
        content: "";
        display: inline-block;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #17B26A;
        margin-right: 6px;
    }

    .discard-btn:hover {
        background: #F9F9F9;
    }

    .save-btn {
        transition: background 0.15s ease, transform 0.05s ease;
    }

    .save-btn:hover {
        background: #000000;
    }

    .save-btn:active {
        transform: scale(0.98);
    }

    .add-variant-btn {
        transition: background 0.15s ease, border-color 0.15s ease;
    }

    .add-variant-btn:hover {
        background: var(--accent-light);
        border-color: var(--accent);
    }

    .add-variant-btn:hover .add-variant-text {
        color: var(--accent-hover);
    }
</style>


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