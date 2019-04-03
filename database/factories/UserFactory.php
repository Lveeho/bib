<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Provider\nl_BE\Person;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'user_firstname' => $faker->firstNameFemale,
        'user_lastname'=>$faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'rijksnr'=>Person::rrn(),
        'email_verified_at' => now(),
        'password' => $faker->password, // password
        'remember_token' => Str::random(10),
        'status'=>rand(0,1),
        'address_id'=>rand(1,20)
    ];
});
