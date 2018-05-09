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

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'description' => $faker->paragraph,
        'img' => 'product/ncfMIHkRJjK3Ck65LV5cSnipC3xbLIcHnIFqhTwo.jpeg'
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words(2, true),
        'category_id' => $faker->numberBetween(1, 10),
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(30, 500),
        'quantity' => $faker->numberBetween(0, 500),
        'img1' => 'product/jkpGd0cQLCb2J0jV9trDOZetLADnY4RLfjXGgoIM.jpeg',
        'img2' => 'product/JWoBatJKMYt80pdkUkCzYS46vKCq3Qj1eEgoQ90J.jpeg',
        'img3' => 'product/ncfMIHkRJjK3Ck65LV5cSnipC3xbLIcHnIFqhTwo.jpeg'
    ];
});
