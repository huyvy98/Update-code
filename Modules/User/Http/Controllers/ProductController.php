<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\ProductService;
use Modules\User\Transformers\ProductResource;

class ProductController extends Controller
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
     * Show product on category
     *
     * @param int $categoryId
     * @return ProductResource
     */
    public function getProduct(int $categoryId): ProductResource
    {
        $data = $this->productService->getProductByCategoryId($categoryId);

        return ProductResource::make($data);
    }
}
