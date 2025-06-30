<?php

namespace App\Tests;

use App\config\loaders;
use PHPUnit\Framework\TestCase;
use Faker\Factory as FakerFactory;
use Faker\Generator as Faker;

abstract class BaseTestCase extends TestCase
{

    protected Faker $faker;
    protected $capsule;

    public function setUp(): void
    {
        ['capsule' => $this->capsule] = loaders\bootstrap();

        $this->capsule->getConnection()->beginTransaction();
        $this->faker = FakerFactory::create();
    }

    public function tearDown(): void
    {
        $this->capsule->getConnection()->rollback();
    }
}
