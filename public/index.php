<?php

use Base\Request;
use Base\Response;
use Base\Router;

$router = new Router();
$request = new Request($_GET, $_POST);
$response = new Response();

$url = $_SERVER['REQUEST_URI'];
$httpMethod = $_SERVER['REQUEST_METHOD'];

(require __DIR__ . '/../config/api.php')($router);

$router->dispatch($httpMethod, $url, $request, $response);

