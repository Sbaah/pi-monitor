<?php

require_once __DIR__ . '/../config/bootstrap.php';

$data['core'] = $api->call('system');
$router->respond('GET', '/', function () use ($api, $view, $data)
{
    if (!$data['core']) {
        die('Could not fetch data from the api :(');
    }

    return $view->render('dashboard.twig', $data);
});

$router->respond('GET', '/network', function () use ($api, $view, $data)
{
    $data['network'] = $api->call('network');
    if (!$data['network']) {
        die('Could not fetch data from the api :(');
    }

    return $view->render('network.twig', $data);
});

$router->dispatch();