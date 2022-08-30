<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryRepository
{
    /**
     * Find product by id
     *
     * @param int $id
     * @return Category|null
     */
    public function findById(int $id): ?Category;

    /**
     * Save product to database
     *
     * @param Category $category
     * @return Category
     */
    public function save(Category $category): Category;


    /**
     * Get all category from database
     *
     * @return LengthAwarePaginator
     */
    public function getCategory(): LengthAwarePaginator;

    /**
     * Create category
     *
     * @param Category $category
     * @return Category
     */
    public function createCategory(Category $category): Category;

    /**
     * Update category
     *
     * @param Category $category
     * @return Category|null
     */
    public function updateCategory(Category $category): ?Category;

    /**
     * Delete category
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

}
