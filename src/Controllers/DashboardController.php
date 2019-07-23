<?php

namespace App\Controllers;

/**
 * Dashboard controller class.
 *
 * @package App\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Render the dashboard.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function view(array $data = [])
    {
        $viewData = $this->viewData($data);

        return $this->render('dashboard.twig', $viewData);
    }
}