<?php

// E-Commerce: public storefront
$router->get('/store', [StoreController::class, 'showStoreLandingPageScreen']);
$router->get('/store/catalog', [StoreController::class, 'ecommerceCshowStoreCatalogScreenatalogue']);
$router->get('/store/product', [StoreController::class, 'sampleProduct']);
$router->get('/store/cart', [StoreController::class, 'showCartScreen']);
$router->get('/store/checkout', [StoreController::class, 'showStoreCheckoutScreen']);
$router->post('/store/checkout', [StoreController::class, 'placeOrder']);

// E-Commerce: staff portal — orders
$router->get('/portal/orders', [OrderController::class, 'showOrdersScreen'], 'manage_orders');
$router->get('/portal/orders/create', [OrderController::class, 'showCreateOrdeForCustomerScreen'], 'manage_orders');
$router->post('/portal/orders/create', [OrderController::class, 'createOrderForCustomer'], 'manage_orders');
$router->get('/portal/orders/view', [OrderController::class, 'showOrderDetailsScreen'], 'manage_orders');
$router->post('/portal/orders/advance', [OrderController::class, 'advanceOrderToNextManualStatus'], 'manage_orders');
$router->post('/portal/orders/cancel', [OrderController::class, 'cancelOrder'], 'manage_orders');

// E-Commerce: staff portal — products and categories
$router->get('/portal/products', [ProductController::class, 'showProductsGridScreen'], 'manage_inventory');
$router->get('/portal/products/create', [ProductController::class, 'showAddProductScreen'], 'manage_inventory');
$router->get('/portal/products/view', [ProductController::class, 'showProductDetailScrren'], 'manage_inventory');
$router->get('/portal/products/edit', [ProductController::class, 'showEditProductDetailScrren'], 'manage_inventory');

$router->get('/portal/categories', [CategoryController::class, 'showProductCategoryScreen'], 'manage_inventory');
$router->post('/portal/categories/create', [CategoryController::class, 'addNewProductCategory'], 'manage_inventory');
$router->post('/portal/categories/update', [CategoryController::class, 'editCategoryName'], 'manage_inventory');
$router->post('/portal/categories/delete', [CategoryController::class, 'deleteProductCategory'], 'manage_inventory');

// JSON
$router->get('/api/products/search', [ProductController::class, 'searchProductVariants'], 'manage_orders');
