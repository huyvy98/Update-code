<?php

namespace Modules\Admin\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
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
        $this->orderRepository->destroy($id);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllOrder(): LengthAwarePaginator
    {
        return $this->orderRepository->getAllOrder();
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getOrderDetail(int $id): Collection
    {
        return $this->orderRepository->getOrderDetail($id);
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function findUser(int $id): Collection
    {
        return $this->orderRepository->findUser($id);
    }

    /**
     * @param int $id
     * @return void
     */
    public function updateStatus(int $id): void
    {
        $this->orderRepository->changeStatus($id);
    }
}
