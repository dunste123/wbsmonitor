<?php

use Twig\Environment as Twig;

/** @var FastRoute\RouteCollector $router */

$router->get('/', function (Twig $twig) {

    return $twig->render('index.twig', [
        'title' => 'Home',
        'active' => 'home',
    ]);

});

$router->get('/second', function (Twig $twig) {

    return $twig->render('second_page.twig', [
        'title' => 'Another Page OwO',
        'active' => 'second',
    ]);

});
