<?php

namespace App\Controllers;

/**
 * Network controller class.
 *
 * @package App\Controllers
 */
class SettingsController extends Controller
{
    /**
     * Render the network page.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function view($data = [])
    {
        $viewData = $this->viewData($data);

        return $this->render('settings.twig', $viewData);
    }
}