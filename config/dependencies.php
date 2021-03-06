<?php

use App\Api\Caller;
use Klein\Klein;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Pimple\Container;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/*----------------------------------------
 | Register application dependencies      |
 ----------------------------------------*/
$app = new Container();

$app['log'] = function () {
    $log = new Logger('monitor');
    $log->pushHandler(
        new StreamHandler(__DIR__.'/../logs/monitor.log', Logger::DEBUG)
    );

    return $log;
};

$app['view'] = function () {
    $loader = new FilesystemLoader(__DIR__.'/../resources/views');
    $view = new Environment($loader, [
        'cache' => env('CACHE') ? __DIR__.'/../public/cache' : env('CACHE'),
        'debug' => env('DEBUG'),
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
