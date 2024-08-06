<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function(){
    return "trang chủ";
});

$router->get('index', [App\Controllers\StudentController::class, 'index']);
$router->get('add', [App\Controllers\StudentController::class, 'create']);
$router->post('store', [App\Controllers\StudentController::class, 'store']);
$router->get('edit/{id}', [App\Controllers\StudentController::class, 'show']);
$router->post('update/{id}', [App\Controllers\StudentController::class, 'update']);
$router->get('destroy/{id}', [App\Controllers\StudentController::class, 'delete']);


# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;