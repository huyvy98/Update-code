<?php

namespace Modules\User\Contracts\Services;

use Illuminate\Database\Eloquent\Collection;

interface CategoryService
{
    /**
     * Get all category
     *
     * @return Collection
     */
    public function getCategory(): Collection;
}
