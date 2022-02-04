<?php

use Faker\Generator as Faker;

$factory->define(\App\CartItem::class, function (Faker $faker) {
    return [
        'cart_id'    => $faker->unique()->md5,
        'product_id' => $faker->numberBetween($min = 1, $max = 10),
        'quantity'   => $faker->numberBetween($min = 1, $max = 10),
    ];
});
