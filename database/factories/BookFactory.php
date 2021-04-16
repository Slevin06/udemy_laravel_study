<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
