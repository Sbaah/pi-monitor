<?php

use Klein\Request;
use Klein\Response;

$router->respond('GET', '/', function (Request $request, Response $response)
{
    $response->redirect('/dashboard', 301)->send();
});

$router->respond('GET', '/dashboard', function () use ($api, $view, $data)
{
    $data['title'] = "Dashboard";
    return $view->render('dashboard.twig', $data);
});

$router->respond('GET', '/software', function () use ($api, $view, $data)
{
    $data['title'] = "Software";
    return $view->render('software.twig', $data);
});


$router->respond('GET', '/settings', function () use ($api, $view, $data)
{
    $data['title'] = "Settings";
    return $view->render('settings.twig', $data);
});

$router->respond('GET', '/network', function () use ($api, $view, $data)
{
    $data['title'] = "Network";
    $data['network'] = $api->call('network');
    return $view->render('network.twig', $data);
});