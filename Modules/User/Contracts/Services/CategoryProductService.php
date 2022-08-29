<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Transformers\CategoryProductResource;

interface CategoryProductService
{
    /**
     * @return mixed
     */
    public function getCategory();

    /**
     * @param  string  $slug
     * @return mixed
     */
    public function show(string $slug);
}
