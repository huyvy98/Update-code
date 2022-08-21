<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * Save Product to database
     *
     * @param  Product  $product
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
     * @param  string|null  $name
     * @param  int|null  $min
     * @param  int|null  $max
     * @return LengthAwarePaginator
     */
    public function getProduct(?string $name, ?int $min, ?int $max): LengthAwarePaginator
    {
        return Product::query()->when($name, function (Builder $builder) use ($name) {
            $builder->where('name', 'like', '%'.$name.'%');
        })
            ->when($min, function (Builder $builder) use ($min, $max) {
                $builder->whereBetween('price', [$min, $max])
                    ->orWhereIn('price', [$min, $max]);
            })
            ->paginate(10);
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
     * @param  Product  $product
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
     * @param  Product  $product
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
     * @param  int  $id
     * @return void
     */

    public function destroy(int $id): void
    {
        Product::destroy($id);
    }

    /**
     * Find product by id
     *
     * @param  int  $id
     * @return Product|null
     */
    public function findById(int $id): ?Product
    {
        return Product::query()->findOrFail($id);
    }
}
