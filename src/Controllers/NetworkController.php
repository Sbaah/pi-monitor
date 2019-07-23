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
     * @param array $data
     *
     * @return mixed
     */
    public function view(array $data = [])
    {
        $data['network'] = $this->api->call('network');
        $viewData = $this->viewData($data);

        return $this->render('network.twig', $viewData);
    }
}