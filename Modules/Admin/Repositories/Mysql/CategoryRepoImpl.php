<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\CategoryRepository;

class CategoryRepoImpl implements CategoryRepository
{
    /**
     * @param int $id
     * @return Category|null
     */
    public function findById(int $id): ?Category
    {
        return Category::query()->findOrFail($id);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category
    {
        $category->save();

        return $category;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getCategory(): LengthAwarePaginator
    {
        return Category::query()->paginate(10);
    }

    /**
     * @param Category $category
     * @return Category
     */
    public function createCategory(Category $category): Category
    {
        $category->query()->create();

        return $category;
    }

    /**
     * @param Category $category
     * @return Category|null
     */
    public function updateCategory(Category $category): ?Category
    {
        $category->update();

        return $category;
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Category::destroy($id);
    }
}
