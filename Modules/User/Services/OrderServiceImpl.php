<?php

namespace Modules\User\Services;

use App\Models\Order;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Modules\User\Contracts\Repositories\Mysql\OrderDetailRepository;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Emails\MailNotify;
use Modules\User\Http\Requests\OrderRequest;

class OrderServiceImpl implements OrderService
{
    /**
     * @var OrderRepository $orderRepository
     */
    protected OrderRepository $orderRepository;

    /**
     * @var OrderDetailRepository $orderDetailRepository
     */
    protected OrderDetailRepository $orderDetailRepository;

    /**
     * @var ProductRepository $productRepository
     */
    protected ProductRepository $productRepository;

    /**
     * @param OrderRepository $orderRepository
     * @param OrderDetailRepository $orderDetailRepository
     * @param ProductRepository $productRepository
     */
    public function __construct(OrderRepository $orderRepository, OrderDetailRepository $orderDetailRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;

        $this->orderDetailRepository = $orderDetailRepository;

        $this->productRepository = $productRepository;
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
        $order->user_id = Auth::guard('api')->id();
        $order->status = "0";
        $order = $this->orderRepository->create($order);

        $carts = Arr::get($data, 'cart', []);
        $productIds = collect($carts)->pluck('product_id')->toArray();
        $products = $this->productRepository->getByIds($productIds);

        $productData = [];
        foreach ($carts as $item) {
            $product = $products->where('id', $item['product_id'])->first();
            $productData[] = [
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'order_id' => $order->id,
                'price' => $product->price,
            ];
        }
        $this->orderDetailRepository->insert($order->id, $productData);
        $result = [
            'order_id' => $order->id,
            'order_info' => $productData
        ];
        Mail::to(Auth::user()->email)->send(new MailNotify($productData));

        return $result;
    }
}
