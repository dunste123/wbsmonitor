<?php

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');
$twig = new \Twig\Environment($loader, [
//    'cache' => '/path/to/compilation_cache',
]);
