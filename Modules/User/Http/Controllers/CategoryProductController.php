<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\CategoryProductService;
use Modules\User\Transformers\CategoryProductResource;

class CategoryProductController extends Controller
{
    /**
     * @var CategoryProductService
     */
    protected CategoryProductService $categoryProductService;

    /**
     * @param  CategoryProductService  $categoryProductService
     */
    public function __construct(CategoryProductService $categoryProductService)
    {
        $this->categoryProductService = $categoryProductService;
    }

    /**
     * @param  string  $slug
     * @return CategoryProductResource
     */
    public function show(string $slug): CategoryProductResource
    {
        $data = $this->categoryProductService->show($slug);

        return CategoryProductResource::make($data);
    }

    /**
     * @return CategoryProductResource
     */
    public function index(): CategoryProductResource
    {
        $data = $this->categoryProductService->getCategory();

        return CategoryProductResource::make($data);
    }
}
