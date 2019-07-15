<?php

namespace App\PyMonitor;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Monitor
{

    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://api.py-monitor.local',
        ]);
    }

    public function run()
    {
        try {
            return $this->client->request('GET', '/monitor');
        } catch (GuzzleException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}