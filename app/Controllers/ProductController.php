<?php
namespace App\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\Product;
use PDO;
use Exception;

class ProductController
{
    private Product $productModel;

    public function __construct(PDO $db)
    {
        $this->productModel = new Product($db);
    }

    /**
     * load product page
     */
    public function loadProductPage()
    {
        $products = $this->productModel->getAllProducts();
        require_once __DIR__ . "/../Views/products.php";
    }

    /**
     * get product details
     */
    public function getProduct(int $id): void
    {
        try {
            $product = $this->productModel->find($id);
            if ($product) {
                ResponseHelper::jsonResponse($product, 200);
            } else {
                ResponseHelper::jsonResponse(['error' => 'Product Not Found'], 404);
            }
        } catch (Exception $e) {
            error_log("Product Retrieval Error: " . $e->getMessage());
            ResponseHelper::jsonResponse(['error' => 'Internal Server Error'], 500);
        }
    }

     /**
     * get all products
     */
    public function getAllProduct(): void
    {
        try {
            $products = $this->productModel->getAllProducts();
            if ($products) {
                ResponseHelper::jsonResponse($products, 200);
            } else {
                ResponseHelper::jsonResponse(['error' => 'Product Not Found'], 404);
            }
        } catch (Exception $e) {
            error_log("Product Retrieval Error: " . $e->getMessage());
            ResponseHelper::jsonResponse(['error' => 'Internal Server Error'], 500);
        }
    }
}