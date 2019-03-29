<?php

use Faker\Generator as Faker;

$factory->define(\App\Barcode::class, function (Faker $faker) {
    return [
        //
        'book_id'=>rand(1,20),
        'barcode'=>$faker->ean8,
    ];
});
