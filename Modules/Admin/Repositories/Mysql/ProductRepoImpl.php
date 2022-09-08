<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use phpDocumentor\Reflection\Types\Mixed_;

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
     * Get all product and query to search product by price or by name
     *
     * @param string|null $name
     * @param int|null $min
     * @param int|null $max
     * @return LengthAwarePaginator
     */
    public function get(?string $name, ?int $min, ?int $max): LengthAwarePaginator
    {
        return Product::query()
            ->when($name, function (Builder $builder) use ($name) {
                $builder->where('name', 'like', '%' . $name . '%');
            })
            ->when($min, function (Builder $builder) use ($min, $max) {
                $builder->whereBetween('price', [$min, $max]);
            })
            ->paginate(10);
    }

    /**
     * Create product
     *
     * @param Product $product
     * @return Product
     */
    public function create(Product $product): Product
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
    public function update(Product $product): Product
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
     * Get category
     *
     * @return Collection
     */
    public function getCategory(): Collection
    {
        return Category::query()->get();
    }
}
