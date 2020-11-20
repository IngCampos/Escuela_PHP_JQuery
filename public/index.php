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
$map->get('login', '/', [
    'controller' => 'App\Controllers\LoginController',
    'action' => 'index'
]);

$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\LoginController',
    'action' => 'logout'
]);

$map->get('admin.users', '/users', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'index'
]);

$map->get('rolecall', '/rolecall', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'index'
]);

$map->get('rolecall.show', '/rolecall/show', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'show'
]);

$map->get('rolecall.create', '/rolecall/create', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'create'
]);

$map->get('rolecall.show.edit', '/rolecall/show/edit', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'showEdit'
]);

$map->get('student', '/student', [
    'controller' => 'App\Controllers\StudentController',
    'action' => 'index'
]);

// get the route matcher from the container
$matcher = $routerContainer->getMatcher();

// .. and try to match the request to a route.
$route = $matcher->match($request);

if (!$route) {
    echo '404 error';
} else {
    // get the controller and its function
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    $response = $controller->$actionName();

    echo $response->getBody();
}
