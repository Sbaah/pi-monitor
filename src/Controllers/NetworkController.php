<?php

namespace App\Controllers;

/**
 * Network controller class.
 */
class NetworkController extends CoreController
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
