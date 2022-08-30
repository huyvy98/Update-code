<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{
    /**
     * @return Collection
     */
    public function getCategory(): Collection;

    /**
     * @param int $id
     * @return Category
     */
    public function findInCateById(int $id): Category;
}
