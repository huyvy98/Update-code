<?php

namespace Modules\User\Contracts\Services;

use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Transformers\CategoryResource;

interface CategoryService
{
    /**
     * @return mixed
     */
    public function getCategory();

    /**
     * @param int $id
     * @return mixed
     */
    public function show(int $id);
}
