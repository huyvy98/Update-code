<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Transformers\OrderResource;

interface OrderService
{
    /**
     * @param  Request  $request
     * @return OrderResource
     */
    public function buyOnCart(Request $request): OrderResource;
}
