<?php

use App\config\schema;
use App\config\loaders;

require 'vendor/autoload.php';

[
    'factory' => $factory,
    'faker' => $faker
] = loaders\bootstrap();

schema\load();
loaders\loadFactories($faker);
loaders\loadSeeds($factory);
