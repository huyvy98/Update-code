<?php

namespace Modules\User\Contracts\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductService
{
    /**
     * @return mixed
     */
    public function getAllProduct();

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);
//    /**
//     * @param int $id
//     * @return Product|null
//     */
//    public function findProduct(int $id): ?Product;
//
//    /**
//     * @return mixed
//     */
//    public function getCategory();
}
