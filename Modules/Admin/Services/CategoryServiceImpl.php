<?php

namespace Modules\Admin\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\CategoryRepository;
use Modules\Admin\Contracts\Services\CategoryService;
use Modules\Admin\Http\Requests\CategoryRequest;

class CategoryServiceImpl implements CategoryService
{
    /**
     * @var CategoryRepository $categoryRepository
     */
    protected CategoryRepository $categoryRepository;

    /**
     * ProductService constructor
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * get all category
     *
     * @return LengthAwarePaginator
     */
    public function getCategory(): LengthAwarePaginator
    {
        return $this->categoryRepository->get();
    }

    /**
     * save category
     *
     * @param CategoryRequest $request
     * @return Category
     */
    public function saveCategory(CategoryRequest $request): Category
    {
        $category = new Category();
        $category->name = $request->get('name');
        $data = $this->categoryRepository->save($category);

        return $data;
    }

    /**
     * update category
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return Category
     */
    public function updateCategory(CategoryRequest $request, int $id): Category
    {
        $category = $this->categoryRepository->findById($id);
        $category->name = $request->get('name');
        $data = $this->categoryRepository->update($category);

        return $data;
    }

    /**
     * edit category
     *
     * @param int $id
     * @return Category|null
     */
    public function editCategory(int $id): ?Category
    {
        return $this->categoryRepository->findById($id);
    }

    /**
     * delete category
     *
     * @param int $id
     * @return void
     */
    public function destroyCategory(int $id): void
    {
        $this->categoryRepository->destroy($id);
    }
}
