<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Contracts\Repositories\Mysql\CategoryRepository;

class CategoryRepoImpl implements CategoryRepository
{
    /**
     * Get all category
     *
     * @return Collection
     */
    public function get(): Collection
    {
        return Category::query()->get();
    }
}
