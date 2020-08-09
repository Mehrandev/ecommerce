<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(
    Product::class,
    function (Faker $faker) {
        return [
            'name' => $faker->name,
            'price' => $faker->numberBetween(2500, 100000),
            'description' => $faker->sentence(50),
            'quantity' => $faker->numberBetween(0, 30),
            'image_url' => $faker->imageUrl(),
            'category_id' => factory(Category::class)
        ];
    }
);
