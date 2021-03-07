<?php

namespace App\Providers;

use App\Company;
use App\Employee;
use App\Policies\CompaniesPolicy;
use App\Policies\EmployeesPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Company::class => CompaniesPolicy::class ,
        Employee::class => EmployeesPolicy::class ,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
