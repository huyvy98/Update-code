<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Contracts\Repositories\Mysql\UserRepository;
use Modules\User\Contracts\Repositories\Mysql\CategoryRepository;
use Modules\User\Contracts\Repositories\Mysql\OrderRepository;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;
use Modules\User\Repositories\Mysql\UserRepoImpl;
use Modules\User\Repositories\Mysql\CategoryRepoImpl;
use Modules\User\Repositories\Mysql\OrderRepoImpl;
use Modules\User\Repositories\Mysql\ProductRepoImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepository::class,ProductRepoImpl::class);
        $this->app->bind(UserRepository::class,UserRepoImpl::class);
        $this->app->bind(OrderRepository::class,OrderRepoImpl::class);
        $this->app->bind(CategoryRepository::class,CategoryRepoImpl::class);

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
