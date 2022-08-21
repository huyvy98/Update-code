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
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void
    {
        Order::destroy($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator
    {
        return Order::query()->paginate(10);
    }

    /**
     * @param  int  $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection
    {
        return OrderDetail::with('order', 'product')->where('order_id', $id)->get();
    }

    /**
     * @param  int  $id
     * @return void
     */
    public function changeStatus(int $id): void
    {
        Order::query()->where('id', $id)->update(['status' => '1']);
    }

    public function findById(int $id): ?Order
    {
        return Order::query()->findOrFail($id);
    }

    /**
     * @param  int  $id
     * @return Collection
     */
    public function findUser(int $id): Collection
    {
        return Order::with('user')->where('id', $id)->get();
    }
}
