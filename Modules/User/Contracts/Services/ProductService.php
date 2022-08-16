<?php

namespace Modules\User\Contracts\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAllProduct(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Product|null
     */
    public function findProduct(int $id): ?Product;
}
