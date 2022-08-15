<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepository
{
    /**
     * @param $idProduct
     * @return Product|null
     */
    public function findById($idProduct): ?Product;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllProduct(): LengthAwarePaginator;
}
