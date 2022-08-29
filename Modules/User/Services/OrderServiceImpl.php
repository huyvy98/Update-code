<?php

namespace Modules\User\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Emails\MailNotify;
use Modules\User\Http\Requests\OrderRequest;

class OrderServiceImpl implements OrderService
{
    /**
     * @var OrderRepository
     */
    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param OrderRequest $request
     * @return array
     */
    public function buyOnCart(OrderRequest $request): array
    {
        $cart = $request->all();
        $order = new Order();
        $order->user_id = Auth::guard('api')->user()->id;
        $order->status = "0";
        $this->orderRepository->addToOrder($order);

        foreach ($cart as $key => $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item['product_id'];
            $orderDetail->quantity = $item['quantity'];
            $this->orderRepository->addToOrderDetail($orderDetail);
        }

        $data = [
            'message' => 'Success order',
            'orderID' => $order->id,
        ];
//        Mail::to(Auth::user()->email)->send(new MailNotify($data));

        return $data;
    }


}
