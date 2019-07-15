<?php

use App\PyMonitor\Monitor;
use Klein\Klein;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__ . '/../resources/views');
$view = new Environment($loader, [
    'cache' => __DIR__ . '/../public/cache',
]);

$router = new Klein();
$monitor = new Monitor();

function toArray ($object) {
    if(!is_object($object) && !is_array($object))
        return $object;

    return array_map('toArray', (array) $object);
}