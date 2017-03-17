<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('index', new Route(
    '/',
    array('_controller' => 'AppBundle\Controller\DefaultController::indexAction')
));

$routes->add('news_page', new Route(
    '/page-{page}',
    array('_controller' => 'AppBundle\Controller\DefaultController::indexAction'),
    array('page' => '\d+')
));

return $routes;