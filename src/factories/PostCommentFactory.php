<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\{PostComment, Post, User};

class PostCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'body' => $faker->text,
            'post_id' => function () {
                return Post::first()->id;
            },
            'creator_id' => function () {
                return User::first()->id;
            },
        ];
    }
}
