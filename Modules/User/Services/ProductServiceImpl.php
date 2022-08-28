<?php

namespace Modules\User\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;
use Modules\User\Contracts\Services\ProductService;

class ProductServiceImpl implements ProductService
{
    /**
     * @var ProductRepository
     */
    protected ProductRepository $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllProduct(): LengthAwarePaginator
    {
        return $this->productRepository->getAllProduct();
    }

    /**
     * @param int $id
     * @return Product|null
     */
    public function findProduct(int $id): ?Product
    {
        return $this->productRepository->findById($id);
    }

    public function getCategory()
    {
        return $this->productRepository->getCategory();
    }
}
