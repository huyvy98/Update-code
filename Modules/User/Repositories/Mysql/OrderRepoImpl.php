<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;

class OrderRepoImpl implements OrderRepository
{
    /**
     * Create new order
     *
     * @param Order $order
     * @return Order
     */
    public function createOrder(Order $order): Order
    {
        $order->save();

        return $order;
    }

    /**
     * Add information to order detail
     *
     * @param OrderDetail $orderDetail
     * @return OrderDetail
     */
    public function addToOrderDetail(OrderDetail $orderDetail): OrderDetail
    {
        $orderDetail->save();

        return $orderDetail;
    }
}
