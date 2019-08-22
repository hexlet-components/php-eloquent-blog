<?php

namespace App\Tests;

use App\config\loaders;
use \PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    protected $factory;
    protected $capsule;
    protected $faker;

    public function setUp(): void
    {
        [
            'factory' => $this->factory,
            'capsule' => $this->capsule,
            'faker' => $this->faker
        ] = loaders\bootstrap();

        $this->capsule->getConnection()->beginTransaction();
    }

    public function tearDown(): void
    {
        $this->capsule->getConnection()->rollback();
    }
}
