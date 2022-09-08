<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Services\AdminService;
use Modules\Admin\Contracts\Services\CategoryService;
use Modules\Admin\Contracts\Services\AuthService;
use Modules\Admin\Contracts\Services\OrderService;
use Modules\Admin\Contracts\Services\ProductService;
use Modules\Admin\Services\AdminServiceImpl;
use Modules\Admin\Services\CategoryServiceImpl;
use Modules\Admin\Services\AuthServiceImpl;
use Modules\Admin\Services\OrderServiceImpl;
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
        $this->app->bind(AuthService::class, AuthServiceImpl::class);
        $this->app->bind(OrderService::class, OrderServiceImpl::class);
        $this->app->bind(AdminService::class, AdminServiceImpl::class);
        $this->app->bind(CategoryService::class, CategoryServiceImpl::class);

    }
}
