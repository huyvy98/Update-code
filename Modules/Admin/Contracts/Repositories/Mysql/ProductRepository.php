<?php
namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Product;

interface ProductRepository
{
    /**
     * Save product to database
     *
     * @param Product $product
     * @return Product
     */
    public function save(Product $product): Product;


    /**
     * Get all product from database
     *
     * @return Product $product
     */
    public function getProduct();

    /**
     * Create product
     *
     * @param array $attributes
     * @return Product
     */
    public function createProduct(array $attributes): Product;

    /**
     * Update product
     * @param $id
     * @param array $attributes
     * @return Product
     */
    public function updateProduct($id, array $attributes): Product;

    /**
     * Delete product
     * @param $id
     * @return Product
     */
    public function deleteProduct($id): Product;
}
