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
     * @return mixed
     */
    public function view()
    {
        return $this->render('dashboard.twig', $this->data);
    }
}