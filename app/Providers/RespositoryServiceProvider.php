<?php

namespace App\Providers;

use App\Repositories\Implementations\EmployeeRepository;
use App\Repositories\Interfaces\ICompanyRepository;
use App\Repositories\Implementations\CompanyRepository;
use App\Repositories\Interfaces\IEmployeeRepository;
use Illuminate\Support\ServiceProvider;

class RespositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ICompanyRepository::class,CompanyRepository::class);
        $this->app->bind(IEmployeeRepository::class,EmployeeRepository::class);
    }
}
