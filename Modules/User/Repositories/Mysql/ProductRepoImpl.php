<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * @param int $id
     * @return Product
     */
    public function findById(int $id): Product
    {
        return Product::with('category')->where('id', $id)->first();
    }

    /**
     * @return mixed
     */
    public function getAllProduct()
    {
        return Product::query()->get();
    }

//    /**
//     * @return mixed
//     */
//    public function getCategory()
//    {
//        return Category::all();
//    }
}
