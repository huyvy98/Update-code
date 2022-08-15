<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Admin\Contracts\Services\OrderDetailService;

class OrderDetailController extends Controller
{
    /**
     * @var OrderDetailService
     */
    protected OrderDetailService $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @param int $idUs
     * @return Renderable
     */
    public function index(int $id, int $idUs): Renderable
    {
        $orderDetail = $this->orderDetailService->getOrderDetail($id);
        $findUser = $this->orderDetailService->findUser($idUs);

        return view('admin::orderDetail.index', compact('orderDetail', 'findUser'));
    }

}
