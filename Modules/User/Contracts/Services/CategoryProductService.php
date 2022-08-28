<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Transformers\CategoryProductResource;

interface CategoryProductService
{
    /**
     * @return CategoryProductResource
     */
    public function getCategory(): CategoryProductResource;

    /**
     * @param  string  $slug
     * @return CategoryProductResource
     */
    public function show(string $slug): CategoryProductResource;
}
