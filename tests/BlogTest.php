<?php

namespace Php\Eloquent\Blog\Tests;

use Php\Eloquent\Blog\models;

class BlogTest extends BaseTest
{
    public function testCreateUser()
    {
        $user = new models\User();
        $user->email = $this->faker->email;
        $user->first_name = $this->faker->firstName;
        $user->last_name = $this->faker->lastName;
        $user->password = 'lala';
        $user->save();
        $this->assertNotNull($user->id);
    }

    public function testCreatePost()
    {
        $post = new models\Post();
        $post->title = $this->faker->sentence;
        $post->body = $this->faker->text;
        $post->user()->associate(models\User::first());
        $post->save();
        $this->assertNotNull($post->user);
        print_r($post->toArray());
    }
}
