<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use Modules\Admin\Repositories\Mysql\ProductRepoImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductRepository::class, ProductRepoImpl::class);
    }
}
