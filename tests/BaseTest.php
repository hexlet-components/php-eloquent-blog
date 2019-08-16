<?php

namespace Php\Eloquent\Blog\Tests;

use Php\Eloquent\Blog\setup;
use Php\Eloquent\Blog\schema;
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
        ] = setup\bootstrap();

        $this->capsule->getConnection()->beginTransaction();
        schema\load();
        setup\loadSeeds($this->factory);
    }

    public function tearDown(): void
    {
        $this->capsule->getConnection()->rollback();
    }
}
