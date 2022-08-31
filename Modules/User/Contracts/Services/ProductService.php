<?php

namespace Modules\User\Contracts\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProductService
{
    /**
     * Show product on category
     *
     * @param int $categoryId
     * @return Collection
     */
    public function getProductByCategoryId(int $categoryId): Collection;
}
