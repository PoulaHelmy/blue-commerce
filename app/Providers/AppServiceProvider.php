<?php

namespace App\Providers;

use App\Http\Repositories\Eloquent\BrandsRepository;
use App\Http\Repositories\Eloquent\CategoriesRepository;
use App\Http\Repositories\Eloquent\PostsCacheRepository;
use App\Http\Repositories\Eloquent\ProductsRepository;
use App\Http\Repositories\Eloquent\UsersRepository;
use App\Http\Repositories\Interfaces\BrandsRepositoryInterface;
use App\Http\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Http\Repositories\Interfaces\ProductsRepositoryInterface;
use App\Http\Repositories\Interfaces\UsersRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductsRepositoryInterface::class,ProductsRepository::class);
        $this->app->bind(CategoriesRepositoryInterface::class,CategoriesRepository::class);
        $this->app->bind(BrandsRepositoryInterface::class,BrandsRepository::class);
        $this->app->bind(UsersRepositoryInterface::class,UsersRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
