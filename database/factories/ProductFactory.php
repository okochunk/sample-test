<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'id'           => $faker->numberBetween($min = 10, $max = 100),
        'sku'          => $faker->unique()->md5,
        'Name'         => $faker->word,
        'price'        => $faker->numberBetween($min = 1, $max = 1000),
        'description'  => $faker->text,
        'Category'     => $faker->word,
        'UnitsInStock' => $faker->numberBetween($min = 1, $max = 50)
    ];
});
