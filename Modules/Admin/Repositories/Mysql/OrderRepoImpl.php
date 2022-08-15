<?php

namespace Modules\Admin\Repositories\Mysql;

use App\Models\Order;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;

class OrderRepoImpl implements OrderRepository
{
    /**
     * @param int $id
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

}
