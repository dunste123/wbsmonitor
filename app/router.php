<?php

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $router) {
    require __DIR__ . '/routes/main.php';
});


// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        \http_response_code(404);
        \header('HTTP/1.0 404 Not Found');
        die('Page Not Found');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        \http_response_code(405);
        \header('HTTP/1.0 405 Method Not Allowed');
        die('Method Not Allowed, Allowed: ' . implode(', ', $allowedMethods));
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
        echo $handler($twig, $vars);
        break;
}

