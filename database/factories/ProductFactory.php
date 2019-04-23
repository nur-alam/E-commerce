<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $title = $faker->title;
    return [
        'title' => $title,
        'slug' => Str::slug($title),
        'image' => $faker->image('/products','400','400'),
        'price' => $faker->randomNumber(3),
        'desc' => $faker->text,
    ];
});
