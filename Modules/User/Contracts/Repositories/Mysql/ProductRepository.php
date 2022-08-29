<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepository
{
    /**
     * @param int $id
     * @return Product
     */
    public function findById(int $id): Product;

    /**
     * @return mixed
     */
    public function getAllProduct();

//    /**
//     * @return mixed
//     */
//    public function getCategory();
}
