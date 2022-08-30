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
    protected CategoryService $categoryProductService;

    /**
     * @param  CategoryService  $categoryProductService
     */
    public function __construct(CategoryService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    /**
     * @param int $id
     * @return CategoryResource
     */
    public function show(int $id): CategoryResource
    {
        $data = $this->categoryProductService->show($id);

        return CategoryResource::make($data);
    }

    /**
     * @return CategoryResource
     */
    public function index(): CategoryResource
    {
        $data = $this->categoryProductService->getCategory();

        return CategoryResource::make($data);
    }
}