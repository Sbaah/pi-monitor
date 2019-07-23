<?php

use App\Controllers\DashboardController;
use App\Controllers\NetworkController;

$dashboard = new DashboardController($app);
$app['router']->respond('GET', '/dashboard', function () use ($dashboard) {
    return $dashboard->view();
});

$network = new NetworkController($app);
$app['router']->respond('GET', '/network', function () use ($network) {
    return $network->view();
});