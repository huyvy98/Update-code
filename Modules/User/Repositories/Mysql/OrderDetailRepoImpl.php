<?php

namespace Modules\User\Repositories\Mysql;

use App\Models\OrderDetail;
use Modules\User\Contracts\Repositories\Mysql\OrderDetailRepository;

class OrderDetailRepoImpl implements OrderDetailRepository
{
    /**
     * Add information to order detail
     *
     * @param int $orderId
     * @param array $data
     * @return bool
     */
    public function insert(int $orderId, array $data): bool
    {
        return OrderDetail::query()->where('order_id', $orderId)->insert($data);
    }
}
