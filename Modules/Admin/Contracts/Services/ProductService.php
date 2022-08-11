<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductService
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param Request $request
     * @return Product
     */
    public function saveProductData(Request $request): Product;

    /**
     * @param Request $request
     * @param int $id
     * @return Product
     *
     */
    public function updateProduct(Request $request, int $id): Product;

    /**
     * @param int $id
     * @return Product|null
     */
    public function editProduct(int $id): ?Product;

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;
}
