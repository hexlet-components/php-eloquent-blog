<?php

namespace Php\Eloquent\Blog\Blog;

use Illuminate\Database\Capsule\Manager as Capsule;

function bootstrap()
{
    $capsule = new Capsule();

    $capsule->addConnection([
      'driver'    => 'sqlite',
      'database'  => 'db.sqlite',
      /* 'username'  => 'root', */
      /* 'password'  => 'password', */
      /* 'charset'   => 'utf8', */
      /* 'collation' => 'utf8_unicode_ci', */
      /* 'prefix'    => '', */
    ]);

    // Make this Capsule instance available globally via static methods... (optional)
    $capsule->setAsGlobal();

    // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
    $capsule->bootEloquent();
    loadScheme();
}

function loadScheme()
{
    if (!Capsule::schema()->hasTable('users')) {
        Capsule::schema()->create('users', function ($table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }
}
