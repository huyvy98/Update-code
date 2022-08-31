<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\CategoryService;
use Modules\User\Transformers\CategoryResource;

class CategoryController extends Controller
{
    /**
     * @var CategoryService
     */
    protected CategoryService $categoryService;

    /**
     * @param  CategoryService  $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Get all category
     *
     * @return CategoryResource
     */
    public function index(): CategoryResource
    {
        $data = $this->categoryService->getCategory();

        return CategoryResource::make($data);
    }
}
