<?php

namespace App\Providers;

use App\Http\Interfaces\Repositories\BaseRepositoryInterface;
use App\Http\Interfaces\Repositories\CategoryRepositoryInterface;
use App\Http\Interfaces\Repositories\ProductRepositoryInterface;
use App\Http\Repositories\BaseRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
