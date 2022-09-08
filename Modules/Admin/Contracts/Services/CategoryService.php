<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Http\Requests\CategoryRequest;

interface CategoryService
{
    /**
     * get all category
     *
     * @return LengthAwarePaginator
     */
    public function getCategory(): LengthAwarePaginator;

    /**
     * save category
     *
     * @param CategoryRequest $request
     * @return Category
     */
    public function saveCategory(CategoryRequest $request): Category;

    /**
     * update category
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return Category
     */
    public function updateCategory(CategoryRequest $request, int $id): Category;

    /**
     * edit category
     *
     * @param int $id
     * @return Category|null
     */
    public function editCategory(int $id): ?Category;

    /**
     * delete category
     *
     * @param int $id
     * @return void
     */
    public function destroyCategory(int $id): void;
}
