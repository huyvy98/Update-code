<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
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
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $orders = $this->orderService->getOrder();

        return view('admin::order.index', compact('orders'));
    }

    /**
     * @param int $orderId
     * @return RedirectResponse
     */
    public function destroy(int $orderId): RedirectResponse
    {
        $this->orderService->destroy($orderId);

        return redirect()->route('orders.index')->with('message', 'Đã xóa đơn hàng ');
    }

    /**
     * @param int $orderId
     * @return RedirectResponse
     */
    public function change(int $orderId): RedirectResponse
    {
        $this->orderService->updateStatus($orderId);

        return Redirect::route('orders.index')->with('message', 'Đã chuyển trạng thái đơn hàng');
    }

    /**
     * Show a new resource.
     *
     * @param int $orderDetailId
     * @return View
     */
    public function show(int $orderDetailId): View
    {
        $orderDetails = $this->orderService->getOrderDetail($orderDetailId);

        return view('admin::order.show', compact('orderDetails'));
    }
}
