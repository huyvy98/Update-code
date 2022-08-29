<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\OrderRequest;
use Modules\User\Transformers\OrderResource;

interface OrderService
{
    /**
     * @param OrderRequest $request
     * @return array
     */
    public function buyOnCart(OrderRequest $request): array;
}
