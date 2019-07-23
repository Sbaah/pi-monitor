<?php

use App\Api\Caller;
use Klein\Klein;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$loader = new FilesystemLoader(__DIR__ . '/../resources/views');
$view = new Environment($loader, [
    'cache' => false,
    'debug' => env("DEBUG")
]);
$view->addExtension(new DebugExtension());

$router = new Klein();
$api = new Caller();