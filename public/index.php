<?php

ini_set('display_errors', 1);
ini_set('display_starup_error', 1);
error_reporting(E_ALL);

// set up composer autoloader
require_once '../vendor/autoload.php';

session_start();

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
// TODO: Improve the routes, many routes has parts in common
// TODO: Pass the routes name to the request to use it in the view
// instead of use <a href='/'>, use <a href='{url('login.index')}'>
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
    'action' => 'index',
    'auth' => true
]);

$map->get('rolecall', '/rolecall', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'index',
    'auth' => true
]);

$map->get('rolecall.show', '/rolecall/show/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'show',
    'auth' => true
]);

$map->get('rolecall.create', '/rolecall/create/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'create',
    'auth' => true
]);

$map->post('rolecall.store', '/rolecall/store/{class_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'store',
    'auth' => true
]);

$map->get('rolecall.show.edit', '/rolecall/show/{class_id}/edit/{student_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'showEdit',
    'auth' => true
]);

$map->post('rolecall.show.update', '/rolecall/show/{class_id}/update/{student_id}', [
    'controller' => 'App\Controllers\RoleCallController',
    'action' => 'showUpdate',
    'auth' => true
]);

$map->get('student', '/student', [
    'controller' => 'App\Controllers\StudentController',
    'action' => 'index',
    'auth' => true
]);

// get the route matcher from the container
$matcher = $routerContainer->getMatcher();
// .. and try to match the request to a route.
$route = $matcher->match($request);

if (!$route) {
    echo "<center><h2>404 error</h2><a href='/'>Go to the index</a></center>";
} else {
    // get the controller and its function
    $handlerData = $route->handler;
    $controllerName = $handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;

    $sessionUserId = $_SESSION['userId'] ?? null;
    if ($needsAuth && !$sessionUserId) {
        echo "<center><h2>Route protected</h2><a href='/'>Go to the login</a></center>";
        die();
    }

    foreach ($route->attributes as $key => $value) {
        // load the variables of the url (as class_id and student_id) in the request
        $request = $request->withAttribute($key, $value);
    }

    $controller = new $controllerName;
    // send as parameter the request for the controllers
    $response = $controller->$actionName($request);

    foreach ($response->getHeaders() as $name => $values) {
        // Check if there is a redirect whit Zend\Diactoros
        foreach ($values as $value) {
            header(sprintf('%s: %s', $name, $value), false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}
