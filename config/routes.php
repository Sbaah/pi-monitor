<?php

/** @var \App\Controllers\DashboardController $dashboard */
$app['router']->respond('GET', '/dashboard', function () use ($dashboard) {
    return $dashboard->view();
});

/** @var \App\Controllers\NetworkController $network */
$app['router']->respond('GET', '/network', function () use ($network) {
    return $network->view();
});