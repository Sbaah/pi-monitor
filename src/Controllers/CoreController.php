<?php

namespace App\Controllers;

use Pimple\Container;

/**
 * Core controller class.
 *
 * @package App\Controllers
 */
class CoreController extends Controller
{
    public function __construct(Container $container)
    {
        parent::__construct($container);

        $this->data['core'] = $this->api->call('system');
        $this->data['core']['fan'] = $this->api->call('system/fan');

        return $this->data;
    }
}