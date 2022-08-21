<?php

namespace Modules\Admin\Contracts\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface OrderService
{
    /**
     * delete order
     *
     * @param  int  $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * get all order
     *
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator;

    /**
     * get order detail by id
     *
     * @param  int  $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection;

    /**
     * find user by id
     *
     * @param  int  $id
     * @return Collection
     */
    public function findUser(int $id): Collection;

    /**
     * update status
     *
     * @param  int  $id
     * @return void
     */
    public function updateStatus(int $id): void;
}
