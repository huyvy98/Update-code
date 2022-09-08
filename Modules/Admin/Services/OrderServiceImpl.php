<?php

namespace Modules\Admin\Services;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;
use Modules\Admin\Contracts\Services\OrderService;
use Modules\Admin\Emails\MailConfirmOrder;
use Modules\User\Emails\MailNotify;

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
     * delete order
     *
     * @param int $orderId
     * @return void
     */
    public function destroy(int $orderId): void
    {
        $this->orderRepository->destroy($orderId);
    }

    /**
     * get all order
     *
     * @return LengthAwarePaginator
     */
    public function getOrder(): LengthAwarePaginator
    {
        return $this->orderRepository->getOrder();
    }

    /**
     * get order detail by id
     *
     * @param int $orderDetailId
     * @return Collection
     */
    public function getOrderDetail(int $orderDetailId): Collection
    {
        return $this->orderRepository->getOrderDetail($orderDetailId);
    }

    /**
     * update status
     *
     * @param int $orderId
     * @return void
     */
    public function updateStatus(int $orderId): void
    {
        $this->orderRepository->changeStatus($orderId);
        Mail::to(Auth::user()->email)->send(new MailConfirmOrder($orderId));
    }
}
