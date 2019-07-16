<?php

require_once __DIR__ . '/../config/bootstrap.php';

const DEBUG = false;

/**
 * If DEBUG is set to true, the testdata.json file
 * containing a dummy response will be loaded instead
 * of making calls to the API.
 */
$router->respond('GET', '/', function () use ($monitor, $view)
{
    if (DEBUG) {
        $data = toArray(json_decode(file_get_contents(__DIR__ . '/../testdata.json')));
    } else {
        $response = $monitor->run();

        if ($response && $response->getStatusCode() === 200) {
            $data = toArray(json_decode($response->getBody()->getContents()));
        } else {
            $data = [
                "error" => true,
                "message" => "There was an error fetching data, please check the logs."
            ];
        }
    }

    return $view->render('monitor.twig', $data);
});

$router->dispatch();
