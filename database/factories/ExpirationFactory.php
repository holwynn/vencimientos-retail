<?php

use Faker\Generator as Faker;

$factory->define(App\Expiration::class, function (Faker $faker) {
    return [
        'expiration' => $faker->dateTime(),
        'qty' => rand(1, 100),
        'product_id' => function() {
            return factory(App\Product::class)->create()->id;
        }
    ];
});
