<?php

use App\Controllers\DashboardController;

$dashboard = new DashboardController($app);
$router->respond('GET', '/dashboard', function () use ($dashboard) {
    return $dashboard->view();
});