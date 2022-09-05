<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Order;

interface OrderRepository
{
    /**
     * Create new order
     *
     * @param Order $order
     * @return Order
     */
    public function create(Order $order): Order;
}
