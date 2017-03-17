<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Core\Router;

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/../app/config/routing.php';

$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);

$resolver = new ControllerResolver();

$app = new Router($matcher, $resolver);

$response = $app->handle($request);

$response->send();