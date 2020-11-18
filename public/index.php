<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

// set up composer autoloader
require_once '../vendor/autoload.php';

use Aura\Router\RouterContainer;

// create a server request object
$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST
);

// create the router container and get the routing map
$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

// add a route to the map, and a handler for it
$map->get('index', '/', '../index.php');
$map->get('login', '/login', '../login.php');
$map->get('control', '/control', '../control.php');
$map->get('attendance', '/attendance', '../attendance.php');
$map->get('attendance.edit', '/attendance/edit', '../attendance_edit.php');
$map->get('logout', '/logout', '../logout.php');

// get the route matcher from the container
$matcher = $routerContainer->getMatcher();

// .. and try to match the request to a route.
$route = $matcher->match($request);

if (!$route) {
    echo '404 error';
} else {
    require $route->handler;
}
