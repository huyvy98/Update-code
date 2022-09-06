<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class ProductRepoImpl implements ProductRepository
{
    /**
     * Find product on category
     *
     * @param int $categoryId
     * @return Collection
     */
    public function getByCateId(int $categoryId): Collection
    {
        return Product::query()
            ->whereHas('category', function ($query) use ($categoryId) {
                $query->where('id', $categoryId);
            })
            ->get();
    }

    /**
     * @param array $ids
     * @return Collection
     */
    public function getByIds(array $ids): Collection
    {
        return Product::query()->whereIn('id', $ids)->get();
    }
}
