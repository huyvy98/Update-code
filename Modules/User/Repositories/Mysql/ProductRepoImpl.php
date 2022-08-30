<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * @param int $id
     * @return Collection
     */
    public function findById(int $id): Collection
    {
        $products = Product::with('category')->whereHas('category', function ($query) use ($id) {
            $query->where('id', $id);
        })->get();

        return $products;
    }
}
