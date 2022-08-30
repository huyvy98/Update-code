<?php

namespace Modules\User\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
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
     * Get all category
     *
     * @return Collection
     */
    public function get(): Collection
    {
        $listCate = $this->categoryProductRepository->get();

        return $listCate;
    }
}
