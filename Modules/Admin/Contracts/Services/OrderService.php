<?php

namespace Modules\Admin\Contracts\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface OrderService
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
