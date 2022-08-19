<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\Admin\Contracts\Services\OrderService;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    protected OrderService $orderService;

    /**
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $orders = $this->orderService->getAllOrder();
        return view('admin::order.index', compact('orders'));
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->orderService->destroy($id);

        return redirect()->route('orders.index');
    }

    /**
     * @param $id
     * @return View
     */
    public function show($id): View
    {
        $orderDetails = $this->orderService->getOrderDetail($id);
        return view('admin::order.show',compact('orderDetails'));
    }
}
