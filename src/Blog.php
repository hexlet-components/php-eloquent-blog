<?php

namespace Php\Eloquent\Blog\Blog;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Php\Eloquent\Blog\models;

function bootstrap()
{
    $dbPath = __DIR__ . '/../db.sqlite';
    touch($dbPath);

    $capsule = new Capsule();
    $capsule->addConnection([
      'driver'    => 'sqlite',
      'database'  => $dbPath,
      /* 'username'  => 'root', */
      /* 'password'  => 'password', */
      /* 'charset'   => 'utf8', */
      /* 'collation' => 'utf8_unicode_ci', */
      /* 'prefix'    => '', */
    ]);
    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();

    $capsule->setEventDispatcher(new Dispatcher(new Container));

    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();

    $capsule->connection()->listen(function ($query) {
      echo "\n";
      var_dump($query->sql);
    });

    $faker = \Faker\Factory::create();
    $factory = loadFactories($faker);

    return ['capsule' => $capsule, 'factory' => $factory, 'faker' => $faker];
}

function loadSeeds($factory)
{
    $factory->create(models\User::class);
    $factory->create(models\Post::class);
    $factory->create(models\PostLike::class);
    $factory->create(models\PostComment::class);
}

function loadFactories($faker)
{
    return Factory::construct($faker, __DIR__ . '/factories');
}

function loadScheme()
{
    if (!Capsule::schema()->hasTable('users')) {
        Capsule::schema()->create('users', function ($table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('password');
            $table->string('last_name');
            $table->timestamps();
        });
    }
    if (!Capsule::schema()->hasTable('posts')) {
        Capsule::schema()->create('posts', function ($table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('body');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    if (!Capsule::schema()->hasTable('post_comments')) {
        Capsule::schema()->create('post_comments', function ($table) {
            $table->bigIncrements('id');
            $table->string('body');
            $table->bigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    if (!Capsule::schema()->hasTable('post_likes')) {
        Capsule::schema()->create('post_likes', function ($table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->bigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
}
