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

$routes->add('admin_login', new Route(
    '/admin',
    array('_controller' => 'AppBundle\Controller\AdminController::loginAction')
));

$routes->add('admin_logout', new Route(
    '/admin/logout',
    array('_controller' => 'AppBundle\Controller\AdminController::logoutAction')
));

$routes->add('admin_signin', new Route(
    '/admin/signin',
    array('_controller' => 'AppBundle\Controller\AdminController::signinAction')
));

$routes->add('admin_dashboard', new Route(
    '/admin/dashboard',
    array('_controller' => 'AppBundle\Controller\AdminController::dashboardAction')
));

$routes->add('admin_feed_add', new Route(
    'admin/feed/add',
    array('_controller' => 'AppBundle\Controller\FeedController::addAction')
));

$routes->add('admin_feed_insert', new Route(
    'admin/feed/insert',
    array('_controller' => 'AppBundle\Controller\FeedController::insertAction')
));

$routes->add('admin_feed_edit', new Route(
    'admin/feed/{id}/edit',
    array('_controller' => 'AppBundle\Controller\FeedController::editAction')
));

$routes->add('admin_feed_update', new Route(
    'admin/feed/{id}/update',
    array('_controller' => 'AppBundle\Controller\FeedController::updateAction')
));

$routes->add('admin_feed_delete', new Route(
    'admin/feed/{id}/delete',
    array('_controller' => 'AppBundle\Controller\FeedController::deleteAction'),
    array('id' => '\d+')
));

return $routes;