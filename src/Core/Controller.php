<?php

namespace Core;

use Symfony\Component\HttpFoundation\Session\Session;

class Controller
{
    protected $view;
    protected $session;

    public function __construct()
    {
        $this->view = new View();
        $this->session = new Session();
    }

}