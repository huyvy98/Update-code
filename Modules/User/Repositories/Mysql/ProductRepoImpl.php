<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * @param int $idProduct
     * @return Product|null
     */
    public function findById(int $idProduct): ?Product
    {
        return Product::query()->findOrFail($idProduct);
    }

    public function getAllProduct(): LengthAwarePaginator
    {
        return Product::query()->paginate(9);
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return Category::all();
    }
}
