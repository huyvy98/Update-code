<?php

namespace Modules\Admin\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;
use Modules\Admin\Contracts\Services\OrderService;

class OrderServiceImpl implements OrderService
{
    /**
     * @var OrderRepository
     */
    protected OrderRepository $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        if ($id) {
            $this->orderRepository->destroy($id);
        }
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator
    {
        return $this->orderRepository->getAllOrder();
    }


}
