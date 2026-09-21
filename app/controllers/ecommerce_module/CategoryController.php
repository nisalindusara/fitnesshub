<?php

class CategoryController extends Controller
{
    private $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new ItemCategory();
    }
    public function displayCategoryScreen(): void
    {

        $data['categories'] = $this->categoryModel->getCategories();

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
}
