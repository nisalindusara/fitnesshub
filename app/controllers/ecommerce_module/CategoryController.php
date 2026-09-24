<?php

class CategoryController extends Controller
{
    private ProductCategory $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new ProductCategory();
    }
    public function showProductCategoryScreen(): void
    {

        $data['categories_array'] = $this->categoryModel->getCategoryAndNumberOfItems();
        $this->render('ecommerce_module/category_screen', 'staff-layout', $data);
    }

    public function editCategoryName(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryId = (int) ($_POST['category_id'] ?? 0);
            $newName = trim($_POST['new_name'] ?? '');

            if ($categoryId <= 0 || $newName === '') {
                $this->redirect('/portal/ecom/categories?error=invalid_input');
                return;
            }

            $result = $this->categoryModel->updateCategoryName($categoryId, $newName);

            if ($result === false) {
                $this->redirect('/portal/ecom/categories?error=update_failed');
                return;
            }

            $this->redirect('/portal/ecom/categories?success=1');
        }
    }

    public function addNewProductCategory(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newCategoryName = trim($_POST['category_name'] ?? '');
            $newCategoryDescription = trim($_POST['category_description'] ?? '');

            $result = $this->categoryModel->addNewCategory($newCategoryName, $newCategoryDescription);

            if ($result == false) {
                $this->redirect('/portal/ecom/categories?error=insertion_failed');
                return;
            }

            $this->redirect('/portal/ecom/categories?success=1');
        }
    }

    public function deleteProductCategory(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryId = (int) ($_POST['category_id'] ?? 0);

            if ($categoryId > 0) {

                $itemCount = $this->categoryModel->getNumberOfItemsForCategory($categoryId);

                if ($itemCount > 0) {
                    // Optional: set a $_SESSION variable here to show an error banner to the user

                    header('Location: /portal/ecom/categories?error=category_not_empty');
                    exit;
                }

                $this->categoryModel->deleteCategory($categoryId);

                // Optional: Set a success session messag
                header('Location: /portal/ecom/categories?success=category_deleted');
                exit;
            }

            header('Location: /portal/ecom/categories?error=invalid_id');
            exit;
        }
    }
}
