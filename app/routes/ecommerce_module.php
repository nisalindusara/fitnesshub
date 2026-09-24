<?php
// E-Commerce: public storefront

$router->get('/store', [StoreController::class, 'showStoreLandingPageScreen']);
$router->get('/store/catalog', [StoreController::class, 'showStoreCatalogScreen']);
$router->get('/store/cart', [StoreController::class, 'showCartScreen']);
$router->get('/store/checkout', [StoreController::class, 'showStoreCheckoutScreen']);

$router->get('/sample-product', [StoreController::class, 'sampleProduct']);

// E-Commerce: staff portal

$router->get('/portal/orders', [OrderController::class, 'showOrdersScreen'], 'manage_orders');

$router->get('/portal/orders/add-order', [OrderController::class, 'showCreateOrdeForCustomerScreen'], 'manage_orders');
$router->post('/portal/orders/add-order', [OrderController::class, 'createOrderForCustomer'], 'manage_orders');

$router->get('/portal/orders/view', [OrderController::class, 'showOrderDetailsScreen'], 'manage_orders');
$router->post('/portal/orders/advance', [OrderController::class, 'advanceOrderToNextManualStatus'], 'manage_orders');
$router->post('/portal/orders/cancel', [OrderController::class, 'cancelOrder'], 'manage_orders');

$router->get('/portal/products/search', [ProductController::class, 'searchProductVariants'], 'manage_orders');

$router->post('/portal/ecom/categories', [CategoryController::class, 'editCategoryName']);
$router->get('/portal/ecom/categories', [CategoryController::class, 'showProductCategoryScreen'], 'manage_orders');

$router->post('/portal/ecom/categories/add-category', [CategoryController::class, 'addNewProductCategory'], 'manage_orders');
