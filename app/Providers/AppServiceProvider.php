<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Core\Eloquent\EloquentProductRepository;
use Illuminate\Pagination\Paginator;
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
        $this->app->bind(
            ProductRepositoryInterface::class,
            EloquentProductRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('admin.products.*', function($view){
            $view->with('categories', Category::pluck('title','id'));
        });
    }
}
