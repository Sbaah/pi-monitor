<?php

namespace App\Controllers;

/**
 * Settings controller class.
 *
 * @package App\Controllers
 */
class SettingsController extends CoreController
{
    /**
     * Render the settings page.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function view(array $data = [])
    {
        $viewData = $this->viewData($data);

        return $this->render('settings.twig', $viewData);
    }
}