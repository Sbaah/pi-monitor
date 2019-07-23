<?php

namespace App\Controllers;

use Pimple\Container;

/**
 * Abstract base controller class.
 *
 * @package App\Controllers
 */
abstract class Controller {

    /** @var mixed $api */
    protected $api;

    /** @var mixed $router */
    protected $router;

    /** @var mixed $view */
    protected $view;

    /** @var array $data */
    public $data = [];

    /**
     * Abstract Controller constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->api = $container['api'];
        $this->view = $container['view'];
        $this->router = $container['router'];

        $this->data['core'] = $this->api->call('system');
        // I have a fan attachment, so I've included a call to enable fan control.
        $this->data['core']['fan'] = $this->api->call('system/fan');
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