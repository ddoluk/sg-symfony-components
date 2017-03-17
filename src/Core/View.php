<?php

namespace Core;

class View
{
    public function render($content = '', $layout, $data = array())
    {
        require_once __DIR__ . '/../../app/Resources/views/' . $layout . '.php';
    }
}