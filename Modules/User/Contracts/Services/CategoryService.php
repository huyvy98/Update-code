<?php

namespace Modules\User\Contracts\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\User\Transformers\CategoryResource;

interface CategoryService
{
    /**
     * Get all category
     *
     * @return Collection
     */
    public function get(): Collection;
}
