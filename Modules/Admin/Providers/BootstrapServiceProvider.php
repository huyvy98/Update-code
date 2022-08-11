<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Contracts\Services\UserService;
use Modules\Admin\Services\ProductServiceImpl;
use Modules\Admin\Services\UserServiceImpl;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(ProductService::class, ProductServiceImpl::class);
    }
}
