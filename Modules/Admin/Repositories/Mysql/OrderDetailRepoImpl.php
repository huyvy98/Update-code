<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Collection;
use Modules\Admin\Contracts\Repositories\Mysql\OrderDetailRepository;

class OrderDetailRepoImpl implements OrderDetailRepository
{
    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        OrderDetail::destroy($id);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection
    {
        return OrderDetail::with('order', 'product')->where('order_id', $id)->get();
    }

    /**
     * @param int $idUs
     * @return Collection
     */
    public function findUser(int $idUs): Collection
    {
        return Order::with('user')->where('id', $idUs)->get();
    }

}