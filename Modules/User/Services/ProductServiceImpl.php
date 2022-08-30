<?php

namespace Modules\User\Services;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
     * @param int $id
     * @return Collection
     */
    public function show(int $id): Collection
    {
        $productShow = $this->productRepository->findById($id);

        return $productShow;
    }
}
