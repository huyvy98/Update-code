<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;

class OrderRepoImpl implements OrderRepository
{
    /**
     * Delete order
     *
     * @param int $orderId
     * @return void
     */
    public function destroy(int $orderId): void
    {
        Order::destroy($orderId);
    }

    /**
     * Get all order
     *
     * @return LengthAwarePaginator
     */
    public function getOrder(): LengthAwarePaginator
    {
        return Order::query()->paginate(10);
    }

    /**
     * Get order detail by id
     *
     * @param int $orderDetailId
     * @return Collection
     */
    public function getOrderDetail(int $orderDetailId): Collection
    {
        return OrderDetail::with('order')->where('order_id', $orderDetailId)->get();
    }

    /**
     * Change status order
     *
     * @param int $orderId
     * @return void
     */
    public function changeStatus(int $orderId): void
    {
        Order::query()->where('id', $orderId)->update(['status' => '1']);
    }

    /**
     * Find order by id
     *
     * @param int $orderId
     * @return Order|null
     */
    public function findById(int $orderId): ?Order
    {
        return Order::query()->findOrFail($orderId);
    }
}
