<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\CategoryRequest;

interface CategoryService
{
    /**
     * get all product
     *
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * save product to database
     *
     * @param CategoryRequest $request
     * @return Category
     */
    public function saveCategoryData(CategoryRequest $request): Category;

    /**
     * update product
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return Category
     */
    public function updateCategory(CategoryRequest $request, int $id): Category;

    /**
     * edit product
     *
     * @param int $id
     * @return Category|null
     */
    public function editCategory(int $id): ?Category;

    /**
     * delete product
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;
}
