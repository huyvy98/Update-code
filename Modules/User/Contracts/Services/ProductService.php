<?php

namespace Modules\User\Contracts\Service;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAllProduct(): LengthAwarePaginator;

    /**
     * @param $id
     * @return Product|null
     */
    public function findProduct($id): ?Product;
}
