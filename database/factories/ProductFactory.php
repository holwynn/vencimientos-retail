<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->streetAddress,
        'upc' => str_random(13),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
