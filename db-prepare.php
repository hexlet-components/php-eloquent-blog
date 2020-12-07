<?php

use App\config\schema;
use App\config\loaders;

require 'vendor/autoload.php';

loaders\bootstrap();
schema\load();
