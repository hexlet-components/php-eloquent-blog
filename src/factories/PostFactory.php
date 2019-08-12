<?php

use Faker\Generator as Faker;
use Php\Eloquent\Blog\models\Post;
use Php\Eloquent\Blog\models\User;

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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->text,
        'creator_id' => function () {
            return User::first()->id;
        }
    ];
});
