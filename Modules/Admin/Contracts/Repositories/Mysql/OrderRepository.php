<?php

namespace Modules\Admin\Contracts\Repositories\Mysql;

use Illuminate\Pagination\LengthAwarePaginator;

interface OrderRepository
{
    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator;

}
