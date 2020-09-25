<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Employees;
use App\Companies;

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
        Employees::truncate();
        Companies::truncate();

        $userQuantity = 200;
        $companiesQuantity = 100;
        $employeesQuantity = 100;

        factory(User::class, $userQuantity)->create();
        factory(Companies::class, $companiesQuantity)->create();
        factory(Employees::class, $employeesQuantity)->create();
    }
}
