<?php

namespace App\Controllers;

/**
 * Settings controller class.
 *
 * @package App\Controllers
 */
class SettingsController extends Controller
{
    /**
     * Render the settings page.
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