<?php

namespace App\Exceptions;

use Pimple\Container;
use Throwable;

abstract class Exception extends \Exception
{
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

    public function __construct(Container $container, $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->api = $container['api'];
        $this->log = $container['log'];
        $this->router = $container['router'];
        $this->view = $container['view'];
    }
}
