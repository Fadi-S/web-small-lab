<?php

use App\Response;
use App\Route;

require_once "vendor/autoload.php";

$request_uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

include "routes.php";
session_start();

$matched = false;

foreach (Route::routes() as $route) {
    $args = $route->is($request_uri, $method);
    if ($args !== false) {

        $response = $route->handle(...$args);

        if($response instanceof Response) {
            $response->handle();
        }

        echo $response;
        $matched = true;
        break;
    }
}

if (!$matched) {
    http_response_code(404);
    echo "404 Not Found";
}

clearResponse();