<?php

namespace Php\Eloquent\Blog\Tests;

use Php\Eloquent\Blog\Blog;
use Illuminate\Database\Capsule\Manager as Capsule;
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
        ] = Blog\bootstrap();

        $this->capsule->getConnection()->beginTransaction();
        Blog\loadScheme();
        Blog\loadSeeds($this->factory);
    }

    /* public function tearDown(): void */
    /* { */
    /*     $this->capsule->getConnection()->rollbackTransaction(); */
    /* } */
}
