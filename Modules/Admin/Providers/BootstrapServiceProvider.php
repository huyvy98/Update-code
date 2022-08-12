<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Services\LoginService;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Services\LoginServiceImpl;
use Modules\Admin\Services\ProductServiceImpl;

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
        $this->app->bind(LoginService::class, LoginServiceImpl::class);
    }
}
