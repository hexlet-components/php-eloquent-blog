<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();

        return [
            'post_id' => static fn() => Post::first()->id,
            'tag_id' => static fn() => Tag::first()->id,
        ];
    }
}
