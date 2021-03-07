<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Company;
use App\Models\Employee;
use Faker\Generator as Faker;





$factory->define(Company::class, function (Faker $faker) {
    static $password;

    return [
        'name' => \Illuminate\Support\Str::random(10),
        'email' => $faker->unique()->safeEmail,
        'logo' => $faker->imageUrl(100,100),
        'website' => $faker->url,
    ];
});

$factory->define(Employee::class, function (Faker $faker) {
    static $password;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'company' => $faker->numberBetween(0,100),
        'email' =>  $faker->unique()->safeEmail,
        'phone' => $faker->randomNumber($nbDigits = 8),
    ];
});
