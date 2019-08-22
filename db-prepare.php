<?php

use Php\Eloquent\Blog\schema;
use Php\Eloquent\Blog\loaders;

require 'vendor/autoload.php';

[
    'factory' => $factory,
    'faker' => $faker
] = loaders\bootstrap();

schema\load();
loaders\loadFactories($faker);
loaders\loadSeeds($factory);
