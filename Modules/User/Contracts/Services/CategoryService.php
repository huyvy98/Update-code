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
     * @return Collection
     */
    public function getCategory(): Collection;

    /**
     * @param int $id
     * @return Collection
     */
    public function show(int $id): Collection;
}
