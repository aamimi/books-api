<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
    ];
});
