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
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->categoryRepository->getCategory();
    }

    /**
     * @param CategoryRequest $request
     * @return Category
     */
    public function saveCategoryData(CategoryRequest $request): Category
    {
        $category = new Category();
        $category->name = $request->get('name');
        $data = $this->categoryRepository->save($category);

        return $data;
    }

    /**
     * @param CategoryRequest $request
     * @param int $id
     * @return Category
     */
    public function updateCategory(CategoryRequest $request, int $id): Category
    {
        $category = $this->categoryRepository->findById($id);
        $category->name = $request->get('name');
        $data = $this->categoryRepository->updateCategory($category);

        return $data;
    }

    /**
     * @param int $id
     * @return Category|null
     */
    public function editCategory(int $id): ?Category
    {
        return $this->categoryRepository->findById($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->categoryRepository->destroy($id);
    }
}
