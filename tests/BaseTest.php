<?php

namespace App\Tests;

use App\config\loaders;
use PHPUnit\Framework\TestCase;
use Faker\Factory as Faker;

abstract class BaseTest extends TestCase
{
    protected $capsule;

    public function setUp(): void
    {
        ['capsule' => $this->capsule] = loaders\bootstrap();

        $this->capsule->getConnection()->beginTransaction();
        $this->faker = Faker::create();
    }

    public function tearDown(): void
    {
        $this->capsule->getConnection()->rollback();
    }
}
