<?php

// MOSTRAR ERRORES EN PRODUCCIÓN
ini_set('display_errors', 1);
ini_set('display_startup_error', 1);
error_reporting('E_ALL');

require_once '../vendor/autoload.php';

// PHPDOTENV

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Eloquent

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;
use App\Models\Job;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => getenv('DB_CONNECTION'),
  'host'      => getenv('DB_HOST'),
  'database'  => getenv('DB_DATABASE'),
  'username'  => getenv('DB_USERNAME'),
  'password'  => getenv('DB_PASSWORD'),
  'charset'   => getenv('DB_CHARSET'),
  'collation' => getenv('DB_COLLATION'),
  'prefix'    => getenv('DB_PREFIX'),
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

// REQUEST

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
  $_SERVER,
  $_GET,
  $_POST,
  $_COOKIE,
  $_FILES
);

// ROUTE

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();

$map->get('index', '/php-platzi/', [
  'controller' => 'App\Controllers\IndexController',
  'action' => 'indexAction',
]);
$map->get('addJobs', '/php-platzi/jobs/add', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction',
]);
$map->post('saveJobs', '/php-platzi/jobs/add', [
  'controller' => 'App\Controllers\JobsController',
  'action' => 'getAddJobAction',
]);

$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

if (! $route) {
  echo "No route";
} else {
  $handlerData = $route->handler;
  $actionName = $handlerData['action'];
  $controllerName = $handlerData['controller'];
  $controller = new $controllerName;
  $controller->$actionName($request);
  // require $route->handler;
  // var_dump($route->handler);
}

