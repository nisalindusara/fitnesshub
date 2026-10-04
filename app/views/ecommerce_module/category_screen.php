<?php $bodyClass = 'page-ecommerce-module-category-screen--global'; $pageStyles = ['staff/ecommerce_module/category_screen']; ?>

<div class="app-container">
    <header class="header">
        <button class="header-btn" onclick="history.back()">
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

                <!-- Add New Dialog (Now with a Form) -->
                <dialog id="categoryDialog">
                    <form action="/portal/categories/create" method="post">
                        <div class="dialog-header">
                            <h2 class="dialog-title">New Category</h2>
                            <p class="dialog-subtitle">Add a category to organize your store products.</p>
                        </div>
                        <hr class="divider">
                        <div class="form-group">
                            <label class="form-label" for="categoryName">Category Name</label>
                            <input class="form-input" type="text" name="category_name" id="categoryName" placeholder="e.g. Supplements" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="categoryDescription">Category Description</label>
                            <input class="form-input" type="text" name="category_description" id="categoryDescription" placeholder="Add a description" required>
                        </div>
                        <div class="dialog-actions">
                            <button type="button" class="btn-cancel" id="cancelBtn">Cancel</button>
                            <button type="submit" class="btn-submit">Add Category</button>
                        </div>
                    </form>
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
            <?php foreach ($categories_array as $category):  ?>
                <div class="table-row" data-category-id="<?= (int) $category['id'] ?>">
                    <span class="category-name"><?= htmlspecialchars($category['name']) ?></span>
                    <span class='col-center'><?= htmlspecialchars($category['item_count']) ?></span>
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
                <form action="/portal/categories/update" method="post">
                    <div class="dialog-header">
                        <h2 class="dialog-title">Edit Category</h2>
                        <p class="dialog-subtitle">Update the name of your category.</p>
                    </div>
                    <hr class="divider">

                    <input type="hidden" name="category_id" id="edit-dialog-category-id">
                    <div class="form-group">
                        <label class="form-label" for="edit-dialog-text-input">Category Name</label>
                        <input class="form-input" type="text" name="new_name" id="edit-dialog-text-input" required>
                    </div>

                    <div class="dialog-actions">
                        <button type="button" class="btn-cancel" id="closeEditDialogBtn">Cancel</button>
                        <button type="submit" class="btn-submit">Save Changes</button>
                    </div>
                </form>
            </dialog>

            <!-- Delete Category Dialog (Now with a Form) -->
            <dialog id="delete-dialog">
                <form action="/portal/categories/delete" method="post">
                    <input type="hidden" name="category_id" id="delete-dialog-category-id">

                    <div class="dialog-header">
                        <h2 class="dialog-title">Delete Category</h2>
                        <p class="dialog-subtitle">Are you sure you want to delete this category? This action cannot be undone.</p>
                    </div>
                    <hr class="divider">

                    <div class="dialog-actions">
                        <button type="button" class="btn-cancel" id="closeDeleteDialogBtn">Cancel</button>
                        <button type="submit" class="btn-danger">Delete</button>
                    </div>
                </form>
            </dialog>
        </div>
    </main>
</div>

<script>
    const openDialogBtn = document.getElementById('openDialogBtn');
    const categoryDialog = document.getElementById('categoryDialog');
    const cancelBtn = document.getElementById('cancelBtn');
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

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => categoryDialog.close());
    }

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

        // Open Edit Dialog & Populate hidden ID
        if (e.target.closest('.editBtn')) {
            const tableRow = e.target.closest('.table-row');
            const categoryNameSpan = tableRow.querySelector('.category-name');
            const categoryId = tableRow.dataset.categoryId;

            document.getElementById('edit-dialog-category-id').value = categoryId;
            document.getElementById('edit-dialog-text-input').value = categoryNameSpan.textContent;

            editDialog.showModal();
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        // Open Delete Dialog & Populate hidden ID
        if (e.target.closest('.deleteBtn')) {
            const tableRow = e.target.closest('.table-row');
            const categoryId = tableRow.dataset.categoryId;

            // Set the ID for the delete form
            document.getElementById('delete-dialog-category-id').value = categoryId;

            deleteDialog.showModal();
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        // Close Edit Dialog (Cancel button)
        if (e.target.closest('#closeEditDialogBtn')) {
            editDialog.close();
        }

        // Close Delete Dialog (Cancel button)
        if (e.target.closest('#closeDeleteDialogBtn')) {
            deleteDialog.close();
        }
    });
</script>