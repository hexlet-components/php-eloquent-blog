<?php

use App\config\loaders;

[
    'factory' => $factory,
    'faker' => $faker
] = loaders\bootstrap();

loaders\loadFactories($faker);

return [
    'defaultIncludes' => [
      'vendor/autoload.php'
    ],
];
