<?php
/**
 * A simple caller demonstration for
 * fetching data from the py-monitor api.
 *
 * @author Chris Rowles <me@rowles.ch>
 * @since 1.0
 */
namespace App\Api;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Monitor
 */
class Monitor
{
    /** @var Client the api client  */
    private $client;

    /**
     * Monitor constructor.
     *
     * Replace the URL with the one you have configured for
     * your own py-monitor api instance.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://api.py-monitor.local',
        ]);
    }

    /**
     * Run Monitor.
     *
     * This method is called upon requests made to "/",
     * it uses Guzzle's request() method to make a GET
     * request to http://py-monitor-api.local/monitor.
     *
     * the /monitor endpoint returns a JSON array
     * containing system information, please look at
     * https://github.com/cversyx/py-monitor-api for
     * more details
     *
     * @return bool|mixed|\Psr\Http\Message\ResponseInterface
     */
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