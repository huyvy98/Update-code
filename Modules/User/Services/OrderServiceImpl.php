<?php

namespace Modules\User\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\User\Contracts\Repositories\Mysql\OrderDetailRepository;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Http\Requests\OrderRequest;

class OrderServiceImpl implements OrderService
{
    /**
     * @var OrderRepository
     * @var OrderDetailRepository
     */
    protected OrderRepository $orderRepository;
    protected OrderDetailRepository $orderDetailRepository;

    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;

    }

    /**
     * Create new order and add new order detail
     *
     * @param OrderRequest $request
     * @return array
     */
    public function order(OrderRequest $request): array
    {
        $cart = $request->all();
//        foreach ($cart['cart'] as $item) {
//            $find[] = [
//                'product_id' => $item['product_id']
//            ];
//        }
//        $product = Product::query()->whereIn('id', $find)->get('price')->toArray();
//        dd($product);
//
        $order = new Order();
        $order->user_id = Auth::guard('api')->user()->id;
        $order->status = "0";
        $this->orderRepository->create($order);
        // query price
        foreach ($cart['cart'] as $item) {
            $data[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'order_id' => $order->id
            ];
        }
//        dd($data);
        $this->orderDetailRepository->insert($order->id, $data);
        $detail = [
            'order_id' => $order->id
        ];
//        Mail::to(Auth::user()->email)->send(new MailNotify($data));

        return $detail;
    }

}
