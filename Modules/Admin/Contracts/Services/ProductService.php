<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\ProductRequest;
use Modules\Admin\Http\Requests\ProductRequestImage;

interface ProductService
{
    /**
     * get all product
     *
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getProduct(Request $request): LengthAwarePaginator;

    /**
     * save product to database
     *
     * @param ProductRequest $request
     * @return Product
     */
    public function saveProduct(ProductRequest $request): Product;

    /**
     * update product
     *
     * @param ProductRequestImage $request
     * @param int $id
     * @return Product
     */
    public function updateProduct(ProductRequestImage $request, int $id): Product;

    /**
     * edit product
     *
     * @param int $id
     * @return Product|null
     */
    public function editProduct(int $id): ?Product;

    /**
     * delete product
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * Get category
     *
     * @return Collection
     */
    public function getCategory(): Collection;
}
