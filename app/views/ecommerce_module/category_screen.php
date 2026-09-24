<style>
    /* Define the missing CSS variables based on your design */
    :root {
        --text-main: #1C1C1C;
        --text-muted: #9CA3AF;
        --text-label: #1C1C1C;
        --border-color: #E5E7EB;
        --border-medium: #E5E7EB;
        --divider-color: #F3F4F6;
        --primary-btn: #B3B3B3;
        --primary-btn-hover: #9CA3AF;
        --bg-surface: #F9FAFB;
        --danger-btn: #ef4444;
        /* Added for the delete button */
        --danger-btn-hover: #dc2626;
    }

    * {
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        margin: 0;
    }

    /* Header */
    .header {
        display: flex;
        align-items: center;
        padding: 20px 28px;
        height: 72px;
        border-bottom: 1px solid var(--border-medium);
        gap: 8px;
    }

    .header-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .header-title {
        font-size: 14px;
        font-weight: 400;
    }

    /* Main Content */
    .main-content {
        padding: 24px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    /* Toolbar */
    .toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px;
        background: #F7F9FB;
        border-radius: 8px;
        height: 44px;
    }

    .toolbar-actions {
        display: flex;
        gap: 16px;
    }

    .btn-action {
        display: flex;
        align-items: center;
        gap: 4px;
        padding: 4px;
        border: none;
        background: transparent;
        font-family: inherit;
        font-size: 14px;
        color: #000;
        cursor: pointer;
        border-radius: 8px;
    }

    .search-input {
        display: flex;
        align-items: center;
        gap: 8px;
        width: 160px;
        height: 28px;
        padding: 4px 8px;
        background: rgba(255, 255, 255, 0.4);
        border: 1px solid var(--border-medium);
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-muted);
    }

    .search-input input {
        border: none;
        background: transparent;
        outline: none;
        font-family: inherit;
        font-size: inherit;
        width: 100%;
    }

    .search-input input::placeholder {
        color: rgba(28, 28, 28, 0.2);
    }

    /* Table */
    .table {
        display: flex;
        flex-direction: column;
    }

    .table-row {
        display: grid;
        grid-template-columns: 1fr 138px 48px;
        align-items: center;
        height: 40px;
        padding: 0 12px;
        font-size: 14px;
        border-bottom: 1px solid #1c1c1c0d;
    }

    .table-row:hover {
        background: #F7F9FB;
    }

    .table-header {
        border-bottom: 1px solid #1c1c1c33;
        color: var(--text-muted);
        font-size: 16px;
    }

    .col-center {
        text-align: center;
    }

    .col-action {
        display: flex;
        justify-content: center;
    }

    .btn-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        border: none;
        cursor: pointer;
        border-radius: 8px;
        width: 24px;
        height: 24px;
    }

    /* Dropdown Positioning and Styling */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 120px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        border-radius: 4px;
        z-index: 10;
    }

    .dropdown-menu.show {
        display: flex;
        flex-direction: column;
    }

    .dropdown-item {
        padding: 10px;
        text-align: left;
        background: none;
        border: none;
        cursor: pointer;
    }

    .dropdown-item:hover {
        background-color: #f5f5f5;
    }

    /* Dialog specific styling */
    dialog {
        border: none;
        border-radius: 16px;
        padding: 28px 32px;
        width: 90%;
        max-width: 460px;
        background: #ffffff;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        margin: auto;
    }

    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.4);
        backdrop-filter: blur(2px);
    }

    .dialog-header {
        margin-bottom: 20px;
    }

    .dialog-title {
        font-size: 20px;
        font-weight: 600;
        color: var(--text-main);
        margin: 0 0 6px 0;
    }

    .dialog-subtitle {
        font-size: 15px;
        color: var(--text-muted);
        font-weight: 400;
        margin: 0;
    }

    .divider {
        border: none;
        border-top: 1px solid var(--divider-color);
        margin-bottom: 24px;
        margin-top: 0;
    }

    .form-group {
        margin-bottom: 40px;
    }

    .form-label {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: var(--text-label);
        margin-bottom: 10px;
    }

    .form-input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        font-size: 15px;
        font-family: inherit;
        color: var(--text-main);
        outline: none;
        transition: border-color 0.2s;
    }

    .form-input::placeholder {
        color: var(--text-muted);
    }

    .form-input:focus {
        border-color: #d1d5db;
    }

    .dialog-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 16px;
    }

    .btn-cancel {
        background: transparent;
        border: none;
        color: #6b7280;
        font-size: 14px;
        font-weight: 600;
        font-family: inherit;
        cursor: pointer;
        padding: 8px 12px;
        transition: color 0.2s;
    }

    .btn-cancel:hover {
        color: var(--text-main);
    }

    .btn-submit {
        background-color: var(--primary-btn);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-submit:hover {
        background-color: var(--primary-btn-hover);
    }

    .btn-danger {
        background-color: var(--danger-btn);
        color: #ffffff;
        border: none;
        border-radius: 10px;
        padding: 10px 20px;
        font-size: 14px;
        font-weight: 500;
        font-family: inherit;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .btn-danger:hover {
        background-color: var(--danger-btn-hover);
    }
</style>

<div class="app-container">
    <header class="header">
        <button class="header-btn">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5M12 19L5 12L12 5" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <span class="header-title">Categories</span>
    </header>

    <main class="main-content">
        <div class="toolbar">
            <div class="toolbar-actions">
                <button class="btn-action" id="openDialogBtn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M5 12H19" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Add new
                </button>

                <!-- Add New Dialog -->
                <dialog id="categoryDialog">
                    <div class="dialog-header">
                        <h2 class="dialog-title">New Category</h2>
                        <p class="dialog-subtitle">Add a category to organize your store products.</p>
                    </div>
                    <hr class="divider">
                    <div class="form-group">
                        <label class="form-label" for="categoryName">Category Name</label>
                        <input class="form-input" type="text" id="categoryName" placeholder="e.g. Supplements">
                    </div>
                    <div class="dialog-actions">
                        <button class="btn-cancel" id="cancelBtn">Cancel</button>
                        <button class="btn-submit" id="submitBtn">Add Category</button>
                    </div>
                </dialog>

                <button class="btn-action">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 15L12 20L17 15M7 9L12 4L17 9" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Sort List
                </button>
            </div>
            <div class="search-input">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="8" stroke="rgba(28, 28, 28, 0.2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21 21L16.65 16.65" stroke="rgba(28, 28, 28, 0.2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <input type="text" placeholder="Search">
            </div>
        </div>

        <div class="table">
            <div class="table-row table-header">
                <span>Category Name</span>
                <span class="col-center">Product Count</span>
                <span></span>
            </div>
            <?php foreach ($categories as $category):  ?>
                <div class="table-row" data-category-id="<?= (int) $category['id'] ?>">
                    <span class="category-name"><?= htmlspecialchars($category['name']) ?></span>
                    <span class='col-center'>24</span>
                    <div class="col-action">
                        <div class="dropdown">
                            <button class="btn-icon kebab-btn">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="5" cy="12" r="1.5" fill="#1C1C1C" />
                                    <circle cx="12" cy="12" r="1.5" fill="#1C1C1C" />
                                    <circle cx="19" cy="12" r="1.5" fill="#1C1C1C" />
                                </svg>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item editBtn">Edit</button>
                                <button class="dropdown-item deleteBtn">Delete</button>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

            <!-- Edit Category Dialog -->
            <dialog id="edit-dialog">
                <form action="/portal/ecom/categories" method="post">
                    <div class="dialog-header">
                        <h2 class="dialog-title">Edit Category</h2>
                        <p class="dialog-subtitle">Update the name of your category.</p>
                    </div>
                    <hr class="divider">

                    <input type="hidden" name="category_id" id="edit-dialog-category-id">
                    <div class="form-group">
                        <label class="form-label" for="edit-dialog-text-input">Category Name</label>
                        <input class="form-input" type="text" name="new_name" id="edit-dialog-text-input">
                    </div>

                    <div class="dialog-actions">
                        <!-- Ensure type="button" so it doesn't submit the form -->
                        <button type="button" class="btn-cancel" id="closeEditDialogBtn">Cancel</button>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
                </form>
            </dialog>

            <!-- Delete Category Dialog -->
            <dialog id="delete-dialog">
                <div class="dialog-header">
                    <h2 class="dialog-title">Delete Category</h2>
                    <p class="dialog-subtitle">Are you sure you want to delete this category? This action cannot be undone.</p>
                </div>
                <hr class="divider">

                <div class="dialog-actions">
                    <button class="btn-cancel" id="closeDeleteDialogBtn">Cancel</button>
                    <!-- Uses the new danger button class -->
                    <button class="btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </dialog>
        </div>
    </main>
</div>

<script>
    const openDialogBtn = document.getElementById('openDialogBtn');
    const categoryDialog = document.getElementById('categoryDialog');
    const cancelBtn = document.getElementById('cancelBtn');
    const submitBtn = document.getElementById('submitBtn');
    const editDialog = document.getElementById('edit-dialog');
    const deleteDialog = document.getElementById('delete-dialog');

    // Helper to close dialog when clicking outside
    function handleBackdropClick(dialogElement, event) {
        const rect = dialogElement.getBoundingClientRect();
        const isInDialog = (
            rect.top <= event.clientY &&
            event.clientY <= rect.top + rect.height &&
            rect.left <= event.clientX &&
            event.clientX <= rect.left + rect.width
        );
        if (!isInDialog) {
            dialogElement.close();
        }
    }

    if (openDialogBtn) {
        openDialogBtn.addEventListener('click', () => categoryDialog.showModal());
    }

    if (cancelBtn) cancelBtn.addEventListener('click', () => categoryDialog.close());
    if (submitBtn) submitBtn.addEventListener('click', () => categoryDialog.close());

    categoryDialog.addEventListener('click', (e) => handleBackdropClick(categoryDialog, e));
    editDialog.addEventListener('click', (e) => handleBackdropClick(editDialog, e));
    deleteDialog.addEventListener('click', (e) => handleBackdropClick(deleteDialog, e));

    document.addEventListener('click', (e) => {
        // Dropdown toggle logic
        const kebabBtn = e.target.closest('.kebab-btn');
        if (kebabBtn) {
            const dropdownMenu = kebabBtn.nextElementSibling;
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                if (menu !== dropdownMenu) menu.classList.remove('show');
            });
            dropdownMenu.classList.toggle('show');
            return;
        }

        // Close dropdowns when clicking outside
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
        }

        // Open Edit Dialog
        if (e.target.closest('.editBtn')) {
            editDialog.showModal();
            const tableRow = e.target.closest('.table-row');
            const categoryNameSpan = tableRow.querySelector('.category-name');
            const categoryId = tableRow.dataset.categoryId;

            document.getElementById('edit-dialog-category-id').value = categoryId;
            document.getElementById('edit-dialog-text-input').value = categoryNameSpan.textContent;
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        // Open Delete Dialog
        if (e.target.closest('.deleteBtn')) {
            deleteDialog.showModal();
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        // Close Edit Dialog (Cancel button)
        if (e.target.closest('#closeEditDialogBtn')) {
            e.preventDefault();
            editDialog.close();
        }

        // Close Delete Dialog (Cancel button)
        if (e.target.closest('#closeDeleteDialogBtn')) {
            e.preventDefault();
            deleteDialog.close();
        }
    });
</script>