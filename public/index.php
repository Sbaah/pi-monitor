<?php

require_once __DIR__ . '/../config/bootstrap.php';

$data['core'] = $api->call('system');
$data['core']['fan'] = $api->call('system/fan');
$data['network'] = $api->call('network');

require_once __DIR__ . '/../config/routes.php';
$router->dispatch();