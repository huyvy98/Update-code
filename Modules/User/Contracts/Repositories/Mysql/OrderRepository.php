<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

interface OrderRepository
{
    /**
     * Create new order
     *
     * @param Order $order
     * @return Order
     */
    public function createOrder(Order $order): Order;

    /**
     * Add information to order detail
     *
     * @param OrderDetail $orderDetail
     * @return OrderDetail
     */
    public function addToOrderDetail(OrderDetail $orderDetail): OrderDetail;
}
