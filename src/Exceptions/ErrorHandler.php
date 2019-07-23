<?php

namespace App\Exceptions;

use App\Controllers\Controller;
use Throwable;

class ErrorHandler extends Exception {

    /**
     * Set data to pass to the view.
     *
     * @param array $data
     *
     * @return array
     */
    protected function viewData(array $data = []) : array
    {
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $this->data[$key] = $val;
            }
        }

        return $this->data;
    }

    /**
     * Renders templates with view data.
     *
     * @param string $template
     * @param array $data
     *
     * @return mixed
     */
    protected function render(string $template, array $data)
    {
        return $this->view->render($template, $data);
    }
}