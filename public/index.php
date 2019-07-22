<?php

require_once __DIR__ . '/../config/bootstrap.php';

$data['core'] = $api->call('system');
$router->respond('GET', '/', function () use ($api, $view, $data)
{
    $data['title'] = "Dashboard";
    $data['cooling'] = $api->call('system/fan');
    if (!$data['core']) {
        die('Could not fetch core data from the api :(');
    }

    return $view->render('dashboard.twig', $data);
});

$router->respond('GET', '/settings', function () use ($api, $view, $data)
{
    $data['title'] = "Settings";
    $data['settings']['cooling'] = $api->call('system/fan');
    if (!$data['core']) {
        die('Could not fetch core data from the api :(');
    }

    return $view->render('settings.twig', $data);
});

$router->respond('GET', '/network', function () use ($api, $view, $data)
{
    $data['title'] = "Network";
    $data['network'] = $api->call('network');
    if (!$data['network']) {
        die('Could not fetch network data from the api :(');
    }

    return $view->render('network.twig', $data);
});

$router->dispatch();