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

$factory->define(App\PostLike::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return App\Post::first()->id;
        },
        'creator_id' => function () {
            return App\User::first()->id;
        }
    ];
});
