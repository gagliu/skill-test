<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'data' => json_encode([
            'name' => $faker->name,
            'quantity' => $faker->numberBetween(1, 500),
            'price' => $faker->numberBetween(1, 500),
        ])
    ];
});
