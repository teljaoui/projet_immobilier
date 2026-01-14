<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['namespace' => 'App\Controllers\Public'], function ($routes) {
    $routes->get('/', 'HomeController::index');
    $routes->get('apropos', 'AboutController::index');
    $routes->get('contact', 'ContactController::index');
    $routes->get('biens', 'PropertyController::index');
    $routes->get('/favorites', 'FavoritesController::index');


    $routes->get('connexion', 'LoginController::login');
    $routes->get('inscription', 'LoginController::register');

    $routes->post('inscription_post', 'LoginController::register_post');
    $routes->post('login', 'LoginController::login_post');
    $routes->post('logout', 'LoginController::logout', ['filter' => 'auth']);
});


$routes->group('client', ['filter' => 'auth', 'namespace' => 'App\Controllers\Client'], function ($routes) {
    $routes->get('', 'ClientController::index');
});
