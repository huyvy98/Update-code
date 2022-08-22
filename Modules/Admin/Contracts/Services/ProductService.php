<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductService
{
    /**
     * get all product
     *
     * @param  Request  $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request): LengthAwarePaginator;

    /**
     * save product to database
     *
     * @param  Request  $request
     * @return Product
     */
    public function saveProductData(Request $request): Product;

    /**
     * update product
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Product
     *
     */
    public function updateProduct(Request $request, int $id): Product;

    /**
     * edit product
     *
     * @param  int  $id
     * @return Product|null
     */
    public function editProduct(int $id): ?Product;

    /**
     * delete product
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @return mixed
     */
    public function getCategory();
}
