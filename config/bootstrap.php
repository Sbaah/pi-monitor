<?php

use App\Api\Caller;
use Klein\Klein;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

const DEBUG = true;

$loader = new FilesystemLoader(__DIR__ . '/../resources/views');
$view = new Environment($loader, [
    'cache' => __DIR__ . '/../public/cache',
    'debug' => DEBUG
]);
$view->addExtension(new DebugExtension());

$router = new Klein();
$api = new Caller();