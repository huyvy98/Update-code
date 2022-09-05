<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Order;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;

class OrderRepoImpl implements OrderRepository
{
    /**
     * Create new order
     *
     * @param Order $order
     * @return Order
     */
    public function create(Order $order): Order
    {
        $order->save();

        return $order;
    }
}
