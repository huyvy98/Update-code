<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{

    /**
     * @param int $id
     * @return Collection
     */

    public function findById(int $id): Collection
    {
        $category = Category::query()->where('id', $id)->first();
        $product = $category->products()->get();

        return $product;
    }
}
