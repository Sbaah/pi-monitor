<?php

namespace App\Controllers;

use Pimple\Container;

class DashboardController extends Controller {

    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function view()
    {
        $data['core'] = $this->api->call('system');
        $data['core']['fan'] = $this->api->call('system/fan');
        return $this->render('dashboard.twig', $data);
    }
}