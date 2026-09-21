<style>
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

    .row-active {
        background: var(--bg-surface);
        border-radius: 8px;
        border-bottom: none;
        /* Removing bottom border on active to match design closely */
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
        /* Hidden by default */
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 120px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        border-radius: 4px;
        z-index: 10;
    }

    /* Show class to toggle visibility via JS */
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

    /* Basic Dialog Styling */
    dialog {
        border: none;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        padding: 20px;
        min-width: 300px;
        min-height: 150px;
        margin: auto;
    }

    dialog::backdrop {
        background-color: rgba(0, 0, 0, 0.4);
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
                <button class="btn-action">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 5V19M5 12H19" stroke="#1C1C1C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Add new
                </button>
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
            <dialog id="edit-dialog">
                <div class="dialog-content">
                    <form action="/portal/ecom/categories/edit-category-name" method="post">
                        <input type="hidden" name="category_id" id="edit-dialog-category-id">
                        <input type="text" name="new_name" id="edit-dialog-text-input">
                        <br>
                        <input type="submit" value="Save">
                        <button id="closeEditDialogBtn">Close</button>
                    </form>
                </div>
            </dialog>
            <dialog id="delete-dialog">
                <div class="dialog-content">
                    <!-- Empty content space -->

                    <button id="closeDeleteDialogBtn">Close</button>
                </div>
            </dialog>
        </div>
    </main>
</div>

<script>
    const editDialog = document.getElementById('edit-dialog');
    const deleteDialog = document.getElementById('delete-dialog');

    document.addEventListener('click', (e) => {
        const kebabBtn = e.target.closest('.kebab-btn');
        if (kebabBtn) {
            const dropdownMenu = kebabBtn.nextElementSibling;

            // Close all other open dropdowns first
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                if (menu !== dropdownMenu) menu.classList.remove('show');
            });

            dropdownMenu.classList.toggle('show');
            return;
        }

        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
        }

        if (e.target.closest('.editBtn')) {
            editDialog.showModal();

            const tableRow = e.target.closest('.table-row');
            const categoryNameSpan = tableRow.querySelector('.category-name');
            const categoryId = tableRow.dataset.categoryId;

            document.getElementById('edit-dialog-category-id').value = categoryId;
            document.getElementById('edit-dialog-text-input').value = categoryNameSpan.textContent;

            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        if (e.target.closest('.deleteBtn')) {
            deleteDialog.showModal();
            document.querySelectorAll('.dropdown-menu.show').forEach(m => m.classList.remove('show'));
        }

        if (e.target.closest('#closeEditDialogBtn')) {
            editDialog.close();
        }

        if (e.target.closest('#closeDeleteDialogBtn')) {
            deleteDialog.close();
        }
    });
</script>