<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Repositories\Mysql\ListAdminRepository;
use Modules\Admin\Contracts\Repositories\Mysql\OrderDetailRepository;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use Modules\Admin\Contracts\Repositories\Mysql\RoleRepository;
use Modules\Admin\Repositories\Mysql\ListAdminRepoImpl;
use Modules\Admin\Repositories\Mysql\OrderDetailRepoImpl;
use Modules\Admin\Repositories\Mysql\OrderRepoImpl;
use Modules\Admin\Repositories\Mysql\ProductRepoImpl;
use Modules\Admin\Repositories\Mysql\RoleRepoImpl;

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
        $this->app->bind(OrderRepository::class, OrderRepoImpl::class);
        $this->app->bind(OrderDetailRepository::class, OrderDetailRepoImpl::class);
        $this->app->bind(ListAdminRepository::class, ListAdminRepoImpl::class);
        $this->app->bind(RoleRepository::class, RoleRepoImpl::class);
    }
}
