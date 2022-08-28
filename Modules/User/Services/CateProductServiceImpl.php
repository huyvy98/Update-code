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
     * @param  CategoryProductRepository  $categoryProductRepository
     */
    public function __construct(CategoryProductRepository $categoryProductRepository)
    {
        $this->categoryProductRepository = $categoryProductRepository;
    }

    /**
     * @param  string  $slug
     * @return CategoryProductResource
     */
    public function show(string $slug): CategoryProductResource
    {
        $cateShow = $this->categoryProductRepository->findCateBySlug($slug);
        $data = CategoryProductResource::make($cateShow);

        return $data;
    }

    /**
     * @return CategoryProductResource
     */
    public function getCategory(): CategoryProductResource
    {
        $listCate =  $this->categoryProductRepository->getCategory();
        $data = CategoryProductResource::make($listCate);

        return $data;
    }
}
