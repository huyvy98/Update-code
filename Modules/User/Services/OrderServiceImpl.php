<?php

namespace Modules\User\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Emails\MailNotify;

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


//    /**
//     * @return JsonResponse
//     */
//    public function getCart(): JsonResponse
//    {
//        $cart = session()->get('cart');
//
//        return response()->json(['data' => $cart]);
//    }
//
//    public function addToCart(int $id): JsonResponse
//    {
//        $product = $this->orderRepository->findProductById($id);
//        $cart = session()->get('cart', []);
//        if (isset($cart[$id])) {
//            $cart[$id]['quantity']++;
//        } else {
//            $cart[$id] = [
//                'id' => $product->id,
//                'name' => $product->name,
//                'quantity' => 1,
//                'price' => $product->price,
//                'image' => $product->image
//            ];
//        }
//        Session::put('cart', $cart);
//        return response()->json(['cart' => $cart]);
//    }
//
//    public function updateCart(Request $request)
//    {
//        if ($request->id) {
//            $cart = session()->get('cart');
//            $cart[$request->id]['totals'] = $cart[$request->id]['price'] * $cart[$request->id]['quantity'];
//            session()->put('cart', $cart);
//            session()->flash('success', 'Cart updated successfully');
//            $total = 0;
//            $totalQuantity = 0;
//            foreach ($cart as $item) {
//                $total += $item['price'] * $item['quantity'];
//                $totalQuantity += $item['quantity'];
//            }
//            $cart[$request->id]['totalPrice'] = $total;
//            $cart[$request->id]['totalQuantity'] = $totalQuantity;
//            $product = $cart[$request->id];
//
//            return response()->json(['product' => $product]);
//        }
//    }
//
//    public function deleteCart(int $id): JsonResponse
//    {
//        $cart = Session::get('cart');
//        if (Arr::get($cart, $id, null)) {
//            unset($cart[$id]);
//            Session::put('cart', $cart);
//        }
//        Session::put('cart', $cart);
//
//        return response()->json(['cart' => $cart]);
//    }
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function buyOnCart(Request $request): JsonResponse
    {
        $cart = $request->all();

        dd($cart);

        $product = Product::query()->whereIn('id', $cart[0]['product_id'])->get();
        dd($product);
        foreach (json_decode($product) as $key => $pr){
            $product->id = $pr[$key];
            dd($pr[0]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->status = "0";
        $this->orderRepository->addToOrder($order);

////        dd($order['id']);
//        $items = OrderDetail::query()->where('order_id',$order['id'])->first();
////        dd($items);
        $orderDetail = new OrderDetail();
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id = $cart['product_id'];
        $orderDetail->quantity = $cart['quantity'];
        $orderDetail->price = $product->price * $cart['quantity'];

        $this->orderRepository->addToOrderDetail($orderDetail);


        $data = [
            'message' => 'Success order',
            'orderID' => $order->id,

        ];
//        Mail::to(Auth::user()->email)->send(new MailNotify($data));

        return response()->json(['data' => $data]);
    }
}
