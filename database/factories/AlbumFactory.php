<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Album;
use App\models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Album::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => function() {
            return User::all()->random();
        },
    ];
});
