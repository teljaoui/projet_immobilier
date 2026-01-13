<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['namespace' => 'App\Controllers\Public'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('about', 'AboutController::index');
    $routes->get('contact', 'ContactController::index');
});
