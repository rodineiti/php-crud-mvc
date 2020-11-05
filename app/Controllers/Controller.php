<?php

namespace App\Controllers;

use League\Plates\Engine;

class Controller
{
    protected $router;
    protected $view;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(dirname(__DIR__, 2) . "/views", "php");
        $this->view->addData(["router" => $this->router]);
    }
}