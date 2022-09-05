<?php

namespace Modules\User\Contracts\Repositories\Mysql;

interface OrderDetailRepository
{
    /**
     * Add information to order detail
     *
     * @param int $orderId
     * @param array $data
     * @return bool
     */
    public function insert(int $orderId, array $data): bool;
}
