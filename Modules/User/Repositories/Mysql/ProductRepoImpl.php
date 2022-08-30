<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * Find product on category
     *
     * @param  int  $category_id
     * @return Collection
     */
    public function findById(int $category_id): Collection
    {
        return Product::query()->whereHas('category', function ($query) use ($category_id) {
            $query->where('id', $category_id);
        })->get();
    }
}
