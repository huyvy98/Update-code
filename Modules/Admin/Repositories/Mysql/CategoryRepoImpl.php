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
     * Find category by id
     *
     * @param int $id
     * @return Category|null
     */
    public function findById(int $id): ?Category
    {
        return Category::query()->findOrFail($id);
    }

    /**
     * Save category to database
     *
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category
    {
        $category->save();

        return $category;
    }

    /**
     * Get all category from database
     *
     * @return LengthAwarePaginator
     */
    public function get(): LengthAwarePaginator
    {
        return Category::query()->paginate(10);
    }

    /**
     * Create category
     *
     * @param Category $category
     * @return Category
     */
    public function create(Category $category): Category
    {
        $category->query()->create();

        return $category;
    }

    /**
     * Update category
     *
     * @param Category $category
     * @return Category|null
     */
    public function update(Category $category): ?Category
    {
        $category->update();

        return $category;
    }

    /**
     * Delete category
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Category::destroy($id);
    }
}
