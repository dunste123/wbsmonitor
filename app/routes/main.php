<?php

use Twig\Environment as Twig;

/** @var FastRoute\RouteCollector $router */

$router->get('/', function (Twig $twig) {

    return $twig->render('index.twig', [
        'title' => 'Home',
    ]);

});
