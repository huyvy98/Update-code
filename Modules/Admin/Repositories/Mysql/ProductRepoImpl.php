<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * Save Product to database
     *
     * @param Product $product
     * @return Product
     */

    public function save(Product $product): Product
    {
        $product->save();

        return $product;
    }

    /**
     * Get all product
     *
     * @return LengthAwarePaginator
     */
    public function getProduct(): LengthAwarePaginator
    {
        return Product::query()->paginate(10);
    }

    /**
     * Select product
     */
    public function editProduct($id)
    {
        return Product::query()->where('id', $id)->first();
    }

    /**
     * Create product
     *
     * @param Product $product
     * @return Product
     */

    public function createProduct(Product $product): Product
    {
        $product->query()->create();
        return $product;
    }

    /**
     * Update product
     *
     * @param Product $product
     * @return Product
     */
    public function updateProduct(Product $product): Product
    {
        $product->update();

        return $product;
    }

    /**
     * Delete product
     *
     * @param int $id
     * @return void
     */

    public function destroy(int $id): void
    {
        Product::destroy($id);
    }

    /**
     * Find product by id
     *
     * @param int $id
     * @return Product|null
     */
    public function findById(int $id): ?Product
    {
        return Product::query()->findOrFail($id);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function category(Category $category): Category
    {
        $category->save();

        return $category;
    }
}
