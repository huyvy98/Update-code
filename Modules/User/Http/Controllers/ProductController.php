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
     * @return mixed
     */
    public function index(): ProductResource
    {
        $listProduct = $this->productService->getAllProduct();

        return ProductResource::make($listProduct);
    }

    /**
     * @param int $id
     * @return ProductResource
     */
    public function show(int $id): ProductResource
    {
        $data = $this->productService->show($id);

        return ProductResource::make($data);
    }
}
