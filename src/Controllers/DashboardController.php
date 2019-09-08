<?php

namespace App\Controllers;

/**
 * Dashboard controller class.
 */
class DashboardController extends CoreController
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
