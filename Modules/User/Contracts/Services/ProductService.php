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
     * @param  int  $category_id
     * @return Collection
     */
    public function show(int $category_id): Collection;
}
