<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Album;
use App\models\Album_image;
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

$factory->define(Album_image::class, function (Faker $faker) {
    return [
        'album_id' => function() {
            return Album::all()->random();
        },
        'image' => 'albums/test.jpg'
    ];
});
