<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductRepository
{
    /**
     * @param int $id
     * @return Collection
     */
    public function findById(int $id): Collection;
}
