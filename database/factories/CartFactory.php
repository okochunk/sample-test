<?php

use Faker\Generator as Faker;

$factory->define(\App\Cart::class, function (Faker $faker) {
    return [
        'id'          => $faker->unique()->md5,
        'key'         => $faker->unique()->md5,
        'userID'      => null,
    ];
});
