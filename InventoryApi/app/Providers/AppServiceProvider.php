<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Services\Employees\EmployeesServices;
use App\Services\Suppliers\SuppliersServices;
use App\Contracts\Employees\EmployeesServiceContract;
use App\Contracts\Suppliers\SuppliersServiceContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // $this->app->bind(
        //     EmployeesServiceContract::class,
        //     EmplyeesService::class
        // );

        $this->app->bind(EmployeesServiceContract::class, EmployeesServices::class);

        $this->app->bind(SuppliersServiceContract::class, SuppliersServices::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
