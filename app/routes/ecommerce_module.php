<?php
// E-Commerce: public storefront

$router->get('/store', [StoreController::class, 'ecommerceLandingPage']);
$router->get('/catalog', [StoreController::class, 'ecommerceCatalogue']);
$router->get('/sample-product', [StoreController::class, 'sampleProduct']);
$router->get('/cart', [StoreController::class, 'cart']);
$router->get('/store-checkout', [StoreController::class, 'ecommerceCheckout']);

// E-Commerce: staff portal

$router->get('/portal/orders', [OrderController::class, 'index'], 'manage_orders');
$router->get('/portal/orders/view', [OrderController::class, 'show'], 'manage_orders');
$router->post('/portal/orders', [OrderController::class, 'store'], 'manage_orders');
$router->get('/portal/orders/add-order', [OrderController::class, 'showAddOrder'], 'manage_orders');
$router->post('/portal/orders/advance', [OrderController::class, 'advance'], 'manage_orders');
$router->post('/portal/orders/cancel', [OrderController::class, 'cancel'], 'manage_orders');
$router->get('/portal/products/search', [ProductController::class, 'searchVariants'], 'manage_orders');

$router->get('/portal/ecom/categories', [CategoryController::class, 'displayCategoryScreen'], 'manage_orders');
$router->post('/portal/ecom/categories/edit-category-name', [CategoryController::class, 'editCategoryName']);
