<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Contracts\Repositories\Mysql\AdminRepository;
use Modules\Admin\Contracts\Repositories\Mysql\CategoryRepository;
use Modules\Admin\Contracts\Repositories\Mysql\OrderRepository;
use Modules\Admin\Contracts\Repositories\Mysql\ProductRepository;
use Modules\Admin\Contracts\Repositories\Mysql\UserRepository;
use Modules\Admin\Repositories\Mysql\AdminRepoImpl;
use Modules\Admin\Repositories\Mysql\CategoryRepoImpl;
use Modules\Admin\Repositories\Mysql\OrderRepoImpl;
use Modules\Admin\Repositories\Mysql\ProductRepoImpl;
use Modules\Admin\Repositories\Mysql\UserRepoImpl;

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
        $this->app->bind(AdminRepository::class, AdminRepoImpl::class);
        $this->app->bind(CategoryRepository::class, CategoryRepoImpl::class);
        $this->app->bind(UserRepository::class, UserRepoImpl::class);

    }
}
