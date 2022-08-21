<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface OrderRepository
{
    /**
     * Delete order
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * Get all order
     *
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator;

    /**
     * Get order detail by id
     *
     * @param  int  $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection;

    /**
     * Change status order
     *
     * @param  int  $id
     * @return void
     */
    public function changeStatus(int $id): void;

    /**
     * Find order by id
     *
     * @param  int  $id
     * @return Order|null
     */
    public function findById(int $id): ?Order;

    /**
     * Find user by id
     *
     * @param  int  $id
     * @return Collection
     */
    public function findUser(int $id): Collection;
}
