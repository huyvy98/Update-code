<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;

interface CategoryRepository
{
    /**
     * @return mixed
     */
    public function getCategory();

    /**
     * @param int $id
     * @return Category
     */
    public function findCateById(int $id): Category;
}
