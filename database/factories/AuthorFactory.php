<?php

use Faker\Generator as Faker;

$factory->define(\App\Author::class, function (Faker $faker) {
    return [
        //
        'author_firstname'=>$faker->firstName,
        'author_lastname'=>$faker->lastName,
    ];
});
