<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Contracts\Services\ProductService;
use Modules\User\Services\AuthServiceImpl;
use Modules\User\Services\ProductServiceImpl;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductService::class,ProductServiceImpl::class);
        $this->app->bind(AuthService::class,AuthServiceImpl::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
