<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface OrderService
{
    /**
     * delete order
     *
     * @param int $orderId
     * @return void
     */
    public function destroy(int $orderId): void;

    /**
     * get all order
     *
     * @return LengthAwarePaginator
     */
    public function getOrder(): LengthAwarePaginator;

    /**
     * get order detail by id
     *
     * @param int $orderDetailId
     * @return Collection
     */
    public function getOrderDetail(int $orderDetailId): Collection;

    /**
     * update status
     *
     * @param int $orderId
     * @return void
     */
    public function updateStatus(int $orderId): void;
}
