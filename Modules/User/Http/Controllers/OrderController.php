<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Http\Requests\OrderRequest;
use Modules\User\Transformers\OrderResource;

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
     * Show the form for editing the specified resource.
     * @param OrderRequest $request
     * @return OrderResource
     */
    public function buyOnCart(OrderRequest $request): OrderResource
    {
        $data = $this->orderService->buyOnCart($request);

        return OrderResource::make($data);
    }
}
