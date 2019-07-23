<?php

use App\Api\Caller;
use Klein\Klein;
use Pimple\Container;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

$app = new Container();

$app['view'] = function () {
    $loader = new FilesystemLoader(__DIR__ . '/../resources/views');
    $view = new Environment($loader, [
        'cache' => __DIR__ . '/../public/cache',
        'debug' => env("DEBUG")
    ]);
    $view->addExtension(new DebugExtension());
    return $view;
};

$app['router'] = function () {
    $router = new Klein();
    return $router;
};

$app['api'] = function () {
    $api = new Caller();
    return $api;
};