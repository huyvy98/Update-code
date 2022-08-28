<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Category;

interface CategoryProductRepository
{
    /**
     * @return mixed
     */
    public function getCategory();

    /**
     * @param  string  $slug
     * @return Category
     */
    public function findCateBySlug(string $slug): Category;
}
