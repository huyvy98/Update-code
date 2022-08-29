<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Modules\User\Contracts\Repositories\Mysql\CategoryRepository;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;

class CategoryRepoImpl implements CategoryRepository
{
    /**
     * @return mixed
     */
    public function getCategory()
    {
        return Category::all();
    }

    /**
     * @param int $id
     * @return Category
     */
    public function findCateById(int $id): Category
    {
        return Category::with('products')->where('id', $id)->first();
    }
}
