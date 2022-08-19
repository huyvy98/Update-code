<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface OrderRepository
{
    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection;

    /**
     * @param Order $order
     * @return Order
     */
    public function change(Order $order): Order;
}
