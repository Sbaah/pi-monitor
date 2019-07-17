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
class Caller
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
            'base_uri' => 'http://raspberry-api.local',
        ]);
    }

    /**
     * Call Api.
     *
     * This method is called upon requests made to "/",
     * it uses Guzzle's request() method to make a GET
     * request to http://py-monitor-api.local/monitor.
     *
     * the chosen endpoint returns a JSON array
     * containing information, please look at
     * https://github.com/cversyx/py-monitor-api for
     * more details
     *
     * @param string $method
     * @param string $endpoint
     *
     * @return array|bool
     */
    public function call(string $endpoint, string $method = 'GET')
    {
        if(substr($endpoint, 0, 1) !== '/') {
            $endpoint = "/" . $endpoint;
        }

        try {
            $response= $this->client->request($method, $endpoint);
            if ($response && $response->getStatusCode() === 200) {
                return $this->toArray(json_decode($response->getBody()->getContents()));
            } else {
                return false;
            }
        } catch (GuzzleException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function test($file)
    {
        return $this->toArray(json_decode(file_get_contents(__DIR__ . '/../../tests/' . $file)));
    }

    /**
     * Helper method to convert objects to arrays.
     *
     * @param $object
     *
     * @return array
     */
    public function toArray ($object)
    {
        if(!is_object($object) && !is_array($object))
            return $object;

        return array_map('self::toArray', (array) $object);
    }
}