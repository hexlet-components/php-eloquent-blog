<?php

namespace Php\Eloquent\Blog\Tests;

use \PHPUnit\Framework\TestCase;
use function Php\Eloquent\Blog\Blog\bootstrap;
use Illuminate\Database\Capsule\Manager as Capsule;
use Php\Eloquent\Blog\models\User;

class BlogTest extends TestCase
{
    public function setUp(): void
    {
        bootstrap();
    }

    public function testExample()
    {
        $users = User::where('votes', '>', 1)->get();
        print_r($users);
    }
}
