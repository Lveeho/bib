<?php

use Faker\Generator as Faker;

$factory->define(\App\Book::class, function (Faker $faker) {
    return [
        //
        'ISBN' => $faker->isbn13,
        'booktitle'=>$faker->sentence(7,true),
        'author_id'=>rand(1,20),
        'year'=>$faker->year($max='now'),
        'edition'=>$faker->numberBetween($min=1, $max=6),
        'description'=>$faker->text,


    ];
});

