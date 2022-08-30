<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepository
{
    /**
     * Get all category
     *
     * @return Collection
     */
    public function get(): Collection;
}
