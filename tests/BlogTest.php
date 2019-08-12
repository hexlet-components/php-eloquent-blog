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
        print_r($user->toArray());
    }
}
