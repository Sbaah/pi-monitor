<?php

namespace App\Controllers;

use Pimple\Container;

abstract class Controller {

    protected $api;

    protected $router;

    protected $view;

    public function __construct(Container $container)
    {
        $this->api = $container['api'];
        $this->view = $container['view'];
        $this->router = $container['router'];
    }

    protected function render(string $template, array $data)
    {
        return $this->view->render($template, $data);
    }
}