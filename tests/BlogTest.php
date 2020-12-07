<?php

namespace App\Tests;

use App\Models\{User, Post};

class BlogTest extends BaseTest
{
    public function testCreatePost()
    {
        $user = new User();
        $user->email = $this->faker->email;
        $user->first_name = $this->faker->firstName;
        $user->last_name = $this->faker->lastName;
        $user->password = 'lala';
        $user->save();

        $this->assertNotNull(User::first()->id);

        $post = new Post();
        $post->title = $this->faker->sentence;
        $post->body = $this->faker->text;
        $post->creator()->associate(User::first());
        $post->save();

        $this->assertNotNull($post->creator);
    }
}
