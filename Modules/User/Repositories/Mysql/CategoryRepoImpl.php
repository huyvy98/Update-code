<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Contracts\Repositories\Mysql\CategoryRepository;

class CategoryRepoImpl implements CategoryRepository
{
    /**
     * @return Collection
     */
    public function getCategory(): Collection
    {
        return Category::query()->get();
    }

    /**
     * @param int $id
     * @return Category
     */
    public function findInCateById(int $id): Category
    {
        return Category::query()->with('products')->where('id', $id)->first();
    }
}
