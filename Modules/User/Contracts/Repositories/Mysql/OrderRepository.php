<?php

namespace Modules\User\Contracts\Repositories\Mysql;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;

interface OrderRepository
{
    /**
     * @param int $idPr
     * @return Product|null
     */
    public function findProductById(int $idPr): ?Product;

    /**
     * @param int $idUs
     * @return User|null
     */
    public function findUserById(int $idUs): ?User;

    /**
     * @param int $idOrd
     * @return Product|null
     */
    public function findOrderById(int $idOrd): ?Order;

    /**
     * @param Order $order
     * @return Order
     */
    public function addToOrder(Order $order): Order;

    /**
     * @param OrderDetail $orderDetail
     * @return OrderDetail
     */
    public function addToOrderDetail(OrderDetail $orderDetail): OrderDetail;
}
