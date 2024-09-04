<?php   

$routes = require("routes.php");

function routeToController($routes, $uri) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    };
};

function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
routeToController($routes, $uri);