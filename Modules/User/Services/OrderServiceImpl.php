<?php

namespace Modules\User\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Arr;
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
        $data = $request->all();
        $order = new Order();
        $order->user_id = Auth::guard('api')->user()->id;
        $order->status = "0";
        $order = $this->orderRepository->create($order);

        $carts = Arr::get($data, 'cart', []);
        $productIds = collect($carts)->pluck('product_id')->toArray();

        // query into repo
        $products = Product::query()->whereIn('id', $productIds)->get();

        $productData = [];
        foreach ($carts as $item) {
            $product = $products->where('id', $item['product_id'])->first();
            $productData[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'order_id' => $order->id,
                'price' => optional($product)->price,
            ];
        }
//        dd($productData);
        $this->orderDetailRepository->insert($order->id, $productData);
        $detail = [
            'order_id' => $order->id
        ];
//        Mail::to(Auth::user()->email)->send(new MailNotify($data));

        return $detail;
    }

}
