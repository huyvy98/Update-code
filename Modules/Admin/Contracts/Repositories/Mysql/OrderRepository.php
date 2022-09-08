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
     * @param int $orderId
     * @return void
     */
    public function destroy(int $orderId): void;

    /**
     * Get all order
     *
     * @return LengthAwarePaginator
     */
    public function getOrder(): LengthAwarePaginator;

    /**
     * Get order detail by id
     *
     * @param int $orderDetailId
     * @return Collection
     */
    public function getOrderDetail(int $orderDetailId): Collection;

    /**
     * Change status order
     *
     * @param int $orderId
     * @return void
     */
    public function changeStatus(int $orderId): void;

    /**
     * Find order by id
     *
     * @param int $orderId
     * @return Order|null
     */
    public function findById(int $orderId): ?Order;

    /**
     * Find user by id
     *
     * @param int $userId
     * @return Collection
     */
}
