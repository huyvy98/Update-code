<?php

namespace Modules\User\Services;

use Modules\User\Contracts\Repositories\Mysql\CategoryProductRepository;
use Modules\User\Contracts\Services\CategoryProductService;
use Modules\User\Transformers\CategoryProductResource;

class CateProductServiceImpl implements CategoryProductService
{
    /**
     * @var CategoryProductRepository
     */
    protected CategoryProductRepository $categoryProductRepository;

    /**
     * @param CategoryProductRepository $categoryProductRepository
     */
    public function __construct(CategoryProductRepository $categoryProductRepository)
    {
        $this->categoryProductRepository = $categoryProductRepository;
    }

    /**
     * @param string $slug
     * @return mixed
     */
    public function show(string $slug)
    {
        $cateShow = $this->categoryProductRepository->findCateBySlug($slug);

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
