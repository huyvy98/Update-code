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
     * @param  OrderService  $orderService
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
        $orders = $this->orderService->getAllOrder();

        return view('admin::order.index', compact('orders'));
    }

    /**
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->orderService->destroy($id);

        return redirect()->route('orders.index')->with('message', 'Đã xóa đơn hàng ');
    }

    public function change(int $id): RedirectResponse
    {
        $this->orderService->updateStatus($id);

        return Redirect::route('orders.index')->with('message', 'Đã chuyển trạng thái đơn hàng');
    }

    /**
     * Show a new resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        $orderDetails = $this->orderService->getOrderDetail($id);
        $userFinds = $this->orderService->findUser($id);

        return view('admin::order.show', compact('orderDetails', 'userFinds'));
    }
}
