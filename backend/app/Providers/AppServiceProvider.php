<?php

namespace App\Providers;

use App\Http\Service\CuisineTypeService;
use App\Http\Service\HomeChefService;
use App\Http\Service\Impl\CuisineTypeServiceImpl;
use App\Http\Service\Impl\HomeChefServiceImpl;
use Illuminate\Support\ServiceProvider;
use App\Http\Service\UserService;
use App\Http\Service\Impl\UserServiceImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, function () {
            return new UserServiceImpl();
        });

        $this->app->bind(CuisineTypeService::class, function () {
            return new CuisineTypeServiceImpl();
        });

        $this->app->bind(HomeChefService::class, function () {
            return new HomeChefServiceImpl();
        });
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
