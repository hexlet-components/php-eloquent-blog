<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'post_id' => static fn() => Post::first()->id,
            'creator_id' => static fn() => User::first()->id,
        ];
    }
}
