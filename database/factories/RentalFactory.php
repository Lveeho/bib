<?php

use Faker\Generator as Faker;

$factory->define(\App\Rental::class, function (Faker $faker) {
    return [
        //
        'user_id'=>rand(1,20),
        'barcode_id'=>rand(1,40),
        'rentaldate'=>$faker->date($format='Y-m-d',$max='now'),
    ];
});
