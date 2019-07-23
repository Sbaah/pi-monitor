<?php

use App\Controllers\DashboardController;
use App\Controllers\NetworkController;

$controllers = [
    'dashboard' => new DashboardController($app),
    'network' => new NetworkController($app)
];

return extract($controllers);