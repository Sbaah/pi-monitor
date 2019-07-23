<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

require __DIR__ . '/../config/dependencies.php';

require __DIR__ . '/../config/routes.php';