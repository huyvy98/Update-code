<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Contracts\Services\OrderService;

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
//
//    public function getCart(): JsonResponse
//    {
//        return $this->orderService->getCart();
//    }
//
//    /**
//     * @param int $id
//     * @return JsonResponse
//     */
//    public function addToCart(int $id): JsonResponse
//    {
//        return $this->orderService->addToCart($id);
//    }
//
//    /**
//     * @param Request $request
//     * @return JsonResponse
//     */
//    public function updateCart(Request $request): JsonResponse
//    {
//        return $this->orderService->updateCart($request);
//    }

    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @return JsonResponse
     */
    public function buyOnCart(Request $request): JsonResponse
    {
        return $this->orderService->buyOnCart($request);
    }

//    /**
//     * Remove the specified resource from storage.
//     * @param int $id
//     * @return JsonResponse
//     */
//    public function destroy(int $id): JsonResponse
//    {
//        return $this->orderService->deleteCart($id);
//    }
}
