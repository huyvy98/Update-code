<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductRepository
{
    /**
     * Find product by id
     *
     * @param  int  $id
     * @return Product|null
     */
    public function findById(int $id): ?Product;

    /**
     * Save product to database
     *
     * @param  Product  $product
     * @return Product
     */
    public function save(Product $product): Product;


    /**
     * Get all product from database
     *
     * @param  string|null  $name
     * @param  int|null  $min
     * @param  int|null  $max
     * @return LengthAwarePaginator
     */
    public function getProduct(?string $name, ?int $min, ?int $max): LengthAwarePaginator;

    /**
     * Create product
     *
     * @param  Product  $product
     * @return Product
     */
    public function createProduct(Product $product): Product;

    /**
     * Update product
     *
     * @param  Product  $product
     * @return Product|null
     */
    public function updateProduct(Product $product): ?Product;

    /**
     * Delete product
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @return Collection
     */
    public function getCategory(): Collection;
}
