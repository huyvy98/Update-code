<?php

namespace Modules\User\Services;

use App\Models\Category;
use Modules\User\Contracts\Repositories\Mysql\CategoryRepository;
use Modules\User\Contracts\Services\CategoryService;
use Modules\User\Transformers\CategoryResource;

class CateServiceImpl implements CategoryService
{
    /**
     * @var CategoryRepository
     */
    protected CategoryRepository $categoryProductRepository;

    /**
     * @param CategoryRepository $categoryProductRepository
     */
    public function __construct(CategoryRepository $categoryProductRepository)
    {
        $this->categoryProductRepository = $categoryProductRepository;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id)
    {
        $cateShow = $this->categoryProductRepository->findCateById($id);

        return $cateShow;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        $listCate = $this->categoryProductRepository->getCategory();

        return $listCate;
    }
}
