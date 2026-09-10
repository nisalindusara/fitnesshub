<?php

require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/ProductVariant.php';

class ProductController extends Controller
{
    /**
     * AJAX endpoint backing the order form's product search box.
     * Returns JSON, not a rendered view — the form's JS calls this
     * and builds the dropdown/results client-side.
     */
    public function searchVariants(): void
    {
        $term = trim($_GET['q'] ?? '');

        if ($term === '') {
            header('Content-Type: application/json');
            echo json_encode([]);
            return;
        }

        $variantModel = new ProductVariant();
        $results = $variantModel->search($term);

        // Shape each result for direct use by the form's JS — a ready-made
        // display label and an explicit in_stock flag, so the frontend
        // doesn't need to re-derive "is this out of stock" itself.
        $shaped = array_map(function ($row) {
            $variantLabel = trim(implode(' / ', array_filter([$row['size'], $row['color']])));

            return [
                'variant_id'    => (int) $row['id'],
                'display_name'  => $row['product_name'] . ($variantLabel ? " - {$variantLabel}" : ''),
                'sku'           => $row['sku'],
                'price'         => (float) $row['price'],
                'stock_quantity' => (int) $row['stock_quantity'],
                'in_stock'      => (int) $row['stock_quantity'] > 0,
            ];
        }, $results);

        header('Content-Type: application/json');
        echo json_encode($shaped);
    }
}
