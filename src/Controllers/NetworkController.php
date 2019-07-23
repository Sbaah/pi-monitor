<?php

namespace App\Controllers;

/**
 * Network controller class.
 *
 * @package App\Controllers
 */
class NetworkController extends Controller
{
    /**
     * Render the network page.
     *
     * @return mixed
     */
    public function view()
    {
        $this->data['network'] = $this->api->call('network');
        return $this->render('network.twig', $this->data);
    }
}