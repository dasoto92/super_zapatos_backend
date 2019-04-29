<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Store::class, function (Faker $faker) {
    return [
      'name' => "Super Zapato ".$faker->stateAbbr,
      'address' => $faker->city,
    ];
});

$factory->define(App\Article::class, function (Faker $faker) {
    $color=$faker->colorName;
    return [
      'name' => "Zapato ".$color,
      'description' => "The best quality of shoes in a ".$color. " color",
      'price' => $faker->randomNumber(5),
      'total_in_shelf' => $faker->randomNumber(2),
      'total_in_vault' => $faker->randomNumber(2),
      'store_id' => $faker->numberBetween($min=1, $max=10),
    ];
});
