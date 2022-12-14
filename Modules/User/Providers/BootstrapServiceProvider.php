<?php

namespace Modules\User\Providers;

use App\Securities\Authentications\AuthenticationManager;
use App\Securities\Authentications\BasicAuthenticationManager;
use Illuminate\Support\ServiceProvider;
use Modules\User\Contracts\Services\AuthService;
use Modules\User\Contracts\Services\CategoryService;
use Modules\User\Contracts\Services\OrderService;
use Modules\User\Contracts\Services\ProductService;
use Modules\User\Contracts\Services\UserService;
use Modules\User\Services\AuthServiceImpl;
use Modules\User\Services\CateServiceImpl;
use Modules\User\Services\OrderServiceImpl;
use Modules\User\Services\ProductServiceImpl;
use Modules\User\Services\UserServiceImpl;

class BootstrapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductService::class, ProductServiceImpl::class);
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(OrderService::class, OrderServiceImpl::class);
        $this->app->bind(CategoryService::class, CateServiceImpl::class);
        $this->app->bind(AuthenticationManager::class, BasicAuthenticationManager::class);
        $this->app->bind(UserService::class, UserServiceImpl::class);

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
