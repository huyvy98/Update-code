<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Modules\User\Contracts\Repositories\Mysql\CategoryProductRepository;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;

class CategoryProductRepoImpl implements CategoryProductRepository
{
    /**
     * @return mixed
     */
    public function getCategory()
    {
        return Category::all();
    }

    /**
     * @param  string  $slug
     * @return Category
     */
    public function findCateBySlug(string $slug): Category
    {
        return Category::with('products')->where('name', $slug)->first();
    }
}
