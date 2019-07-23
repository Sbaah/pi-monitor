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

    /** @var mixed $log */
    protected $log;

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
        $this->log = $container['log'];
        $this->router = $container['router'];
        $this->view = $container['view'];

        $data['core'] = $this->api->call('system');
        // I have a fan attachment, so I've included a call to enable fan control.
        $data['core']['fan'] = $this->api->call('system/fan');

        $this->viewData($data);
    }

    /**
     * Set data to pass to the view.
     *
     * @param array $data
     *
     * @return array
     */
    protected function viewData($data = [])
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