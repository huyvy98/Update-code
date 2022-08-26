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
     * @param int $idPr
     * @return Product|null
     */
    public function findProductById(int $idPr): ?Product
    {
        return Product::query()->findOrFail($idPr);
    }

    /**
     * @param int $idUs
     * @return User|null
     */
    public function findUserById(int $idUs): ?User
    {
        return User::query()->findOrFail($idUs);
    }

    /**
     * @param int $idOrd
     * @return Order|null
     */
    public function findOrderById(int $idOrd): ?Order
    {
        return Order::query()->findOrFail($idOrd);
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function addToOrder(Order $order): Order
    {
        $order->save();

        return $order;
    }

    /**
     * @param OrderDetail $orderDetail
     * @return OrderDetail
     */
    public function addToOrderDetail(OrderDetail $orderDetail): OrderDetail
    {
        $orderDetail->save();

        return $orderDetail;
    }
}
