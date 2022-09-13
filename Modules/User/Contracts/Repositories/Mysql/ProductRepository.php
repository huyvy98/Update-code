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
     * Find product on category
     *
     * @param int $categoryId
     * @return Collection
     */
    public function getByCateId(int $categoryId): Collection;

    /**
     * Get product by array id
     *
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection;
}
