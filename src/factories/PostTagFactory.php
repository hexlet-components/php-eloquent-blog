<?php

use Faker\Generator as Faker;
use Php\Eloquent\Blog\models\PostTag;

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

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return models\Post::first()->id;
        },
        'tag_id' => function () {
            return models\Tag::first()->id;
        }
    ];
});
