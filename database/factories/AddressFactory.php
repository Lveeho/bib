<?php

use Faker\Generator as Faker;

$factory->define(\App\Address::class, function (Faker $faker) {
    return [
        //
        'street' => $faker->streetName,
        'nr' => $faker->buildingNumber,
        'busnr' => $faker->buildingNumber,
        'postalcode' => $faker->postcode,
        'country'=>$faker->country
    ];
});
