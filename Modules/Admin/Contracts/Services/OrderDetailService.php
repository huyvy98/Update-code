<?php

namespace Modules\Admin\Contracts\Services;

use Illuminate\Support\Collection;

interface OrderDetailService
{
    /**
     * @param int $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection;

    /**
     * @param int $idUs
     * @return Collection
     */
    public function findUser(int $idUs): Collection;

}
