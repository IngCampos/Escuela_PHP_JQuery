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
$map->get('login.index', '/', [
    'controller' => 'App\Controllers\LoginController',
    'action' => 'index'
]);

$map->post('login', '/login', [
    'controller' => 'App\Controllers\LoginController',
    'action' => 'login'
]);

$map->get('logout', '/logout', [
    'controller' => 'App\Controllers\LoginController',
    'action' => 'logout'
]);

$map->get('admin.users', '/admin/users', [
    'controller' => 'App\Controllers\UserController',
    'action' => 'index'
]);

$map->get('rolecall', '/rolecall', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'index'
]);

$map->get('rolecall.show', '/rolecall/show/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'show'
]);

$map->get('rolecall.create', '/rolecall/create/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'create'
]);

$map->post('rolecall.store', '/rolecall/store/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'store'
]);

$map->get('rolecall.show.edit', '/rolecall/show/{class_id}/edit/{student_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'showEdit'
]);

$map->post('rolecall.show.update', '/rolecall/show/{class_id}/update/{studet_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'showUpdate'
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
    echo "<center><h2>404 error</h2><a href='/'>Go to the login</a></center>";
} else {
    // get the controller and its function
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];

    $controller = new $controllerName;
    // send as parameter the request for the controllers
    $response = $controller->$actionName($request);
    echo $response->getBody();
}
