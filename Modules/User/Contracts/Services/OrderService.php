<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface OrderService
{
//    /**
//     * @param int $id
//     * @return JsonResponse
//     */
//    public function addToCart(int $id): JsonResponse;
//
//    /**
//     * @return JsonResponse
//     */
//    public function getCart(): JsonResponse;
//
//    /**
//     * @param Request $request
//     */
//    public function updateCart(Request $request);
//
//    /**
//     * @param int $id
//     * @return JsonResponse
//     */
//    public function deleteCart(int $id): JsonResponse;
//
    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function buyOnCart(Request $request): JsonResponse;
}
