<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employee;
use App\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Employee::truncate();
        Company::truncate();

        $userQuantity = 200;
        $companiesQuantity = 100;
        $employeesQuantity = 100;

        factory(User::class, $userQuantity)->create();
        factory(Company::class, $companiesQuantity)->create();
        factory(Employee::class, $employeesQuantity)->create();
    }
}
