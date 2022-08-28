<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\ProductService;

class HomeController extends Controller
{
    /**
     * @var ProductService
     */
    protected ProductService $productService;

    /**
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $listCate = $this->productService->getCategory();

        return response()->json([
            'category' => $listCate
        ]);
    }
}
