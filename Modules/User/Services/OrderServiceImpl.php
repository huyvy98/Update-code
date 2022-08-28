<?php

namespace Modules\User\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Transformers\OrderResource;

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
     * @param  Request  $request
     * @return OrderResource
     */
    public function buyOnCart(Request $request): OrderResource
    {
        $cart = $request->all();
        if (!$request->validated()) {
            return OrderResource::make($request);
        }

        if (Auth::check()) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->status = "0";
            $this->orderRepository->addToOrder($order);
        } else {
            $error = ['error' =>'Please login'];

            return OrderResource::make($error);
        }

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

        return OrderResource::make($data);
    }


}
