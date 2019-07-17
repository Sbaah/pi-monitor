<?php

require_once __DIR__ . '/../config/bootstrap.php';

/**
 * If DEBUG is set to true, the testdata.json file
 * containing a dummy response will be loaded instead
 * of making calls to the API.
 */
$router->respond('GET', '/', function () use ($api, $view)
{
    if (DEBUG) {
        $data = [
            'system' => $api->test('system.json'),
            'network' => $api->test('network.json')
        ];
    } else {
        $data = [
            'system' => $api->call("system"),
            'network' => $api->call("network")
        ];

        // TODO move all of this to a separate method
        if($data['system']['data']['cpu']['temp'] < 55) {
            $cpuYStop = "#28a745";
        } else if ($data['system']['data']['cpu']['temp'] >= 55 && $data['system']['data']['cpu']['temp'] < 81) {
            $cpuYStop = "#ffc107";
        } else {
            $cpuYStop = "#dc3545";
        }
        $data['system']['data']['cpu']['ystop'] = $cpuYStop;
    }

    if (!$data) {
        die("Could not fetch data from the api :(");
    }

    return $view->render('monitor.twig', $data);
});

$router->dispatch();